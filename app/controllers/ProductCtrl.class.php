<?php


namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;

class ProductCtrl {
   public function action_showCategory() {
       $categoryName = ParamUtils::getFromCleanURL(1, true, 'Brak kategorii!');
       
       $categoryId = App::getDB()->get("category", "id", [
           "name" => $categoryName
       ]);
       
       if(!$categoryId) {
           App::getRouter()->redirectTo('mainShow');
           return;
       }
       
       $products = App::getDB()->select("product", "*", [
           "category_id" => $categoryId
       ]);
       
       $this->generateCategoryView($categoryName, $products);
   }
   
   public function action_showProduct() {
       $productId = ParamUtils::getFromCleanURL(1, true, 'Brak ID produktu!');
       
       $product = App::getDB()->get("product", "*", [
          "id" => $productId 
       ]);
       
       if (!$product) {
           App::getRouter()->redirectTo('showCategory');
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
