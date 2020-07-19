<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Admin</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">

<!-- Final grade style -->
    <style>.final-grade { font-weight: bold; color: red; } </style>
    <script>
        function printPage() {
            window.print();
        }
    </script>
</head>

<body  style="background:#eee;">
<div class="header">
<div class="row">
<div class="col-lg-6">
<<span class="pull-left top title1 log1">Ranking and Sectioning</span></div>
<?php
 include_once 'dbConnection.php';
session_start();
$usn=$_SESSION['usn'];
  if(!(isset($_SESSION['usn']))){
header("location:index.php");

}
else
{
$name = $_SESSION['name'];

include_once 'dbConnection.php';
echo '<span class="pull-right top" ><span class="hello"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Hello,</span> <a href="dash.php" class="log log1">'.$name.'</a>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
}?>

</div></div>
<!-- admin start-->

<!--navigation menu-->
<nav class="navbar navbar-default title1">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand navtext" href="dash.php?q=0"><b><i class="glyphicon glyphicon-dashboard"></i> Dashboard</b></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="navtext" <?php if(@$_GET['q']==0) echo'class="active"'; ?>><a href="dash.php?q=0"><i class="glyphicon glyphicon-home"></i> Home<span class="sr-only">(current)</span></a></li>
        <li class="navtext" <?php if(@$_GET['q']==1) echo'class="active"'; ?>><a href="dash.php?q=1"><i class="glyphicon glyphicon-user"></i> Student</a></li>
		<li class="navtext dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-signal"></i> Ranking<span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="dash.php?q=7">Grade 7</a></li>
                <li><a href="dash.php?q=8">Grade 8</a></li>
                <li><a href="dash.php?q=9">Grade 9</a></li>
                <li><a href="dash.php?q=10">Grade 10</a></li>
            </ul></li>
        <li class="navtext" <?php if(@$_GET['q']==71 || @$_GET['q']==72 || @$_GET['q']==73 || @$_GET['q']==81|| @$_GET['q']==82|| @$_GET['q']==83|| @$_GET['q']==91|| @$_GET['q']==92|| @$_GET['q']==93 || @$_GET['q']==101|| @$_GET['q']==102|| @$_GET['q']==103) echo'class="active"'; ?>><a href="dash.php?q=21"><i class="glyphicon glyphicon-th-large"></i> Sectioning</a></li>
        <li class="navtext dropdown <?php if(@$_GET['q']==4 || @$_GET['q']==5 || @$_GET['q']==6) echo'active"'; ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-question-sign"></i> Exam<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="dash.php?q=4">Add Exam</a></li>
            <li><a href="dash.php?q=5">Edit Exam</a></li>
            <li><a href="dash.php?q=6">Remove Exam</a></li>
          </ul></li>
      <li class="navtext" <?php if(@$_GET['q']==3) echo'class="active"'; ?>><a href="dash.php?q=3"><i class="glyphicon glyphicon-stats"></i> Feedback</a></li>
		
      </ul>
          </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--navigation menu closed-->
<div class="container"><!--container start-->
<div class="row">
<div class="col-md-12">
<!--home start-->

<?php if(@$_GET['q']==0) {

$result = mysqli_query($con,"SELECT * FROM exam ORDER BY date DESC") or die('Error');
echo  '<span><i class="glyphicon glyphicon-home"></i> Home</span><div class="panel"><div class="table-responsive"><table id="datatable" class="table table-striped table-bordered"><thead>
<tr><td><b>No.</b></td><td><b>Exam Code</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr></thead><tbody>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$total = $row['total'];
	$sahi = $row['sahi'];
    $time = $row['time'];
	$eid = $row['eid'];
$q12=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND usn='$usn'" )or die('Error98');
$rowcount=mysqli_num_rows($q12);
if($rowcount == 0){
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;sec</td>
	<td><b><a href="account.php?q=exam&step=2&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:#99cc32" target="_blank"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Testing</b></span></a></b></td></tr>';
}
else
{
echo '<tr style="color:#99cc32"><td>'.$c++.'</td><td>'.$title.'&nbsp;<span title="This exam is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="update.php?q=examre&step=25&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:red" target="_blank"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Restart</b></span></a></b></td></tr>';
}
}
$c=0;
echo '</tbody></table></div></div>';

}

// start grade 7 section 1

if(@$_GET['q']== 71)
{
$q=mysqli_query($con,"SELECT * FROM section LEFT JOIN student ON section.usn = student.usn WHERE secn='section 1' && grade ='grade 7' ORDER BY lname DESC " )or die('Error223');
    echo  '<span><button class="btn btn-primary navtext"><i class="glyphicon glyphicon-th-large"></i> Sectioning</button><i class="glyphicon glyphicon-chevron-right"></i> <input type="button" class="btn btn-primary navtext" value="Grade 7"></span><i class="glyphicon glyphicon-chevron-right"></i> <a href="#" ><input type="button" class="btn btn-primary navtext" value="Section 1"></a><i class="glyphicon glyphicon-option-vertical"></i><a href="section.php?q=72" ><input type="button" class="btn btn-default navtext" value="Section 2"></a><i class="glyphicon glyphicon-option-vertical"></i><a href="section.php?q=73" ><input type="button" class="btn btn-default navtext" value="Section 3"></a><a href="print.php?q=71" target="_blank"><input type="button" class="btn btn-danger navtext pull-right" value="Print"></a><div class="panel"><div class="panel"><div class="table-responsive"><table id="datatable" class="table table-striped table-bordered"><thead>
<tr style="color:#000000;"><td><b>No.</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>Transfer</b></td></tr></thead><tbody>';
$c=0;
while($row=mysqli_fetch_array($q) )
{
$e=$row['usn'];
$secid = $row['secid'];
$secn = $row['secn'];
$q12=mysqli_query($con,"SELECT * FROM student WHERE usn='$e' " )or die('Error231');
while($row=mysqli_fetch_array($q12) )
{
$fname = $row['fname'];
$mname = $row['mname'];
$lname = $row['lname'];
$gender= $row['gender'];

}

$c++;
echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$lname.', '.$fname.' '.$mname.'</td><td>'.$gender.'</td><td><form onsubmit="return confirm(\'Are you sure?\')" action="update.php?q=addsec7" method="POST"><input type="hidden" name="usn" value="'. $e .'"><input type="hidden" name="secid" value="'. $secid .'"><select name="secn" onchange="this.form.submit()"><option value="'.$secn.'">'.$secn.'</option><option value="Section 2">Section 2</option> <option value="Section 3">Section 3</option></select><noscript><input type="submit" value="Submit"></noscript></form></td>';
}
echo '</table></tbody></div></div>';}

//start grade 7 section 2

if(@$_GET['q']== 72)
{
$q=mysqli_query($con,"SELECT * FROM section LEFT JOIN student ON section.usn = student.usn WHERE secn='section 2' && grade ='grade 7' ORDER BY lname DESC " )or die('Error223');
    echo  '<span><button class="btn btn-primary navtext"><i class="glyphicon glyphicon-th-large"></i> Sectioning</button><i class="glyphicon glyphicon-chevron-right"></i> <input type="button" class="btn btn-primary navtext" value="Grade 7"></span><i class="glyphicon glyphicon-chevron-right"></i> <a href="section.php?q=71" ><input type="button" class="btn btn-default navtext" value="Section 1"></a><i class="glyphicon glyphicon-option-vertical"></i><a href="#" ><input type="button" class="btn btn-primary navtext" value="Section 2"></a><i class="glyphicon glyphicon-option-vertical"></i><a href="section.php?q=73" ><input type="button" class="btn btn-default navtext" value="Section 3"></a><a href="print.php?q=72" target="_blank"><input type="button" class="btn btn-danger navtext pull-right" value="Print"></a><div class="panel"><div class="table-responsive"><table id="datatable" class="table table-striped table-bordered"><thead>
        <tr style="color:#000000;"><td><b>No.</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>Transfer</b></td></tr></thead><tbody>';
    $c=0;
    while($row=mysqli_fetch_array($q) )
    {
        $e=$row['usn'];
        $secid = $row['secid'];
        $secn = $row['secn'];
        $q12=mysqli_query($con,"SELECT * FROM student WHERE usn='$e' " )or die('Error231');
        while($row=mysqli_fetch_array($q12) )
        {
            $fname = $row['fname'];
            $mname = $row['mname'];
            $lname = $row['lname'];
            $gender=$row['gender'];
        }

        $c++;
        echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$lname.', '.$fname.' '.$mname.'</td><td>'.$gender.'</td><td><form action="update.php?q=addsec7" method="POST"><input type="hidden" name="usn" value="'. $e .'"><input type="hidden" name="secid" value="'. $secid .'"><select name="secn" onchange="this.form.submit()"><option value="'.$secn.'">'.$secn.'</option><option value="Section 1">Section 1</option> <option value="Section 3">Section 3</option></select><noscript><input type="submit" value="Submit"></noscript></form></td>';
    }
                echo '</table></body></div></div>';}

//start grade 7 section 3

if(@$_GET['q']==73)
{
    $q=mysqli_query($con,"SELECT * FROM section LEFT JOIN student ON section.usn = student.usn WHERE secn='section 3' && grade ='grade 7' ORDER BY lname DESC " )or die('Error223');
    echo  '<span><button class="btn btn-primary navtext"><i class="glyphicon glyphicon-th-large"></i> Sectioning</button><i class="glyphicon glyphicon-chevron-right"></i> <input type="button" class="btn btn-primary navtext" value="Grade 7"></span><i class="glyphicon glyphicon-chevron-right"></i> <a href="section.php?q=71" ><input type="button" class="btn btn-default navtext" value="Section 1"></a><i class="glyphicon glyphicon-option-vertical"></i><a href="section.php?q=72" ><input type="button" class="btn btn-default navtext" value="Section 2"></a><i class="glyphicon glyphicon-option-vertical"></i><a href="#" ><input type="button" class="btn btn-primary navtext" value="Section 3"></a><a href="print.php?q=73" target="_blank"><input type="button" class="btn btn-danger navtext pull-right" value="Print"></a><div class="panel"><div class="table-responsive"><table id="datatable" class="table table-striped table-bordered"><thead>
    <tr style="color:#000000;"><td><b>No.</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>Transfer</b></td></tr></thead><tbody>';
    $c=0;
    while($row=mysqli_fetch_array($q) )
    {
        $e=$row['usn'];
        $secid = $row['secid'];
        $secn = $row['secn'];
        $q12=mysqli_query($con,"SELECT * FROM student WHERE usn='$e' " )or die('Error231');
        while($row=mysqli_fetch_array($q12) )
        {
            $fname = $row['fname'];
            $mname = $row['mname'];
            $lname = $row['lname'];
            $gender=$row['gender'];
        }

        $c++;
        echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$lname.', '.$fname.' '.$mname.'</td><td>'.$gender.'</td><td><form action="update.php?q=addsec7" method="POST"><input type="hidden" name="usn" value="'. $e .'"><input type="hidden" name="secid" value="'. $secid .'"><select name="secn" onchange="this.form.submit()"><option value="'.$secn.'">'.$secn.'</option><option value="Section 1">Section 1</option> <option value="Section 2">Section 2</option></select><noscript><input type="submit" value="Submit"></noscript></form></td>';
    }
    echo '</table></body></div></div>';}

//start grade 8 section 1

if(@$_GET['q']== 81)
{
    $q=mysqli_query($con,"SELECT * FROM section LEFT JOIN student ON section.usn = student.usn WHERE secn='section 1' && grade ='grade 8' ORDER BY lname DESC " )or die('Error223');
    echo  '<span><button class="btn btn-primary navtext"><i class="glyphicon glyphicon-th-large"></i> Sectioning</button><i class="glyphicon glyphicon-chevron-right"></i> <input type="button" class="btn btn-primary navtext" value="Grade 8"></span><i class="glyphicon glyphicon-chevron-right"></i> <a href="#" ><input type="button" class="btn btn-primary navtext" value="Section 1"></a><i class="glyphicon glyphicon-option-vertical"></i><a href="section.php?q=82" ><input type="button" class="btn btn-default navtext" value="Section 2"></a><i class="glyphicon glyphicon-option-vertical"></i><a href="section.php?q=82" ><input type="button" class="btn btn-default navtext" value="Section 3"></a><a href="print.php?q=81" target="_blank"><input type="button" class="btn btn-danger navtext pull-right" value="Print"></a><div class="panel"><div class="table-responsive"><table id="datatable" class="table table-striped table-bordered"><thead>
                <tr style="color:#000000;"><td><b>No.</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>Transfer</b></td></tr></thead><tbody>';
    $c=0;
    while($row=mysqli_fetch_array($q) )
    {
        $e=$row['usn'];
        $secid = $row['secid'];
        $secn = $row['secn'];
        $q12=mysqli_query($con,"SELECT * FROM student WHERE usn='$e' " )or die('Error231');
        while($row=mysqli_fetch_array($q12) )
        {
            $fname = $row['fname'];
            $mname = $row['mname'];
            $lname = $row['lname'];
            $gender=$row['gender'];
        }

        $c++;
        echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$lname.', '.$fname.' '.$mname.'</td><td>'.$gender.'</td><td><form action="update.php?q=addsec8" method="POST"><input type="hidden" name="usn" value="'. $e .'"><input type="hidden" name="secid" value="'. $secid .'"><select  name="secn" onchange="this.form.submit()"><option value="'.$secn.'">'.$secn.'</option><option value="Section 2">Section 2</option> <option value="Section 3">Section 3</option></select><noscript><input type="submit" value="Submit8"></noscript></form></td>';
    }
    echo '</table></tbody></div></div>';}

//start grade 8 section 2

if(@$_GET['q']== 82)
{
    $q=mysqli_query($con,"SELECT * FROM section LEFT JOIN student ON section.usn = student.usn WHERE secn='section 2' && grade ='grade 8' ORDER BY lname DESC " )or die('Error223');
    echo  '<span><button class="btn btn-primary navtext"><i class="glyphicon glyphicon-th-large"></i> Sectioning</button><i class="glyphicon glyphicon-chevron-right"></i> <input type="button" class="btn btn-primary navtext" value="Grade 8"></span><i class="glyphicon glyphicon-chevron-right"></i> <a href="section.php?q=81" ><input type="button" class="btn btn-default navtext" value="Section 1"></a><i class="glyphicon glyphicon-option-vertical"></i><a href="#" ><input type="button" class="btn btn-primary navtext" value="Section 2"></a><i class="glyphicon glyphicon-option-vertical"></i><a href="section.php?q=83" ><input type="button" class="btn btn-default navtext" value="Section 3"></a><a href="print.php?q=82" target="_blank"><input type="button" class="btn btn-danger navtext pull-right" value="Print"></a><div class="panel"><div class="table-responsive"><table id="datatable" class="table table-striped table-bordered"><thead>
                <tr style="color:#000000;"><td><b>No.</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>Transfer</b></td></tr></thead><tbody>';
    $c=0;
    while($row=mysqli_fetch_array($q) )
    {
        $e=$row['usn'];
        $secid = $row['secid'];
        $secn = $row['secn'];
        $q12=mysqli_query($con,"SELECT * FROM student WHERE usn='$e' " )or die('Error231');
        while($row=mysqli_fetch_array($q12) )
        {
            $fname = $row['fname'];
            $mname = $row['mname'];
            $lname = $row['lname'];
            $gender=$row['gender'];
        }

        $c++;
        echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$lname.', '.$fname.' '.$mname.'</td><td>'.$gender.'</td><td><form action="update.php?q=addsec8" method="POST"><input type="hidden" name="usn" value="'. $e .'"><input type="hidden" name="secid" value="'. $secid .'"><select name="secn" onchange="this.form.submit()"><option value="'.$secn.'">'.$secn.'</option><option value="Section 1">Section 1</option> <option value="Section 3">Section 3</option></select><noscript><input type="submit" value="Submit8"></noscript></form></td>';
    }
    echo '</table></tbody></div></div>';}

//start grade 8 section 3

if(@$_GET['q']== 83)
{
    $q=mysqli_query($con,"SELECT * FROM section LEFT JOIN student ON section.usn = student.usn WHERE secn='section 3' && grade ='grade 8' ORDER BY lname DESC " )or die('Error223');
    echo  '<span><button class="btn btn-primary navtext"><i class="glyphicon glyphicon-th-large"></i> Sectioning</button><i class="glyphicon glyphicon-chevron-right"></i> <input type="button" class="btn btn-primary navtext" value="Grade 8"></span><i class="glyphicon glyphicon-chevron-right"></i> <a href="section.php?q=81" ><input type="button" class="btn btn-default navtext" value="Section 1"></a><i class="glyphicon glyphicon-option-vertical"></i><a href="section.php?q=82" ><input type="button" class="btn btn-default navtext" value="Section 2"></a><i class="glyphicon glyphicon-option-vertical"></i><a href="#" ><input type="button" class="btn btn-primary navtext" value="Section 3"></a><a href="print.php?q=83" target="_blank"><input type="button" class="btn btn-danger navtext pull-right" value="Print"></a><div class="panel"><div class="table-responsive"><table id="datatable" class="table table-striped table-bordered"><thead>
                <tr style="color:#000000;"><td><b>No.</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>Transfer</b></td></tr></thead><tbody>';
    $c=0;
    while($row=mysqli_fetch_array($q) )
    {
        $e=$row['usn'];
        $secid = $row['secid'];
        $secn = $row['secn'];
        $q12=mysqli_query($con,"SELECT * FROM student WHERE usn='$e' " )or die('Error231');
        while($row=mysqli_fetch_array($q12) )
        {
            $fname = $row['fname'];
            $mname = $row['mname'];
            $lname = $row['lname'];
            $gender=$row['gender'];
        }

        $c++;
        echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$lname.', '.$fname.' '.$mname.'</td><td>'.$gender.'</td><td><form action="update.php?q=addsec8" method="POST"><input type="hidden" name="usn" value="'. $e .'"><input type="hidden" name="secid" value="'. $secid .'"><select name="secn" onchange="this.form.submit()"><option value="'.$secn.'">'.$secn.'</option><option value="Section 1">Section 1</option> <option value="Section 2">Section 2</option></select><noscript><input type="submit" value="Submit8"></noscript></form></td>';
    }
    echo '</table></tbody></div></div>';}

//start grade 9 section 1

if(@$_GET['q']== 91)
{
    $q=mysqli_query($con,"SELECT * FROM section LEFT JOIN student ON section.usn = student.usn WHERE secn='section 1' && grade='grade 9' ORDER BY lname DESC " )or die('Error223');
    echo  '<span><button class="btn btn-primary navtext"><i class="glyphicon glyphicon-th-large"></i> Sectioning</button><i class="glyphicon glyphicon-chevron-right"></i> <input type="button" class="btn btn-primary navtext" value="Grade 9"></span><i class="glyphicon glyphicon-chevron-right"></i> <a href="#" ><input type="button" class="btn btn-primary navtext" value="Section 1"></a><i class="glyphicon glyphicon-option-vertical"></i><a href="section.php?q=92" ><input type="button" class="btn btn-default navtext" value="Section 2"></a><i class="glyphicon glyphicon-option-vertical"></i><a href="section.php?q=93" ><input type="button" class="btn btn-default navtext" value="Section 3"></a><a href="print.php?q=91" target="_blank"><input type="button" class="btn btn-danger navtext pull-right" value="Print"></a><div class="panel"><div class="table-responsive"><table id="datatable" class="table table-striped table-bordered"><thead>
                <tr style="color:#000000;"><td><b>No.</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>Transfer</b></td></tr></thead><tbody>';
    $c=0;
    while($row=mysqli_fetch_array($q) )
    {
        $e=$row['usn'];
        $secid = $row['secid'];
        $secn = $row['secn'];
        $q12=mysqli_query($con,"SELECT * FROM student WHERE usn='$e' " )or die('Error231');
        while($row=mysqli_fetch_array($q12) )
        {
            $fname = $row['fname'];
            $mname = $row['mname'];
            $lname = $row['lname'];
            $gender=$row['gender'];
        }

        $c++;
        echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$lname.', '.$fname.' '.$mname.'</td><td>'.$gender.'</td><td><form action="update.php?q=addsec9" method="POST"><input type="hidden" name="usn" value="'. $e .'"><input type="hidden" name="secid" value="'. $secid .'"><select  name="secn" onchange="this.form.submit()"><option value="'.$secn.'">'.$secn.'</option><option value="Section 2">Section 2</option> <option value="Section 3">Section 3</option></select><noscript><input type="submit" value="Submit"></noscript></form></td>';
    }
    echo '</table></tbody></div></div>';}

//start grade 9 section 2

if(@$_GET['q']== 92)
{
    $q=mysqli_query($con,"SELECT * FROM section LEFT JOIN student ON section.usn = student.usn WHERE secn='section 2' && grade='grade 9' ORDER BY lname DESC " )or die('Error223');
    echo  '<span><button class="btn btn-primary navtext"><i class="glyphicon glyphicon-th-large"></i> Sectioning</button><i class="glyphicon glyphicon-chevron-right"></i> <input type="button" class="btn btn-primary navtext" value="Grade 9"></span><i class="glyphicon glyphicon-chevron-right"></i> <a href="section.php?q=91" ><input type="button" class="btn btn-default navtext" value="Section 1"></a><i class="glyphicon glyphicon-option-vertical"></i><a href="section.php?q=92" ><input type="button" class="btn btn-primary navtext" value="Section 2"></a><i class="glyphicon glyphicon-option-vertical"></i><a href="section.php?q=93" ><input type="button" class="btn btn-default navtext" value="Section 3"></a><a href="print.php?q=92" target="_blank"><input type="button" class="btn btn-danger navtext pull-right" value="Print"></a><div class="panel"><div class="table-responsive"><table id="datatable" class="table table-striped table-bordered"><thead>
                <tr style="color:#000000;"><td><b>No.</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>Transfer</b></td></tr></thead><tbody>';
    $c=0;
    while($row=mysqli_fetch_array($q) )
    {
        $e=$row['usn'];
        $secid = $row['secid'];
        $secn = $row['secn'];
        $q12=mysqli_query($con,"SELECT * FROM student WHERE usn='$e' " )or die('Error231');
        while($row=mysqli_fetch_array($q12) )
        {
            $fname = $row['fname'];
            $mname = $row['mname'];
            $lname = $row['lname'];
            $gender=$row['gender'];
        }

        $c++;
        echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$lname.', '.$fname.' '.$mname.'</td><td>'.$gender.'</td><td><form action="update.php?q=addsec9" method="POST"><input type="hidden" name="usn" value="'. $e .'"><input type="hidden" name="secid" value="'. $secid .'"><select name="secn" onchange="this.form.submit()"><option value="'.$secn.'">'.$secn.'</option><option value="Section 1">Section 1</option> <option value="Section 3">Section 3</option></select><noscript><input type="submit" value="Submit"></noscript></form></td>';
    }
    echo '</table></tbody></div></div>';}

//start grade 9 section 3

if(@$_GET['q']== 93)
{
    $q=mysqli_query($con,"SELECT * FROM section LEFT JOIN student ON section.usn = student.usn WHERE secn='section 3' && grade='grade 9' ORDER BY lname DESC " )or die('Error223');
    echo  '<span><button class="btn btn-primary navtext"><i class="glyphicon glyphicon-th-large"></i> Sectioning</button><i class="glyphicon glyphicon-chevron-right"></i> <input type="button" class="btn btn-primary navtext" value="Grade 9"></span><i class="glyphicon glyphicon-chevron-right"></i> <a href="section.php?q=91" ><input type="button" class="btn btn-default navtext" value="Section 1"></a><i class="glyphicon glyphicon-option-vertical"></i><a href="section.php?q=92" ><input type="button" class="btn btn-default navtext" value="Section 2"></a><i class="glyphicon glyphicon-option-vertical"></i><a href="#" ><input type="button" class="btn btn-primary navtext" value="Section 3"></a><a href="print.php?q=93" target="_blank"><input type="button" class="btn btn-danger navtext pull-right" value="Print"></a><div class="panel"><div class="table-responsive"><table id="datatable" class="table table-striped table-bordered"><thead>
                <tr style="color:#000000;"><td><b>No.</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>Transfer</b></td></tr></thead><tbody>';
    $c=0;
    while($row=mysqli_fetch_array($q) )
    {
        $e=$row['usn'];
        $secid = $row['secid'];
        $secn = $row['secn'];
        $q12=mysqli_query($con,"SELECT * FROM student WHERE usn='$e' " )or die('Error231');
        while($row=mysqli_fetch_array($q12) )
        {
            $fname = $row['fname'];
            $mname = $row['mname'];
            $lname = $row['lname'];
            $gender=$row['gender'];
        }

        $c++;
        echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$lname.', '.$fname.' '.$mname.'</td><td>'.$gender.'</td><td><form action="update.php?q=addsec9" method="POST"><input type="hidden" name="usn" value="'. $e .'"><input type="hidden" name="secid" value="'. $secid .'"><select name="secn" onchange="this.form.submit()"><option value="'.$secn.'">'.$secn.'</option><option value="Section 1">Section 1</option> <option value="Section 2">Section 2</option></select><noscript><input type="submit" value="Submit"></noscript></form></td>';
    }
    echo '</table></tbody></div></div>';}

//start grade 10 section 1

if(@$_GET['q']== 101)
{
    $q=mysqli_query($con,"SELECT * FROM section LEFT JOIN student ON section.usn = student.usn WHERE secn='section 1' && grade='grade 10' ORDER BY lname DESC " )or die('Error223');
    echo  '<span><button class="btn btn-primary navtext"><i class="glyphicon glyphicon-th-large"></i> Sectioning</button><i class="glyphicon glyphicon-chevron-right"></i> <input type="button" class="btn btn-primary navtext" value="Grade 10"></span><i class="glyphicon glyphicon-chevron-right"></i> <a href="#" ><input type="button" class="btn btn-primary navtext" value="Section 1"></a><i class="glyphicon glyphicon-option-vertical"></i><a href="section.php?q=102" ><input type="button" class="btn btn-default navtext" value="Section 2"></a><i class="glyphicon glyphicon-option-vertical"></i><a href="section.php?q=103" ><input type="button" class="btn btn-default navtext" value="Section 3"></a><a href="print.php?q=101" target="_blank"><input type="button" class="btn btn-danger navtext pull-right" value="Print"></a><div class="panel"><div class="table-responsive"><table id="datatable" class="table table-striped table-bordered"><thead>
                <tr style="color:#000000;"><td><b>No.</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>Transfer</b></td></tr></thead><tbody>';
    $c=0;
    while($row=mysqli_fetch_array($q) )
    {
        $e=$row['usn'];
        $secid = $row['secid'];
        $secn = $row['secn'];
        $q12=mysqli_query($con,"SELECT * FROM student WHERE usn='$e' " )or die('Error231');
        while($row=mysqli_fetch_array($q12) )
        {
            $fname = $row['fname'];
            $mname = $row['mname'];
            $lname = $row['lname'];
            $gender=$row['gender'];
        }

        $c++;
        echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$lname.', '.$fname.' '.$mname.'</td><td>'.$gender.'</td><td><form action="update.php?q=addsec10" method="POST"><input type="hidden" name="usn" value="'. $e .'"><input type="hidden" name="secid" value="'. $secid .'"><select  name="secn" onchange="this.form.submit()"><option value="'.$secn.'">'.$secn.'</option><option value="Section 2">Section 2</option> <option value="Section 3">Section 3</option></select><noscript><input type="submit" value="Submit"></noscript></form></td>';
    }
    echo '</table></tbody></div></div>';}

//start grade 10 section 2

if(@$_GET['q']== 102)
{
    $q=mysqli_query($con,"SELECT * FROM section LEFT JOIN student ON section.usn = student.usn WHERE secn='section 2' && grade='grade 10' ORDER BY lname DESC " )or die('Error223');
    echo  '<span><button class="btn btn-primary navtext"><i class="glyphicon glyphicon-th-large"></i> Sectioning</button><i class="glyphicon glyphicon-chevron-right"></i> <input type="button" class="btn btn-primary navtext" value="Grade 10"></span><i class="glyphicon glyphicon-chevron-right"></i> <a href="section.php?q=101" ><input type="button" class="btn btn-default navtext" value="Section 1"></a><i class="glyphicon glyphicon-option-vertical"></i><a href="#" ><input type="button" class="btn btn-primary navtext" value="Section 2"></a><i class="glyphicon glyphicon-option-vertical"></i><a href="section.php?q=103" ><input type="button" class="btn btn-default navtext" value="Section 3"></a><a href="print.php?q=102" target="_blank"><input type="button" class="btn btn-danger navtext pull-right" value="Print"></a><div class="panel"><div class="table-responsive"><table id="datatable" class="table table-striped table-bordered"><thead>
                <tr style="color:#000000;"><td><b>No.</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>Transfer</b></td></tr></thead><tbody>';
    $c=0;
    while($row=mysqli_fetch_array($q) )
    {
        $e=$row['usn'];
        $secid = $row['secid'];
        $secn = $row['secn'];
        $q12=mysqli_query($con,"SELECT * FROM student WHERE usn='$e' " )or die('Error231');
        while($row=mysqli_fetch_array($q12) )
        {
            $fname = $row['fname'];
            $mname = $row['mname'];
            $lname = $row['lname'];
            $gender=$row['gender'];
        }

        $c++;
        echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$lname.', '.$fname.' '.$mname.'</td><td>'.$gender.'</td><td><form action="update.php?q=addsec10" method="POST"><input type="hidden" name="usn" value="'. $e .'"><input type="hidden" name="secid" value="'. $secid .'"><select name="secn" onchange="this.form.submit()"><option value="'.$secn.'">'.$secn.'</option><option value="Section 1">Section 1</option> <option value="Section 3">Section 3</option></select><noscript><input type="submit" value="Submit"></noscript></form></td>';
    }
    echo '</table></tbody></div></div>';}

//start grade 10 section 3

if(@$_GET['q']== 103)
{
    $q=mysqli_query($con,"SELECT * FROM section LEFT JOIN student ON section.usn = student.usn WHERE secn='section 3' && grade='grade 10' ORDER BY lname DESC " )or die('Error223');
    echo  '<span><button class="btn btn-primary navtext"><i class="glyphicon glyphicon-th-large"></i> Sectioning</button><i class="glyphicon glyphicon-chevron-right"></i> <input type="button" class="btn btn-primary navtext" value="Grade 10"></span><i class="glyphicon glyphicon-chevron-right"></i> <a href="section.php?q=101" ><input type="button" class="btn btn-default navtext" value="Section 1"></a><i class="glyphicon glyphicon-option-vertical"></i><a href="section.php?q=102" ><input type="button" class="btn btn-default navtext" value="Section 2"></a><i class="glyphicon glyphicon-option-vertical"></i><a href="#" ><input type="button" class="btn btn-primary navtext" value="Section 3"></a><a href="print.php?q=103" target="_blank"><input type="button" class="btn btn-danger navtext pull-right" value="Print"></a><div class="panel"><div class="table-responsive"><table id="datatable" class="table table-striped table-bordered"><thead>
                <tr style="color:#000000;"><td><b>No.</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>Transfer</b></td></tr></thead><tbody>';
    $c=0;
    while($row=mysqli_fetch_array($q) )
    {
        $e=$row['usn'];
        $secid = $row['secid'];
        $secn = $row['secn'];
        $q12=mysqli_query($con,"SELECT * FROM student WHERE usn='$e' " )or die('Error231');
        while($row=mysqli_fetch_array($q12) )
        {
            $fname = $row['fname'];
            $mname = $row['mname'];
            $lname = $row['lname'];
            $gender=$row['gender'];
        }

        $c++;
        echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$lname.', '.$fname.' '.$mname.'</td><td>'.$gender.'</td><td><form action="update.php?q=addsec10" method="POST"><input type="hidden" name="usn" value="'. $e .'"><input type="hidden" name="secid" value="'. $secid .'"><select name="secn" onchange="this.form.submit()"><option value="'.$secn.'">'.$secn.'</option><option value="Section 1">Section 1</option> <option value="Section 2">Section 2</option></select><noscript><input type="submit" value="Submit"></noscript></form></td>';
    }
    echo '</table></tbody></div></div>';}

    ?>


    <!--home closed-->
<!--students start-->

<?php if(@$_GET['q']==1) {

$result = mysqli_query($con,"SELECT * FROM student LEFT JOIN rank ON rank.usn = student.usn ORDER BY lname ASC") or die('Error');
echo  '<span><i class="glyphicon glyphicon-user"></i> Student</span><div class="panel"><div class="table-responsive"><table id="datatable" class="table table-striped table-bordered"><thead>
<tr><td><b>No.</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>Grade</b></td><td><b>Student Number</b></td><td><b>Mobile</b></td><td><b>Status</b></td><td></td></tr></thead><tbody>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$fname = $row['fname'];
	$mname = $row['mname'];
	$lname = $row['lname'];
	$mob = $row['mob'];
	$gender = $row['gender'];
    $usn = $row['usn'];
	$grade = $row['grade'];

	echo '<tr><td>'.$c++.'</td><td>'.$lname.', '.$fname.' '.$mname.'</td><td>'.$gender.'</td><td>'.$grade.'</td><td>'.$usn.'</td><td>'.$mob.'</td><td>'.$status.'</td>
	<td><a title="Delete User" href="update.php?demail='.$usn.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td></tr>';
}
$c=0;
echo '</table></tbody></div></div>';

}?>
<!--user end-->

<!--feedback start-->
<?php if(@$_GET['q']==3) {
$result = mysqli_query($con,"SELECT * FROM `feedback` ORDER BY `feedback`.`date` DESC") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>No.</b></td><td><b>Subject</b></td><td><b>Student Number</b></td><td><b>Date</b></td><td><b>Time</b></td><td><b>By</b></td><td></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$date = $row['date'];
	$date= date("d-m-Y",strtotime($date));
	$time = $row['time'];
	$subject = $row['subject'];
	$name = $row['name'];
	$usn = $row['usn'];
	$id = $row['id'];
	 echo '<tr><td>'.$c++.'</td>';
	echo '<td><a title="Click to open feedback" href="dash.php?q=3&fid='.$id.'">'.$subject.'</a></td><td>'.$usn.'</td><td>'.$date.'</td><td>'.$time.'</td><td>'.$name.'</td>
	<td><a title="Open Feedback" href="dash.php?q=3&fid='.$id.'"><b><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></b></a></td>';
	echo '<td><a title="Delete Feedback" href="update.php?fdid='.$id.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td>

	</tr>';
}
echo '</table></div></div>';
}
?>
<!--feedback closed-->

<!--feedback reading portion start-->
<?php if(@$_GET['fid']) {
echo '<br />';
$id=@$_GET['fid'];
$result = mysqli_query($con,"SELECT * FROM feedback WHERE id='$id' ") or die('Error');
while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
	$subject = $row['subject'];
	$date = $row['date'];
	$date= date("d-m-Y",strtotime($date));
	$time = $row['time'];
	$feedback = $row['feedback'];
	
echo '<div class="panel"<a title="Back to Archive" href="update.php?q1=2"><b><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></b></a><h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;"><b>'.$subject.'</b></h1>';
 echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;"><span style="line-height:35px;padding:5px;">-&nbsp;<b>DATE:</b>&nbsp;'.$date.'</span>
<span style="line-height:35px;padding:5px;">&nbsp;<b>Time:</b>&nbsp;'.$time.'</span><span style="line-height:35px;padding:5px;">&nbsp;<b>By:</b>&nbsp;'.$name.'</span><br />'.$feedback.'</div></div>';}
}?>
<!--Feedback reading portion closed-->

<!--add exam start-->

<?php
if(@$_GET['q']==4 && !(@$_GET['step']) ) {
echo ' 
<table>
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Exam Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=addexam"  method="POST">


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="name" placeholder="Exam title" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="total"></label>  
  <div class="col-md-12">
  <input id="total" name="total" placeholder="Number of questions" class="form-control input-md" type="number">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="right"></label>  
  <div class="col-md-12">
  <input id="right" name="right" placeholder="Points per correct answer" class="form-control input-md" min="0" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="wrong"></label>  
  <div class="col-md-12">
  <input id="wrong" name="wrong" placeholder="Wrong answer" class="form-control input-md" min="0" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="time"></label>  
  <div class="col-md-12">
  <input id="time" name="time" placeholder="Time limit per question (seconds)" class="form-control input-md" min="1" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="desc"></label>  
  <div class="col-md-12">
  <textarea rows="8" cols="8" name="desc" class="form-control" placeholder="Description"></textarea>  
  </div>
</div>


<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>

</form>
</div></table>';



}
?>
<!--add exam end-->

<!--add exam step2 start-->
<?php
if(@$_GET['q']==4 && (@$_GET['step'])==2 ) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Question Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addqns&n='.@$_GET['n'].'&eid='.@$_GET['eid'].'&ch=4 "  method="POST">
<fieldset>
';

 for($i=1;$i<=@$_GET['n'];$i++)
 {
echo '<b>Question number&nbsp;'.$i.'&nbsp;:</b><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns'.$i.' "></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns'.$i.'" class="form-control" placeholder="Write question number '.$i.' here..."></textarea>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'1"></label>  
  <div class="col-md-12">
  <input id="'.$i.'1" name="'.$i.'1" placeholder="Option a" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'2"></label>  
  <div class="col-md-12">
  <input id="'.$i.'2" name="'.$i.'2" placeholder="Option b" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'3"></label>  
  <div class="col-md-12">
  <input id="'.$i.'3" name="'.$i.'3" placeholder="Option c" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'4"></label>  
  <div class="col-md-12">
  <input id="'.$i.'4" name="'.$i.'4" placeholder="Option d" class="form-control input-md" type="text">
    
  </div>
</div>
<br />
<b>Correct answer</b>:<br />
<select id="ans'.$i.'" name="ans'.$i.'" placeholder="Correct answer " class="form-control input-md" >
   <option value="a">Answer for question '.$i.'</option>
  <option value="a">option a</option>
  <option value="b">option b</option>
  <option value="c">option c</option>
  <option value="d">option d</option> </select><br /><br />';
 }

echo '<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';



}
?><!--add exam step 2 end-->

<!--edit questions start-->
<?php

if(@$_GET['q']==20 && (@$_GET['step'])==3 ) {
    echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Question Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=editqns&n=' . @$_GET['n'] . '&eid=' . @$_GET['eid'] . '&ch=5 "  method="POST">
<fieldset>
';

    for ($i = 1; $i <= @$_GET['n']; $i++) {
        echo '<b>Question number&nbsp;' . $i . '&nbsp;:</b><br /><!-- Text input-->


<div class="form-group">
  <label class="col-md-12 control-label" for="qns' . $i . ' "></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns' . $i . '" class="form-control" placeholder="Write question number ' . $i . ' here..."><?php echo $row[\'qns\'];?></textarea>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="' . $i . '1"></label>  
  <div class="col-md-12">
  <input id="' . $i . '1" name="' . $i . '1" placeholder="Option a" class="form-control input-md" type="text" value="<?php echo $row[\'option\']; ?>">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="' . $i . '2"></label>  
  <div class="col-md-12">
  <input id="' . $i . '2" name="' . $i . '2" placeholder="Option b" class="form-control input-md" type="text" value="<?php echo $row[\'option\']; ?>">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="' . $i . '3"></label>  
  <div class="col-md-12">
  <input id="' . $i . '3" name="' . $i . '3" placeholder="Option c" class="form-control input-md" type="text" value="<?php echo $row[\'option\']; ?>">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="' . $i . '4"></label>  
  <div class="col-md-12">
  <input id="' . $i . '4" name="' . $i . '4" placeholder="Option d" class="form-control input-md" type="text" value="<?php echo $row[\'option\']; ?>">
    
  </div>
</div>
<br />
<b>Correct answer</b>:<br />
<select id="ans' . $i . '" name="ans' . $i . '" placeholder="Correct answer " class="form-control input-md" >
   <option value="a">Answer for question ' . $i . '</option>
  <option value="a">option a</option>
  <option value="b">option b</option>
  <option value="c">option c</option>
  <option value="d">option d</option> </select><br /><br />';
    }

    echo '<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';
}
    ?><!--edit exam step 2 end-->

<!--remove exam-->
<?php if(@$_GET['q']==6) {

$result = mysqli_query($con,"SELECT * FROM exam ORDER BY date DESC") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>No.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$total = $row['total'];
	$sahi = $row['sahi'];
    $time = $row['time'];
	$eid = $row['eid'];
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;sec</td>
	<td><b><a href="update.php?q=rmexam&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Remove</b></span></a></b></td></tr>';
}
$c=0;
echo '</table></div></div>';

}
?>

    <!--edit exam-->
    <?php if(@$_GET['q']==5) {

        $result = mysqli_query($con,"SELECT * FROM exam ORDER BY date DESC") or die('Error');
        echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>No.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
        $c=1;
        while($row = mysqli_fetch_array($result)) {
            $title = $row['title'];
            $total = $row['total'];
            $sahi = $row['sahi'];
            $time = $row['time'];
            $eid = $row['eid'];
            echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;sec</td>
	<td><b><a href="dash.php?q=20&step=3&eid='.$eid.'&n='.$total.'" class="pull-right btn sub1" style="margin:0px;background:sandybrown"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Edit</b></span></a></b></td></tr>';
        }
        $c=0;
        echo '</table></div></div>';

    }
    ?>
</div><!--container closed-->
</div>
</div>
<!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Datatables -->
<script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>


<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>
</body>
</html>
