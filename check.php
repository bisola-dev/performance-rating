<?php
$sesrole=$_SESSION['Role'];
$sesdept=$_SESSION['OfficeHeld'];
$sesfulln=$_SESSION['fulln'];
$sesstatus=$_SESSION['Status_Capacity'];
$sesstaffid=$_SESSION['staff_number'];
if ($sesrole== ""||$sesdept ==""||$sesstatus==""||$sesstaffid==""||$sesfulln==""){header("Location:logout.php");}

?>