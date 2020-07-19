<?php if (@$_GET['w']) {
    echo '<script>alert("' . @$_GET['w'] . '");</script>';
} ?>

<script> function validateForm() {
        var y = document.forms["form"]["fname"].value;
        var letters = /^[A-Za-z]+$/;
        if (y == null || y == "") {
            alert("First Name must be filled out.");
            return false;
        }
        var y = document.forms["form"]["mname"].value;
        var letters = /^[A-Za-z]+$/;
        if (y == null || y == "") {
            alert("Middle Name must be filled out.");
            return false;
        }
        var y = document.forms["form"]["lname"].value;
        var letters = /^[A-Za-z]+$/;
        if (y == null || y == "") {
            alert("Last Name must be filled out.");
            return false;
        }
        var x = document.forms["form"]["usn"].value;
        var atpos = x.indexOf("-");
        var dotpos = x.lastIndexOf("-");
        if (atpos !== 2 || dotpos < atpos + 2 || dotpos + 1 >= x.length) {
            alert("Not a valid ID number (Ex. C18-XXXX-X)");
            return false;
        }
        var a = document.forms["form"]["password"].value;
        if (a == null || a == "") {
            alert("Password must be filled out");
            return false;
        }
        if (a.length < 5 || a.length > 25) {
            alert("Passwords must be 5 to 25 characters long.");
            return false;
        }
        var b = document.forms["form"]["cpassword"].value;
        if (a != b) {
            alert("Passwords must match.");
            return false;
        }
    }</script>
