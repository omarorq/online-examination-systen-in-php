<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Portal</title>
    <link  rel="stylesheet" href="css/bootstrap.min.css"/>
    <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>
    <link rel="stylesheet" href="css/main.css">
    <link  rel="stylesheet" href="css/font.css">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/jquery.validate.min.js" type="text/javascript"></script>

    <script src="js/bootstrap.min.js"  type="text/javascript"></script>
    <style>

        /* Styles */
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Open Sans";
            font-size: 14px;
        }

        .container {
            width: 500px;
            margin: 25px auto;
        }

        form {
            padding: 20px;
            background: #2c3e50;
            color: #fff;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px;
        }
        form label,
        form input,
        form button {
            border: 0;
            margin-bottom: 3px;
            display: block;
            width: 100%;
        }
        form input {
            height: 25px;
            line-height: 25px;
            background: #fff;
            color: #000;
            padding: 0 6px;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        form button {
            height: 30px;
            line-height: 30px;
            background: #e67e22;
            color: #fff;
            margin-top: 10px;
            cursor: pointer;
        }
        form .error {
            color: #ff0000;
        }
    </style>
    <script>// Wait for the DOM to be ready
        $(function() {
            // Initialize form validation on the registration form.
            // It has the name attribute "registration"
            $("form[name='registration']").validate({
                // Specify validation rules
                rules: {
                    // The key name on the left side is the name attribute
                    // of an input field. Validation rules are defined
                    // on the right side
                    firstname: "required",
                    lastname: "required",
                    email: {
                        required: true,
                        // Specify that email should be validated
                        // by the built-in "email" rule
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 5
                    }
                },
                // Specify validation error messages
                messages: {
                    firstname: "Please enter your firstname",
                    lastname: "Please enter your lastname",
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    email: "Please enter a valid email address"
                },
                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });</script>
</head>

<body>

<div class="container">
    <h2>Registration</h2>
    <form action="" name="registration">

        <label for="firstname">First Name</label>
        <input type="text" name="firstname" id="firstname" placeholder="John"/>

        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" id="lastname" placeholder="Doe"/>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="john@doe.com"/>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;"/>

        <button type="submit">Register</button>

    </form>
</div>