<?php
include_once 'dbConnection.php';
$ref = @$_GET['q'];
$usn = $_POST['uname'];
$password = $_POST['password'];

$usn = stripslashes($usn);
$usn = addslashes($usn);
$password = stripslashes($password);
$password = addslashes($password);
$password = md5($password);
$result = mysqli_query($con, "SELECT usn FROM admin WHERE usn = '$usn' and password = '$password'") or die('Error');
$count = mysqli_num_rows($result);
if ($count == 1) {
    session_start();
    if (isset($_SESSION['usn'])) {
        session_unset();
    }
    $_SESSION["name"] = 'Admin';
    $_SESSION["key"] = 'b21hcg';
    $_SESSION["usn"] = $usn;
    header("location:dash.php?q=0");
} else {
    header("location:$ref?w=Wrong Username or Password");
}

