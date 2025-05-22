<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\SessionUtils;
use core\ParamUtils;
use core\RoleUtils;

class CartCtrl {
    
    public function action_addToCart() { 
        $productId = ParamUtils::getFromCleanURL(1);
        $userEmail = SessionUtils::load('user_email', true);
        
        try {
            $userId = App::getDB()->get("user", "id", [
               "email" => $userEmail 
            ]);
           
            $orderId = App::getDB()->get("order", "id", [
                    "user_id" => $userId,
                    "status" => "nowe"
            ]);
            
            if(!$orderId) {
                App::getDB()->insert("order", [
                    "user_id" => $userId,
                    "status"  => "nowe",
                    "full_price" => 0
                ]);
                $orderId = App::getDB()->id();
            }
            
            $product = App::getDB()->get("product", ["price"], [
                "id" => $productId
            ]);
            
            if(!$product) {
                Utils::addErrorMessage("Produkt nie istnieje.");
                SessionUtils::storeMessages();
                App::getRouter()->redirectTo("mainShow");
                return;
            }

            $productQ = App::getDB()->get("ordered_items", ["id", "quantity"], [
                    "order_id" => $orderId,
                    "product_id" => $productId
            ]);
            
            if ($productQ) {
                App::getDB()->update("ordered_items", [
                    "quantity[+]" => 1
                ], [
                    "id" => $productQ["id"]
                ]);
            } else {
                App::getDB()->insert("ordered_items", [
                    "order_id" => $orderId,
                    "product_id" => $productId,
                    "quantity" => 1,
                    "price" => $product["price"]
                ]);
            }
            
            Utils::addInfoMessage("Produkt dodany do koszyka.");
            SessionUtils::storeMessages();
            App::getRouter()->redirectTo("showCart");
            
        } catch (\PDOException $ex) {
            Utils::addErrorMessage("Błąd podczas dodawania do koszyka.");
            if (App::getConf()->debug) Utils::addErrorMessage($ex->getMessage());
            SessionUtils::storeMessages();
            App::getRouter()->redirectTo("mainShow");
        }
    }
    
   public function action_showCart() {
        $useremail = SessionUtils::load('user_email', true);
        $userId = App::getDB()->get("user", "id", ["email" => $useremail]);

        $order = App::getDB()->get("order", "*", [
            "user_id" => $userId,
            "status" => "nowe"
        ]);
        
        $defaultAddress = App::getDB()->get("address", "*", [
            "user_id" => $userId,
            "is_default" => true
        ]);

        $items = [];
        $suma = 0;

        if ($order) {
            $items = App::getDB()->select("ordered_items", [
                "[>]product" => ["product_id" => "id"]
            ], [
                "ordered_items.id",
                "ordered_items.quantity",
                "ordered_items.price",
                "product.name"
            ], [
                "ordered_items.order_id" => $order["id"]
            ]);
            
            foreach ($items as $item) {
                $suma += $item["quantity"] * $item["price"];
            }

            App::getDB()->update("order", ["full_price" => $suma], ["id" => $order["id"]]);
        }

        $this->generateCartView($items, ["full_price" => $suma], $defaultAddress);
    }


    public function action_removeProductFromCart() {
        $itemId = ParamUtils::getFromCleanURL(1);
        $userId = SessionUtils::load('user_id', true);

        try {
            $orderId = App::getDB()->get("order", "id", [
                "user_id" => $userId,
                "status" => "nowe"
            ]);

            $item = App::getDB()->get("ordered_items", ["id", "quantity"], [
                "id" => $itemId,
                "order_id" => $orderId
            ]);

            if ($item) {
                if ($item["quantity"] > 1) {
                    App::getDB()->update("ordered_items", [
                        "quantity[-]" => 1
                    ], [
                        "id" => $itemId
                    ]);
                } else {
                    App::getDB()->delete("ordered_items", [
                        "id" => $itemId
                    ]);
                }
                Utils::addInfoMessage("Usunięto produkt z koszyka.");
            } else {
                Utils::addErrorMessage('Nie możesz usunąć produktu, którego nie ma w Twoim koszyku.');
            }

        } catch (\PDOException $e) {
            Utils::addErrorMessage("Błąd podczas usuwania.");
            if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
        }

        SessionUtils::storeMessages();
        App::getRouter()->redirectTo("showCart");
    }

    
    public function action_updateProductQuantity() {
        $productId = ParamUtils::getFromCleanURL(1);
        $quantity = ParamUtils::getFromRequest('quantity');
        
        if ($quantity < 1) {
            Utils::addErrorMessage('Ilość musi być więszka niż 0.');
            SessionUtils::storeMessages();
            App::getRouter()->redirectTo('showCart');
            return;
        }
        
        try {
            App::getDB()->update("ordered_items", [
                "quantity" => $quantity
            ], [
                "id" => $productId
            ]);
            
            Utils::addInfoMessage('Zmieniono ilość produktu');
        } catch (\PDOException $e) {
            Utils::addErrorMessage("Błąd podczas zmiany ilości.");
            if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
            SessionUtils::storeMessages();
            App::getRouter()->redirectTo('showCart');
        }
        
        SessionUtils::storeMessages();
        App::getRouter()->redirectTo("showCart");
    }
    
    public function action_placeOrder() {
        $useremail = SessionUtils::load('user_email', true);
        $userId = SessionUtils::load('user_id', true);

        $orderId = App::getDB()->get("order", "id", [
            "user_id" => $userId,
            "status" => "nowe"
        ]);

        $addressChoice = ParamUtils::getFromRequest("address_choice");
        $addressId = null;

        try {
            if ($addressChoice === "default") {
                $addressId = App::getDB()->get("address", "id", [
                    "user_id" => $userId,
                    "is_default" => true
                ]);
            } else {
                $street = trim(ParamUtils::getFromRequest("street"));
                $hnumber = trim(ParamUtils::getFromRequest('house_number'));
                $city = trim(ParamUtils::getFromRequest("city"));
                $zip = trim(ParamUtils::getFromRequest("zip_code"));
                $country = trim(ParamUtils::getFromRequest("country"));

                if (!$street || !$hnumber ||!$city || !$zip || !$country) {
                    Utils::addErrorMessage("Wszystkie pola adresowe muszą być wypełnione.");
                    SessionUtils::storeMessages();
                    App::getRouter()->redirectTo("showCart");
                    return;
                }

                $isFirst = !App::getDB()->has("address", ["user_id" => $userId]);

                App::getDB()->insert("address", [
                    "user_id" => $userId,
                    "street" => $street,
                    "city" => $city,
                    "zip_code" => $zip,
                    "country" => $country,
                    "is_default" => $isFirst ? 1 : 0
                ]);

                $addressId = App::getDB()->id();
            }

            App::getDB()->update("order", [
                "status" => "złożone",
                "modified_date" => date("Y-m-d H:i:s"),
                "modified_by" => $useremail,
                "address_id" => $addressId
            ], [
                "id" => $orderId
            ]);

            Utils::addInfoMessage('Zamówienie zostało złożone.');
            SessionUtils::storeMessages();
            App::getRouter()->redirectTo('showCart');

        } catch (\PDOException $ex) {
            Utils::addErrorMessage("Błąd przy składaniu zamówienia.");
            if (App::getConf()->debug) Utils::addErrorMessage($ex->getMessage());
            App::getRouter()->redirectTo('showCart');
        }
    }
    
    public function generateCartView($items, $order, $defaultAddress = null) {
        App::getSmarty()->assign("items", $items);
        App::getSmarty()->assign("total_price", $order ? $order["full_price"] : 0);
        App::getSmarty()->assign("default_address", $defaultAddress);
        App::getSmarty()->display("cartView.tpl");
    }
}
 