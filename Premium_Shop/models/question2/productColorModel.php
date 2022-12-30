<?php
    Class ProductColor{
        public $colorID;
        public $colorName;
        public $Pid;
        public $Pname;

        public function __construct($colorID, $colorName, $Pid, $Pname){
            $this->colorID = $colorID;
            $this->colorName = $colorName;
            $this->Pid = $Pid;
            $this->Pname = $Pname;
        }

        public static function getAllProductColor(){
            $productColorList = [];
            require('connection_db.php');
            $sql = "SELECT * FROM Product NATURAL JOIN DescriptionColorProduct NATURAL JOIN Color";
            if($result = $conn->query($sql)){
                while($my_row = $result->fetch_assoc()){
                    $colorID = $my_row['ColorId'];
                    $colorName = $my_row['ColorName'];
                    $Pid = $my_row['Pid'];
                    $Pname = $my_row['Pname'];
    
                    $productColorList[] = new ProductColor($colorID, $colorName, $Pid, $Pname);
                }
            }
            require('connection_close.php');
            return $productColorList;
        }
        
        
    }
?>