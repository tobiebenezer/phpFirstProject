<?php
    // session start 

    session_start();
    include('config.php');

    //initialising start variables posted from privious session
     $lname = $_SESSION['lname'];
     $fname = $_SESSION['fname']; 
     $gender =$_SESSION['gender'];
     $email = $_SESSION['email'];
     $mob_No = $_SESSION['mob_NO'];
     $state = $_SESSION['state'];
     $address = $_SESSION['address'];
     $married =$_SESSION['married'];
     $hobbies = $_SESSION['hobbies'];
     
     if(isset($_POST['update'])){

         $fname = $_POST['fname'];
         $lname = $_POST['lname']; 
         $mob_No = $_POST['mob_No'];
         $email = $_POST['email'];
         $address = $_POST['address'];
         $gender = $_POST['gender'];
         $married = $_POST['married'];
         $state = $_POST['State-Of-Origin'];
         $hobbies = $_POST['hobbies'];
         
         //get all the user data with email as key
         $userid = $_SESSION['userid'];
         
         $query = "UPDATE userTB 
        SET lname = $lname, fname =$fname, gender = $gender, email = $email, address = $address, marital_status = $married, hobbies =$hobbies, phone_No = $mob_No,
        state =
        $state WHERE userid = $userid";
        
        // $query->bindParam("userid",$userid,PDO::PARAM_STR);
        // $query->bindParam("lname",$lname,PDO::PARAM_STR);
        // $query->bindParam("fname",$fname,PDO::PARAM_STR);
        // $query->bindParam("hobbies",$hobbies,PDO::PARAM_STR);
        // $query->bindParam("married",$married,PDO::PARAM_STR);
        // $query->bindParam("email",$email,PDO::PARAM_STR);
        // $query->bindParam("gender",$gender,PDO::PARAM_STR);
        // $query->bindParam("address",$address,PDO::PARAM_STR);
        // $query->bindParam("mob_No",$mob_No,PDO::PARAM_STR);
        // $query->bindParam("state",$state,PDO::PARAM_STR);
        // $result = $query->fetch(PDO::FETCH_ASSOC);
        $don =$conn->prepare($query);
        
        $don->execute();

        //echo a message to say the UPDATE succeeded
        echo $don->rowCount();
        /*if($result){
            $_SESSION['userid']=$userid;
            header('location: profile.php');
            exit;
        }*/
     }
    //defining form content in a variable to be echo later in display html
     $content="<div class='profile-items'>
     <form action='edit_form.php' method='POST'>
    <table>
    <tr>
    <td>Name</td> <td> <input type='text' name='fname' value= $fname > <input type='text' name='lname' value= $lname >  </td>
    </tr>
    <tr>
    <td>Mobile Number</td> <td> <input type='text' name='mob_No' value= $mob_No > </td>
    </tr>
    <tr>
    <td>Email</td> <td>  <input type='email' name='email' value= $email> </td>
    </tr>
    <tr>
    <td>Address</td> <td> <input type='text' name='address' value= $address> </td>
    </tr>
    <tr>
    <td>Gender</td> <td> 
    Female
    <input type='radio' name='gender' id='Female' value='Female' />
    Male
    <input type='radio' name='gender' id='Female' value='Male' />
    </td>
    </tr>
    <tr>
    <td>Marital Status</td> <td>  
    Married
    <input type='radio' name='married' id='Married' value='Married' />
    Devoice
    <input type='radio' name='married' id='Devoice' value='Devoice' />
    Single
    <input type='radio' name='married' id='single' value='Single' />
    </td>
    </tr>
    <tr>
    <td>State of Origin</td> <td> <select name='State-Of-Origin' id='state' >
    <option value=''> Select your State of origin</option>
    <option value='Abia'>Abia</option>
    <option value='Adamawa'>Adamawa</option>
    <option value='Akwa_ibom'>Akwa ibom</option>
    <option value='Anambra'>Anambra</option>
    <option value='Bauchi'>Bauchi</option>
    <option value='Bayelsa'>Bayelsa</option>
    <option value='Benue'>Benue</option>
    <option value='Borno'>Borno</option>
    <option value='Cross river'>Cross River</option>
    <option value='Delta'>Delta</option>
    <option value='Ebonyi'>Ebonyi</option>
    <option value='Edo'>Edo</option>
    <option value='Ekiti'>Ekiti</option>
    <option value='Enugu'>Enugu</option>
    <option value='Gombe'>Gombe</option>
    <option value='Imo'>Imo</option>
    <option value='Jigawa'>Jigawa</option>
    <option value='kaduna'>Kaduna</option>
    <option value='Kano'>kano</option>
    <option value='Katsina'>katsina</option>
    <option value='Kebbi'>Kebbi</option>
    <option value='Kogi'>Kogi</option>
    <option value='Kwara'>Kwara</option>
    <option value='Lagos'>lagos</option>
    <option value='Nasarawa'>Nasarawa</option>
    <option value='Niger'>Niger</option>
    <option value='Ogun'>Ogun</option>
    <option value='Ondo'>Ondo</option>
    <option value='osun'>Osun</option>
    <option value='Oyo'>Oyo</option>
    <option value='Plateau'>Plateau</option>
    <option value='Rivers'>Rivers</option>
    <option value='Sokoto'>Sokoto</option>
    <option value='Taraba'>Taraba</option>
    <option value='Yobe'>Yobe</option>
    <option value='Zamfara'>Zamfara</option>
  </select>
   </td>
    </tr>
    
    <tr>
    <td>hobbies</td> <td> <input type='text' name='hobbies' value= $hobbies> </td>
    </tr>
    
    
</table>

    <button type='submit' name='update' id= 'edit'>Update </button>
    
    <button type='submit' name='cv' id= 'cv'>Upload CV</button>
    <input type='file' name='' id='cvI' value='select your cv'>

</form>
</div>";

?>

<!-- display html -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./profile.css">
    <title>profile</title>
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
    <main>
    <section>
    <div class="top">
    <span><img id="icon" src="./images/account.png" alt="profile icon"> <span id="text">My Profile </span> </span>
    </div>
    <div class="body">
        <div class='profile-table'>
            <div class="profile-pic">
                <div>

                    <img id='avatar' src="./images/pexels-creation-hill-1681010.jpg" alt="Profile Avatar">
                    <p> <span>Joe Doe</span> </br>
                    You are welcome</p>
                </div>
            </div>
            <!-- echo content of form -->
            <?php echo "$content"?>
        </div>
    </div>
    </section>
    </main>
        
</body>
</html>

