
<?php


function test_input($pass){
    $pass = htmlspecialchar($pass);
    $pass = trim($pass);
    $pass =stripslashes($pass);

}
$mail ="";
if ($_SERVER["REQUEST_METHOD"] =="post"){
    $mail = test_input($_POST["email"]);
}
$Mail_error ="";
if ($_SERVER["REQUEST_METHOD"] =="post"){
    if (empty($_post["mail"])){
        $Mail_error = "please enter an email address";
    }
        else{
            $mail = test_input($_POST["email"]);


        }
        if(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
            $Mail_error = "invalid mail format";

        }
    }
    
?>

