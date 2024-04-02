<?php 
 include_once "connection.php";
 $sesid = $_SESSION['recID'];
 $sesrole = $_SESSION['userRole'];
 $sesuserName = $_SESSION['userName'];



if (isset($_POST['reset_password'])) {
    $staff_id = mysqli_real_escape_string($conn, $_POST['staff_id']);
    
    $new_password='1234567';
    // Hash the new password
    $hashed_password = 'bd79d6c3f111f136c10874237a8c7533';

    // Update the user's password in the database
    $update_query = "UPDATE managementofficers SET Hpazz= '$hashed_password' WHERE staff_number = '$staff_id'";
    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {
        // Password updated successfully
        echo "<script>alert('Password reset successfully. New password: $new_password, try logging in');window.location.href='sign-in.php';</script>";
  
    } else {
        // Failed to update password
        echo "<script>alert('Failed to reset password. Please try again later.');</script>";
    }
}


  if (isset($_POST['search'])) {
      $staff_id = mysqli_real_escape_string($conn, trim(strip_tags($_POST['staff_id'])));
    if ($staff_id == "") {
        echo "<script type='text/javascript'>alert('Please fill in all the fields');</script>";
    } 
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <div class="container mx-auto">
    <div class="mt-4">
    <a href="admindash.php" class="inline-block px-2 py-1 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 focus:outline-none focus:bg-gray-400">Back to Dashboard</a>
</div>
    <title>Reset Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            text-align: center;
            margin-top: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 250px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .reset-btn {
            padding: 5px 10px;
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .reset-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Reset Password</h1>
        <form action="" method="POST">
            <label for="staff_id">Enter Staff ID:</label><br>
            <input type="text" id="staff_id" name="staff_id" required><br>
            <button type="submit" name="search">Search</button>
        </form>
        <?php   
         if (isset($_POST['search'])) {
            $staff_id = mysqli_real_escape_string($conn, trim(strip_tags($_POST['staff_id'])));
          if ($staff_id == "") {
              echo "<script type='text/javascript'>alert('Please fill in all the fields');</script>";
          } else {
              $query = "SELECT * FROM vw_managementofficers WHERE staff_number = '$staff_id'";
              $result = mysqli_query($conn, $query);
         $count=1;
        // Check if exactly one row is returned  
        if (mysqli_num_rows($result) == 1) {
            // Fetch user data
            $row = mysqli_fetch_assoc($result);
            // $id = $row['id'];  
            $rolez = $row['Role'];
            $dept = $row['OfficeHeld'];
            $fulln = $row['fulln'];
            $status = $row['Status_Capacity'];
            $staff_number = $row['staff_number'];


            ?>
            <table>
                <thead>
                    <tr>
                    <th>S/N</th>
                        <th>Staff ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Role</th>
                        <th>Dept</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><?php echo $count;?></td>
                        <td><?php echo $staff_number;?></td>
                        <td><?php echo $fulln;?></td>
                        <td><?php echo $status;?></td>
                        <td><?php echo $rolez;?></td>
                        <td><?php echo $dept;?></td>
                        <td>
                            <form action="" method="POST">
                                <input type="hidden" name="staff_id" value="<?php echo $staff_number; ?>">
                                <button type="submit" class="reset-btn" name="reset_password">Reset Password</button>
                            </form>
                  </td>

                    </tr>
                    <!-- Add more rows for other users if needed -->
                    <?php $count++;} 
                    else {
                        echo "<script type='text/javascript'>alert('This staff id is unfound');</script>";
                   
                    }
                    ?> 
                </tbody>
            </table>
    </div>
</body>
</html>
<?php }}?>