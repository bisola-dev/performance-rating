<?php
include_once "connection.php";
include_once "check.php";




if (isset($_POST['login'])) {
    $staffid = mysqli_real_escape_string($conn, trim(strip_tags($_POST['staffid'])));
    if ($staffid == "") {
        echo "<script type='text/javascript'>alert('Please fill in all the fields');</script>";
    } else {
        checkPerformanceAndRedirect($conn, $staffid);
        $userData = getUserInfo($conn, $staffid);
        if ($userData) {
            setSessionVariables($userData, $staffid);
            echo '<script type="text/javascript">alert("You have successfully registered this staff. Please proceed to rate this staff."); window.location.href = "performance_one.php?staffid=' . $staffid . '";</script>';
        } else {
            echo '<script type="text/javascript">alert("This staff id doesnt exist");</script>';
        }
    }
}

function checkPerformanceAndRedirect($conn, $staffid) {
    $updated = mysqli_query($conn, "SELECT * FROM performance WHERE staff_id = '$staffid' AND dele = 1");
    if (mysqli_num_rows($updated) == 1) {
        echo '<script>alert("You have once created and rated this staff, please proceed to update staff ratings."); window.location.href="editrate.php";</script>';

    }
}

function getUserInfo($conn, $staffid) {
    // SQL query to select all columns with an alias for the fulln column
    $query = "SELECT *, fulln AS username FROM identy WHERE staffno = '$staffid'";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

function setSessionVariables($userData, $staffid) {
    $_SESSION['gradelevel'] = $userData['gradelevel'];
    $_SESSION['cadre'] = $userData['cadre'];
    $_SESSION['username'] = $userData['username'];
    $_SESSION['ranc'] = $userData['ranc'];
    $_SESSION['orig'] = $userData['orig'];
    $_SESSION['categ'] = $userData['categ'];
    $_SESSION['dept'] = $userData['dept'];
    $_SESSION['sexx'] = $userData['sexx'];
    $_SESSION['staffid'] = $staffid;
    $_SESSION['unit'] = $userData['unit'];
    $_SESSION['pozt'] = $userData['pozt'];
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
    <div class="mt-4">
    <a href="dashboard.php" class="inline-block px-2 py-1 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 focus:outline-none focus:bg-gray-400">Back to Dashboard</a>
</div>
        <h1 class="text-2xl font-semibold mb-4 text-center text-yellow-600">PERFORMANCE RATING INDICATORS</h1>
        <h2 class="text-lg font-semibold mb-6 text-center">Create Staff</h2>
        <form method="POST" action="">
            <div class="mb-4">
                <label for="staffid" class="block text-sm font-medium text-gray-700">Please enter the staffid here</label>
                <input type="text" id="staffid" name="staffid" placeholder="staff id" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
           
            <div class="text-center">
                <button type="submit" name="login" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:bg-green-600">Submit</button>
            </div>
        </form>
        <footer class="text-center mt-8 text-xs text-gray-600">&copy; <?php echo date("Y"); ?> CITM. All rights reserved.</footer>
    </div>
    
</body>
</html>
