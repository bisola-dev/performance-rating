<?php
    include_once "connection.php";
    include_once "constants.php";
    include_once "check.php";
    

    if (isset($_POST["next"])) {
        $punctuality = mysqli_real_escape_string($conn, $_POST['punctuality']);
        $absent = mysqli_real_escape_string($conn, $_POST['absent']);
        $attitude = mysqli_real_escape_string($conn, $_POST['attitude']);
        $quality = mysqli_real_escape_string($conn, $_POST['quality']);
        $record = mysqli_real_escape_string($conn, $_POST['record']);
        $competence = mysqli_real_escape_string($conn, $_POST['competence']);
        $diligence = mysqli_real_escape_string($conn, $_POST['diligence']);
        $loyalty = mysqli_real_escape_string($conn, $_POST['loyalty']);
        $promptness = mysqli_real_escape_string($conn, $_POST['promptness']);
        $tmanagement = mysqli_real_escape_string($conn, $_POST['tmanagement']);
        $willing = mysqli_real_escape_string($conn, $_POST['willing']);
        $innovate = mysqli_real_escape_string($conn, $_POST['innovate']);
        $courteous = mysqli_real_escape_string($conn, $_POST['courteous']);
        $honesty = mysqli_real_escape_string($conn, $_POST['honesty']);
        $leader = mysqli_real_escape_string($conn, $_POST['leader']);
        $confident = mysqli_real_escape_string($conn, $_POST['confident']);
        $ability = mysqli_real_escape_string($conn, $_POST['ability']);
        $adapt = mysqli_real_escape_string($conn, $_POST['adapt']);
        $respect = mysqli_real_escape_string($conn, $_POST['respect']);
        $care = mysqli_real_escape_string($conn, $_POST['care']);
        $constraint = mysqli_real_escape_string($conn, $_POST['constraint']);
    
    
        // check for empty field  
      if($punctuality == "" || $absent == "" || $attitude == "" || $quality == "" || $record == "" || $competence == "" || $diligence == "" || $loyalty== "" || $promptness== "" || $tmanagement== "" || $willing == "" || $innovate == "" || $courteous == "" || $honesty == "" || $leader == "" || $confident == "" || $ability == "" || $adapt== "" || $respect== "" || $care== "" || $constraint == "") {
    
        //Be sure that all the fields are filled then proceed
        echo '<script>alert("You have to fill in ALL the fields correctly to proceed")</script>';
            
      //checking for at least 8 characters in the password
          } else {   

        $insert=  mysqli_query($conn,"INSERT INTO  performance (staff_id,dele, punctuality , absenteeism, attitude,quality,record,competence,diligence,loyalty,promptness,tmanagement,willingness,innovative,courteous,honesty,leadership,confident,ability,adaptation,respect,care,constrainnt, date_reg,ratedby) VALUES ('$staffid',1,$punctuality,$absent,$attitude,$quality,$record,$competence,$diligence,$loyalty,$promptness,$tmanagement,$willing,$innovate,$courteous,$honesty,$leader,$confident,$ability,$adapt,$respect,$care,$constraint,'$grisland','$sesstaffid')");
            if ( $insert === true) {
                // Insertion failed
                echo '<script>alert("Record inserted successfully.");
                      window.location.href="viewrating.php?staffid=' . $staffid . '";
                      </script>';
                
                 } else {
                    echo '<script type="text/javascript">
                    alert("Incomplete submission ,Please try again");
                         </script>';
                
                
            }
        }
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
<body class="bg-gradient-to-b from-green-100 to-green-300 min-h-screen flex justify-center items-center p-4">
<div class="container mx-auto">
    <div class="mt-4">
    <a href="dashboard.php" class="inline-block px-2 py-1 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 focus:outline-none focus:bg-gray-400">Back to Dashboard</a>
</div>
        <div class="">
            <h3 class="text-2xl font-semibold mb-8 text-center">PERFORMANCE RATING INDICATORS</h3>
        </div>
        
        <h4 class="text-2xl font-semibold mb-6 text-center text-red-700 underline">Please use the rating parameters below to rate <?php echo $sestaffulln.' || '.$staffid.'||'. $sestafranc;?></h4>
         <div>
        <form method="POST" class="max-w-4xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-4">
            
                <!-- First column -->
               
                <div>
    <label for="punctuality" class="block text-sm font-medium text-gray-700">Punctuality</label>
    <select id="punctuality" name="punctuality" class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        <?php
        if (!empty($punctuality1)) {
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
                    echo '<option value="4" selected>Needs improvement</option>';
                    break;
                case 2:
                    echo '<option value="4" selected>Poor</option>';
                    break;
                default:
                    echo '<option value="" selected>Select</option>';
            }
        } else {
            echo '<option value="" selected>Select</option>';
        }
        ?>
        <option value="5">Timely</option>
        <option value="4">Regularly</option>
        <option value="3">Usually</option>
        <option value="2">Needs improvement</option>
        <option value="1">Poor</option>
    </select>
</div>

<div>
    <label for="absenteeism" class="block text-sm font-medium text-gray-700">Absenteeism</label>
    <select id="absenteeism" name="absent" class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
        } else {
            echo '<option value="" selected>Select</option>';
        }
        ?>
        <option value="5">rarely never missing work</option>
        <option value="4">Infrequent and typically occur for legitimate reasons</option>
        <option value="3">Sometimes but within reasonable limits</option>
        <option value="2">Often without valid reasons</option>
        <option value="1">Misses work daily</option>
    </select>
</div>


<div>
    <label for="attitude" class="block text-sm font-medium text-gray-700">Attitude to Work</label>
    <select id="attitude" name="attitude" class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
        } else {
            echo '<option value="" selected>Select</option>';
        }
        ?>
        <option value="5">Committed</option>
        <option value="4">dutiful</option>
        <option value="3">fairly committed</option>
        <option value="4">Lazy</option>
        <option value="4">unscrupulous</option>
    </select>
</div>


<div>
    <label for="quality" class="block text-sm font-medium text-gray-700">Quality of Work Output</label>
    <select id="quality" name="quality" class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
        } else {
            echo '<option value="" selected>Select</option>';
        }
        ?>
        <option value="5">Accuracy</option>
        <option value="4">Completeness</option>
        <option value="3">Relevance</option>
        <option value="2">Timeliness</option>
        <option value="1">lack of precision</option>
    </select>
</div>

<div>
    <label for="record" class="block text-sm font-medium text-gray-700">Record Keeping</label>
    <select id="record" name="record" class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
        } else {
            echo '<option value="" selected>Select</option>';
        }
        ?>
        <option value="5">Records Inventory and Classification</option>
        <option value="4">Records Retention and Scheduling</option>
        <option value="3">Disaster Prevention Programme</option>
        <option value="2">Disposition</option>
        <option value="1">Archive</option>
    </select>
</div>
<div>
    <label for="competence" class="block text-sm font-medium text-gray-700">Competence</label>
    <select id="competence" name="competence" class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
        } else {
            echo '<option value="" selected>Select</option>';
        }
        ?>
        <option value="5">Knowledge - experience</option>
        <option value="4">Communication skills</option>
        <option value="3">problem solving /technical skills</option>
        <option value="2">Adaptability-efficient</option>
        <option value="1">Inept</option>
    </select>
</div>

<div>
    <label for="diligence" class="block text-sm font-medium text-gray-700">Diligence</label>
    <select id="diligence" name="diligence" class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
        } else {
            echo '<option value="" selected>Select</option>';
        }
        ?>
        <option value="5">Dutiful</option>
        <option value="4">Tenacious</option>
        <option value="3">Painstaking</option>
        <option value="2">Sloppy</option>
        <option value="1">Indifference</option>
    </select>
</div>
<div>
    <label for="loyalty" class="block text-sm font-medium text-gray-700">Loyalty to Organization</label>
    <select id="loyalty" name="loyalty" class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
        } else {
            echo '<option value="" selected>Select</option>';
        }
        ?>
        <option value="5">Ability to Portray the College in good Light --representativeness</option>
        <option value="4">Integrity</option>
        <option value="3">Satisfactory</option>
        <option value="2">Fickle</option>
        <option value="1">Disloyal</option>
    </select>
</div>

<div class="mb-4">
    <label for="promptness" class="block text-sm font-medium text-gray-700">Prompt Response to Task</label>
    <select id="promptness" name="promptness" class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
        } else {
            echo '<option value="" selected>Select</option>';
        }
        ?>
        <option value="5">Adequately timely</option>
        <option value="4">Prioritization</option>
        <option value="3">Fairly timely</option>
        <option value="2">Sluggish</option>
        <option value="1">Lax</option>
    </select>
</div>

              <div class="mb-4">
    <label for="time-management" class="block text-sm font-medium text-gray-700">Time Management</label>
    <select id="time-management" name="tmanagement" class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
        } else {
            echo '<option value="" selected>Select</option>';
        }
        ?>
        <option value="5">Organised</option>
        <option value="4">Delegate work with authority</option>
        <option value="3">Update superior about happenings</option>
        <option value="2">Time negligent</option>
        <option value="1">Time chaos</option>
    </select>
</div>

<div>
    <label for="willingness" class="block text-sm font-medium text-gray-700">Willingness to do Extra Task</label>
    <select id="willingness" name="willing" class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
        } else {
            echo '<option value="" selected>Select</option>';
        }
        ?>
        <option value="5">Eagerness for tasks beyond their regular duties</option>
        <option value="4">Enthusiastic</option>
        <option value="3">Interested</option>
        <option value="2">Sometimes enthusiastic</option>
        <option value="1">Not enthusiastic</option>
    </select>
</div>


<div>
    <label for="innovate" class="block text-sm font-medium text-gray-700">Innovative</label>
    <select id="innovate" name="innovate" class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
        } else {
            echo '<option value="" selected>Select</option>';
        }
        ?>
        <option value="5">Proactive Novelty - Originality</option>
        <option value="4">Willingness to take calculated risks</option>
        <option value="3">Creativity</option>
        <option value="2">Improvise - Proactivity</option>
        <option value="1">Adaptability</option>
    </select>
</div>

<div>
    <label for="courteous" class="block text-sm font-medium text-gray-700">Courteous</label>
    <select id="courteous" name="courteous" class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
        } else {
            echo '<option value="" selected>Select</option>';
        }
        ?>
        <option value="5">Politeness</option>
        <option value="4">Pleasant</option>
        <option value="3">Active listening</option>
        <option value="2">Empathy</option>
        <option value="1">Impolite</option>
    </select>
</div>
<div>
    <label for="honesty" class="block text-sm font-medium text-gray-700">Honesty</label>
    <select id="honesty" name="honesty" class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
        } else {
            echo '<option value="" selected>Select</option>';
        }
        ?>
        <option value="5">Genuine - truthfulness</option>
        <option value="4">Reliable</option>
        <option value="3">Transparent</option>
        <option value="2">Fairly transparent</option>
        <option value="1">Dishonest</option>
    </select>
</div>
<div>
    <label for="leader" class="block text-sm font-medium text-gray-700">Leadership Trait</label>
    <select id="leader" name="leader" class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
        } else {
            echo '<option value="" selected>Select</option>';
        }
        ?>
        <option value="5">Good listener - communication</option>
        <option value="4">Knowledgeable - strategic thinking</option>
        <option value="3">Empathy - ability to inspire and motivate others.</option>
        <option value="2">Fairly suitable</option>
        <option value="1">Unsuitable</option>
    </select>
</div>
<div>
    <label for="constraint" class="block text-sm font-medium text-gray-700">Constraint</label>
    <select id="constraint" name="constraint" class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
        } else {
            echo '<option value="" selected>Select</option>';
        }
        ?>
        <option value="5">Epileptic Power Supply</option>
        <option value="4">Work Environment not Conducive</option>
        <option value="3">Inadequate Working Tools</option>
        <option value="2">Inadequate Staff Welfare</option>
        <option value="1">Unfriendly Team</option>
    </select>
</div>

<div>
    <label for="confident" class="block text-sm font-medium text-gray-700">Confidentiality</label>
    <select id="confident" name="confident" class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
        } else {
            echo '<option value="" selected>Select</option>';
        }
        ?>
        <option value="5">Awareness and firm adherence of confidentiality policies and procedures</option>
        <option value="4">Adherence to confidentiality protocols</option>
        <option value="3">Handling of sensitive information</option>
        <option value="2">Awareness of the consequences of breaches in confidentiality</option>
        <option value="1">Poor confidentiality practices</option>
    </select>
</div>
<div>
    <label for="ability" class="block text-sm font-medium text-gray-700">Ability to Work Under Pressure</label>
    <select id="ability" name="ability" class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
        } else {
            echo '<option value="" selected>Select</option>';
        }
        ?>
        <option value="5">Capacity to remain calm</option>
        <option value="4">Staying focused</option>
        <option value="3">Making informed decision</option>
        <option value="2">Reduced creativity</option>
        <option value="1">Poor performance</option>
    </select>
</div>
<div>
    <label for="adapt" class="block text-sm font-medium text-gray-700">Adaptation to College Mission/Vision</label>
    <select id="adapt" name="adapt" class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        <?php
        if (!empty($adaptation1)) {
            switch ($adaptation1) {
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
        } else {
            echo '<option value="" selected>Select</option>';
        }
        ?>
        <option value="5">Commitment to the College’s Mission and  Vision</option>
        <option value="4">Understanding the College’s Mission and  Vision</option>
        <option value="3">Willingness to adjust to new policies and procedures of the College</option>
        <option value="2">Aware but inconsistent with college's Mission</option>
        <option value="1">Nonchalant about the college's vision and Mission</option>
    </select>
</div>

<div>
    <label for="respect" class="block text-sm font-medium text-gray-700">Respect to Constituted Authority</label>
    <select id="respect" name="respect" class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
        } else {
            echo '<option value="" selected>Select</option>';
        }
        ?>
        <option value="5">Compliance with policies and Regulations</option>
        <option value="4">Adherence to directives</option>
        <option value="3">Fairly compliant with policies</option>
        <option value="2">Disregard towards constituted authority</option>
        <option value="1">Bad attitude towards authority figures</option>
                        </select>
                    </div>
                    <div>

<div>
    <label for="care" class="block text-sm font-medium text-gray-700">Care for College Properties/Assets</label>
    <select id="care" name="care" class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
        } else {
            echo '<option value="" selected>Select</option>';
        }
        ?>
        <option value="5">Responsible use of resources</option>
        <option value="4">Adherence to maintenance protocols</option>
        <option value="3">Prevention of damage or loss</option>
        <option value="2">Misuse of facilities, equipment, or resources</option>
        <option value="1">Complete negligence</option>
    </select>
</div>
</div>
</div>
<div class="text-right">
    <button type="submit" name="next" class="px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600">SUBMIT</button>
</div>
      
        </form> 
        <footer class="text-center mt-8 text-xs text-gray-600">&copy; <?php echo date("Y"); ?> CITM. All rights reserved.</footer>
        </div>  
    </div> 
    
</body>
</html>