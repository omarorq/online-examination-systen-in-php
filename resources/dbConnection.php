<?php
//all the variables defined here are accessible in all the files that include this one
$con= new mysqli('localhost','root','','project');

if (mysqli_connect_errno())
{
    echo 'Failed to connect: ' . mysqli_connect_error();
}
