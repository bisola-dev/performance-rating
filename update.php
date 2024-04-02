<?php
    include_once "connection.php";
    include_once "constants.php";
    

    $nextlink = 'viewrating.php?id='.$sestaffid;

    if (isset($_POST["updateme"])) {
        // Check if each POST variable is set before using it 
        $punctualityy = isset($_POST['punctualityy']) ? mysqli_real_escape_string($conn, $_POST['punctualityy']) : '';
        $absentt = isset($_POST['absentt']) ? mysqli_real_escape_string($conn, $_POST['absentt']) : '';
        $attitudee = isset($_POST['attitudee']) ? mysqli_real_escape_string($conn, $_POST['attitudee']) : '';
        $qualityy = isset($_POST['qualityy']) ? mysqli_real_escape_string($conn, $_POST['qualityy']) : '';
        $recordd = isset($_POST['recordd']) ? mysqli_real_escape_string($conn, $_POST['recordd']) : '';
        $competencee = isset($_POST['competencee']) ? mysqli_real_escape_string($conn, $_POST['competencee']) : '';
        $deligencee = isset($_POST['deligencee']) ? mysqli_real_escape_string($conn, $_POST['deligencee']) : '';
        $loyaltyy = isset($_POST['loyaltyy']) ? mysqli_real_escape_string($conn, $_POST['loyaltyy']) : '';
        $promptt = isset($_POST['promptt']) ? mysqli_real_escape_string($conn, $_POST['promptt']) : '';
        $timemgt = isset($_POST['timemgt']) ? mysqli_real_escape_string($conn, $_POST['timemgt']) : '';
        $willingg = isset($_POST['willingg']) ? mysqli_real_escape_string($conn, $_POST['willingg']) : '';
        $innovatee = isset($_POST['innovatee']) ? mysqli_real_escape_string($conn, $_POST['innovatee']) : '';
        $courteouss = isset($_POST['courteouss']) ? mysqli_real_escape_string($conn, $_POST['courteouss']) : '';
        $honestyy = isset($_POST['honestyy']) ? mysqli_real_escape_string($conn, $_POST['honestyy']) : '';
        $leaderr = isset($_POST['leaderr']) ? mysqli_real_escape_string($conn, $_POST['leaderr']) : '';
        $constraintt = isset($_POST['constraintt']) ? mysqli_real_escape_string($conn, $_POST['constraintt']) : '';
        $confidentt = isset($_POST['confidentt']) ? mysqli_real_escape_string($conn, $_POST['confidentt']) : '';
        $abilityy = isset($_POST['abilityy']) ? mysqli_real_escape_string($conn, $_POST['abilityy']) : '';
        $adaptt = isset($_POST['adaptt']) ? mysqli_real_escape_string($conn, $_POST['adaptt']) : '';
        $respectt = isset($_POST['respectt']) ? mysqli_real_escape_string($conn, $_POST['respectt']) : '';
        $caree = isset($_POST['caree']) ? mysqli_real_escape_string($conn, $_POST['caree']) : '';


    // Check if at least one field is set before performing the update
    if ($punctualityy != '' || $absentt != '' || $attitudee != ''  || $qualityy != '' || $recordd != '' || $competencee != '' || $deligencee != '' || $loyaltyy != '' || $promptt != '' || $timemgt != '' || $willingg != '' || $innovatee != '' || $courteouss != '' || $honestyy != '' || $leaderr != '' || $constraintt != '' || $confidentt != '' || $abilityy != '' || $adaptt != '' || $respectt != '' || $caree != '') {
        // Construct the UPDATE query dynamically based on the fields that are set
        $update_query = "UPDATE performance SET ";
        $fields_to_update = array();
        if ($punctualityy != '') $fields_to_update[] = "punctuality = $punctualityy";
        if ($absentt != '') $fields_to_update[] = "absenteeism = $absentt";
        if ($attitudee != '') $fields_to_update[] = "attitude = $attitudee";
        if ($qualityy != '') $fields_to_update[] = "quality = $qualityy";
        if ($recordd != '') $fields_to_update[] = "record = $recordd";
        if ($competencee != '') $fields_to_update[] = "competence = $competencee";
        if ($deligencee != '') $fields_to_update[] = "deligence = $deligencee";
        if ($loyaltyy != '') $fields_to_update[] = "loyalty = $loyaltyy";
        if ($promptt != '') $fields_to_update[] = "promptness = $promptt";
        if ($timemgt != '') $fields_to_update[] = "tmanagement = $timemgt";
        if ($willingg != '') $fields_to_update[] = "willingness = $willingg";
        if ($innovatee != '') $fields_to_update[] = "innovative = $innovatee";
        if ($courteouss != '') $fields_to_update[] = "courteous = $courteouss";
        if ($honestyy != '') $fields_to_update[] = "honesty = $honestyy";
        if ($leaderr != '') $fields_to_update[] = "leadership = $leaderr";
        if ($constraintt != '') $fields_to_update[] = "constrainnt = $constraintt";
        if ($confidentt != '') $fields_to_update[] = "confident = $confidentt";
        if ($abilityy != '') $fields_to_update[] = "ability = $abilityy";
        if ($adaptt != '') $fields_to_update[] = "adaptation = $adaptt";
        if ($respectt != '') $fields_to_update[] = "respect = $respectt";
        if ($caree != '') $fields_to_update[] = "care = $caree";
        // Add other fields here

        $update_query .= implode(", ", $fields_to_update);
        $update_query .= " WHERE staff_id = '$sestaffid'";

        // Execute the update query
        $doupdate = mysqli_query($conn, $update_query);

        if ($doupdate) {
            echo '<script>alert("Record updated successfully.")</script>';
        } else {
            echo '<script>alert("Error updating record.")</script>';
        }
    } else {
        echo '<script>alert("Please select at least one option to update.")</script>';
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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-b from-green-100 to-green-300 min-h-screen flex justify-center items-center p-4">
    <div class="container mx-auto">
        <div class="">
            <h3 class="text-2xl p-4 font-semibold mb-4 text-center">PERFORMANCE RATING INDICATORS</h3>
        </div>
        <h4 class="text-2xl font-semibold mb-8 text-center text-red-700 underline"><?php echo $sesuser.' '.$sestaffid; ?></h4>

        <form method="POST" class="max-w-4xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-4">
            <div>
                    <!-- Punctuality -->
                
                    <label for="punctuality" class="block text-sm font-medium text-gray-700">Punctuality</label>
                    <select id="punctuality" name="punctualityy" class="mt-1 p-2 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">
                            <?php if (!empty($punctuality1)){
                                if ($punctuality1 == 10) {
                                        echo "Excellent";
                                    } elseif($punctuality1 == 8) {
                                        echo "Good";
                                    } else if ($punctuality1 == 5) {
                                        echo "Average";
                                    } else {
                                        echo "poor";
                                            }
                                    } 
                                ?>
                        </option>
                        <option value="10">Excellent</option>
                        <option value="8">Good</option>
                        <option value="5">Fair</option>
                        <option value="2">Poor</option>
                    </select>
                </div>
                <!-- Absenteeism -->
                <div>
                    <label for="absenteeism" class="block text-sm font-medium text-gray-700">Absenteeism</label>
                    <select id="absenteeism" name="absentt" class="mt-1 p-2 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                         <option value=""><?php if (!empty($absenteeism1)){
                                if ($absenteeism1 == 10) {
                                        echo "Excellent";
                                    } else if ($absenteeism1 == 8) {
                                        echo "Good";
                                    } else if ($absenteeism1 == 5) {
                                        echo "Average";
                                    } else {
                                        echo "poor";
                                    }
                                } 
                            ?>
                                    
                            </option>
                        <option value="10">Excellent</option>
                        <option value="8">Good</option>
                        <option value="5">Average</option>
                        <option value="2">Poor</option>
                    </select>
                </div>
                <!-- Attitude to Work -->
                <div>
                    <label for="attitude" class="block text-sm font-medium text-gray-700">Attitude to Work</label>
                    <select id="attitude" name="attitudee" class="mt-1 p-2 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                          <option value="">
                            <?php 
                                if (!empty($attitude1))
                                {
                                    if ($attitude1 == 10) {
                                        echo "Excellent";
                                    } else if ($attitude1 == 8) {
                                        echo "Good";
                                    } else if ($attitude1 == 5) {
                                        echo "Average";
                                    } else {
                                        echo "poor";
                                    }
                                } 
                            ?>  
                            </option>
                        <option value="10">Excellent</option>
                        <option value="8">Good</option>
                        <option value="5">Fair</option>
                        <option value="2">Poor</option>
                    </select>
                </div>
                <!-- Quality of Work Output -->
                <div>
                    <label for="quality" class="block text-sm font-medium text-gray-700">Quality of Work Output</label>
                    <select id="quality" name="qualityy" class="mt-1 p-2 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">
                            <?php 
                                if (!empty($quality1))
                                    {
                                        if ($quality1 == 10) {
                                            echo "Excellent";
                                        } else if ($quality1 == 8) {
                                            echo "Good";
                                        } else if ($quality1 == 5) {
                                            echo "Average";
                                        } else {
                                            echo "poor";
                                        }
                                    } 
                            ?>
                                
                        </option>
                        <option value="10">Excellent</option>
                        <option value="8">Good</option>
                        <option value="5">Fair</option>
                        <option value="2">Poor</option>
                    </select>
                </div>
                <!-- Record keeping -->
                <div>
                    <label for="record" class="block text-sm font-medium text-gray-700">Record Keeping</label>
                    <select id="record" name="recordd" class="mt-1 p-2 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                     <option value="">
                                <?php 
                                    if (!empty($record1))
                                        {
                                            if ($record1 == 10) {
                                                echo "Excellent";
                                            } else if ($record1 == 8) {
                                                echo "Good";
                                            } else if ($record1 == 5) {
                                                echo "Average";
                                            } else {
                                                echo "poor";
                                            }
                                        } 
                                ?>
                            </option>
                        <option value="10">Excellent</option>
                        <option value="8">Good</option>
                        <option value="5">Fair</option>
                        <option value="2">Poor</option>
                    </select>
                </div>
                <!-- Competence -->
                <div>
                    <label for="competence" class="block text-sm font-medium text-gray-700">Competence</label>
                    <select id="competence" name="competencee" class="mt-1 p-2 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">
                            <?php 
                                if (!empty($competence1))
                                    {
                                        if ($competence1 == 10) {
                                            echo "Excellent";
                                        } else if ($competence1 == 8) {
                                            echo "Good";
                                        } else if ($competence1 == 5) {
                                            echo "Average";
                                        } else {
                                            echo "poor";
                                        }
                                    } 
                            ?>
                        </option> 
                        <option value="10">Excellent</option>
                        <option value="8">Good</option>
                        <option value="5">Fair</option>
                        <option value="2">Poor</option>
                    </select>
                </div>
                <!-- Diligence -->
                <div>
                    <label for="deligence" class="block text-sm font-medium text-gray-700">Deligence</label>
                    <select id="deligence" name="deligencee" class="mt-1 p-2 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">
                            <?php 
                                if (!empty($deligence1))
                                    {
                                        if ($deligence1 == 10) {
                                            echo "Excellent";
                                        } else if ($deligence1 == 8) {
                                            echo "Good";
                                        } else if ($deligence1 == 5) {
                                            echo "Average";
                                        } else {
                                            echo "poor";
                                        }
                                    } 
                            ?>
                        </option>
                        <option value="10">Excellent</option>
                        <option value="8">Good</option>
                        <option value="5">Fair</option>
                        <option value="2">Poor</option>
                    </select>
                </div>
                <!-- Loyalty to Organization -->
                <div>
                    <label for="loyalty" class="block text-sm font-medium text-gray-700">Loyalty to Organization</label>
                    <select id="loyalty" name="loyaltyy" class="mt-1 p-2 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">
                            <?php 
                                if (!empty($loyalty1))
                                    {
                                        if ($loyalty1 == 10) {
                                            echo "Excellent";
                                        } else if ($loyalty1 == 8) {
                                            echo "Good";
                                        } else if ($loyalty1 == 5) {
                                            echo "Average";
                                        } else {
                                            echo "poor";
                                        }
                                    } 
                            ?>
                                
                        </option> 
                        <option value="10">Excellent</option>
                        <option value="8">Good</option>
                        <option value="5">Fair</option>
                        <option value="2">Poor</option>
                    </select>
                </div>
                <!-- Prompt Response to Task -->
                <div>
                    <label for="promptness" class="block text-sm font-medium text-gray-700">Prompt Response to Task</label>
                    <select id="promptness" name="promptt" class="mt-1 p-2 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">
                            <?php 
                                if (!empty($promptness1))
                                    {
                                        if ($promptness1 == 10) {
                                            echo "Excellent";
                                        } else if ($promptness1 == 8) {
                                            echo "Good";
                                        } else if ($promptness1 == 5) {
                                            echo "Average";
                                        } else {
                                            echo "poor";
                                        }
                                    } 
                            ?>
                        </option>
                        <option value="10">Excellent</option>
                        <option value="8">Good</option>
                        <option value="5">Fair</option>
                        <option value="2">Poor</option>
                    </select>
                </div>
                <!-- Time Management -->
                <div>
                    <label for="time-management" class="block text-sm font-medium text-gray-700">Time Management</label>
                    <select id="time-management" name="timemgt" class="mt-1 p-2 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">   
                            <?php 
                                if (!empty($management1))
                                    {
                                        if ($management1 == 10) {
                                            echo "Excellent";
                                        } else if ($management1 == 8) {
                                            echo "Good";
                                        } else if ($management1 == 5) {
                                            echo "Average";
                                        } else {
                                            echo "poor";
                                        }
                                    } 
                            ?>
                        </option> 
                        <option value="10">Excellent</option>
                        <option value="8">Good</option>
                        <option value="5">Fair</option>
                        <option value="2">Poor</option>
                    </select>
                </div>
                <!-- Willingness to do Extra Task -->
                <div>
                    <label for="willingness" class="block text-sm font-medium text-gray-700">Willingness to do Extra Task</label>
                    <select id="willingness" name="willingg" class="mt-1 p-2 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">
                            <?php 
                                if (!empty($willingness1))
                                    {
                                        if ($willingness1 == 10) {
                                            echo "Excellent";
                                        } else if ($willingness1 == 8) {
                                            echo "Good";
                                        } else if ($willingness1 == 5) {
                                            echo "Average";
                                        } else {
                                            echo "poor";
                                        }
                                    } 
                            ?>
                        </option>
                        <option value="10">Excellent</option>
                        <option value="8">Good</option>
                        <option value="5">Fair</option>
                        <option value="2">Poor</option>
                    </select>
                </div>
                <!-- Innovative -->
                <div>
                    <label for="innovate" class="block text-sm font-medium text-gray-700">Innovative</label>
                    <select id="innovate" name="innovatee" class="mt-1 p-2 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">
                            <?php 
                                if (!empty($innovative1))
                                    {
                                        if ($innovative1 == 10) {
                                            echo "Excellent";
                                        } else if ($innovative1 == 8) {
                                            echo "Good";
                                        } else if ($innovative1 == 5) {
                                            echo "Average";
                                        } else {
                                            echo "poor";
                                        }
                                    } 
                            ?>
                        </option>
                        <option value="10">Excellent</option>
                        <option value="8">Good</option>
                        <option value="5">Fair</option>
                        <option value="2">Poor</option>
                    </select>
                </div>
                <!-- Courteous -->
                <div>
                    <label for="courteous" class="block text-sm font-medium text-gray-700">Courteous</label>
                    <select id="courteous" name="courteouss" class="mt-1 p-2 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">
                            <?php 
                                if (!empty($courteous1))
                                    {
                                        if ($courteous1 == 10) {
                                            echo "Excellent";
                                        } else if ($courteous1 == 8) {
                                            echo "Good";
                                        } else if ($courteous1 == 5) {
                                            echo "Average";
                                        } else {
                                            echo "poor";
                                        }
                                    } 
                            ?>
                        </option>
                        <option value="10">Excellent</option>
                        <option value="8">Good</option>
                        <option value="5">Fair</option>
                        <option value="2">Poor</option>
                    </select>
                </div>
                <!-- Honesty -->
                <div>
                    <label for="honesty" class="block text-sm font-medium text-gray-700">Honesty</label>
                    <select id="honesty" name="honestyy" class="mt-1 p-2 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">
                            <?php 
                                if (!empty($honesty1))
                                    {
                                        if ($honesty1 == 10) {
                                            echo "Excellent";
                                        } else if ($honesty1 == 8) {
                                            echo "Good";
                                        } else if ($honesty1 == 5) {
                                            echo "Average";
                                        } else {
                                            echo "poor";
                                        }
                                    } 
                            ?>
                        </option>
                        <option value="10">Excellent</option>
                        <option value="8">Good</option>
                        <option value="5">Fair</option>
                        <option value="2">Poor</option>
                    </select>
                </div>
                <!-- Leadership Trait -->
                <div>
                    <label for="leader" class="block text-sm font-medium text-gray-700">Leadership Trait</label>
                    <select id="leader" name="leaderr" class="mt-1 p-2 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">
                            <?php 
                                if (!empty($leadership1))
                                    {
                                        if ($leadership1 == 10) {
                                            echo "Excellent";
                                        } else if ($leadership1 == 8) {
                                            echo "Good";
                                        } else if ($leadership1 == 5) {
                                            echo "Average";
                                        } else {
                                            echo "poor";
                                        }
                                    } 
                            ?>
                                </option>
                        <option value="10">Excellent</option>
                        <option value="8">Good</option>
                        <option value="5">Fair</option>
                        <option value="2">Poor</option>
                    </select>
                </div>
                <!-- Constraint -->
                <div>
                    <label for="constraint" class="block text-sm font-medium text-gray-700">Constraint</label>
                    <select id="constraint" name="constraintt" class="mt-1 p-2 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">
                            <?php 
                                if (!empty($constraint1))
                                    {
                                        if ($constraint1 == 10) {
                                            echo "Excellent";
                                        } else if ($constraint1 == 8) {
                                            echo "Good";
                                        } else if ($constraint1 == 5) {
                                            echo "Average";
                                        } else {
                                            echo "poor";
                                        }
                                    } 
                            ?>
                        </option>
                        <option value="10">Excellent</option>
                        <option value="8">Good</option>
                        <option value="5">Fair</option>
                        <option value="2">Poor</option>
                    </select>
                </div>
                <!-- confidentiality -->
                <div>
                    <label for="confident" class="block text-sm font-medium text-gray-700">confidentiality</label>
                    <select id="confident" name="confidentt" class="mt-1 p-2 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">
                            <?php 
                                if (!empty($confident1))
                                    {
                                        if ($confident1 == 10) {
                                            echo "Excellent";
                                        } else if ($confident1 == 8) {
                                            echo "Good";
                                        } else if ($confident1 == 5) {
                                            echo "Average";
                                        } else {
                                            echo "poor";
                                        }
                                    } 
                            ?>
                        </option>
                        <option value="10">Excellent</option>
                        <option value="8">Good</option>
                        <option value="5">Fair</option>
                        <option value="2">Poor</option>
                    </select>
                </div>
                <!-- Ability to work under Pressure -->
                <div>
                    <label for="ability" class="block text-sm font-medium text-gray-700">Ability to work under Pressure</label>
                    <select id="ability" name="abilityy" class="mt-1 p-2 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">
                            <?php 
                                if (!empty($ability1))
                                    {
                                        if ($ability1 == 10) {
                                            echo "Excellent";
                                        } else if ($ability1 == 8) {
                                            echo "Good";
                                        } else if ($ability1 == 5) {
                                            echo "Average";
                                        } else {
                                            echo "poor";
                                        }
                                    } 
                            ?>
                        </option>
                        <option value="10">Excellent</option>
                        <option value="8">Good</option>
                        <option value="5">Fair</option>
                        <option value="2">Poor</option>
                    </select>
                </div>
                <!-- Adaptation to College Mission/Vision -->
                <div>
                    <label for="adapt" class="block text-sm font-medium text-gray-700">Adaptation to College Mission/Vision</label>
                    <select id="adapt" name="adaptt" class="mt-1 p-2 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">
                            <?php 
                                if (!empty($adaptation1))
                                    {
                                        if ($adaptation1 == 10) {
                                            echo "adapt";
                                        } else if ($adaptation1 == 8) {
                                            echo "Good";
                                        } else if ($adaptation1 == 5) {
                                            echo "Average";
                                        } else {
                                            echo "poor";
                                        }
                                    } 
                            ?>
                        </option>
                        <option value="10">Excellent</option>
                        <option value="8">Good</option>
                        <option value="5">Fair</option>
                        <option value="2">Poor</option>
                    </select>
                </div>
                <!-- Respect to Constituted Authority -->
                <div>
                    <label for="respectt" class="block text-sm font-medium text-gray-700">Respect to Constituted Authority</label>
                    <select id="respect" name="respectt" class="mt-1 p-2 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">
                            <?php 
                                if (!empty($respect1))
                                    {
                                        if ($respect1 == 10) {
                                            echo "Excellent";
                                        } else if ($respect1 == 8) {
                                            echo "Good";
                                        } else if ($respect1 == 5) {
                                            echo "Average";
                                        } else {
                                            echo "poor";
                                        }
                                    } 
                            ?>
                        </option>
                        <option value="10">Excellent</option>
                        <option value="8">Good</option>
                        <option value="5">Fair</option>
                        <option value="2">Poor</option>
                    </select>
                </div>
                <!-- Care for College Properties/Assets -->
                <div>
                    <label for="care" class="block text-sm font-medium text-gray-700">Care for College Properties/Assets</label>
                    <select id="care" name="caree" class="mt-1 p-2 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">
                            <?php 
                                if (!empty($care1))
                                    {
                                        if ($care1 == 10) {
                                            echo "Excellent";
                                        } else if ($care1 == 8) {
                                            echo "Good";
                                        } else if ($care1 == 5) {
                                            echo "Average";
                                        } else {
                                            echo "poor";
                                        }
                                    } 
                            ?>
                        </option>
                        <option value="10">Excellent</option>
                        <option value="8">Good</option>
                        <option value="5">Fair</option>
                        <option value="2">Poor</option>
                    </select>
                </div>
            
             
                <div class="mt-10">
                    <button type="submit" name="updateme" class="px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600">UPDATE</button>
                </div>
                <div class="mt-12">
                     <a href="<?php echo $nextlink; ?>" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 focus:outline-none focus:bg-yellow-600">VIEW PROFILE</a>
                </div>
        
        </form>
    </div>
</body>
</html>
