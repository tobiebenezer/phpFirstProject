<?php
    define('USER', 'root');
    define('PASSWORD','Awodumil@3');
    define("HOST",'localhost');
    define('DATABASE','clientDB');

    try{
        $conn =new PDO("mysql:host=".HOST.";dbname=".DATABASE,USER,PASSWORD);
    }  catch(PDOException $e){
        exit("Error: ".$e->getMessage());
        
    }

?>