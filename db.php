<?php
$host ="localhost";
$username="root";
$password ="password";
$dbname = "clientDB";
$connect = mysqli_connect($host,$username,$password,$dbname);
if (!$connecct){
    die("connection failed");}

if (!empty($_POST['LOGIN'])){
    $mail=$_POST['email'];
    $password =$_POST['pass'];
    $query = "select * from userTB where email = '$mail' and pass = '$password' ";
    $result = mysqli_query($connect,$query);
    $num = mysqli_num_rows($result);
    if ($num>0){
        header('location: profile.php');
    }
    else{
        echo "invalid login credentials, please enter valid login details.";
    }
}




?>