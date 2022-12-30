<?php
    Class Question2{
        public function index(){
            $quotation_List = Question_2_Model::getAllQuotation();
            require_once('views/question2/index_question2.php');
        }
        public function search(){
            $key = $_GET['key'];
            $quotation_List = Question_2_Model::search($key);
            require_once('views/question2/index_question2.php');
        }
        public function newQuotation(){
            $productColor_List = ProductColor::getAllProductColor();
            $quotation_List = Quotation::getAll();
            require_once('views/question2/newQuotation.php');
        }

        public function addQuotation(){
            $QuotationID = $_GET['quotationID'];
            $arrayProduct = ($_GET['productColorID']);
            $colorID = (int)substr($arrayProduct,-1);
            $ProductID = substr($arrayProduct,0,5);
            $Amount = $_GET['productAmount'];
            $PrintScNumber = $_GET['printScreenNumber'];
            
            Question_2_Model::addQuotation($QuotationID, $ProductID, $colorID, $Amount, $PrintScNumber);
            $quotation_List = Question_2_Model::getAllQuotation();
            require_once('views/question2/index_question2.php');
            Question2::index();
        }

        public function updateForm(){
            $id = $_GET['quotationPQId'];
            $quotation = Question_2_Model::get_PQId($id);
            $quotation_List = Quotation::getAll();
            $productColor_List = ProductColor::getAllProductColor();

            require_once('views/question2/updateForm.php');
        }

        public function update(){
            $Qid = $_GET['quotationID'];
            $ProductColor = $_GET['productColorID'];
            $Amount = $_GET['Amount'];
            $PrintScreenNumber = $_GET['PrintScreenNumber'];
            $PQid = $_GET['PQid'];
            $ColorID = (int)substr($ProductColor, -1);
            $ProdcutID = substr($ProductColor, 0, 5);
            Question_2_Model::update($PQid, $Qid, $ProdcutID, $ColorID, $Amount, $PrintScreenNumber);
            Question2::index();
        }

        public function deleteConfirm(){
            $id = $_GET['quotationPQId'];
            $quotation = Question_2_Model::get_PQId($id);
            require_once('views/question2/deleteConfirm.php');
        }

        public function delete(){
            $id = $_GET['PQid'];
            Question_2_Model::delete($id);
            Question2::index();
        }
    }


?>