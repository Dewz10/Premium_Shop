<?php
    Class PriceController{
        public function index(){
            $priceList = Price_range::getAll();
            require_once('views/pages/price.php');
        }
        public function newPrice(){
            $productList = Product::getAll();
            require_once('views/pages/addPrice.php');
        }
        public function addPrice(){
            $pname = $_GET['pname'];
            $lowest = $_GET['lowest'];
            $highest = $_GET['highest'];
            $price = $_GET['price'];
            $screenPrice = $_GET['screenPrice'];
            Price_range::add($pname,$lowest,$highest,$price,$screenPrice);
            PriceController::index();
        }
        public function search(){
            $priceList = Price_range::getAll();
            $key = $_GET['key'];
            $priceList = Price_range::search($key);
            require_once('views/pages/price.php');
        }
        public function updateForm(){
            $id = $_GET['DesId'];
            $price = Price_range::get($id);
            $productList = Product::getAll();
            require_once('views/pages/updateFormq3.php');
        }
        public function deleteConfirm(){
            $id = $_GET['DesId'];
            $price = Price_range::get($id);
            require_once('views/pages/deleteConfirmq3.php');
        }
        public function delete(){
            $id = $_GET['DesId'];
            Price_range::delete($id);
            PriceController::index();
        }
        public function update(){
            $id = $_GET['DesId'];
            $pid = $_GET['pname'];
            $lowest = $_GET['lowest'];
            $highest = $_GET['highest'];
            $price = $_GET['price'];
            $screenPrice = $_GET['screenPrice'];
            Price_range::update($id,$pid,$lowest,$highest,$screenPrice,$price);
            PriceController::index();
        }
    }
?>