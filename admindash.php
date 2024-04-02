<?php 
 include_once "connection.php";
 $sesid = $_SESSION['recID'];
 $sesrole = $_SESSION['userRole'];
 $sesuserName = $_SESSION['userName'];


?>


!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100%;
            background-color: #333;
            padding-top: 20px;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .sidebar ul li {
            padding: 10px;
            text-align: center;
        }
        .sidebar ul li a {
            text-decoration: none;
            color: #fff;
            display: block;
            padding: 10px;
            transition: background-color 0.3s;
        }
        .sidebar ul li a:hover {
            background-color: #555;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        h1 {
            color: #333;
            text-align: center;
        }
    </style>
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
