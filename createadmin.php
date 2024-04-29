
<?php
require_once('connection.php');
$sesid = $_SESSION['recID'];
$sesrole = $_SESSION['userRole'];
$sesuserName = $_SESSION['userName'];




if (isset($_POST["delete"])) {
    $adminid = trim(strip_tags($_POST['adminid']));

    // Use prepared statement to prevent SQL injection
    $sql = "DELETE FROM usercontroller WHERE recID = ?";
    
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("s", $adminid);

        // Execute the statement
        if ($stmt->execute()) {
            echo $mes = "<script type='text/javascript'>
                alert('Admin successfully deleted.');
            </script>";
        } else {
            echo "Error executing statement: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}


    if (isset($_POST['submit'])){
    $uzadmin = trim(strip_tags($_POST['uzadmin']));
    $uzadminpwd = trim(strip_tags($_POST['uzadminpwd']));
    $user_role = trim(strip_tags($_POST['user_role']));
    $cuzadminpwd = trim(strip_tags($_POST['cuzadminpwd']));

    $hashedPassword = md5('uzrat' . $uzadminpwd);

   $query2 = mysqli_query($conn, "SELECT * FROM usercontroller WHERE userName='$uzadmin'");
   $num_rows = mysqli_num_rows($query2);
 
   
   if($uzadmin =="" || $uzadminpwd ==""|| $cuzadminpwd =="") {
    echo "<script type='text/javascript'>
    alert('please do not submit an empty form.');
    </script>";
      
  }
  elseif ($uzadminpwd!=$cuzadminpwd){
    echo "<script type='text/javascript'>
    alert('your password and confirmpassword arent the same.please enter correctly.');
    </script>";

  }


 else if (mysqli_num_rows($query2) > 0){ 
   
   echo"<script type='text/javascript'>
       alert('This username  already exist,please use another.');
        </script>";
            }

  else { 
     $new22 = "INSERT INTO usercontroller (userName,passWord,userRole) VALUES ('$uzadmin','$hashedPassword','$user_role')";
     if (mysqli_query($conn, $new22)) {
         echo "<script type='text/javascript'>
              alert('New Admin successfully created.');
              </script>";
     } else {
         echo "<script type='text/javascript'>
         alert('New Admin creation failed , please retry.');
         </script>";
   }

 }
}


        
?>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form {
            margin-bottom: 20px;
        }
        form input[type="text"],
        form input[type="password"],
        form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th,
        table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        table th {
            background-color: #f2f2f2;
        }
        .delete-btn {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
    <a href="admindash.php">Back to  Admin Dashboard</a>
        <h2>Create Admin</h2>
        <form action="" method="POST">
            <input type="text" name="uzadmin" placeholder="Username" required>
            <input type="password" name="uzadminpwd" placeholder="Password" required>
            <input type="password" name="cuzadminpwd" placeholder=" confirm Password" required>
            <select name="user_role" required>
                <option value="">Select Role</option>             
                <option value="1">Super Admin</option>
                <option value="2">Admin</option>
            </select>
            <input type="submit" name="submit" value="Create Admin">
        </form>

        <h2>Admin List</h2>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>User Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- PHP code to fetch admin entries from the database and display them -->
                <?php
// Fetch admin entries from the database
$bisola = mysqli_query($conn, "SELECT * FROM usercontroller ORDER BY userName ASC");

// Check if any admin entries exist
if (mysqli_num_rows($bisola) > 0) {
    // Iterate through each admin entry
    while ($row = mysqli_fetch_assoc($bisola)) {
        $adminid = $row['recID'];
        $adminUserName = $row['userName'];
        $adminRole = $row['userRole'];

        // Display the admin details in a table row
        echo "<tr>";
        echo "<td>$adminUserName</td>";     
        echo "<td>";
        if ($adminRole == 1) {
            echo 'Superadmin';
        } else {
            echo 'Admin';
        }
        echo '<td>
        <form method="POST" action="">
            <input type="hidden" name="adminid" value="' . $adminid . '">
            <button type="submit" name="delete" class="btn btn-sm" style="background-color: red; color: white;">Delete Admin</button>
        </form>
    </td>';
    
    
         
    }
} else {
    // If no admin entries exist, display a message
    echo "<tr><td colspan='3'>No admin entries found.</td></tr>";
}
?>

            </tbody>
        </table> 
        <div>
        <footer class="text-center mt-8 text-xs text-gray-600">&copy; <?php echo date("Y"); ?> CITM. All rights reserved.</footer>
    </div> 
</body>
</html>
