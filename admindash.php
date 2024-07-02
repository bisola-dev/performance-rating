<?php 
 include_once "connection.php";
 $sesid = $_SESSION['recID'];
 $sesrole = $_SESSION['userRole'];
 $sesuserName = $_SESSION['userName'];

 if ($sesid== ""|| $sesrole ==""|| $sesuserName==""){header("Location:logout.php");}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
   
</head>
<body>

             
    <div class="sidebar">
        <ul>

            <?php if ($sesrole == 1): ?>
            <li><a href="createadmin.php">Create Admins</a></li>
            <?php endif; ?>
            <li><a href="resetpwd.php">ResetPassword</a></li>
            <li><a href="allrated.php">View All Rated</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>

    </div>
    <div class="content">
        <h1>Welcome to the Admin Dashboard,  Dear <?php echo $sesuserName;?></h1>
        <!-- Add your dashboard content here -->
    </div>
</body>
</html>
