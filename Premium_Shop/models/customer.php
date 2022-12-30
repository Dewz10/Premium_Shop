<?php 
    Class Customer{
        public $id;
        public $cusName;

        public function __construct($id,$cusName){
            $this->id=$id;
            $this->cusName=$cusName;
        }

        public static function getAll(){
            $customerList=[];
            require("connection_db.php");
            $sql = "SELECT Cid,CusName FROM Customer";
            $result = $conn->query($sql);
            while($my_row=$result->fetch_assoc()){
                $id=$my_row['Cid'];
                $cusName=$my_row['CusName'];
                $customerList[] = new Customer($id,$cusName);
            }
            require("connection_close.php");

            return $customerList;
        }
    }

?>