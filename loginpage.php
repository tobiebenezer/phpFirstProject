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
     if(!$result){
         $MAIL_ERROR=  'Incorrect Email';
     }else{
         if(password_verify($password, $result['pass'])){ //conparing password
             $_SESSION['user_id'] = $result['userid'];//setting session identifier
             header("location: profile.php");// link to the next page
         }else{
             $PASSWORD_ERROR = 'incorrect password';
         }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="loginval.css">
    </head>
    <h1> LOGIN</h1>
    <body>
        
        <div>
            <form method = 'post' action="">
            <div class="mail">
            <input type ="email" id="email" class="form-control" name ="email" 
            value='<?php echo "$mail" ;?>'
            placeholder="email" required>
            <span class="error">* <?php echo $MAIL_ERROR;?></span>
        </br>
            </div>
            <div class="tex"><input type ="password" class="form-control" id="pass" name ="pass" placeholder="Password" required>
                <span class="error">* <?php echo $PASSWORD_ERROR;?></span>
            </br>
                
            </div>
            <div class="sub"><button type ="submit" value="LOGIN" name="LOGIN">Login</button></br></div>
            <div class="fp"><a href="fgpassword.html">forgot password</a></div>
            </form>
    
            </div>
    </body>
    </html>