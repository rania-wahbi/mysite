<?php

$dsn = "mysql:host=localhost;dbname=mydatabase";
$dbusername="root";
$dbpassword="";

try
{
    $pdo= new PDO ($dsn,$dbusername,$dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE , PDO:: ERRMODE_EXCEPTION);
    echo "Connected successfully ";
}
catch(PDOException $e)
{
    echo "connection faild: ". $e->getMessage();

}