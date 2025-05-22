<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('mainShow'); #default action
App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('mainShow', 'MainCtrl');
Utils::addRoute('sendMessage', 'MainCtrl');

// Produkty
Utils::addRoute('showCategory', 'ProductCtrl'); 
Utils::addRoute('showProduct', 'ProductCtrl');  

//Koszyk
Utils::addRoute('addToCart', 'CartCtrl', ['user']);
Utils::addRoute('showCart', 'CartCtrl', ['user']);
Utils::addRoute('removeProductFromCart', 'CartCtrl', ['user']);
Utils::addRoute('updateProductQuantity', 'CartCtrl');
Utils::addRoute('placeOrder', 'CartCtrl', ['user']);

//Konto
Utils::addRoute('showAccount', 'AccountCtrl', ['user']);
Utils::addRoute('changeAddress', 'AccountCtrl', ['user']);
Utils::addRoute('saveAddress', 'AccountCtrl', ['user']);
Utils::addRoute('showOrder', 'AccountCtrl', ['user']);
Utils::addRoute('deleteAccount', 'AccountCtrl', ['user']);
Utils::addRoute('changePassword', 'AccountCtrl', ['user']);
//Utils::addRoute('adminPanel', 'AccountCtrl', ['admin']);

//Logowanie, rejestracja
Utils::addRoute('loginView', 'LoginCtrl');
Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('logout', 'LoginCtrl', ['user','admin']);
Utils::addRoute('registerView', 'RegisterCtrl');
Utils::addRoute('registerSave', 'RegisterCtrl');