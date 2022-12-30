<?php
    $servername = "localhost";
    $username = "db22_009";
    $password = "db22_009";
    $dbname = "db22_009";
    
    $conn = new mysqli($servername, $username , $password);
    $conn->set_charset("utf8");
    $result = $conn->query($sql);
    if($conn->connect_error){
        die("Connection failed : ".$conn->connect_error);
    }
    //echo ("Connection to server sucessed <br>");
    if(!$conn->select_db($dbname)){
        die("Connection failed : ".$conn->connect_error);
    }
    else{
        //echo("Yes, Database");
    }
?>