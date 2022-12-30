<?php
    Class PagesController{
        public function home(){
            require_once('views/pages/home.php');
        }
        public function error(){
            require_once('views/pages/error.php');
        }
        public function index(){
            $quotation_list=Quotation::getAll();
            require_once('views/pages/question1.php');
        }
        public function quotate(){
            $quotation_list=Quotation::getAll();
            require_once('views/pages/question1.php');
        }
        public function newqua(){
            $quotation_list=Quotation::getAll();
            $customer_list=Customer::getAll();
            $employee_list=Employee::getAll();
            $payment_list=Payment::getAll();
            require_once('views/pages/newinfo.php');
        }
        public function search(){
            echo "search";
            $quotation_list=Quotation::getAll();
            $key=$_GET['key'];
            $quotation_list=Quotation::search($key);
            require_once('views/pages/question1.php');
        }
        public function add(){
            
            $no=$_GET['no'];
            $date=$_GET['date'];
            $employee=$_GET['employee'];
            $customer=$_GET['customer'];
            $paymentTerms=$_GET['paymentTerms'];
            $payment=$_GET['payment'];
            Quotation::add($no,$date,$employee,$customer,$paymentTerms,$payment);
            
            PagesController::quotate();
        }
        public function updateForm(){
            $no = $_GET['Qid'];
            $quotation = Quotation::get($no);
            $quotation_list = Quotation::getAll();
            $customer_list=Customer::getAll();
            $employee_list=Employee::getAll();
            $payment_list=Payment::getAll();
            require_once('views/pages/updateFormq1.php');
        }
        public function deleteConfirm(){
            $no = $_GET['Qid'];
            $quotation = Quotation::get($no);
            require_once('views/pages/deleteConfirmq1.php');
        }
        public function delete(){
            $no = $_GET['Qid'];
            Quotation::delete($no);
            PagesController::quotate();
        }
        public function update(){
            $no=$_GET['no'];
            $date=$_GET['date'];
            $employee=$_GET['employee'];
            $customer=$_GET['customer'];
            $paymentTerms=$_GET['paymentTerms'];
            $payment=$_GET['payment'];
            Quotation::update($no,$date,$employee,$customer,$paymentTerms,$payment);
            PagesController::quotate();
        }
    }
?>