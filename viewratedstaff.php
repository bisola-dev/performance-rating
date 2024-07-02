<?php
    include_once "connection.php";
   include_once "check.php";

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
  
    $queryDb = mysqli_query($conn, "
    SELECT identy.*, performance.*, identy.fulln AS username 
    FROM identy 
    INNER JOIN performance ON identy.staffno = performance.staff_id 
    WHERE performance.ratedby = '$sesstaffid' 
    ORDER BY username ASC
");

if (!$queryDb) {
    die('Error: ' . mysqli_error($conn));
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Performance Rating Indicators</title>
   
    <link rel="shortcut icon" href="images/logoyct.png" type="image/x-icon">
   
</head>
<body class="bg-gradient-to-b from-green-100 to-green-300 min-h-screen p-4">
    <div class="container mx-auto">
    <div class="mt-4">
    <a href="dashboard.php" class="inline-block px-2 py-1 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 focus:outline-none focus:bg-gray-400">Back to Dashboard</a>
</div>
        <h1 class="text-1xl font-semibold text-center text-red-700 my-4">NON-ACADEMIC STAFF PERFORMANCE RATING INDICATORS</h1>
        <h4 class="text-1xl font-semibold mb-8 text-center text-red-700" > <?php echo 'VIEW ALL RATED INDIVIDUALS BY'.' '. $sesfulln . ' || ' . $sesstatus . ' || ' . $sesrole.' || '.$sesdept; ?></h4>
        <div class="overflow-x-auto">

                    
                    <thead>
                        <tr>
                            
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">S/N</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Names of staff</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Gender</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Staff ID No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Department/unit</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Designation</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Punctuality</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Absenteeism</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Attitude to Work</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Quality of Work Output</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Record Keeping</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Competence</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Diligence</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Loyalty to Organization</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Prompt Response to Task</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Time Management</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Willingness to do Extra Task</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Innovative</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Courteous</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Honesty</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Leadership Trait</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Constraint</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Confidentiality</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Ability to Work Under Pressure
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Adaptation to College Mission/Vision</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Respect for Constituted Authority</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Care for College Properties/Assets</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Edit</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Key result area(KRA)Critical success Area</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Key Performance Indicator(KPI)</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <?php           

               $count = 1;
               $queryDb = mysqli_query($conn, "
               SELECT identy.*, performance.*, identy.fulln AS username 
               FROM identy 
               INNER JOIN performance ON identy.staffno = performance.staff_id 
               WHERE performance.ratedby = '$sesstaffid' 
               ORDER BY username ASC
           ");

                while ($row=mysqli_fetch_assoc($queryDb )) {
        
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


                    $numCriteria = 21; // Update this with the actual number of criteria

                 // Calculate the weight dynamically
                  $weight = 100 / $numCriteria;

           // Calculate the total score
           $totalScore = ($punctuality1 + $absenteeism1 + $attitude1 + $quality1+ $record1+ $competence1+ $diligence1+$loyalty1 + $promptness1 + $tmanagement1 + $willingness1 + $innovative1+$courteous1+$honesty1 + $leadership1+$confident1+$ability1+$adaptation1+$respect1 +  $care1+ $constraint1); // Add values for other criteria...

           // Calculate the maximum possible score
            $maxScore = $numCriteria * 10; // Assuming each criterion is out of 10

           // Calculate the percentage
          $percentage = ($totalScore / $maxScore) * 100;

             // Round up the percentage to 1 decimal place
         $roundedPercentage = round($percentage, 1);
           $maxScore;
           $totalScore;

        $grade = mapPercentageToGrade($percentage);

    
                    ?>
              
    
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo $count;?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo $sestaffulln; ?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo $sestafsex; ?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo $staffid; ?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo $sestafdept; ?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo $sestafranc;?></td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <?php  if (!empty($punctuality1)) {
            switch ($punctuality1) {
                case 10:
                    echo '<option value="5" selected>Timely</option>';
                    break;
                case 8:
                    echo '<option value="4" selected>Regularly</option>';
                    break;
                case 6:
                    echo '<option value="3" selected>Usually</option>';
                    break;
                case 4:
                    echo '<option value="2" selected>Needs improvement</option>';
                    break;
                case 2:
                    echo '<option value="1" selected>Poor</option>';
                    break;
                default:
                    echo '<option value="" selected>Select</option>';
            }
        } 
                            ?>            
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <?php
        if (!empty($absenteeism1)) {
            switch ($absenteeism1) {
                case 10:
                    echo '<option value="5" selected>rarely never missing work</option>';
                    break;
                case 8:
                    echo '<option value="4" selected>Infrequent and typically occur for legitimate reasons</option>';
                    break;
                case 6:
                    echo '<option value="3" selected>Sometimes but within reasonable limits</option>';
                    break;
                case 4:
                    echo '<option value="2" selected>Often without valid reasons</option>';
                    break;
                case 2:
                    echo '<option value="1" selected>Misses work daily</option>';
                    break;
                default:
                    echo '<option value="" selected>Select</option>';
            }
        }
                            ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <?php
        if (!empty($attitude1)) {
            switch ($attitude1) {
                case 10:
                    echo '<option value="5" selected>Committed</option>';
                    break;
                case 8:
                    echo '<option value="4" selected>dutiful</option>';
                    break;
                case 6:
                    echo '<option value="3" selected>fairly committed</option>';
                    break;
                case 4:
                    echo '<option value="2" selected>Lazy</option>';
                    break;
                case 2:
                    echo '<option value="1" selected>unscrupulous</option>';
                    break;
                default:
                    echo '<option value="" selected>Select</option>';
            }
        }
                            ?>  
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <?php
        if (!empty($quality1)) {
            switch ($quality1) {
                case 10:
                    echo '<option value="5" selected>Accuracy</option>';
                    break;
                case 8:
                    echo '<option value="4" selected>Completeness</option>';
                    break;
                case 6:
                    echo '<option value="3" selected>Relevance</option>';
                    break;
                case 4:
                    echo '<option value="2" selected>Timeliness</option>';
                    break;
                case 2:
                    echo '<option value="1" selected>lack of precision</option>';
                    break;
                default:
                    echo '<option value="" selected>Select</option>';
            }
        } 
                            ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <?php
        if (!empty($record1)) {
            switch ($record1) {
                case 10:
                    echo '<option value="5" selected>Records Inventory and Classification</option>';
                    break;
                case 8:
                    echo '<option value="4" selected>Records Retention and Scheduling</option>';
                    break;
                case 6:
                    echo '<option value="3" selected>Disaster Prevention Programme</option>';
                    break;
                case 4:
                    echo '<option value="2" selected>Disposition</option>';
                    break;
                case 2:
                    echo '<option value="1" selected>Archive</option>';
                    break;
                default:
                    echo '<option value="" selected>Select</option>';
            }
        }
        ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <?php
        if (!empty($competence1)) {
            switch ($competence1) {
                case 10:
                    echo '<option value="5" selected>Knowledge - experience</option>';
                    break;
                case 8:
                    echo '<option value="4" selected>Communication skills</option>';
                    break;
                case 6:
                    echo '<option value="3" selected>problem solving /technical skills</option>';
                    break;
                case 4:
                    echo '<option value="2" selected>Adaptability -efficient</option>';
                    break;
                case 2:
                    echo '<option value="1" selected>Inept</option>';
                    break;
                default:
                    echo '<option value="" selected>Select</option>';
            }
        }
                            ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <?php
        if (!empty($diligence1)) {
            switch ($diligence1) {
                case 10:
                    echo '<option value="5" selected>Dutiful</option>';
                    break;
                case 8:
                    echo '<option value="4" selected>Tenacious</option>';
                    break;
                case 6:
                    echo '<option value="3" selected>Painstaking</option>';
                    break;
                case 4:
                    echo '<option value="2" selected>Sloppy</option>';
                    break;
                case 2:
                    echo '<option value="1" selected>Indifference</option>';
                    break;
                default:
                    echo '<option value="" selected>Select</option>';
            }
        } 
                            ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <?php
        if (!empty($loyalty1)) {
            switch ($loyalty1) {
                case 10:
                    echo '<option value="5" selected>Ability to Portray the College in good Light --representativeness</option>';
                    break;
                case 8:
                    echo '<option value="4" selected>Integrity</option>';
                    break;
                case 6:
                    echo '<option value="3" selected>Satisfactory</option>';
                    break;
                case 4:
                    echo '<option value="2" selected>Fickle</option>';
                    break;
                case 2:
                    echo '<option value="1" selected>Disloyal</option>';
                    break;
                default:
                    echo '<option value="" selected>Select</option>';
            }
        }
                            ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <?php
        if (!empty($promptness1)) {
            switch ($promptness1) {
                case 10:
                    echo '<option value="5" selected>Adequately timely</option>';
                    break;
                case 8:
                    echo '<option value="4" selected>Prioritization</option>';
                    break;
                case 6:
                    echo '<option value="3" selected>Fairly timely</option>';
                    break;
                case 4:
                    echo '<option value="2" selected>Sluggish</option>';
                    break;
                case 2:
                    echo '<option value="1" selected>Lax</option>';
                    break;
                default:
                    echo '<option value="" selected>Select</option>';
            }
        } 
        ?>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <?php
        if (!empty($tmanagement1)) {
            switch ($tmanagement1) {
                case 10:
                    echo '<option value="5" selected>Organised</option>';
                    break;
                case 8:
                    echo '<option value="4" selected>Delegate work with authority</option>';
                    break;
                case 6:
                    echo '<option value="3" selected>Update superior about happenings</option>';
                    break;
                case 4:
                    echo '<option value="2" selected>Time negligent</option>';
                    break;
                case 2:
                    echo '<option value="1" selected>Time chaos</option>';
                    break;
                default:
                    echo '<option value="" selected>Select</option>';
            }
        } 
        ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <?php
        if (!empty($willingness1)) {
            switch ($willingness1) {
                case 10:
                    echo '<option value="5" selected>Eagerness for tasks beyond their regular duties</option>';
                    break;
                case 8:
                    echo '<option value="4" selected>Enthusiastic</option>';
                    break;
                case 6:
                    echo '<option value="3" selected>Interested</option>';
                    break;
                case 4:
                    echo '<option value="2" selected>Sometimes enthusiastic</option>';
                    break;
                case 2:
                    echo '<option value="1" selected>Not enthusiastic</option>';
                    break;
                default:
                    echo '<option value="" selected>Select</option>';
            }
        }
        ?>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                        <?php
        if (!empty($innovative1)) {
            switch ($innovative1) {
                case 10:
                    echo '<option value="5" selected>Proactive Novelty - Originality</option>';
                    break;
                case 8:
                    echo '<option value="4" selected>Willingness to take calculated risks</option>';
                    break;
                case 6:
                    echo '<option value="3" selected>Creativity</option>';
                    break;
                case 4:
                    echo '<option value="2" selected>Improvise - Proactivity</option>';
                    break;
                case 2:
                    echo '<option value="1" selected>Adaptability</option>';
                    break;
                default:
                    echo '<option value="" selected>Select</option>';
            }
        } 
                            ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <?php
        if (!empty($courteous1)) {
            switch ($courteous1) {
                case 10:
                    echo '<option value="5" selected>Politeness</option>';
                    break;
                case 8:
                    echo '<option value="4" selected>Pleasant</option>';
                    break;
                case 6:
                    echo '<option value="3" selected>Active listening</option>';
                    break;
                case 4:
                    echo '<option value="2" selected>Empathy</option>';
                    break;
                case 2:
                    echo '<option value="1" selected>Impolite</option>';
                    break;
                default:
                    echo '<option value="" selected>Select</option>';
            }
        } 
                            ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <?php
        if (!empty($honesty1)) {
            switch ($honesty1) {
                case 10:
                    echo '<option value="5" selected>Genuine - truthfulness</option>';
                    break;
                case 8:
                    echo '<option value="4" selected>Reliable</option>';
                    break;
                case 6:
                    echo '<option value="3" selected>Transparent</option>';
                    break;
                case 4:
                    echo '<option value="2" selected>Fairly transparent</option>';
                    break;
                case 2:
                    echo '<option value="1" selected>Dishonest</option>';
                    break;
                default:
                    echo '<option value="" selected>Select</option>';
            }
        } 
                            ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <?php
        if (!empty($leadership1)) {
            switch ($leadership1) {
                case 10:
                    echo '<option value="5" selected>Good listener - communication</option>';
                    break;
                case 8:
                    echo '<option value="4" selected>Knowledgeable - strategic thinking</option>';
                    break;
                case 6:
                    echo '<option value="3" selected>Empathy - ability to inspire and motivate others.</option>';
                    break;
                case 4:
                    echo '<option value="2" selected>Fairly suitable</option>';
                    break;
                case 2:
                    echo '<option value="1" selected>Unsuitable</option>';
                    break;
                default:
                    echo '<option value="" selected>Select</option>';
            }
        } 
                            ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <?php
        if (!empty($constraint1)) {
            switch ($constraint1) {
                case 10:
                    echo '<option value="5" selected>Epileptic Power Supply</option>';
                    break;
                case 8:
                    echo '<option value="4" selected>Work Environment not Conducive</option>';
                    break;
                case 6:
                    echo '<option value="3" selected>Inadequate Working Tools</option>';
                    break;
                case 4:
                    echo '<option value="2" selected>Inadequate Staff Welfare</option>';
                    break;
                case 2:
                    echo '<option value="1" selected>Unfriendly Team</option>';
                    break;
                default:
                    echo '<option value="" selected>Select</option>';
            }
        } 
                            ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <?php
        if (!empty($confident1)) {
            switch ($confident1) {
                case 10:
                    echo '<option value="5" selected>Awareness and firm adherence of confidentiality policies and procedures</option>';
                    break;
                case 8:
                    echo '<option value="4" selected>Adherence to confidentiality protocols</option>';
                    break;
                case 6:
                    echo '<option value="3" selected>Handling of sensitive information</option>';
                    break;
                case 4:
                    echo '<option value="2" selected>Awareness of the consequences of breaches in confidentiality</option>';
                    break;
                case 2:
                    echo '<option value="1" selected>Poor confidentiality practices</option>';
                    break;
                default:
                    echo '<option value="" selected>Select</option>';
            }
        } 
                            ?>
                        </td>
                      
                        <td class="px-6 py-4 whitespace-nowrap">
                        <?php
        if (!empty($ability1)) {
            switch ($ability1) {
                case 10:
                    echo '<option value="5" selected>Capacity to remain calm</option>';
                    break;
                case 8:
                    echo '<option value="4" selected>Staying focused</option>';
                    break;
                case 6:
                    echo '<option value="3" selected>Making informed decision</option>';
                    break;
                case 4:
                    echo '<option value="2" selected>Reduced creativity</option>';
                    break;
                case 2:
                    echo '<option value="1" selected>Poor performance</option>';
                    break;
                default:
                    echo '<option value="" selected>Select</option>';
            }
        }
                            ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <?php
        if (!empty($adaptation1 )) {
            switch ($adaptation1 ) {
                case 10:
                    echo '<option value="5" selected>Commitment to the College’s Mission and Vision</option>';
                    break;
                case 8:
                    echo '<option value="4" selected>Understanding the College’s Mission  and Vision</option>';
                    break;
                case 6:
                    echo '<option value="3" selected>Willingness to adjust to new policies and procedures of the College</option>';
                    break;
                case 4:
                    echo '<option value="2" selected>Aware but inconsistent with college\'s Mission</option>';
                    break;
                case 2:
                    echo '<option value="1" selected>Nonchalant about the college\'s vision and Mission</option>';
                    break;
                default:
                    echo '<option value="" selected>Select</option>';
            }
        } 
                            ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <?php
        if (!empty($respect1)) {
            switch ($respect1) {
                case 10:
                    echo '<option value="5" selected>Compliance with policies and Regulations</option>';
                    break;
                case 8:
                    echo '<option value="4" selected>Adherence to directives</option>';
                    break;
                case 6:
                    echo '<option value="3" selected>Fairly compliant with policies</option>';
                    break;
                case 4:
                    echo '<option value="2" selected>Disregard towards constituted authority</option>';
                    break;
                case 2:
                    echo '<option value="1" selected>Bad attitude towards authority figures</option>';
                    break;
                default:
                    echo '<option value="" selected>Select</option>';
            }
        }
                            ?>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                        <?php
        if (!empty($care1)) {
            switch ($care1) {
                case 10:
                    echo '<option value="5" selected>Responsible use of resources</option>';
                    break;
                case 8:
                    echo '<option value="4" selected>Adherence to maintenance protocols</option>';
                    break;
                case 6:
                    echo '<option value="3" selected>Prevention of damage or loss</option>';
                    break;
                case 4:
                    echo '<option value="2" selected>Misuse of facilities, equipment, or resources</option>';
                    break;
                case 2:
                    echo '<option value="1" selected>Complete negligence</option>';
                    break;
                default:
                    echo '<option value="" selected>Select</option>';
            }
        } 
                            ?>
                        </td>
     
                        <td class="px-6 py-4 whitespace-nowrap">
                        <a href="editrate.php?staffid=<?php echo $staffid; ?>" class="px-4 py-2 bg-green-400 text-white rounded-md hover:bg-blue-400 focus:outline-none focus:bg-blue-400">EDIT</a>
                    </td>
      </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                        <?php echo $roundedPercentage; ?>%
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap"><?php echo $grade;?></td>
                    </tr>
                    <?php $count++;} ?> 
                </tbody>
            </table>
        </div>

        <div class="mt-12">
             <a href="logout.php" class="px-4 py-2 bg-red-400 text-white rounded-md hover:bg-red-400 focus:outline-none focus:bg-red-400">LOGOUT</a>
        </div>
    </div>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include DataTables JavaScript -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
        // Initialize DataTable
        $(document).ready(function() {
            $('#performanceTable').DataTable();
        });
    </script>
<div>
<footer class="text-center mt-8 text-xs text-gray-600">&copy; <?php echo date("Y"); ?> CITM. All rights reserved.</footer></div>
    </body>

</html>
