<?php

namespace app\controllers;

use core\Utils;
use core\SessionUtils;
use core\ParamUtils;
use core\App;
use core\Validator;
use app\forms\RegisterForm;

class RegisterCtrl {
    private $form;
    
    public function __construct() {
        $this->form = new RegisterForm();
    }
   
    private function getParams() {
        $this->form->email = ParamUtils::getFromRequest('email');
        $this->form->password = ParamUtils::getFromRequest('password');
    }
    
    private function validate() {
        $v = new Validator();
        
        $this->form->email = $v->validate($this->form->email, [
            'required' => true,
            'required_message' => 'Email jest wymagany.',
            'email' => true, 
            'min_length' => 5,
            'max_length' => 254,
            'validator_message' => 'Nieprawidłowy format adresu e-mail.'
        ]);
        
        if (!$v->isLastOK()) {
            $this->generateView();
            return false;
        }
        
        $this->form->password = $v->validate($this->form->password, [
            'required' => true,
            'required_message' => 'Hasło jest wymagane.',
            'min_length' => 6,
            'max_length' => 50,
            'validator_message' => 'Hasło musi mieć od 6 do 50 znaków.'
        ]);
        
        if (!$v->isLastOK()) {
            $this->generateView();
            return false;
        } else {
            return true;
        }
    }
    
    public function action_registerSave() { 
        $this->getParams();
        if ($this->validate()) {
            try {
                $exist = App::getDB()->has("user", ["email" => $this->form->email]);
                
                if ($exist) {
                    Utils::addErrorMessage('Użytkownik z takim emailem już istnieje w naszej bazie klientów.');
                    $this->generateView();
                    return;
                }

                App::getDB()->insert("user", [
                    "email" => $this->form->email,
                    "password" => password_hash($this->form->password, PASSWORD_DEFAULT),
                    "created_date" => date("Y-m-d H:i:s"),
                    "role_id" => 1
                ]);

                Utils::addInfoMessage('Rejestracja zakończona pomyślnie – możesz się teraz zalogować.');
                SessionUtils::storeMessages();
                App::getRouter()->redirectTo('loginView');

            } catch (\PDOException $e) {
                Utils::addErrorMessage('Błąd zapisu do bazy danych.');
                if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
                $this->generateView();
            }
        }
    }
    
    public function action_registerView() {
        $this->generateView();
    }
    
    public function generateView() {
        App::getSmarty()->assign('page_title', 'Rejestracja konta');
        App::getSmarty()->display('registerView.tpl');
    }
}
