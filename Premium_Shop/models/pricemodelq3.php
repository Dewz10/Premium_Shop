<?php
    class Price_range{
        public $id;
        public $qtyStart;
        public $qtyEnd;
        public $price;
        public $colorSceen;
        public $pid;
        public $name;

        public function __construct($id,$qtyStart,$qtyEnd,$price,$colorSceen,$pid,$name){
            $this->id = $id;
            $this->qtyStart = $qtyStart;
            $this->qtyEnd = $qtyEnd;
            $this->price = $price;
            $this->colorSceen = $colorSceen;
            $this->pid = $pid;
            $this->name = $name;
        }
        public function getAll(){
            $priceList = [];
            require('connection_db.php');
            $sql = "SELECT * FROM Description NATURAL JOIN Product";
            if($result = $conn->query($sql)){
                while($my_row = $result->fetch_assoc()){
                    $id = $my_row['DesId'];
                    $qtyStart = $my_row['QtyStart'];
                    $qtyEnd = $my_row['QtyEnd'];
                    $price = $my_row['Price'];
                    $colorSceen = $my_row['ColorSceen'];
                    $pid = $my_row['Pid'];
                    $name = $my_row['Pname'];
                    $priceList[] = new Price_range($id,$qtyStart,$qtyEnd,$price,$colorSceen,$pid,$name);
                } 
            }
            require("connection_close.php");
            return $priceList;
        }
        public static function search($key){
            $priceList = [];
            require("connection_db.php");
            $sql = "SELECT * FROM Description NATURAL JOIN Product where 
            (Pid like '%$key%' or Pname like '%$key%')";
            if($result = $conn->query($sql)){
                while($my_row = $result->fetch_assoc()){
                    $id = $my_row['DesId'];
                    $qtyStart = $my_row['QtyStart'];
                    $qtyEnd = $my_row['QtyEnd'];
                    $price = $my_row['Price'];
                    $colorSceen = $my_row['ColorSceen'];
                    $pid = $my_row['Pid'];
                    $name = $my_row['Pname'];
                    $priceList[] = new Price_range($id,$qtyStart,$qtyEnd,$price,$colorSceen,$pid,$name);
                } 
            }
            require("connection_close.php");
            return $priceList;
        }
        public static function add($pname,$lowest,$highest,$price,$screenPrice){
            require("connection_db.php");
            $sql = "INSERT INTO Description (QtyStart,QtyEnd,Price,ColorSceen,Pid) VALUES ('$lowest','$highest','$price','$screenPrice','$pname')";
            $result = $conn->query($sql);
            $sql = "ALTER TABLE Description AUTO_INCREMENT = 1;";
            $result = $conn->query($sql);
            require("connection_close.php");
        }
        public static function get($id){
            require("connection_db.php");
            $sql = "SELECT * FROM Description NATURAL JOIN Product where DesId = '$id'";
            $result = $conn->query($sql);
            $my_row = $result->fetch_assoc();
            $id = $my_row['DesId'];
            $qtyStart = $my_row['QtyStart'];
            $qtyEnd = $my_row['QtyEnd'];
            $price = $my_row['Price'];
            $colorSceen = $my_row['ColorSceen'];
            $pid = $my_row['Pid'];
            $name = $my_row['Pname'];
            require("connection_close.php");
            
            return new Price_range($id,$qtyStart,$qtyEnd,$price,$colorSceen,$pid,$name);
            
        }
        public static function delete($id){
            require_once("connection_db.php");
            $sql = "DELETE FROM Description WHERE DesId = '$id'";
            $result = $conn->query($sql);
            $sql = "ALTER TABLE Description AUTO_INCREMENT = 1;";
            $result = $conn->query($sql);
            require("connection_close.php");
        }
        public static function update($id,$pid,$qtyStart,$qtyEnd,$colorSceen,$price){
            require("connection_db.php");
            $sql = "UPDATE Description SET Pid = '$pid', QtyStart = '$qtyStart', QtyEnd = '$qtyEnd', ColorSceen = '$colorSceen', Price = '$price' WHERE DesId = '$id'";
            $result = $conn->query($sql);
            require("connection_close.php");
        }
    }
    //echo "<br>price Model Connected<br>";
?>
