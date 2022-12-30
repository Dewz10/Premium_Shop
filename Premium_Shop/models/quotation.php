<?php
    Class Quotation{
        public $no;
        public $date;
        public $employee;
        public $customer;
        public $paymentTerms;
        public $payment;
        public $eid;
        public $cid;
        public $conId;

        public function __construct($no,$date,$employee,$customer,$paymentTerms,$payment,$eid,$cid,$conId){
            $this->no=$no;
            $this->date=$date;
            $this->employee=$employee;
            $this->customer=$customer;
            $this->paymentTerms=$paymentTerms;
            $this->payment=$payment;
            $this->eid=$eid;
            $this->cid=$cid;
            $this->conId=$conId;
        }

        public static function getAll(){
            $quotationList=[];
            require("connection_db.php");
            $sql = "SELECT Qid,QDate,EmName,CusName,IF(CountCal IS NULL,'0',(CountCal)) AS CountCal,IF(STRCMP('มัดจำ', conName),'เครดิต 30 วัน','มัดจำ')AS conName,Eid,Cid,ConId FROM Quotation NATURAL JOIN Employee NATURAL JOIN Customer NATURAL JOIN ConditionTable ORDER BY Qid";
            if($result = $conn->query($sql)){
                while($my_row=$result->fetch_assoc()){
                    $no=$my_row['Qid'];
                    $date=$my_row['QDate'];
                    $employee=$my_row['EmName'];
                    $customer=$my_row['CusName'];
                    $paymentTerms=$my_row['CountCal'];
                    $payment=$my_row['conName'];
                    $eid=$my_row['Eid'];
                    $cid=$my_row['Cid'];
                    $conId=$my_row['ConId'];
                    $quotationList[] = new Quotation($no,$date,$employee,$customer,$paymentTerms,$payment,$eid,$cid,$conId);
                } 
            }
            require("connection_close.php");

            return $quotationList;
        }

        public static function add($no,$date,$employee,$customer,$paymentTerms,$payment){
            require("connection_db.php");
            $sql = "INSERT INTO Quotation (Qid,QDate,CountCal,Cid,Eid,ConId) VALUES ('$no','$date','$paymentTerms'/100,'$customer','$employee','$payment')";
            $result= $conn->query($sql);
            require("connection_close.php");
        }

        public static function search($key){
            $quotationList=[];
            require("connection_db.php");
            $sql = "SELECT Qid,QDate,EmName,CusName,IF(CountCal IS NULL,'0',(CountCal)) AS CountCal,IF(STRCMP('มัดจำ', ConName),'เครดิต 30 วัน','มัดจำ')AS ConName,Cid,Eid,ConId FROM Quotation NATURAL JOIN Employee NATURAL JOIN Customer NATURAL JOIN ConditionTable WHERE Qid LIKE '%$key%' or EmName LIKE '%$key%' or CusName LIKE '%$key%' or ConName LIKE '%$key%' or QDate LIKE '%$key%' or CountCal LIKE '%$key%' ORDER BY Qid";
            if($result = $conn->query($sql)){
                while($my_row=$result->fetch_assoc()){
                    $no=$my_row['Qid'];
                    $date=$my_row['QDate'];
                    $employee=$my_row['EmName'];
                    $customer=$my_row['CusName'];
                    $paymentTerms=$my_row['CountCal'];
                    $payment=$my_row['ConName'];
                    $eid=$my_row['Eid'];
                    $cid=$my_row['Cid'];
                    $conId=$my_row['ConId'];
                    $quotationList[] = new Quotation($no,$date,$employee,$customer,$paymentTerms,$payment,$eid,$cid,$conId);
                }
            }
            require("connection_close.php");

            return $quotationList;
        }

        public static function get($no){
            require("connection_db.php");
            $sql = "SELECT * FROM Quotation NATURAL JOIN Employee NATURAL JOIN Customer NATURAL JOIN ConditionTable WHERE Qid = '$no'";
            $result = $conn->query($sql);
            $my_row = $result->fetch_assoc();
            $no=$my_row['Qid'];
            $date=$my_row['QDate'];
            $employee=$my_row['EmName'];
            $customer=$my_row['CusName'];
            $paymentTerms=$my_row['CountCal'];
            $payment=$my_row['ConName'];
            $eid=$my_row['Eid'];
            $cid=$my_row['Cid'];
            $conId=$my_row['ConId'];
            require("connection_close.php");
            
            return new Quotation($no,$date,$employee,$customer,$paymentTerms,$payment,$eid,$cid,$conId);
            
        }
        public static function delete($no){
            require_once("connection_db.php");
            $sql = "DELETE FROM Quotation WHERE Qid = '$no'";
            //$sql = "ALTER TABLE Description AUTO_INCREMENT = 1;";
            $result = $conn->query($sql);
            require("connection_close.php");
        }
        public static function update($no,$date,$eid,$cid,$paymentTerms,$conId){
            require("connection_db.php");
            $sql = "UPDATE Quotation SET Qid = '$no', QDate = '$date', Eid = '$eid', Cid = '$cid', CountCal = '$paymentTerms'/100,ConId = '$conId' WHERE Qid = '$no'";
            $result = $conn->query($sql);
            require("connection_close.php");
        }


    }
?>