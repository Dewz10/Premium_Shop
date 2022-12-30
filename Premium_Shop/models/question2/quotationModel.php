<?php
    Class Quotation{
        public $quotationID;

    public function __construct($quotationID){
        $this->quotationID = $quotationID;
    }

    public static function getAll(){
        $quotationtList = [];
        require('connection_db.php');
        $sql = "SELECT * FROM Quotation";
        $result = $conn->query($sql);
        while($my_row = $result->fetch_assoc()){
            $quotationID = $my_row['Qid'];

            $quotationtList[] = new Quotation($quotationID);
        }

        require('connection_close.php');
        return $quotationtList;
    }
    }
?>