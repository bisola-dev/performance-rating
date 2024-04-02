
<?php
include_once "connection.php";
include_once "check.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="bg-gray-800 text-white w-64 flex flex-col justify-between">
            <div class="py-4 px-6 flex flex-col">
                <h1 class="text-2xl font-bold">Dashboard</h1>
                <p class="text-sm mt-2">Welcome, <?php echo $sesfulln; ?></p>
          
            <ul class="py-4 px-6 flex flex-col space-y-2">
                <li><a href="ratestaff.php" class="hover:text-gray-300">Rate Staff</a></li>
                <li><a href="viewratedstaff.php" class="hover:text-gray-300">View All Rated Staff</a></li>
                <li><a href="logout.php" class="hover:text-gray-300">Logout</a></li>
            </ul>
        </div>
        </div>
        <!-- Content -->
        <div class="flex-1 p-6">
            <h1 class="text-1xl font-bold mb-6"> <?php echo 'WELCOME'.' '.$sesfulln . ' || ' . $sesstatus . ' || ' . $sesrole.' || '.$sesdept; ?> </h1>

        </div>
    </div>
</body>
</html>
