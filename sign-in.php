<?php
include_once "connection.php";
if (isset($_POST['login'])) {
    // Sanitize input
    $staffid = mysqli_real_escape_string($conn, trim(strip_tags($_POST['staffid'])));
    $Hpazz = mysqli_real_escape_string($conn, trim(strip_tags($_POST['Hpazz'])));
    
    // Check if fields are empty
    if ($staffid == "" || $Hpazz == "") {
        echo "<script type='text/javascript'>alert('Please fill in all the fields');</script>";
    } else {
        // Query to check if staff ID exists
        $staff_query = "SELECT * FROM vw_managementofficers WHERE staff_number = '$staffid'";
        $staff_result = mysqli_query($conn, $staff_query);

        // Check if staff ID exists
        if (mysqli_num_rows($staff_result) == 0) {
            echo "<script type='text/javascript'>alert('sorry you do not have access to this portal,please contact the Admin');</script>";
        } else {
            // Query to check if password is correct
            $hashed_password = md5('ririra' . $Hpazz); 
            $password_query = "SELECT * FROM vw_managementofficers WHERE staff_number = '$staffid' AND Hpazz = '$hashed_password'";
            $password_result = mysqli_query($conn, $password_query);

            // Check if password is correct
            if (mysqli_num_rows($password_result) == 0) {
                echo "<script type='text/javascript'>alert('Incorrect password, please try again or send  ');</script>";
            } else {
                // Fetch user data
                $row = mysqli_fetch_assoc($password_result);
                $rolez = $row['Role'];
                $dept = $row['OfficeHeld'];
                $fulln = $row['fulln'];
                $status = $row['Status_Capacity'];
                $staff_number = $row['staff_number'];

                // Set session variables
                $_SESSION['Role'] = $rolez;
                $_SESSION['OfficeHeld'] = $dept;
                $_SESSION['fulln'] = $fulln;
                $_SESSION['Status_Capacity'] = $status;
                $_SESSION['staff_number'] = $staff_number;

                // Update managementofficers table
                $grisland = date("Y-m-d H:i:s");
                $insert_query  = "UPDATE managementofficers SET lastlogin='$grisland', isActive=1 WHERE staff_number='$staff_number'";
                $insert_result = mysqli_query($conn, $insert_query);

                // Check if update is successful
                if ($insert_result) {
                    // Redirect to change password page
                    echo '<script type="text/javascript">
                        alert("You have successfully logged in.");
                        window.location.href = "chapwd.php"; 
                    </script>';
                } else {
                    echo "<script type='text/javascript'>alert('Error in access, please retry');</script>";
                }
            }
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
        <div class="mt-8">
            <p class="text-center text-sm text-gray-600">For complaints, please send a mail to <a href="mailto:webometrics@yabatech.edu.ng" class="underline">webometrics@yabatech.edu.ng</a> or see the CITM.</p>
            <footer class="text-center mt-8 text-xs text-gray-600">&copy; <?php echo date("Y"); ?> CITM. All rights reserved.</footer>
        </div>
    </div>
    
</body>
</html>
