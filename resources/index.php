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

    <script src="js/bootstrap.min.js"  type="text/javascript"></script>

    <!-- Form validation  -->
    <?php require_once 'validation.php'; ?>
    <!-- End Form validation -->
</head>

<body>
<div class="header">
    <div class="row">
        <div class="col-lg-7">
            <!-- navigation bar -->

            <a href="../index.php"><span class="pull-left top log1"><b>IQ Examination</b></span></a>
            <a href="index.php"><span class="pull-left top log1"> Home</span></a>
            <a href="#" data-toggle="modal" data-target="#login"><span class="pull-left top log1"> Admin</span></a>
            <a href="#" data-toggle="modal" data-target="#developers"><span class="pull-left top log1"> Developers</span></a>
            <a href="feedback.php"><span class="pull-left top log1"> Feedback</span></a></div>
        <div class="col-md-1 col-md-offset-4">
            <a href="#" class="pull-right btn btn-warning loginbutton" data-toggle="modal" data-target="#myModal"><span
                        class="title1"><b><i class="glyphicon glyphicon-log-in"></i> Log In</b></span></a></div>


        <!--Sign in modal start-->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title log1"><b>Student Log In</b></h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="login.php?q=index.php" method="POST">
                            <fieldset>
                                <!-- Studentid input-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="usn"></label>
                                    <div class="col-md-6">
                                        <input id="studentusn" name="usn" placeholder="Student number" class="form-control navtext" type="text" required>

                                    </div>
                                </div>
                                <!-- Password input-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="password"></label>
                                    <div class="col-md-6">
                                        <input id="studentpassword" name="password" placeholder="Password" autocomplete="Password" class="form-control navtext" type="password" required>
                                    </div>
                                </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default navtext" data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i> Close</button>
                        <button type="submit" class="btn btn-primary navtext"><i class="glyphicon glyphicon-log-in"></i> Log In</button>
                        </fieldset>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!--sign in modal closed-->

    </div><!--header row closed-->
</div>

<div class="bg1">
    <div class="row" style="visibility: hidden">

        <div class="col-md-7"></div>
        <div class="col-md-4 indexpanel">
            <!-- sign in form begins -->
            <form class="form-horizontal" name="form" action="sign.php?q=account.php" onSubmit="return validateForm()" method="POST">
                <fieldset>


                    <!-- First name input -->
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <input id="fname" name="fname" placeholder="First name" class="form-control input-md" type="text">
                        </div>

                        <!-- Middle name input -->
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <input id="mname" name="mname" placeholder="Middle name" class="form-control input-md" type="text">
                        </div>
                    </div>

                    <!-- Last name input-->
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="lname"></label>
                        <div class="col-md-12">
                            <input id="lname" name="lname" placeholder="Last name" class="form-control input-md" type="text">
                        </div>
                    </div>

                    <!-- Gender select -->
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="gender"></label>
                        <div class="col-md-6">
                            <select id="gender" name="gender" placeholder="Gender" class="form-control input-md" >
                                <option value="Male">Gender</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option> </select>
                        </div>

                        <!-- Grade select -->
                        <div class="col-md-6">
                            <select id="grade" name="grade" placeholder="Grade" class="form-control input-md" >
                                <option value="Male">Grade</option>
                                <option value="Grade 7">Grade 7</option>
                                <option value="Grade 8">Grade 8</option>
                                <option value="Grade 9">Grade 9</option>
                                <option value="Grade 10">Grade 10</option>
                            </select>
                        </div>
                    </div>


                    <!-- student id input-->
                    <div class="form-group">
                        <label class="col-md-12 control-label title1" for="usn"></label>
                        <div class="col-md-12">
                            <input id="usn" name="usn" placeholder="Student number" class="form-control input-md" type="text">

                        </div>
                    </div>

                    <!-- mobile input-->
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="mob"></label>
                        <div class="col-md-12">
                            <input id="mob" name="mob" placeholder="Mobile number" class="form-control input-md" type="number">

                        </div>
                    </div>

                    <!-- password input-->
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="password"></label>
                        <div class="col-md-12">
                            <input id="password" name="password" placeholder="New password" autocomplete="New password" class="form-control input-md" type="password">

                        </div>
                    </div>

                    <!-- confirm password input -->
                    <div class="form-group">
                        <label class="col-md-12control-label" for="cpassword"></label>
                        <div class="col-md-12">
                            <input id="cpassword" name="cpassword" placeholder="Confirm password" autocomplete="Confirm password" class="form-control input-md" type="password">

                        </div>
                    </div>
                    <?php if(@$_GET['q7'])
                    { echo'<p style="color:red;font-size:15px;">'.@$_GET['q7'];}?>
                    <!-- Sign up submit -->
                    <div class="form-group">
                        <label class="col-md-12 control-label" for=""></label>
                        <div class="col-md-12">
                            <input  type="submit" value="Sign Up" class="btn btn-primary"/>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div><!--col-md-6 end-->
    </div></div>
</div><!--container end-->

<!--Footer start-->
<div class="row footer footer-font">
    <div class="pull-left col-md-3">
        <a href="#">&copy; <?php echo date('Y'); ?> All rights reserved.</a></div></div>

    <!-- Home link
    <div class="col-md-3 box">
    <a href="index.php"></a>Home</div> -->
    <!-- Admin link
    <div class="col-md-3 box">
    <a href="#" data-toggle="modal" data-target="#login">Admin</a></div>-->
    <!-- Developers link
    <div class="col-md-3 box">
    <a href="#" data-toggle="modal" data-target="#developers">Developers</a></div>-->
    <!-- Feedback link
    <div class="col-md-3 box">
    <a href="feedback.php" target="_blank">Feedback</a></div></div>-->

    <!-- Modal For Developers-->
    <div class="modal fade" id="developers">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <span class="modal-title log1"><b>Developers</b></span>
                </div>

                <div class="modal-body">
                    <p>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="image/fran.png" width=100 height=100 alt="Anonymous" class="img-rounded">
                        </div>
                        <div class="col-md-5">
                            <a href="#" style="color:#202020; font-family:'typo' ; font-size:18px" title="Find on Facebook">Anonymous</a>
                            <h4 style="color:#202020; font-family:'typo' ;font-size:16px" class="title1"></h4>
                            <h4 style="font-family:'typo' "></h4>
                            <h4 style="font-family:'typo' ">Bachelor of Science in Information Technology</h4></div></div>
                    </p>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!--Modal for admin login-->
    <div class="modal fade" id="login">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <span class="modal-title log1"><b>Admin Log In</b></span>
                </div>
                <div class="modal-body title1">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <form role="form" method="post" action="admin.php?q=index.php">
                                <div class="form-group">
                                    <input type="text" name="uname" maxlength="20"  placeholder="Admin number" class="form-control navtext" required/>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" maxlength="15" placeholder="Password" autocomplete="Password" class="form-control navtext" required/>
                                </div>
                                <div class="form-group" align="center">
                                    <input type="submit" name="login" value="Login" class="btn btn-primary" />
                                </div>
                            </form>
                        </div><div class="col-md-3"></div></div>
                </div>
                <!--<div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>-->
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!--footer end-->


</body>
</html>
