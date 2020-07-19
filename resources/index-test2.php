<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Portal</title>
    <script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
    <script src="js/jquery.formError.js" type="text/javascript"></script>
</head>
<body>
<div id="container">
    <h1>jQuery Form Error Plugin</h1>
    <div id="content">
        <form>
            <table>
                <tbody>
                <tr>
                    <td>
                        <label for="name">* Name</label>
                    </td>
                    <td>
                        <input type="text" id="name" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="age">* Age</label>
                    </td>
                    <td>
                        <input type="text" id="age" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">* Email</label>
                    </td>
                    <td>
                        <input type="text" id="email" />
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <input id="addPersonButton" type="submit" value="Add person">
                        <br /><em class="note">* Required field</em>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
<div id="footer">
    <a href="https://github.com/GarethElms/jQuery.formError">jQuery Form Error Plugin</a> By <a href="http://www.garethelms.org">Gareth Elms</a> 2012
</div>
</body>

<script type="text/javascript">
    $(document).ready(
        function()
        {
            $("#name").change( validate.controls.name);
            $("#age").change( validate.controls.age);
            $("#email").change( validate.controls.email);
            $("#addPersonButton").click(
                function( event)
                {
                    event.preventDefault();
                    if( validate.all())
                    {
                        alert( "This dude is valid. I can continue");
                    }
                });
        });

    var validate =
        (function()
        {
            var _regex =
                {
                    emailAddressIsValid:
                        function( emailAddress)
                        {
                            // http://stackoverflow.com/questions/2855865/jquery-validate-e-mail-address-regex
                            var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
                            return pattern.test( emailAddress);
                        },
                    isWholeNumber:
                        function( age)
                        {
                            var pattern = new RegExp( /^\d+$/);
                            return pattern.test( age);
                        }
                };
            var all =
                function()
                {
                    var invalidControls = [];
                    for( var controlValidationMethod in validate.controls)
                    {
                        if( ! validate.controls[controlValidationMethod].call( $("#" + controlValidationMethod)))
                        {
                            invalidControls.push( controlValidationMethod);
                        }
                    }
                    if( invalidControls.length > 0)
                    {
                        // Set focus on the first erroneous control
                        $("#" + invalidControls[0]).focus();
                    }
                    return invalidControls.length == 0;
                };
            var controls =
                {
                    name:
                        function()
                        {
                            var $input = $(this);
                            var isValid = true;
                            if( $input.val() === "")
                            {
                                $input.formError( "Please enter a name");
                                isValid =  false;
                            }
                            else if( $input.val().length > 15)
                            {
                                $input.formError( "Name cannot be greater than 15 characters long");
                                isValid =  false;
                            }
                            else
                            {
                                // Valid, remove any existing form error message for this input
                                $input.formError( {remove:true});
                            }
                            return isValid;
                        },
                    age:
                        function()
                        {
                            var $input = $(this);
                            var isValid = true;
                            if( $input.val() === "")
                            {
                                $input.formError( "Please enter the person's age");
                                isValid = false;
                            }
                            else if( ! _regex.isWholeNumber( $input.val()))
                            {
                                $input.formError( "Please enter a valid age eg; 21");
                                isValid = false;
                            }
                            else
                            {
                                // Valid, remove any existing form error message for this input
                                $input.formError( {remove:true});
                            }

                            return isValid;
                        },
                    email:
                        function()
                        {
                            var $input = $(this);
                            var isValid = true;
                            if( $input.val() === "")
                            {
                                $input.formError( "Please enter an email address");
                                isValid = false;
                            }
                            else if( ! _regex.emailAddressIsValid( $input.val()))
                            {
                                $input.formError( "Please enter a valid email address<br /> eg; name@example.com");
                                isValid = false;
                            }
                            else
                            {
                                // Valid, remove any existing form error message for this input
                                $input.formError( {remove:true});
                            }

                            return isValid;
                        }
                };
            return {
                "all": all,
                "controls": controls};
        })();
</script>

</html>