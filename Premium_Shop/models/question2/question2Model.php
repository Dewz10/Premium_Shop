<?php
    Class Question_2_Model{
        public $PQId;
        public $Qid;
        public $Pid;
        public $Pname;
        public $Color;
        public $Amount;
        public $PrintScNum;
    

    public function __construct($PQId, $Qid, $Pid, $Pname, $Color, $Amount, $PrintScNum){
        $this->PQId = $PQId;
        $this->Qid = $Qid;
        $this->Pid = $Pid;
        $this->Pname = $Pname;
        $this->Color = $Color;
        $this->Amount = $Amount;
        $this->PrintScNum = $PrintScNum;
    }

    public static function getAllQuotation(){
        
        $quotationList = [];
        require('connection_db.php');
        $sql = "SELECT PQId, Qid, Pid, Pname, ColorName, Amount, PrintScreenNum FROM Quotation NATURAL JOIN ConditionTable NATURAL JOIN Customer NATURAL JOIN Employee NATURAL JOIN ProductQuotation NATURAL JOIN Color NATURAL JOIN Product NATURAL JOIN Description WHERE QtyStart<Amount AND QtyEnd >= Amount ORDER BY Qid";
        if($result = $conn->query($sql))
        {
            while($my_row = $result->fetch_assoc()){
                $PQId = $my_row['PQId'];
                $Qid = $my_row['Qid'];
                $Pid = $my_row['Pid'];
                $Pname = $my_row['Pname'];
                $Color = $my_row['ColorName'];
                $Amount = $my_row['Amount'];
                $PrintScNum = $my_row['PrintScreenNum'];
                $quotationList[] = new Question_2_Model($PQId, $Qid, $Pid, $Pname, $Color, $Amount, $PrintScNum);
            }
        }
        require('connection_close.php');
        return $quotationList;
    }
    
    public static function search($key){
        $quotationList = [];
        require('connection_db.php');
        $sql = "SELECT PQId, Qid, Pid, Pname, ColorName, Amount, PrintScreenNum FROM Quotation NATURAL JOIN ConditionTable NATURAL JOIN Customer NATURAL JOIN Employee NATURAL JOIN ProductQuotation NATURAL JOIN Color NATURAL JOIN Product NATURAL JOIN Description WHERE QtyStart<Amount AND QtyEnd >= Amount AND
        (PQId like '%$key%' OR Qid like'%$key%' OR Pid like'%$key%' OR Pname like'%$key%'
        OR ColorName like'%$key%' OR Amount like'%$key%' OR PrintScreenNum like'%$key%')
        ORDER BY Qid";
        $result = $conn->query($sql);
        while($my_row = $result->fetch_assoc()){
            $PQId = $my_row['PQId'];
            $Qid = $my_row['Qid'];
            $Pid = $my_row['Pid'];
            $Pname = $my_row['Pname'];
            $Color = $my_row['ColorName'];
            $Amount = $my_row['Amount'];
            $PrintScNum = $my_row['PrintScreenNum'];
            $quotationList[] = new Question_2_Model($PQId, $Qid, $Pid, $Pname, $Color, $Amount, $PrintScNum);
        }

        require('connection_close.php');
        return $quotationList;
    }

    public static function addQuotation($Qid, $Pid, $Color, $Amount, $PrintScNum){
        require('connection_db.php');
        $sql = "INSERT INTO ProductQuotation (Amount, PrintScreenNum, Pid, Qid, ColorId) VALUES ('$Amount', '$PrintScNum', '$Pid', '$Qid', '$Color')";
        $result = $conn->query($sql);
        require('connection_close.php');

    }

    public static function get_PQId($id){
        require('connection_db.php');
        $sql = "SELECT * FROM ProductQuotation NATURAL JOIN Product NATURAL JOIN Color WHERE PQId ='$id'";
        $result = $conn->query($sql);
        $my_row = $result->fetch_assoc();
        $PQId = $my_row['PQId'];
        $Qid = $my_row['Qid'];
        $Pid = $my_row['Pid'];
        $Pname = $my_row['Pname'];
        $Color = $my_row['ColorName'];
        $Amount = $my_row['Amount'];
        $PrintScNum = $my_row['PrintScreenNum'];
        require('connection_close.php');

        return new Question_2_Model($PQId, $Qid, $Pid, $Pname, $Color, $Amount, $PrintScNum);

    }

    public static function update($idPQId, $idQid, $idProdcutID, $idColorID, $idAmount, $idPrintScreenNumber){
        require('connection_db.php');
        $sql = "UPDATE ProductQuotation SET Amount = '$idAmount', PrintScreenNum = '$idPrintScreenNumber', Pid = '$idProdcutID', Qid = '$idQid', ColorId = '$idColorID' WHERE PQId = '$idPQId'";
        $result = $conn->query($sql);
        require('connection_close.php');
    }

    public static function delete($idPQId){
        require('connection_db.php');
        $PQid = (int)$idPQId;
        $sql = "DELETE FROM ProductQuotation WHERE PQId = '$PQid'";
        $result = $conn->query($sql);
        require('connection_close.php');

    }
    }
?>