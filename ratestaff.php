<?php
include_once "connection.php"; // Include the database connection file
include_once "check.php"; // Include the session handling file

$v = "";
// Check if $sesrole is equal to "DEAN"
if ($sesrole === "DEAN") {
    // Concatenate "OFFICE OF THE DEAN" with $sesdept
    $v = "OFFICE OF THE DEAN ";
    $sesdept2 = $sesdept . ", " . $v;


 } elseif ($sesrole === "PRINCIPAL OFFICER") {
    // Concatenate "OFFICE OF THE " with $sesdept
    $K = "OFFICE OF THE ";
    $sesdept2 = $K .$sesdept; 
}
elseif ($sesdept === "CENTRE FOR INFORMATION TECHNOLOGY AND MANAGEMENT") {
    // If $sesdept is "CENTRE FOR INFORMATION TECHNOLOGY AND MANAGEMENT", use LIKE operator for wildcard search
    $sesdept2 = "%" . $sesdept . "%";
    
} elseif ($sesdept === "EPE CAMPUS") {
    // List of additional departments to fetch
    $additional_departments = array(
        $sesdept, // Include "EPE CAMPUS" itself
        "EPE CAMPUS, OFFICE OF THE DIRECTOR",
        "EPE CAMPUS, WORKS AND SERVICES",
        "EPE CAMPUS, SCHOOL ACCOUNT OFFICE"
    );

    // Set $sesdept2 to the list of additional departments
    $sesdept2 = $additional_departments;
} else {
    // If $sesrole is not "DEAN" and $sesdept does not match any specific condition, just use $sesdept
    $sesdept2 = $sesdept;
    // Set $v to an empty string
    $v = "";
}

// Trim any leading or trailing whitespace from $sesdept2
if (is_array($sesdept2)) {
    // If $sesdept2 is an array, iterate over each element and trim it
    foreach ($sesdept2 as $key => $value) {
        $sesdept2[$key] = trim($value);
    }
} else {
    // If $sesdept2 is not an array, simply trim it
    $sesdept2 = trim($sesdept2);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logoyct.png" type="image/x-icon">
    <title>Performance Rating Indicators</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .dashboard-link {
            position: absolute;
            top: 1rem;
            left: 1rem;
            text-decoration: none;
            color: #2d3748;
            font-weight: bold;
            padding: 0.5rem 1rem;
            background-color: #cbd5e0;
            border-radius: 0.25rem;
            transition: background-color 0.3s ease;
        }

        .dashboard-link:hover {
            background-color: #a0aec0;
        }

        /* Additional styles */
        .container {
            max-width: 800px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body class="bg-gradient-to-b from-green-100 to-green-300 min-h-screen flex justify-center items-center bg-gray-100 p-4">

    <div class="container mx-auto bg-white p-8 rounded-md shadow-md">
        <div class="mt-4">
            <a href="dashboard.php" class="inline-block px-2 py-1 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 focus:outline-none focus:bg-gray-400">Back </a>
        </div>
        <h1 class="text-2xl font-semibold mb-4 text-center text-yellow-600">PERFORMANCE RATING INDICATORS</h1>
        <h2 class="text-lg font-semibold mb-6 text-center">MEMBER OF STAFF IN <?php 
    if ($sesdept === "EPE CAMPUS") {
        echo $additional_departments[0];
    } else {
        echo $sesdept2;
    }
?></h2>


        <!-- Display the staff numbers and full names in a table -->
        <?php
 // Prepare the SQL query with placeholders for the department and staff ID
if (is_array($sesdept2)) {
    // If $sesdept2 is an array, create a comma-separated string to use in the query
    $deptString = implode(",", array_fill(0, count($sesdept2), "?"));
    $query = mysqli_prepare($conn, "SELECT staffno, fulln FROM identy WHERE dept IN ($deptString) AND categ != 'ACADEMIC' AND staffno != ?");
    if (!$query) {
        die("Preparation error: " . mysqli_error($conn)); // Check for preparation error
    }
    // Bind the values to the placeholders and execute the query
    $params = array_merge($sesdept2, array($sesstaffid));
    mysqli_stmt_bind_param($query, str_repeat("s", count($sesdept2)) . "s", ...$params);
} else {
    // If $sesdept2 is a string, bind it directly to the query
    $query = mysqli_prepare($conn, "SELECT staffno, fulln FROM identy WHERE dept = ? AND categ != 'ACADEMIC' AND staffno != ?");
    if (!$query) {
        die("Preparation error: " . mysqli_error($conn)); // Check for preparation error
    }
    mysqli_stmt_bind_param($query, "ss", $sesdept2, $sesstaffid);
}

// Execute the query
$result = mysqli_stmt_execute($query);
if (!$result) {
    die("Execution error: " . mysqli_error($conn)); // Check for execution error
}

// Get the result
$result = mysqli_stmt_get_result($query);


// Check if there are staff members found in the department
if (mysqli_num_rows($result) > 0) {
    echo "<table class='mt-4'>";
    echo "<thead><tr><th>Staff Number</th><th>Full Name</th><th>Action</th></tr></thead>";
    echo "<tbody>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['staffno'] . "</td>";
        echo "<td>" . $row['fulln'] . "</td>";
        echo "<td><a href='performance_one.php?staffid=" . $row['staffno'] . "'>Rate Staff</a></td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    // Handle the case when no staff members are found in the department
    echo "<p class='text-center mt-4'>No staff members found in the department.</p>";
}

// Close the prepared statement
mysqli_stmt_close($query);

    ?>
     <footer class="text-center mt-8 text-xs text-gray-600">&copy; <?php echo date("Y"); ?> CITM. All rights reserved.</footer>
</div>

</body>

</html>
