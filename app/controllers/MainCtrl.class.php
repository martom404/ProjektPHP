<?php

namespace app\controllers;

use core\App;


class MainCtrl {
    public function action_mainShow() {
        $this->generateView();
    }
    
    
    public function generateView() {
        App::getSmarty()->assign('page_title', 'Heaven4Gamers');
        App::getSmarty()->assign('page_description', 'Mamy najlepszy wybór gier na rynku! Kupuj u nas gry na konsolę PlayStation, Xbox, Nintendo oraz PC!');
        App::getSmarty()->display('mainSite.tpl');
    }
}
