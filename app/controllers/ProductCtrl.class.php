<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;

class ProductCtrl {
    public function action_showAll() {
        $platform = ParamUtils::getFromCleanURL(1);

        $categoryId = App::getDB()->select("category", "id", [
            "parent_category" => $platform
        ]);

        if (!$categoryId) {
            Utils::addErrorMessage("Nie znaleziono kategorii dla platformy: $platform");
            SessionUtils::storeMessages();
            App::getRouter()->redirectTo('mainShow');
            return;
        }

        $products = App::getDB()->select("product", "*", [
            "category_id" => $categoryId
        ]);

        $this->generateCategoryView($platform, $products);
    }



    public function action_showCategory() {
       $categoryName = ParamUtils::getFromCleanURL(1);
       
       $categoryId = App::getDB()->get("category", "id", [
           "name" => $categoryName
       ]);
       
       if(!$categoryId) {
           Utils::addErrorMessage('Wystąpił błąd w wyborze kategorii.');
           SessionUtils::storeMessages();
           App::getRouter()->redirectTo('mainShow');
           return;
       }
       
       $products = App::getDB()->select("product", "*", [
           "category_id" => $categoryId
       ]);
       
       $this->generateCategoryView($categoryName, $products);
   }
   
   public function action_showProduct() {
       $productId = ParamUtils::getFromCleanURL(1);
       
       $product = App::getDB()->get("product", "*", [
          "id" => $productId 
       ]);
       
       if (!$product) {
           Utils::addErrorMessage('Wystąpił błąd w wyborze produktu.');
           SessionUtils::storeMessages();
           App::getRouter()->redirectTo('mainShow');
           return;
       }
       
       $this->generateProductView($product);
   }
   
   public function generateCategoryView($categoryName, $products) {
       App::getSmarty()->assign("category", $categoryName);
       App::getSmarty()->assign("products", $products);
       App::getSmarty()->display("categoryView.tpl");
   }
   
   public function generateProductView($product) {
       App::getSmarty()->assign('product', $product);
       App::getSmarty()->display('productView.tpl');
   }
}
