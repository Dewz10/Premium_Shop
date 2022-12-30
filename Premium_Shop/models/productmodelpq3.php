<?php
    class Product{
        public $id;
        public $name;
        public $type;
        public $cate;
        public $stock;
        
        public function __construct($id,$name,$type,$cate,$stock){
            $this->id = $id;
            $this->name = $name;
            $this->type = $type;
            $this->cate = $cate;
            $this->stock = $stock;
        }
        public function getAll(){
            $productList = [];
            require("connection_db.php");
            $sql = "SELECT * FROM Product";
            if($result = $conn->query($sql)){
                while($my_row=$result->fetch_assoc()){
                    $id=$my_row['Pid'];
                    $name=$my_row['Pname'];
                    $type=$my_row['Ptype'];
                    $cate=$my_row['Category'];
                    $stock=$my_row['Stocks'];
                    $productList[] = new Product($id,$name,$type,$cate,$stock);
                }
            }
            
            require("connection_close.php");

            return $productList;
        }
    }
    //echo "<br>price Model Connected<br>";
?>