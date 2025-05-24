<?php

namespace app\controllers;

use core\App;
use core\SessionUtils;
use core\Utils;
use core\ParamUtils;

class AccountCtrl {
    
    public function action_showAccount() {
        $user_email = SessionUtils::load('user_email', true);
        
        try {            
            $user = App::getDB()->get("user", ["email", "created_date", "id"], [
                "email"=>$user_email
            ]);
            
            $address = App::getDB()->get('address', '*', [
                'user_id' => $user['id'],
                'is_default' => true
            ]);
            
            if(!$address) {
                $address = [
                    'street' => 'brak',
                    'house_number' => 'brak',
                    'city' => 'brak',
                    'zip_code' => 'brak',
                    'country' => 'brak',
                    'is_default' => false
                ];
            }
            
            $orders = App::getDB()->select("order", [
                "id",
                "order_date",
                "full_price",
            ], [
                "user_id" => $user["id"],
                "status[!]" => "nowe" 
            ]);
            
            $this->generateView($user, $orders, $address);
        }  catch (\PDOException $e) {
            Utils::addErrorMessage("Błąd pobierania danych użytkownika.");
            if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
            SessionUtils::storeMessages();
            App::getRouter()->redirectTo('showAccount');
        }
    }
    
    public function action_changePassword() {
        $user_email = SessionUtils::load('user_email', true);
      
        $oldPassword = ParamUtils::getFromRequest('oldPassword');
        $newPassword = ParamUtils::getFromRequest('newPassword');
        $newPasswordRepeat = ParamUtils::getFromRequest('newPasswordRepeat');
        
        if($newPassword !== $newPasswordRepeat) {
            Utils::addErrorMessage('Hasła nie są takie same!');
            SessionUtils::storeMessages();
            App::getRouter()->redirectTo('showAccount');
            return;
        }
        
        try {
            $user = App::getDB()->get("user", ["id", "password"], [
               "email" => $user_email 
            ]);    
            
            if (!$user || !password_verify($oldPassword, $user['password'])) {
                Utils::addErrorMessage('Nieprawidłowe aktualne hasło.');
                SessionUtils::storeMessages();
                App::getRouter()->redirectTo('showAccount');
                return;
            }
            
            $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
            App::getDB()->update("user", ["password" => $newPasswordHash], ["id" =>$user['id']]);
            Utils::addInfoMessage('Hasło zostało zmienione.');
            SessionUtils::storeMessages();
            App::getRouter()->redirectTo('showAccount');
           
        } catch (\PDOException $e) {
            Utils::addErrorMessage("Błąd aktualizacji hasła.");
            if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
            SessionUtils::storeMessages();
            App::getRouter()->redirectTo('showAccount');
        }
 
    }
    
    public function action_deleteAccount() {
        $user_email = SessionUtils::load('user_email', true);
        
        try {
            App::getDB()->delete("user", ["email" => $user_email]);
            session_destroy();
            Utils::addInfoMessage("Twoje konto zostało usunięte.");
            SessionUtils::storeMessages();
            App::getRouter()->redirectTo('loginView');
        } catch (\PDOException $e) {
            Utils::addErrorMessage("Błąd usuwania konta użytkownika.");
            if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
            SessionUtils::storeMessages();
            App::getRouter()->redirectTo('mainShow');
        }
    }
    
    public function action_showOrder() {
        $orderId = ParamUtils::getFromCleanURL(1);
        $user_email = SessionUtils::load('user_email', true);
        
        try {
            $userId = SessionUtils::load('user_id', true);
 
            $order = App::getDB()->get("order", "*", [
                "id" => $orderId,
                "user_id" => $userId,
                "status[!]" => "nowe"
            ]);

            if (!$order) {
                Utils::addErrorMessage('Nie znaleziono zamówienia.');
                SessionUtils::storeMessages();
                App::getRouter()->redirectTo('showAccount');
                return;
            }
            
            $address = App::getDB()->get("order", [
                "[>]address" => ["address_id" => "id"]
            ], [
                "address.street",
                "address.house_number",
                "address.city",
                "address.zip_code",
                "address.country"
            ], [
                "order.id" => $orderId
            ]);
            
            $products = App::getDB()->select("ordered_items", [
                "[>]product" => ["product_id" => "id"]
            ], [
                "product.name",
                "ordered_items.quantity",
                "ordered_items.price"
            ], [
                "ordered_items.order_id" => $orderId
            ]);

            App::getSmarty()->assign('order', $order);
            App::getSmarty()->assign('products', $products);
            App::getSmarty()->assign('address', $address);
            App::getSmarty()->assign('page_title', "Szczegóły zamówienia");
            App::getSmarty()->display('orderView.tpl');

        } catch (\PDOException $e) {
            Utils::addErrorMessage("Błąd pobierania zamówienia.");
            if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
            App::getRouter()->redirectTo('showAccount');
        }
    }
    
    public function action_changeAddress() {
        $userId = SessionUtils::load('user_id', true);
        
        try {
            $address = App::getDB()->get('address', '*', [
               'user_id' => $userId,
               'is_default' => true
            ]);
            
            if (!$address) {
            $address = [
                'street' => '',
                "house_number" => '',
                'city' => '',
                'zip_code' => '',
                'country' => '',
                'is_default' => false
            ];
        }          
            App::getSmarty()->assign("address", $address);
            App::getSmarty()->assign("page_title", "Zmień adres");
            App::getSmarty()->display("addressView.tpl");
        } catch (\PDOException $e) {
            Utils::addErrorMessage("Błąd ładowania danych adresu.");
            if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
            App::getRouter()->redirectTo("showAccount");
        }
    }
    
    public function action_saveAddress() {
        $userId = SessionUtils::load('user_id', true);

        $street = ParamUtils::getFromRequest('street');
        $hnumber = ParamUtils::getFromRequest('hnumber');
        $city = ParamUtils::getFromRequest('city');
        $zip_code = ParamUtils::getFromRequest('zip_code');
        $country = ParamUtils::getFromRequest('country');

        try {
            $existingId = App::getDB()->get('address', 'id', [
                "user_id" => $userId
            ]);

            if ($existingId) {
                App::getDB()->update("address", [
                    "street" => $street,
                    "house_number" => $hnumber,
                    "city" => $city,
                    "zip_code" => $zip_code,
                    "country" => $country,
                    "is_default" => true
                ], [
                    "id" => $existingId
                ]);
            } else {
                App::getDB()->insert("address", [
                    "user_id" => $userId,
                    "street" => $street,
                    "house_number" => $hnumber,
                    "city" => $city,
                    "zip_code" => $zip_code,
                    "country" => $country,
                    "is_default" => true
                ]);
            }

            Utils::addInfoMessage("Adres został zapisany.");
            SessionUtils::storeMessages();
            
        } catch (\PDOException $e) {
            Utils::addErrorMessage("Błąd zapisu adresu.");
            if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
        }
        App::getRouter()->redirectTo("changeAddress");
    }


    public function generateView($user, $orders = [], $address = []) {
    App::getSmarty()->assign('page_title', 'Twoje konto');
    App::getSmarty()->assign('user', $user);
    App::getSmarty()->assign('orders', $orders);
    App::getSmarty()->assign('address', $address);
    App::getSmarty()->display('accountView.tpl');
    }
}
