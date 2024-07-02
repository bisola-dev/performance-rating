<?php
require_once('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uzrat = $_POST["uzrat"];
    $uzratpwd = $_POST["uzratpwd"];

    if (empty($uzratpwd) || empty($uzrat)) {
        echo "<script type ='text/javascript'>alert('Please do not submit an empty form.');</script>";
   
    } else {
        $hashedPassword = md5('uzrat' . $uzratpwd);

        $db = mysqli_select_db($conn, $dbname);
        $query = mysqli_query($conn, "SELECT * FROM usercontroller WHERE userName='$uzrat' AND PassWord = '$hashedPassword' LIMIT 1");
        $rows = mysqli_num_rows($query);

        if ($rows == 1) {
            $row = mysqli_fetch_assoc($query);

            $adfulln = $row['userName'];
            $adid = $row['recID'];
            $userRole = $row['userRole'];

            $query2 = "UPDATE usercontroller SET lastLogin = '$grisland', isActive = '1' WHERE userName = '$uzrat'";
            $result = mysqli_query($conn, $query2);

if (!$result) {
    echo "Error updating record: " . mysqli_error($conn);
}

            $sesid = $_SESSION['recID'] = $adid;
            $sesrole = $_SESSION['userRole'] = $userRole;
            $sesuserName = $_SESSION['userName'] = $adfulln ;
         
            echo "<script type='text/javascript'>alert('Login successful.'); window.location.href='admindash.php';</script>";
        } else {
            echo "<script type='text/javascript'>alert('Invalid Credentials, please login correctly');</script>";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form action="" method="POST">
            <input type="text" name="uzrat" placeholder="Username" required>
            <input type="password" name="uzratpwd" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
