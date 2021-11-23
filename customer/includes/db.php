<?php

$dns        = "mysql:host=kitkat.test;dbname=kitkat_store";
$user       = 'root';
$pass       = '';
$options    = array (
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);


try {

    $con = new PDO($dns, $user, $pass, $options);

} catch (PDOException $e) {
    echo 'failed To connect ' . $e->getMessage();
}   

?>