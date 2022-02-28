<!DOCTYPE html>
<html>
    <head>
        <title>forgot password</title>
        <link rel="stylesheet" href="fgpassword.css">
    </head>
    <body>
        <h1>PASSWORD RECOVERY</h1>
        <form method="post" action=""> 
            <div>
                <input type="email" id="email" placeholder="enter your mail here" name="email" required>
                <span class="error"><?php echo $Mail_error ?></span>
            </br>
        </div>
        
       
            <div class="reset"><button name="mail" value="mail">RESET CODE</button></div>
        </form>
       
    </body>
</html>
