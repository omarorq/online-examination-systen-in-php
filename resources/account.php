<!--Disable url parameter changes-->
<?php if (!isset($_SERVER['HTTP_REFERER'])) {/* redirect them to your desired location */header("location:javascript://history.go(-1)");exit(1);} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>IQ Test</title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
<link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>
<link rel="stylesheet" href="css/main.css">

<link  rel="stylesheet" href="css/font.css">
<script src="js/jquery.js" type="text/javascript"></script>

<script src="js/bootstrap.min.js"  type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<style> /*countdown timer*/  #countdown {position: relative;margin: auto;height: 40px;width: 40px;text-align: center;}  #countdown-number {color: red;font-weight: bolder;display: inline-block;line-height: 40px;}  svg {position: absolute;top: 0;right: 0;width: 40px;height: 40px;transform: rotateY(-180deg) rotateZ(-90deg);}  svg circle {stroke-dasharray: 113px;stroke-dashoffset: 0px;stroke-linecap: round;stroke-width: 4px;stroke: darkgrey;fill: none;animation: countdown 9s linear infinite forwards;}  @keyframes countdown { from {stroke-dashoffset: 0px;} to {stroke-dashoffset: 113px;} }</style>
 <!--alert message-->
<?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>
<!--alert message end-->

</head>
<?php
include_once 'dbConnection.php';
?>
<body>
<div class="header">
<div class="row">
<div class="col-lg-6">
    <span class="pull-left top title1 log1"><b>IQ Examination</b></span></div>
<div class="col-md-4 col-md-offset-2">

<!--Disable back option-->
<script type="text/javascript"> history.pushState(null, null, location.href);window.onpopstate = function () {history.go(1);};</script>
 <?php
 include_once 'dbConnection.php';
session_start();
  if(!isset($_SESSION['usn'])){
header("location:index.php");

} else {

$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$usn = $_SESSION['usn'];
$_SESSION["fname"] = $fname;
$_SESSION["lname"] = $lname;
$_SESSION["usn"] = $usn;

include_once 'dbConnection.php';
echo '<span class="pull-right top" ><span class="hello"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Hello,</span> <a href="#" class="log hello">'.$fname.' '.$lname.'</a>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
}
?>
</div>
</div></div>
<div class="bg">

<!--navigation menu-->
<nav class="navbar navbar-default title1" style="background: #202020; border: none;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#" style="color: white"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
<!--        <li --><?php //if(@$_GET['q']==1) echo'class="active"'; ?><!-- ><a href="account.php?q=1"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home<span class="sr-only">(current)</span></a></li>-->
		</ul>
      </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav><!--navigation menu closed-->
<div class="container"><!--container start-->
<div class="row">
<div class="col-md-12">

<!--home start-->
<?php if(@$_GET['q']==1) {

$result = mysqli_query($con,"SELECT * FROM exam ORDER BY date DESC") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table id="datatable" class="table table-striped table-bordered"><thead>
<tr><td><b>No.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr></thead><tbody>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$total = $row['total'];
	$correct = $row['correct'];
    $time = $row['time'];
	$eid = $row['eid'];
$q12=mysqli_query($con,"SELECT score FROM scores WHERE eid='$eid' AND usn='$usn'" )or die('Error98');
$q12=mysqli_query($con,"SELECT score FROM scores WHERE eid='$eid' AND usn='$usn'" )or die('Error98');
$q12=mysqli_query($con,"SELECT score FROM scores WHERE eid='$eid' AND usn='$usn'" )or die('Error98');
$rowcount=mysqli_num_rows($q12);
if($rowcount == 0){
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$correct*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><a href="account.php?q=exam&step=2&eid='.$eid.'&n=1&t='.$total.'" style="color: deepskyblue"><span class="glyphicon glyphicon-new-window" aria-hidden="true"><span class="navtext"><b> Begin</b></span></a></></td></tr>';
}
else
{
echo '<tr style="color:#99cc32"><td>'.$c++.'</td><td>'.$title.'&nbsp;<span title="This exam is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>'.$total.'</td><td>'.$correct*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><a href="update.php?q=examre&step=25&eid='.$eid.'&n=1&t='.$total.'" style="color: red"><span class="glyphicon glyphicon-repeat" aria-hidden="true"><span class="navtext"><b> Restart</b></span></a></b></td></tr>';
}
}
$c=0;
echo '</table></tbody></div></div>';

}?>

<!--    Timer for exam    -->

<?php $eid=@$_GET['eid']; 
      $q=mysqli_query($con,"SELECT time FROM exam WHERE eid = '$eid'"); 
                            while($row=mysqli_fetch_array($q) ) {
                                $time = $row['time'];
                            }?>

    <script type="text/javascript">
        var hoursleft = 0;
        var minutesleft = parseInt('<?php echo $time; ?>');
        var secondsleft = 0;
        var end;
        if(localStorage.getItem("end")) {
            end = new Date(localStorage.getItem("end"));
        } else {
            end = new Date();
            end.setMinutes(end.getMinutes()+minutesleft);
            end.setSeconds(end.getSeconds()+secondsleft);
        }
        var counter = function () {
            var now = new Date();
            var diff = end - now;
            diff = new Date(diff);
            var sec = diff.getSeconds();
            var min = diff.getMinutes();
            if (min < 10) {
                min = min;
            }
            if (sec < 10) {
                sec = "0" + sec;
            }
            if(now >= end) {
                clearTimeout(interval);
                localStorage.clear("end", end)
                document.getElementById('countdown-number').object = $("#examination_form").unbind().submit();
            } else {
                var value = min + ":" + sec;
                localStorage.setItem("end", end);
                document.getElementById('countdown-number').innerHTML = value;
            }
        }
        var interval = setInterval(counter, 1000);
    </script>

<!--home closed-->

<!--exam start-->
<?php
if (@$_GET['q']== 'exam' && @$_GET['step']== 2) {
$eid=@$_GET['eid'];
$sn=@$_GET['n'];
$total=@$_GET['t'];
$q=mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' " );
echo '<div class="panel exampanel fade-in one" style="text-align: center">';
while($row=mysqli_fetch_array($q) )
{
$qns=$row['qns'];
$qid=$row['qid'];

echo '<span class="question">Question &nbsp;'.$sn.'</span>:<br /><br />'.$qns.'<br /><br /></div><br /><span id="countdown" class="timer pull-right fade-in two"></span><div id="countdown">
        <div id="countdown-number"></div>
        <svg class="fade-in two">
           <circle r="18" cx="20" cy="20" width="40px"></circle>
        </svg>
    </div>';
}
$q=mysqli_query($con,"SELECT * FROM choices WHERE qid='$qid' " );
echo '<form action="update.php?q=exam&step=2&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'" method="POST"  class="form-horizontal" id="examination_form">
<br />';
    echo '<div class="panel answerpanel fade-in three">';
while($row=mysqli_fetch_array($q) )
{
$option=$row['option'];
$optionid=$row['optionid'];
echo'<br /><input type="radio" name="ans" value="'.$optionid.'">&nbsp;'.$option.'<br />';
}
echo'<br /><div class="text-center"><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-step-forward" aria-hidden="true"></span> Next</button></div></div></form></div>';
//header("location:account.php?q=4&step=2&eid=$id&n=$total");
}
//result display for students
if(@$_GET['q']== 'result' && @$_GET['eid'])
{
    $eid=@$_GET['eid'];
    $q=mysqli_query($con,"SELECT * FROM scores WHERE eid='$eid' AND usn='$usn' " )or die('Error157');
    $q=mysqli_query($con,"SELECT * FROM scores WHERE eid='$eid' AND usn='$usn' " )or die('Error157');
    $q=mysqli_query($con,"SELECT * FROM scores WHERE eid='$eid' AND usn='$usn' " )or die('Error157');
    echo  '<div class="panel resultpanel fade-in one">
<span id="examresult" class="examresult"><center>Exam Result</center></span><br /><table class="table table-striped title1" style="font-size:14px;font-weight:1000;">';

    while($row=mysqli_fetch_array($q) )
    {
        $s=$row['score'];
        $w=$row['wrong'];
        $r=$row['correct'];
        $qa=$row['level'];
        echo '<tr style="color:#66CCFF"><td><span class="glyphicon glyphicon-text-width" aria-hidden="true"></span> Total Questions</td><td>'.$qa.'</td></tr>
      <tr style="color:#99cc32"><td><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>&nbsp;Correct</td><td>'.$r.'</td></tr> 
	  <tr style="color:red"><td><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>&nbsp;Wrong</td><td>'.$w.'</td></tr>
	  <tr style="color:#660033"><td><span class="glyphicon glyphicon-star" aria-hidden="true"></span>&nbsp;Score</td><td>'.$s.'</td></tr>';
    }
    echo '</table></div>';

}
?>
<?php
//scores start
if(@$_GET['q']== 2)
{
$q=mysqli_query($con,"SELECT * FROM scores WHERE usn='$usn' ORDER BY date DESC " )or die('Error197');
$q=mysqli_query($con,"SELECT * FROM scores WHERE usn='$usn' ORDER BY date DESC " )or die('Error197');
$q=mysqli_query($con,"SELECT * FROM scores WHERE usn='$usn' ORDER BY date DESC " )or die('Error197');
echo  '<div class="panel title">
<table class="table table-striped title1" >
<tr style="color:red"><td><b>No.</b></td><td><b>Exam</b></td><td><b>Question Solved</b></td><td><b>Right</b></td><td><b>Wrong<b></td><td><b>Score</b></td>';
$c=0;
while($row=mysqli_fetch_array($q) )
{
$eid=$row['eid'];
$s=$row['score'];
$w=$row['wrong'];
$r=$row['correct'];
$qa=$row['level'];
$q23=mysqli_query($con,"SELECT title FROM exam WHERE  eid='$eid' " )or die('Error208');
while($row=mysqli_fetch_array($q23) )
{
$title=$row['title'];
}
$c++;
echo '<tr><td>'.$c.'</td><td>'.$title.'</td><td>'.$qa.'</td><td>'.$r.'</td><td>'.$w.'</td><td>'.$s.'</td></tr>';
}
echo'</table></div>';
}

//ranking start
if(@$_GET['q']== 3)
{
$q=mysqli_query($con,"SELECT * FROM rank  ORDER BY score DESC " )or die('Error223');
echo  '<div class="panel title"><div class="table-responsive">
<table class="table table-striped title1" >
<tr style="color:red"><td><b>Rank</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>College</b></td><td><b>Score</b></td></tr>';
$c=0;
while($row=mysqli_fetch_array($q) )
{
$e=$row['usn'];
$s=$row['score'];
$q12=mysqli_query($con,"SELECT * FROM student WHERE usn='$e' " )or die('Error231');
$q12=mysqli_query($con,"SELECT * FROM student WHERE usn='$e' " )or die('Error231');
while($row=mysqli_fetch_array($q12) )
{
$fname=$row['fname'];
$lname=$row['lname'];
$gender=$row['gender'];
$grade=$row['grade'];
}
$c++;
echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$fname.' '.$lname.'</td><td>'.$gender.'</td><td>'.$grade.'</td><td>'.$s.'</td><td>';
}
echo '</table></div></div>';}
?>

</div>
</div>
</div>
</div>
<?php require_once 'datatables.php'; ?>
</body>
</html>
