<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function connect(){
        $dsn="mysql:host=localhost;dbname=gamashop";
        $user='root';
        $pass='';
        $db=new PDO($dsn,$user,$pass,
        array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $db;
    }
    $db=connect()or die("ko ket noi dc voi csdl");
    ?>
</body>
</html>