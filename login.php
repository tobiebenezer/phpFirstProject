<?php
  $email = $password ="";
?>
<?php
  session_start();
  //connection file
  include('config.php');
  //checking unique email
  if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    //querying data base with email as key
    $query = $conn->prepare("select * from userTB where email = :email");
    $query->bindParam("email",$email,PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    //authenticating password
    if (!$result){
      echo '<p class="error"> Username password combination is wrong!</p>';
    }else{
      if(password_verify($password, $result['pass'])){
        // sending data to the next page.
        $_SESSION['userid'] = $result['userid'];
         header('location: profile.php');
      }else{
        echo '<p class="error"> Username password combination is  wrong!</p>';
      }
    }

  }

?>
<!-- display html -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./login.css" />
    <title>Login page</title>
  </head>
  <body>
  <header>
      <nav>
        <div class="logo">
          <h1>PalmBock</h1>
        </div>
        <ul class="navi">
          <li><a href="./index.html">HOME</a></li>
          <li><a href="./profile.php">PROFILE</a></li>
          <li><a href="./#">USERS</a></li>
          <li><a href="./login.php">LOGIN</a></li>
          <li><a href="./register.php">REGISTER</a></li>
        </ul>
      </nav>
    </header>
    <section>
      <div id="wave"></div>
      <form action="" method="POST" class="log">
        <fieldset>
          <input type="email" name="email" placeholder="Enter User Email" value="<?php echo $email ?>" required />
          <input type="password" name="password" placeholder="Password" required/>
          <button type="submit" name="login">Login</button>
          <div>

            <a href="./register.php" target="_self">Create Account</a>
            <a href="./forgetpass.html" target="_self">Forget Password</a>
          </div>
          </fieldset>
      </form>
    </section>
  </body>
</html>
