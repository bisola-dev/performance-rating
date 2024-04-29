<?php 	
// Check if staffid is provided via GET or POST
if (isset($_GET['staffid'])) {
    $staffid = mysqli_real_escape_string($conn, trim(strip_tags($_GET['staffid'])));
} elseif (isset($_POST['staffid'])) {
    $staffid = mysqli_real_escape_string($conn, trim(strip_tags($_POST['staffid'])));
} else {
    echo "<script type='text/javascript'>alert('Please provide a valid staff ID');</script>";
    // Redirect to logout page or handle the error as needed
    header("Location: logout.php");
    exit(); // Ensure script execution stops after redirection
}

// Get user information
$userData = getUserInfo($conn, $staffid);

// Check if user data is retrieved
if (!$userData) {
    echo "<script type='text/javascript'>alert('This staff ID does not exist');</script>";
    // Redirect to logout page or handle the error as needed
    header("Location: logout.php");
    exit(); // Ensure script execution stops after redirection
}

// Set session variables
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

$sestafgrade = $_SESSION['gradelevel'];
$sestafcadre = $_SESSION['cadre'];
$sestaffulln = $_SESSION['username'];
$sestafranc = $_SESSION['ranc'];
$sestaforig = $_SESSION['orig'];
$sestafcateg = $_SESSION['categ'];
$sestafdept = $_SESSION['dept'];
$sestafsex = $_SESSION['sexx'];
$sestafunit = $_SESSION['unit'];
$sestafpozt = $_SESSION['pozt'];
$staffid = $_SESSION['staffid'];

// Call function to check performance and redirect if necessary
checkPerformanceAndRedirect($conn, $staffid);

function getUserInfo($conn, $staffid) {
    // SQL query to select all columns with an alias for the fulln column
    $query = "SELECT *, fulln AS username FROM identy WHERE staffno = '$staffid'";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

function checkPerformanceAndRedirect($conn, $staffid) {
    $updated = mysqli_query($conn, "SELECT * FROM performance WHERE staff_id = '$staffid' AND dele = 1");
    if (mysqli_num_rows($updated) == 1) {
		echo '<script>alert("You have once rated this staff, please proceed to update staff ratings."); window.location.href="editrate.php?staffid=' . $staffid . '";</script>';

    }
}

$queryDb = mysqli_query($conn, "SELECT * FROM performance WHERE staff_id= '$staffid'");
while ($row = mysqli_fetch_assoc($queryDb)) {
    $id = $row['id'];  
    $punctuality1 = $row['punctuality'];
    $absenteeism1 = $row['absenteeism'];  
    $attitude1 = $row['attitude'];
    $quality1 = $row['quality'];  
    $record1 = $row['record'];
    $competence1 = $row['competence'];  
    $diligence1 = $row['diligence'];
    $loyalty1 = $row['loyalty'];  
    $promptness1 = $row['promptness'];
    $tmanagement1 = $row['tmanagement'];  
    $willingness1 = $row['willingness'];
    $innovative1 = $row['innovative'];  
    $courteous1 = $row['courteous'];
    $honesty1 = $row['honesty'];  
    $leadership1 = $row['leadership'];
    $confident1 = $row['confident'];  
    $ability1 = $row['ability'];  
    $adaptation1 = $row['adaptation'];
    $respect1 = $row['respect'];
    $care1 = $row['care'];  
    $constraint1 = $row['constrainnt'];

    // Calculate the number of criteria
    $numCriteria = 21; // Update this with the actual number of criteria

    // Calculate the weight dynamically
    $weight = 100 / $numCriteria;

    // Calculate the total score
    $totalScore = ($punctuality1 + $absenteeism1 + $attitude1 + $quality1 + $record1 + $competence1 + $diligence1 + $loyalty1 + $promptness1 + $tmanagement1 + $willingness1 + $innovative1 + $courteous1 + $honesty1 + $leadership1 + $confident1 + $ability1 + $adaptation1 + $respect1 + $care1 + $constraint1); // Add values for other criteria...

    // Calculate the maximum possible score
    $maxScore = $numCriteria * 10; // Assuming each criterion is out of 10

    // Calculate the percentage
    $percentage = ($totalScore / $maxScore) * 100;

    // Round up the percentage to 1 decimal place
    $roundedPercentage = round($percentage, 1);
    $maxScore;
    $totalScore;

    function mapPercentageToGrade($percentage) {
        if ($percentage >= 90) {
            return "Excellent";
        } elseif ($percentage >= 70) {
            return "Very Good";
        } elseif ($percentage >= 50) {
            return "Satisfactory";
        } elseif ($percentage >= 30) {
            return "Needs Improvement";
        } else {
            return "Poor";
        }
    }
    $grade = mapPercentageToGrade($percentage);
}
?>
