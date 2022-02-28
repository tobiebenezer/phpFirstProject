
<!DOCTYPE html>

<html>

<head>

    <title>View Page</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>

<body>

    <div class="container">

        <h2>users</h2>

<table class="table">

    <thead>

        <tr>

        <th>USER_ID</th>

        <th>EMAIL</th>

        <th>NAME</th>

        <th>PASSWORD</th>

        
        <th>Action</th>

    </tr>

    </thead>

    <tbody> 

                    <tr>
                    <?php include './usersdb.php';?>
                   <?php
                    $qr = "SELECT * FROM usersTB ";
                    $query = $db->query($qr);


                    if ($query->rowCount()>0){
                        while($numcount = $query->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <td><?php echo $numcount["user_id"]; ?></td>

                    <td><?php echo $numcount["email"]; ?></td>

                    <td><?php echo $numcount["name"]; ?></td>

                    <td><?php echo $numcount["password"]; ?></td>

                 
                 

                    <td><button class="btn btn-danger"  method = "get"><?php echo $row['user_id']; ?>Delete</button></td>

                    </tr>                       
<?php
                    }
                }
                ?>
       
       href="del.php?id
    </tbody>

</table>

    </div> 

</body>

</html>
