<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="page.css">
    </head>
    <h1> LOGIN</h1>
    <body>
        
        <div>
            <form method = 'post' action="">
            <div class="mail">
            <input type ="email" id="email" class="form-control" name ="email" placeholder="email" required>
            <span class="error">* <?php echo $MAIL_ERROR;?></span>
        </br>
            </div>
            <div class="tex"><input type ="password" class="form-control" id="pass" name ="pass" placeholder="Password" required>
                <span class="error">* <?php echo $PASSWORD_ERROR;?></span>
            </br>
                
            </div>
            <div class="sub"><input type ="submit" value="LOGIN" name="LOGIN"></br></div>
            <div class="fp"><a href="fgpassword.html">forgot password</a></div>
            </form>
    
            </div>
    </body>
    </html>