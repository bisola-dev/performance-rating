
    
	<?php
	
	
	$queryDb = mysqli_query($conn, "SELECT * FROM performance WHERE staff_id= '$staffid'");
		while ($row=mysqli_fetch_assoc($queryDb)) {
	
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
$totalScore = ($punctuality1 + $absenteeism1 + $attitude1 + $quality1+ $record1+ $competence1+ $diligence1+$loyalty1 + $promptness1 + $tmanagement1 + $willingness1 + $innovative1+$courteous1+$honesty1 + $leadership1+$confident1+$ability1+$adaptation1+$respect1 +  $care1+  $constraint1); // Add values for other criteria...

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