<?php 	
// Check if the staffid parameter is set in the URL
if(isset($_GET['staffid'])) {
    // Retrieve the staffid from the URL parameter
    $staffid = $_GET['staffid'];

    // Now you can use $staffid for further processing
} else if ($staffid == "") {
    // Redirect to createstaff.php if staffid parameter is empty
    header("Location: createstaff.php");
    exit; // Make sure to exit after redirection to prevent further execution
} else {
    // Handle the case when staffid parameter is not provided
    echo "Staff ID is not provided.";
}

$queryDb = mysqli_query($conn, "SELECT performance.*, identy.*, identy.fulln AS username
    FROM performance
    INNER JOIN identy ON performance.staff_id = identy.staffno
    WHERE performance.staff_id = '$staffid'");
    
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
	

            $sestafgrade = $row['gradelevel'];
            $sestafcadre= $row['cadre'];
            $sestaffulln =  $row['username'];
            $sestafranc = $row['ranc'];
        
            $sestaforig = $row['orig'];
            $sestafcateg= $row['categ'];
            $sestafdept= $row['dept'];
            $sestafsex= $row['sexx'];
        
            $sestafunit= $row['unit'];
            $sestafpozt= $row['pozt'];
            $staffid= $row['staff_id'];
        }    

	    
  ?>