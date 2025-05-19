<?php

namespace app\controllers;

use core\App;
use core\SessionUtils;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;

class AccountCtrl {
    
    public function action_showAccount() {
        $user_email = SessionUtils::load('user_email', true);
        
        try {            
            $user = App::getDB()->get("user", ["email", "created_date", "id"], [
                "email"=>$user_email
            ]);
            
            $orders = App::getDB()->select("order", [
                "id",
                "order_date",
                "full_price",
                "status"
            ], [
                "user_id" => $user["id"],
                "status[!]" => "nowe" 
            ]);
            
            $this->generateView($user, $orders);
        }  catch (\PDOException $e) {
            Utils::addErrorMessage("Błąd pobierania danych użytkownika.");
            if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
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
                "user_id" => $userId
            ]);

            if (!$order) {
                Utils::addErrorMessage('Nie znaleziono zamówienia.');
                SessionUtils::storeMessages();
                App::getRouter()->redirectTo('showAccount');
                return;
            }

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
            App::getSmarty()->assign('page_title', "Szczegóły zamówienia");
            App::getSmarty()->display('orderView.tpl');

        } catch (\PDOException $e) {
            Utils::addErrorMessage("Błąd pobierania zamówienia.");
            if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
            App::getRouter()->redirectTo('showAccount');
        }
    }
    
    public function generateView($user, $orders=[]) {
        App::getSmarty()->assign('page_title', 'Twoje konto');
        App::getSmarty()->assign('user', $user);
        App::getSmarty()->assign('orders', $orders);
        App::getSmarty()->display('accountView.tpl');
    }
}
