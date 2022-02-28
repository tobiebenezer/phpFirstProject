<?php

$host ="localhost";
$username="root";
$password ="";
$dbname = "clientDB";
$connect = "utf8mb4";

$masn= "mysql:host=$host;dbname=$dbname;charset=$connect";
try {

    $db = new PDO($masn, $username, $password);
     echo "connected";
       
}
     
catch (PDOexception){
    throw new PDOException;
     echo "failed connection";
}

     
?>     
     






