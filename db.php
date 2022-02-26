<?php
define('USER', 'root');
define('PASSWORD','Awodumil@3');
define("HOST",'localhost');
define('DATABASE','clientDB');

try{
    $connect =new PDO("mysql:host=".HOST.";dbname=".DATABASE,USER,PASSWORD);
}  catch(PDOException $e){
    exit("Error: ".$e->getMessage());
    
}

if (!empty($_POST['LOGIN'])){
    $mail=$_POST['email'];
    $password =$_POST['pass'];
    $query = "select * from userTB where email = '$mail' and pass = '$password' ";
    $result = mysqli_query($conn,$query);
    $num = mysqli_num_rows($result);
    if ($num>0){
        header('location: profile.php');
    }
    else{
        echo "invalid login credentials, please enter valid login details.";
    }
}




?>