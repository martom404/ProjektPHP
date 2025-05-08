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
            
            $user = App::getDB()->get("user", ["email", "created_date"], [
                "email"=>$user_email
            ]);
            
            $this->generateView($user);
        }  catch (\PDOException $e) {
            Utils::addErrorMessage("Błąd pobierania danych użytkownika.");
            if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
            App::getRouter()->redirectTo('mainShow');
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
        $user_email = SessionUtils::load('user_email', 'true');
        
        try {
            App::getDB()->delete("user", ["email" => $user_email]);
            session_destroy();
            App::getRouter()->redirectTo('mainShow');
        } catch (\PDOException $e) {
            Utils::addErrorMessage("Błąd pobierania danych użytkownika.");
            if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
            App::getRouter()->redirectTo('mainShow');
        }
    }
    
    public function generateView($user) {
        App::getSmarty()->assign('page_title', 'Twoje konto');
        App::getSmarty()->assign('user', $user);
        App::getSmarty()->display('accountView.tpl');
    }
}
