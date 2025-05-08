<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('mainShow'); #default action
App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('mainShow', 'MainCtrl');

// Produkty
Utils::addRoute('showCategory', 'ProductCtrl'); 
Utils::addRoute('showProduct', 'ProductCtrl');  

//Utils::addRoute('addToCart', 'CartCtrl', ['user']);
//Utils::addRoute('showCart', 'CartCtrl', ['user']);

Utils::addRoute('showAccount', 'AccountCtrl', ['user']);
Utils::addRoute('deleteAccount', 'AccountCtrl');
Utils::addRoute('changePassword', 'AccountCtrl');
//Utils::addRoute('adminPanel', 'AccountCtrl', ['admin']);

//Logowanie, rejestracja
Utils::addRoute('loginView', 'LoginCtrl');
Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('logout', 'LoginCtrl', ['user','admin']);
Utils::addRoute('registerView', 'RegisterCtrl');
Utils::addRoute('registerSave', 'RegisterCtrl');