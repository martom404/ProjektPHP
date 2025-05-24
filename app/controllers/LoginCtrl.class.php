<?php

namespace app\controllers;

use core\App;
use core\Validator;
use core\Utils;
use core\RoleUtils;
use core\SessionUtils;
use core\ParamUtils;
use app\forms\LoginForm;

class LoginCtrl {
    
    private $form;

    public function __construct() {
        $this->form = new LoginForm();
    }

    public function getParams() {
        $this->form->email = ParamUtils::getFromRequest('email');
        $this->form->password = ParamUtils::getFromRequest('password');
    }
    
    public function validate() {
        $v = new Validator();

        $this->form->email = $v->validateFromRequest('email', [
            'trim' => true,
            'required' => true,
            'required_message' => 'Email jest wymagany',
            'min_length' => 5,
            'max_length' => 254,
            'validator_message' => 'Email powinien mieć od 5 do 254 znaków'
        ]);
        
        if(!$v->isLastOK()){
            return false;
        }

        $this->form->password = $v->validateFromRequest('password', [
            'trim' => true,
            'required' => true,
            'required_message' => 'Hasło jest wymagane',
            'min_length' => 3,
            'max_length' => 50,
            'validator_message' => 'Hasło powinno mieć od 3 do 50 znaków'
        ]);

        if (!$v->isLastOK()) {
            return false;
        } else {
            return true;
        }

    }
  
    public function action_login() {
        $this->getParams();
        
        if (!$this->validate()) {
            $this->generateView();
            return;
        }
        
        try {
            $user = App::getDB()->get("user", ['id', 'email', 'password', 'role_id'], [
                "email" => $this->form->email
            ]);

            if(!$user) {
                Utils::addErrorMessage('Użytkownik o podanym emailu nie istnieje.');
                $this->generateView();
                return;
            }

            if(!password_verify($this->form->password, $user['password'])) {
                Utils::addErrorMessage('Nieprawidłowe hasło.');
                $this->generateView();
                return;
            }

            $role = App::getDB()->get("role", "role", [
                "id" => $user['role_id']
            ]);

            RoleUtils::addRole($role);
            SessionUtils::store('user_email', $user['email']);
            SessionUtils::store('user_id', $user['id']);
            
            if(RoleUtils::inRole('user')){
             App::getRouter()->redirectTo('showAccount');   
            } else if (RoleUtils::inRole('admin')){
             App::getRouter()->redirectTo('adminPanel');
            }

        } catch (\PDOException $e) {
            Utils::addErrorMessage('Błąd logowania.');
            if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
            $this->generateView();
        }
    }

    public function action_logout() {
        RoleUtils::removeRole("user");
        RoleUtils::removeRole("admin");
        SessionUtils::remove("user_email");
        SessionUtils::remove("user_id");
        
        Utils::addInfoMessage('Pomyślnie wylogowano.');
        SessionUtils::storeMessages();
        App::getRouter()->redirectTo('loginView');
    }
    
    public function action_loginView(){
        $this->generateView();
    }
    
    public function generateView() {
        App::getSmarty()->assign('page_header', 'Strona logowania');
        App::getSmarty()->assign('page_title', 'Heaven4Gamers');
        
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('loginView.tpl');
    }
}
