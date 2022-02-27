<?php
require 'forgotpassword.php';
require 'fgp.php';
$host ="localhost";
$username="root";
$password ="";
$dbname = "clientDB";
$connect = "utf8mb4";

$masn= "mysql:host=$host;dbname=$dbname;charset=$connect";
try {

    $db = new PDO($masn, $username, $password);
     
     if(isset($_POST["mail"])){
        $email = $_POST["email"];
        $query = "SELECT * FROM usersTB WHERE email = '$email' ";
        $QUERYS = $db->query($query);
        $numcount = $QUERYS->fetch(PDO::FETCH_ASSOC);
        echo $numcount['password'];
     }
       
     
     }
catch(PDOException){
    throw new PDOException;
     echo "failed connection";
}

    
 

?>

