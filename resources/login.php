<?php
session_start();
if(isset($_SESSION["usn"])){
session_destroy();
}
include_once 'dbConnection.php';
$ref=@$_GET['q'];
$usn = $_POST['usn'];
$password = $_POST['password'];

$usn = stripslashes($usn);
$usn = addslashes($usn);
$password = stripslashes($password); 
$password = addslashes($password);
$password=md5($password); 
$result = mysqli_query($con,"SELECT * FROM student WHERE usn = '$usn' and password = '$password'") or die('Error');
$count=mysqli_num_rows($result);
if($count===1){
while($row = mysqli_fetch_array($result)) {
	$fname = $row['fname'];
	$lname = $row['lname'];
}
$_SESSION["fname"] = $fname;
$_SESSION["lname"] = $lname;
$_SESSION["usn"] = $usn;
header("location:account.php?q=1");
}

else {
    header("location:$ref?w=Wrong Username or Password");
}

?>