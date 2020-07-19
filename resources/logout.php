<?php 
session_start();
if(isset($_SESSION['usn'])){
session_destroy();}
$ref= @$_GET['q'];
header("location:$ref");
