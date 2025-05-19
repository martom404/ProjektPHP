<?php

namespace app\controllers;

use core\App;
use core\ParamUtils;
use core\Validator;
use core\Utils;


class MainCtrl {
    public function action_mainShow() {
        $this->generateView();
    }
    
    public function action_sendMessage() {
        $email = ParamUtils::getFromRequest('email');
        $message = ParamUtils::getFromRequest('message');

        $v = new Validator();

        if (!$v->validate($email, [
            'required' => true,
            'email' => true
        ])) {
            Utils::addErrorMessage('Nieprawidłowy adres email.');
            $this->generateView();
            return;
        }

        try {
            App::getDB()->insert('contact_messages', [
                "email" => $email,
                "message" => $message
            ]);
            Utils::addInfoMessage('Wiadomość wysłana! Odpowiemy w jak najkrótszym czasie!');
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Błąd podczas zapisu wiadomości: ' . $e->getMessage());
        }
        $this->generateView();
    }

    public function generateView() {
        App::getSmarty()->assign('page_title', 'Heaven4Gamers');
        App::getSmarty()->assign('page_description', 'Mamy najlepszy wybór gier na rynku! Kupuj u nas gry na konsolę PlayStation, Xbox, Nintendo oraz PC!');
        App::getSmarty()->display('mainSite.tpl');
    }
}
