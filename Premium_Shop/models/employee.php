<?php 
    Class Employee{
        public $id;
        public $empName;

        public function __construct($id,$empName){
            $this->id=$id;
            $this->empName=$empName;
        }

        public static function getAll(){
            $employeeList=[];
            require("connection_db.php");
            $sql = "SELECT Eid,EmName FROM Employee";
            $result = $conn->query($sql);
            while($my_row=$result->fetch_assoc()){
                $id=$my_row['Eid'];
                $empName=$my_row['EmName'];
                $employeeList[] = new Employee($id,$empName);
            }
            require("connection_close.php");

            return $employeeList;
        }
    }

?>