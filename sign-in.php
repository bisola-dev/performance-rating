<?php
include_once "connection.php";

if (isset($_POST['login'])) {
    // Sanitize input
    $staffid = mysqli_real_escape_string($conn, trim(strip_tags($_POST['staffid'])));
    $Hpazz = mysqli_real_escape_string($conn, trim(strip_tags($_POST['Hpazz'])));
    
    // Debug: Check if inputs are received
    //echo $staffid . ' ' . $Hpazz;
    $hashed_password = md5('ririra' . $Hpazz); 
    //echo $hashed_password;

    // Check if fields are empty
    if ($staffid == "" || $Hpazz == "") {
        echo "<script type='text/javascript'>alert('Please fill in all the fields');</script>";
    } else {
        // Query to retrieve user info
        $query = "SELECT * FROM vw_managementofficers
                  WHERE staff_number = '$staffid'
                  AND Hpazz = '$hashed_password'";
        $result = mysqli_query($conn, $query);

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

             // Set session variables
             $sesrole= $_SESSION['Role'] = $rolez;
             $sesdept=$_SESSION['OfficeHeld'] = $dept;
             $sesfulln=$_SESSION['fulln'] = $fulln;
             $sesstatus=$_SESSION['Status_Capacity'] = $status;
             $sesstaffid=$_SESSION['staff_number'] = $staff_number;
       

            //  update managementofficers table
            $insert_query  = "UPDATE managementofficers SET lastlogin='$grisland', isActive= 1  WHERE staff_number='$sesstaffid'";
            $insert_result = mysqli_query($conn, $insert_query);
            // Check if update is successful
            if ($insert_result) {
                // Redirect to change password page
                echo '<script type="text/javascript">
                    alert("You have successfully logged in.");
                    window.location.href = "chapwd.php"; 
                </script>';
            } else {
                echo "<script type='text/javascript'>alert('error in access.,please retry');</script>";
            }
        } else {
            echo "<script type='text/javascript'>alert('Sorry, you do not have access to this portal, please confirm access with the admin');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logoyct.png" type="image/x-icon">
    <title>Performance Rating Indicators</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-b from-green-100 to-green-300 min-h-screen flex justify-center items-center bg-gray-100 p-4">
    <div class="max-w-md mx-auto bg-white p-8 rounded-md shadow-md">
        <h1 class="text-2xl font-semibold mb-4 text-center text-yellow-600">PERFORMANCE RATING INDICATORS</h1>
        <h2 class="text-lg font-semibold mb-6 text-center">LOGIN</h2> 
        <form method="POST" action="">
            <div class="mb-4">
                <label for="staffid" class="block text-sm font-medium text-gray-700">Please enter your staffid here</label>
                <input type="text" id="staffid" name="staffid" placeholder="staff id" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" placeholder="Password" name="Hpazz" maxlength="7" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="text-center">
                <button type="submit" name="login" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:bg-green-600">Login</button>
            </div>
        </form>
    </div>
</body>
</html>