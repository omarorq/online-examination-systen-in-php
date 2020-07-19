<?php
include_once 'dbConnection.php';
$ref=@$_GET['q'];
$name = $_POST['name'];
$usn = $_POST['usn'];
$subject = $_POST['subject'];
$id=uniqid();
$date=date("Y-m-d");
$time=date("h:i:sa");
$feedback = $_POST['feedback'];
$q=mysqli_query($con,"INSERT INTO feedback VALUES  ('$id' , '$name', '$usn' , '$subject', '$feedback' , '$date' , '$time')")or die ("Error");
header("location:$ref?q=Thank you for your valuable feedback");
?>