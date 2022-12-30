<?php 
    Class Payment{
        public $id;
        public $payment;

        public function __construct($id,$payment){
            $this->id=$id;
            $this->payment=$payment;
        }

        public static function getAll(){
            $paymentList=[];
            require("connection_db.php");
            $sql = "SELECT ConId,ConName FROM ConditionTable";
            $result = $conn->query($sql);
            while($my_row=$result->fetch_assoc()){
                $id=$my_row['ConId'];
                $payment=$my_row['ConName'];
                $paymentList[] = new Payment($id,$payment);
            }
            require("connection_close.php");

            return $paymentList;
        }
    }

?>