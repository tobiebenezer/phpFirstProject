<?php
 include("loginpage.php");?>

<?php

/*
$mail = $password = "";
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $mail = test_input($_POST["email"]);
    $password = password_hash(test_input($_POST["pass"]), PASSWORD_BCRYPT);


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
*/

<?php
include("db.php");

$mail = $password = "";
$MAIL_ERROR = $PASSWORD_ERROR ="";

if(isset($_POST['login'])){
    $mail = test_input($_POST['email']);
    $password = password_hash(test_input($_POST['password']), PASSWORD_BCRYPT);
    $query = $conn->prepare("select * from userTB where email = :email and pass = :password");
    $query->bindParam("email",$mail, PDO::PARAM_STR);
    $query->bindParam("password",$password,PDO::PARAM_STR);
    $query->execute();
    
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if(!$result){
        $MAIL_ERROR=  'Incorrect Email';
    }else{
        if(password_verify($passw, $result['pass'])){ //conparing password
            $_SESSION['user_id'] = $result['user_id'];//setting session identifier
            header("location: profile.php");// link to the next page
        }else{
            $PASSWORD_ERROR = 'incorrect password';
        }
    }


}

?>
   ++++++++++++