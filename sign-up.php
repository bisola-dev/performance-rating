<?php
include_once("connection.php");      
 
//if register button is clicked
if (isset($_POST["register"])) {
    $surname = mysqli_real_escape_string($conn, $_POST['surname']);
    $othernames = mysqli_real_escape_string($conn, $_POST['othernames']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $staffid = mysqli_real_escape_string($conn, $_POST['staffid']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $designation = mysqli_real_escape_string($conn, $_POST['designation']);

    //echo $surname.' '.$othernames.' '.$gender.' '.$staffid.' '.$department.' '.$designation;
   
    $query2 = mysqli_query($conn, "SELECT * FROM registration WHERE staffid='$staffid'" );
    $kanty = mysqli_num_rows($query2);

    // check for empty field  
  if($surname == ""  || $othernames == ""  || $gender == "" ||  $staffid == "" || $department == "" || $designation == "") {

    //Be sure that all the fields are filled then proceed
    echo '<script>alert("You have to fill in ALL the fields correctly to proceed")</script>';
        
  //checking for at least 8 characters in the password
      } else if (($kanty) > 0){ 
    echo '<script>alert("This account already exist.")</script>';
        
   } else {  
    
        $inserted=  mysqli_query($conn,"INSERT INTO performance (staff_id) VALUES ('$staffid')");


        $insert=  mysqli_query($conn,"INSERT INTO registration (surname, othernames, gender, staffid, department, designation, date_reg) VALUES ('$surname', '$othernames', '$gender', '$staffid', '$department', '$designation', '$date_reg')");
           echo '<script>alert("The account was successfully created.")
            window.location.href="sign-in.php";
            </script>';
          }

        } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Non-Academic Staff Performance Rating Indicators</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-b from-green-100 to-green-300 min-h-screen flex justify-center items-center bg-gray-100 p-4">
    <div class="max-w-md mx-auto bg-white p-8 rounded-md shadow-md">
        <h1 class="text-2xl font-semibold mb-6 text-center">NON-ACADEMIC STAFF PERFORMANCE RATING INDICATORS</h1>
        <h3 class="text-2xl font-semibold mb-6 text-center text-green-700">REGISTRATION</h3>
        <form method="POST" action="">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Surname</label>
                <input type="text" id="name" name="surname" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Other Names</label>
                <input type="text" id="name" name="othernames" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                <select id="gender" name="gender" class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="">select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="staff-id" class="block text-sm font-medium text-gray-700">Staff ID</label>
                <input type="text" id="staff-id" name="staffid" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="department" class="block text-sm font-medium text-gray-700">Department/Unit</label>
                <input type="text" id="department" name="department" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="designation" class="block text-sm font-medium text-gray-700">Designation</label>
                <input type="text" id="designation" name="designation" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="text-center">
                <button type="submit" name="register" class="px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
