<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\SessionUtils;
use core\ParamUtils;

class AdminCtrl {
    
    public function action_adminPanel() {
        
         try {
            $order = App::getDB()->select("order", "*", [
                    "ORDER" => ["order_date" => "DESC"]
                ]);
            
            $product = App::getDB()->select("product", "*");

        } catch (\PDOException $e) {
            Utils::addErrorMessage("Błąd podczas wczytywania danych.");
            if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
        }
        $this->generateView($order,$product);
    }
    
    public function action_updateOrderStatus() {
        $orderId = ParamUtils::getFromRequest('order_id');
        $newStatus = ParamUtils::getFromRequest('status');
        
        if (!$orderId || !$newStatus) {
            Utils::addErrorMessage('Nieprawidłowe dane');
            SessionUtils::storeMessages();
            App::getRouter()->redirectTo('adminPanel');
            return;
        }
        
        try {
            App::getDB()->update('order', [
               'status' => $newStatus,
                'modified_date' => date("Y-m-d H:i:s"),
                'modified_by' => SessionUtils::load('user_email', true)
            ], [
                'id' => $orderId
            ]);
            
            Utils::addInfoMessage('Status zaktualizowany.');
            SessionUtils::storeMessages();
        } catch (\PDOException $e) {
            Utils::addErrorMessage("Błąd podczas aktualizacji statusu.");
            if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
        }
        App::getRouter()->redirectTo("adminPanel");
    }
    
    public function action_deleteOrder() {
            $orderId = ParamUtils::getFromRequest('order_id');

            if (!$orderId) {
                Utils::addErrorMessage('Nieprawidłowe dane');
                SessionUtils::storeMessages();
                App::getRouter()->redirectTo('adminPanel');
                return;
            }

            try {
                App::getDB()->delete('order', [
                    'id' => $orderId
                ]);

                Utils::addInfoMessage('Zamówienie usunięte.');
                SessionUtils::storeMessages();
            } catch (\PDOException $e) {
                Utils::addErrorMessage("Błąd podczas usuwania zamówienia.");
                if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
            }

            App::getRouter()->redirectTo("adminPanel");
    }
    
    public function action_addProduct() {
        
    }
    
    public function action_editProduct() {
        
    }
    
    public function action_deleteProduct() {
        
    }
    
    public function generateView($order, $product) {
        App::getSmarty()->assign('order', $order);
        App::getSmarty()->assign('product', $product);
        App::getSmarty()->display('adminView.tpl');
    }
}
