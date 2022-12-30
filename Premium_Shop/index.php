<?php
    echo("Hello Index");

    if(isset($_GET['controller'])&&isset($_GET['action'])){
        $controller = $_GET['controller'];
        $action = $_GET['action'];
    }
    else{
        $controller = 'pages';
        $action = 'home';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index PhP Test</title>
</head>
<body>
    <?php
        echo ("Controller = ".$controller.", action = ".$action);
        // require("connection_db.php");
        // require("connection_close.php");
    ?>
    <br>
    [<a href="?controller=pages&action=home">Home</a>]
    [<a href="?controller=price&action=index">Q3</a>]
    [<a href="?controller=question2&action=index">Q2</a>]
    [<a href="?controller=pages&action=quotate">Q1</a>]
    <br>
    <?php
        require_once('route.php');
    ?>
</body>
</html>
