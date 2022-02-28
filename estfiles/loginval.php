

<?php


$mail = $password = "";
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $mail = test_input($_POST["email"]);
    $password = test_input($_POST["pass"]);


}
$MAIL_ERROR = $PASSWORD_ERROR ="";
if($_SERVER['REQUEST_METHOD']="post"){
    if (empty($POST_['email'])){
        $MAIL_ERROR = 'email field cannot be empty';
    }   else{
           $mail = test_input($_POST["email"]);
    }
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
            $MAIL_ERROR = "invalid email format";
        }

    if (empty($_POST["pass"])){
        $PASSWORD_ERROR = "password cannot be empty";
    }
        else{
            $password = test_input($_POST["pass"]);
        }
        if (!preg_match('/^[a-zA-Z]+[a-zA-Z0-9._]+$/',$password)){
            $PASSWORD_ERROR = "password only contains alphanumerics";
        }
}
function test_input($pass){
    $pass = trim($pass);
    $pass = htmlspecialchars($pass);
    $pass = stripslashes($pass);
    return $pass;
}
?>

<?php
include("db.php");


?>
   