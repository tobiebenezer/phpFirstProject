<html>
<body>
<?php 
$host ="localhost";
$username="root";
$password ="";
$dbname = "clientDB";
$connect = "utf8mb4";

$masn= "mysql:host=$host;dbname=$dbname;charset=$connect";
try {

    $db = new PDO($masn, $username, $password);
     echo"connected";

     
     }
catch(PDOException){
    throw new PDOException;
     echo "failed connection";
}
$QUERYS = $db->query($query);    


echo "<table>";
echo "<tr><th>user_id</th><th>email</th><th>name</th><th>password</th><th></th><th></th><th></th></tr>";

while ($row = mysqli_fetch_array($sqldata, MYSQL_ASSOC)) {
      echo "<tr><td>";
      echo $row['user_id'];
      echo "</td><td>";
      echo $row['fname'];
      echo "</td><td>";
      echo $row['lname'];
      echo "</td><td>";
      echo $row['mob_no'];
      echo "</td><td>";
      echo $row['email'];
      echo "</td><td>"; 
      echo $row['profile_pic'];
      echo "</td><td>";
      echo $row['cv'];
      echo "</td></tr>";


}
echo "</table>";

 
?>
</body>
</html>
