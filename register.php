
<?php $fname = $lname = $mob_no = $email = $address = $password =$gender = $married =$state =$hobby ="";
?>

<?php
     
     session_start();
     include('config.php');
     if(isset($_POST['submit'])){
        $fname = $_POST['firstName'];
        $lname = $_POST['surname']; 
        $mob_no = $_POST['number'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $married = $_POST['marital-status'];
        $state = $_POST['State-Of-Origin'];
        $hobby = $_POST['hobbies'];

        if($_POST['passwrd1'] === $_POST['passwrd2']){

            $password = password_hash($_POST['passwrd1'], PASSWORD_BCRYPT); 
        }else{
            echo "<script> alert('Your Password does not match Please check password and re-enter ') </script>" ;
     }
     $query = $conn->prepare("SELECT * FROM userTB WHERE email=:email");
     $query->bindParam("email", $email, PDO::PARAM_STR);
     $query->execute();   

      if ($query->rowCount() > 0) {
         echo '<p class="error">The email address is already registered!</p>';
     }else if($query->rowCount() == 0) {
         $query = $conn->prepare("INSERT into userTB (address,email,fname,gender,hobbies,lname,marital_status, pass,phone_No,state) 
         VALUES (:address,:email,:fname,:gender,:hobbies,:lname,:marital_status, :pass,:phone_No,:state)");
         $query->bindParam("address", $address, PDO::PARAM_STR);
         $query->bindParam("lname", $lname, PDO::PARAM_STR);
         $query->bindParam("fname", $fname, PDO::PARAM_STR);
         $query->bindParam("gender", $gender, PDO::PARAM_STR);
         $query->bindParam("hobbies", $hobby, PDO::PARAM_STR);
         $query->bindParam("marital_status", $married, PDO::PARAM_STR);
         $query->bindParam("phone_No", $mob_no, PDO::PARAM_STR);
         $query->bindParam("pass", $password, PDO::PARAM_STR);
         $query->bindParam("email", $email, PDO::PARAM_STR);
         $query->bindParam("state", $state, PDO::PARAM_STR);

         $result = $query->execute();

         if ($result) {
          header("location: loginval.php");
             echo "<script >alert('Your registration was successful!')</script>";
         } else {
             echo "<script >alert('Something went wrong!')</script>";
             $password="";
         }
     }


    // //sending us back to the registration page
    // header("location: register.php");
    }
?>







<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Register for bockplam" />
    <link rel="stylesheet" href="./register.css" />
    
    <title>BockPlam registration page</title>
  </head>
  <body>
  <header>
    <nav>
    <div class="logo">
    <H1>PalmBock</H1></div>
    <ul class="navi">
     <li><a href="#">HOME</a></li>
     <li><a href="#">PROFILE</a></li>
     <li><a href="#">USERS</a></li>
     <li><a href="#">LOGIN</a></li>
     <li><a href="#">REGISTER</a></li>
    </ul>
    </nav>
    </header>
    <section class="form">
      <form
        action=""
        method="POST"
    
        class="registration-form"
      >
        <fieldset class="form-field">
          <div>

            <h2>Create a new account</h2>
            <p>It's quick and easy.</p>
          </div>
          <hr>
          <div class="name-surname">
            <div class="firstName">
              <input
                type="text"
                name="firstName"
                placeholder="First name"
                value="<?php echo $fname;?>"
                pattern="[a-zA-Z0-9]+"
                required
              />
            </div>
            <div class="surname">
              <input
                type="text"
                name="surname"
                value="<?php echo $lname;?>"
                placeholder="Surname"
                pattern="[a-zA-Z0-9]+"
                required
              />
            </div>
          </div>
          <div class="num">
            <input
              type="text"
              name="number"
              id="number"
              value="<?php echo $mob_no;?>"
              pattern="[0-9]+"
              placeholder="Mobile number"
              required
            />
          </div>
          <div class="mail">
            <input
              type="email"
              name="email"
              id="email"
              placeholder="Email address"
              value="<?php echo $email;?>"
              required
            />

          </div>
          <div class="addre">
            <input
              type="text"
              name="address"
              id="address"
              placeholder="Address"
              pattern="[a-zA-Z0-9]+"
              value="<?php echo $address;?>"
              required
            />
          </div>
          
          <!-- <div class="date-sec">
            <span>Date of Birth</span>

            <div class="date">
              <div class='day'>
                <select name="day" id="day">
                  <option value="1">1</option>
                  <option value="1">2</option>
                  <option value="1">3</option>
                  <option value="1">4</option>
                  <option value="1">5</option>
                  <option value="1">6</option>
                  <option value="1">7</option>
                  <option value="1">8</option>
                  <option value="1">9</option>
                  <option value="1">10</option>
                  <option value="1">11</option>
                  <option value="1">12</option>
                  <option value="1">13</option>
                  <option value="1">14</option>
                  <option values="1">15</option>
                  <option value="1">16</option>
                </select>
              </div>
              <div class='month'>
                <select name="month" id="month">
                  <option value="0">January</option>
                  <option value="1">February</option>
                  <option value="2">March</option>
                  <option value="1">April</option>
                  <option value="1">May</option>
                  <option value="1">June</option>
                </select>
              </div>
              <div class='year'>
                <select name="year" id="year">
                  <option value="1">2013</option>
                  <option value="1">2014</option>
                  <option value="1">2015</option>
                  <option value="1">2015</option>
                  <option value="1">2016</option>
                  <option value="1">2017</option>
                  <option value="1">2018</option>
                  <option value="1">2019</option>
                  <option value="1">2020</option>
                  <option value="1">2021</option>
                  <option value="1">2022</option>
                  
                </select>
              </div>
             

            </div> -->

        

          </div>
          <div id="gender">
            <span>Gender</span>
            <div class="gender">
              <button id="female">
                Female
                <input type="radio" name="gender" id="Female" <?php if (isset($gender) && $gender=="Female") echo "checked";?> value="Female" />
              </button>
              <button id="male">
                Male
                <input type="radio" name="gender" id="Male" <?php if (isset($gender) && $gender=="Male") echo "checked";?> value="Male" />
              </button>
              <button id="custom">.
                Custom
                <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Non-Binary") echo "checked";?> id="Custom" value="Non-Binary" />
              </button>
            </div>
          </div>
          <div id="marital-status">
            <span>Marital Status</span>
            <div class="maritals">
              <button id="Married">
                Married
                <input type="radio" name="marital-status" <?php if (isset($married) && $married=="Married") echo "checked";?>id="married" value="Married" />
              </button>
              <button id="Single">
                Single
                <input type="radio" name="marital-status" <?php if (isset($married) && $married=="Single") echo "checked";?> id="single" value="Single" />
              </button>
              <button id="Devoiced">
                Devoiced
                <input type="radio" name="marital-status" <?php if (isset($married) && $married=="Devoiced") echo "checked";?> id="devoiced" value="Devoiced" />
              </button>
            </div>
            
            <div class="S-orign">
              <label for= 'state'>State of Origin: </label>
              <select name="State-Of-Origin" id="state" >
                <option value=""> Select your State of origin</option>
                <option value="Abia">Abia</option>
                <option value="Adamawa">Adamawa</option>
                <option value="Akwa_ibom">Akwa ibom</option>
                <option value="Anambra">Anambra</option>
                <option value="Bauchi">Bauchi</option>
                <option value="Bayelsa">Bayelsa</option>
                <option value="Benue">Benue</option>
                <option value="Borno">Borno</option>
                <option value="Cross river">Cross River</option>
                <option value="Delta">Delta</option>
                <option value="Ebonyi">Ebonyi</option>
                <option value="Edo">Edo</option>
                <option value="Ekiti">Ekiti</option>
                <option value="Enugu">Enugu</option>
                <option value="Gombe">Gombe</option>
                <option value="Imo">Imo</option>
                <option value="Jigawa">Jigawa</option>
                <option value="kaduna">Kaduna</option>
                <option value="Kano">kano</option>
                <option value="Katsina">katsina</option>
                <option value="Kebbi">Kebbi</option>
                <option value="Kogi">Kogi</option>
                <option value="Kwara">Kwara</option>
                <option value="Lagos">lagos</option>
                <option value="Nasarawa">Nasarawa</option>
                <option value="Niger">Niger</option>
                <option value="Ogun">Ogun</option>
                <option value="Ondo">Ondo</option>
                <option value="osun">Osun</option>
                <option value="Oyo">Oyo</option>
                <option value="Plateau">Plateau</option>
                <option value="Rivers">Rivers</option>
                <option value="Sokoto">Sokoto</option>
                <option value="Taraba">Taraba</option>
                <option value="Yobe">Yobe</option>
                <option value="Zamfara">Zamfara</option>
              </select>
            </div>
            </div>
          </div>
            <div class= "hobbies" >
              <span>Hobbies</span>
              <div id='hobby-list'>
              <span class='hob'>
              <label for="hob1">Dancing</label>
              <input type="checkbox" name="hobbies" value ='dancing' id="hob1">
            </span>
            <span class='hob'>
              <label for="hob2">Blogging</label>
              <input type="checkbox" name="hobbies" value ='Blogging' id="hob2">
            </span>
            <span class='hob'>
              <label for="hob3">writing</label>
              <input type="checkbox" name="hobbies" value ='writing' id="hob3">
            </span>
            </div>
            </div>
            <div class="password">
              <input
                type="password"
                name="passwrd1"
                id="pass"
                value="<?php echo $password;?>"
                placeholder="Enter password"
                required
              />
              </div>
              <div class="password">
                <input
                  type="password"
                  name="passwrd2"
                  id="pass1"
                  value="<?php echo $password;?>"
                  placeholder="Re-Enter password"
                  required
                />
  
            </div>
            <hr>
          <p id="terms">
            By clicking Sign Up, you agree to our <a href="#">Terms</a> 
            ,<a href="#">Data Policy</a> and
            <a href="#">Cookie Policy</a> Cookie Policy. You may receive SMS
            notifications from us and can opt out at any time.
          </p>
          <button type="submit" name="submit" id='signup'>Sign up</button>
          <p><a href="./login.php" target="_self">Already have an account?</a></p>
        </fieldset>
      </form>
    </section>
     </body>
</html>



