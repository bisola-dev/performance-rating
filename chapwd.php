<?php
include_once "connection.php";
include_once "check.php";
 


  // Query to retrieve user info
  $query = "SELECT * FROM managementofficers
  WHERE staff_number = '$sesstaffid'";

 $result = mysqli_query($conn, $query);
// Check if exactly one row is returned
if (mysqli_num_rows($result) == 1) {
// Fetch user data
$row = mysqli_fetch_assoc($result);
// $id = $row['id'];  
$checkxx = $row['Hpazz'];

if ($checkxx != 'bd79d6c3f111f136c10874237a8c7533') {
    header("Location: dashboard.php");
    exit; // Add this line
}
}


if (isset($_POST['login'])) {
    // Sanitize input
    $olpazz= mysqli_real_escape_string($conn, trim($_POST['olpazz']));
    $npwd = mysqli_real_escape_string($conn, trim($_POST['npwd']));
    $cpwd= mysqli_real_escape_string($conn, trim($_POST['cpwd']));

    $hashedolpazz= md5('ririra' . $olpazz); 

    // Query to get the current password of the user
    $query = "SELECT Hpazz FROM managementofficers WHERE staff_number = '$sesstaffid'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $current_password = $row['Hpazz'];

    
        // Verify if the old password matches the current password
        if ($hashedolpazz === $current_password) {          
            // Check if new password and confirm password match
            if ($npwd === $cpwd) {
                // Hash the new password
           
                $hashed_password = md5('ririra' . $npwd); 

                // Update the password in the database
                $update_query = "UPDATE managementofficers SET Hpazz = '$hashed_password' WHERE staff_number = '$sestaffid'";
                $update_result = mysqli_query($conn, $update_query);

                if ($update_result) {
                    echo '<script type="text/javascript">
                            alert("Password updated successfully");
                            window.location.href = "dashboard.php"; 
                          </script>';
                } else {
                    echo "<script type='text/javascript'>alert('Failed to update password');</script>";
                }
            } else {
                echo "<script type='text/javascript'>alert('New password and confirm password do not match');</script>";
            }
        } else {
            echo "<script type='text/javascript'>alert('Incorrect old password');</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('User not found');</script>";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="max-w-md w-full bg-white p-8 rounded-md shadow-md">
   
 <?php echo 'WELCOME'.' '.$sesfulln . ' || ' . $sesstatus . ' || ' . $sesrole.' || '.$sesdept; ?> 
    <h1 class="text-2xl font-semibold mb-4 text-center text-yellow-600">Please Change Your Password</h1>
        <form action="" method="post">
            <div class="mb-4">
                <label for="old_password" class="block text-sm font-medium text-gray-700">Old Password:</label>
                <input type="password" id="old_password" name="olpazz" placeholder="Old Password" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
            </div>  
            <div class="mb-4">
                <label for="new_password" class="block text-sm font-medium text-gray-700">New Password:</label>
                <input type="password" id="new_password" name="npwd" placeholder="New Password" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
            </div>
            <div class="mb-6">
                <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirm New Password:</label>
                <input type="password" id="confirm_password" name="cpwd" placeholder="Confirm New Password" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
            </div>
            <div class="text-center">
            <button type="submit" name="login" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:bg-green-600">Change Password</button>
            </div>
        </form>
    </div>
</body>
</html>
