<?PHP

use LDAP\Result;

    //defining default value
    $lname = "Doe";
    $fname = "John"; 
    $gender ="Non-Binary";
    $email = "whoIsit@mail.com";
    $mob_NO = "0000 0000 0000";
    $state = "York";
    $address = "23 yore ke";
    $married ='Single';
    $hobbies ="Reading, Dancing, reading";

    session_start();

    include("config.php");
     if(!isset($_SESSION['userid'])){
         header('location:login.php');
         exit;
     }else{
         //get all the user data with email as key
         $userid = $_SESSION['userid'];
         $query = $conn->prepare("SELECT * FROM userTB WHERE userid = :userid");
         $query->bindParam("userid",$userid,PDO::PARAM_STR);
         $query->execute();

         $result = $query->fetch(PDO::FETCH_ASSOC);

         //Assign fetched data to their variable
         if(!$result){
             echo '<p>welcome to you profile</p>';
            }else{
                $lname = $result['lname'];
                $fname = $result['fname']; 
                $gender =$result['gender'];
                $email = $result['email'];
                $mob_NO = $result['phone_No'];
                $state = $result['state'];
                $address = $result['address'];
                $married =$result['marital_status'];
                $hobbies = $result['hobbies'];
                
                if(isset($_POST['edit'])){
                    //assign session variable for the next page
                $_SESSION['userid'] = $result['userid'];
                $_SESSION['lname'] = $result['lname'];
                $_SESSION['fname'] = $result['fname']; 
                $_SESSION['gender'] =$result['gender'];
                $_SESSION['email'] = $result['email'];
                $_SESSION['mob_NO'] = $result['phone_No'];
                $_SESSION['state'] = $result['state'];
                $_SESSION['address'] = $result['address'];
                $_SESSION['married'] =$result['marital_status'];
                $_SESSION['hobbies'] = $result['hobbies'];
                
                // linking next page
                header('location: edit_form.php');
                }
            }
        }


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
                    <p> <span><?php echo "$fname $lname" ?></span> </br>
                    You are welcome</p>
                </div>
            </div>
            <!-- calling table and values from table template  -->
            <?php include('table_temp.php');
            echo "$content"?>
        </div>
    </div>
    </section>
    </main>
        
</body>
</html>