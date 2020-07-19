<?php
include_once 'dbConnection.php';
ob_start();
$fname = $_POST['fname'];
$fname= ucwords(strtolower($fname));
$mname = $_POST['mname'];
$mname= ucwords(strtolower($mname));
$lname = $_POST['lname'];
$lname= ucwords(strtolower($lname));
$gender = $_POST['gender'];
$grade = $_POST['grade'];
$usn = $_POST['usn'];
$mob = $_POST['mob'];
$password = $_POST['password'];
$fname = stripslashes($fname);
$fname = addslashes($fname);
$fname = ucwords(strtolower($fname));
$mname = stripslashes($mname);
$mname = addslashes($mname);
$mname = ucwords(strtolower($mname));
$lname = stripslashes($lname);
$lname = addslashes($lname);
$lname = ucwords(strtolower($lname));
$gender = stripslashes($gender);
$gender = addslashes($gender);
$grade = stripslashes($grade);
$grade = addslashes($grade);
$usn = stripslashes($usn);
$usn = addslashes($usn);
$mob = stripslashes($mob);
$mob = addslashes($mob);

$password = stripslashes($password);
$password = addslashes($password);
$password = md5($password);

$q3=mysqli_query($con,"INSERT INTO student VALUES  ('$fname' ,'$mname' ,'$lname' ,'$gender' ,'$grade' ,'$usn' ,'$mob', '$password')");
if($q3)
{
session_start();
$_SESSION["usn"] = $usn;
$_SESSION["fname"] = $fname;
$_SESSION["lname"] = $lname;

header("location:account.php?q=1");
}
else
{
header("location:index.php?q7=Student Number is Already Registered!!!");
}
ob_end_flush();
?>