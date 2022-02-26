

<?php
session_start();
include("config.php");
if(isset($_POST['login'])){
    $mail = $_POST['email'];
    $password = $_POST['password'];
    $query = $conn->prepare("select * from userTB where email = :email");
    $query->bindParam("email",$mail, PDO::PARAM_STR);
    
    $query->execute();
    
    $result = $query->fetch(PDO::FETCH_ASSOC);
    echo "$result";
    // if(!$result){
    //     $MAIL_ERROR=  'Incorrect Email';
    // }else{
    //     if(password_verify($password, $result['pass'])){ //conparing password
    //         $_SESSION['user_id'] = $result['userid'];//setting session identifier
    //         header("location: profile.php");// link to the next page
    //     }else{
    //         $PASSWORD_ERROR = 'incorrect password';
    //     }
    // }


}

?>