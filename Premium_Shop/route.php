<?php
    $controllers = array('pages'=>['home','error','quotate','newqua','search','add','updateForm','update','deleteConfirm','delete'],'price'=>['index','newPrice','addPrice','search','updateForm','update','deleteConfirm','delete'],
    'question2'=>['index', 'search', 'newQuotation', 'addQuotation']);
    
    function call($controller, $action){
        require_once("controllers/".$controller."_controller.php");
        switch($controller){
            case "pages": 
                require_once("models/quotation.php");
                require_once("models/customer.php");
                require_once("models/employee.php");
                require_once("models/payment.php");
                $controller = new PagesController(); break;
            case "price": 
                require_once('models/pricemodelq3.php');
                require_once('models/productmodelpq3.php');
                $controller = new PriceController(); break;
            case "question2":   
                require_once("models/question2/question2Model.php");
                require_once("models/question2/productColorModel.php");
                require_once("models/question2/quotationModel.php");
                $controller = new Question2(); break;
        }
        $controller->{$action}();
    }

    if(array_key_exists($controller, $controllers)){
        if(in_array($action, $controllers[$controller])){
            call($controller, $action);
        }
        else{
            call('pages', 'error');
        }
    }
    else{
        call('pages', 'error');
    }
?>