<html>
<body>
<?php 
$username = "root"; 
$password = "password"; 
$database = "clientDB"; 
$mysqli = mysqli_connect("localhost", $username, $password, $database); 
$query = "SELECT * FROM userTB";
$sqldata = mysqli_query($mysqli,$query) or die ('error');


echo "<table>";
echo "<tr><th>user_id</th><th>fname</th><th>lname</th><th>mob_no</th><th>email</th><th>Profile_pic</th><th>cv</th></tr>";

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
