<?php
    //local connection
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="performancerating_db";
    
    $conn = new mysqli($servername, $username, $password, $dbname); 

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $db= mysqli_select_db($conn, $dbname);

    session_start();
    //Global variable for date
    date_default_timezone_set('Africa/Lagos');
    $grisland = date("Y-m-d h:i:s");
     
?>
