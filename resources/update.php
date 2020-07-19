<?php
include_once 'dbConnection.php';
session_start();
$usn=$_SESSION['usn'];
//delete feedback
if(isset($_SESSION['key'])){
if(@$_GET['fdid'] && $_SESSION['key'] == 'b21hcg') {
$id=@$_GET['fdid'];
$result = mysqli_query($con,"DELETE FROM feedback WHERE id='$id' ") or die('Error');
header("location:dash.php?q=3");
}
}

//delete student
if(isset($_SESSION['key'])){
if(@$_GET['demail'] && $_SESSION['key']=='b21hcg') {
$demail=@$_GET['demail'];
$r1 = mysqli_query($con,"DELETE FROM rank WHERE usn='$demail' ") or die('Error');
$r2 = mysqli_query($con,"DELETE FROM scores WHERE usn='$demail' ") or die('Error');
$result = mysqli_query($con,"DELETE FROM student WHERE usn='$demail' ") or die('Error');
header("location:dash.php?q=1");
}
}
//remove exam
if(isset($_SESSION['key'])){
if(@$_GET['q']== 'rmexam' && $_SESSION['key']=='b21hcg') {
$eid=@$_GET['eid'];
$result = mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' ") or die('Error');
while($row = mysqli_fetch_array($result)) {
	$qid = $row['qid'];
$r1 = mysqli_query($con,"DELETE FROM choices WHERE qid='$qid'") or die('Error');
$r2 = mysqli_query($con,"DELETE FROM answer WHERE qid='$qid' ") or die('Error');
}
$r3 = mysqli_query($con,"DELETE FROM questions WHERE eid='$eid' ") or die('Error');
$r4 = mysqli_query($con,"DELETE FROM exam WHERE eid='$eid' ") or die('Error');
$r4 = mysqli_query($con,"DELETE FROM scores WHERE eid='$eid' ") or die('Error');

header("location:dash.php?q=6");
}
}

// edit questions
if(isset($_SESSION['key'])) {
    if (@$_GET['q'] == 'editqns' && $_SESSION['key'] == 'b21hcg') {
        $n = @$_GET['n'];
        $eid = @$_GET['eid'];
        $ch = @$_GET['ch'];

        for ($i = 1; $i <= $n; $i++) {
            $qid = uniqid();
            $qns = $_POST['qns' . $i];
            $q3 = mysqli_query($con, "INSERT INTO questions VALUES  ('$eid','$qid','$qns' , '$ch' , '$i')");
            $oaid = uniqid();
            $a = $_POST[$i . '1'];
            $qa = mysqli_query($con, "INSERT INTO choices VALUES  ('$qid','$a','$oaid')") or die('Error61');

            $obid = uniqid();
            $b = $_POST[$i . '2'];
            $qb = mysqli_query($con, "INSERT INTO choices VALUES  ('$qid','$b','$obid')") or die('Error62');

            $ocid = uniqid();
            $c = $_POST[$i . '3'];
            $qc = mysqli_query($con, "INSERT INTO choices VALUES  ('$qid','$c','$ocid')") or die('Error63');

            $odid = uniqid();
            $d = $_POST[$i . '4'];
            $qd = mysqli_query($con, "INSERT INTO choices VALUES  ('$qid','$d','$odid')") or die('Error64');

            $e = $_POST['ans' . $i];
            switch ($e) {
                case 'a':
                    $ansid = $oaid;
                    break;
                case 'b':
                    $ansid = $obid;
                    break;
                case 'c':
                    $ansid = $ocid;
                    break;
                case 'd':
                    $ansid = $odid;
                    break;
                default:
                    $ansid = $oaid;
            }


            $qans = mysqli_query($con, "UPDATE answer VALUES  ('$qid','$ansid')");

        }
        header("location:dash.php?q=0");
    }
}
//add exam
    if (isset($_SESSION['key'])) {
        if (@$_GET['q'] == 'addexam' && $_SESSION['key'] == 'b21hcg') {
            $name = $_POST['name'];
            $name = ucwords(strtolower($name));
            $total = $_POST['total'];
            $correct = $_POST['right'];
            $wrong = $_POST['wrong'];
            $time = $_POST['time'];
            $tag = $_POST['tag'];
            $desc = $_POST['desc'];
            $id = uniqid();
            $q3 = mysqli_query($con, "INSERT INTO exam VALUES  ('$id','$name' , '$correct' , '$wrong','$total','$time' ,'$desc','$tag', NOW())");

            header("location:dash.php?q=4&step=2&eid=$id&n=$total");
        }
    }

//add question
    if (isset($_SESSION['key'])) {
        if (@$_GET['q'] == 'addqns' && $_SESSION['key'] == 'b21hcg') {
            $n = @$_GET['n'];
            $eid = @$_GET['eid'];
            $ch = @$_GET['ch'];

            for ($i = 1; $i <= $n; $i++) {
                $qid = uniqid();
                $qns = $_POST['qns' . $i];
                $q3 = mysqli_query($con, "INSERT INTO questions VALUES  ('$eid','$qid','$qns' , '$ch' , '$i')");
                $oaid = uniqid();
                $a = $_POST[$i . '1'];
                $qa = mysqli_query($con, "INSERT INTO choices VALUES  ('$qid','$a','$oaid')") or die('Error61');

                $obid = uniqid();
                $b = $_POST[$i . '2'];
                $qb = mysqli_query($con, "INSERT INTO choices VALUES  ('$qid','$b','$obid')") or die('Error62');

                $ocid = uniqid();
                $c = $_POST[$i . '3'];
                $qc = mysqli_query($con, "INSERT INTO choices VALUES  ('$qid','$c','$ocid')") or die('Error63');

                $odid = uniqid();
                $d = $_POST[$i . '4'];
                $qd = mysqli_query($con, "INSERT INTO choices VALUES  ('$qid','$d','$odid')") or die('Error64');

                $e = $_POST['ans' . $i];
                switch ($e) {
                    case 'a':
                        $ansid = $oaid;
                        break;
                    case 'b':
                        $ansid = $obid;
                        break;
                    case 'c':
                        $ansid = $ocid;
                        break;
                    case 'd':
                        $ansid = $odid;
                        break;
                    default:
                        $ansid = $oaid;
                }


                $qans = mysqli_query($con, "INSERT INTO answer VALUES  ('$qid','$ansid')");

            }
            header("location:dash.php?q=0");
        }
    }

//exam start
    if (@$_GET['q'] == 'exam' && @$_GET['step'] == 2) {
        $eid = @$_GET['eid'];
        $sn = @$_GET['n'];
        $total = @$_GET['t'];
        $ans = $_POST['ans'];
        $qid = @$_GET['qid'];
        $q = mysqli_query($con, "SELECT * FROM answer WHERE qid='$qid' ");
        while ($row = mysqli_fetch_array($q)) {
            $ansid = $row['ansid'];
        }
        if ($ans == $ansid) {
            $q = mysqli_query($con, "SELECT * FROM exam WHERE eid='$eid' ");
            while ($row = mysqli_fetch_array($q)) {
                $correct = $row['correct'];
            }
            if ($sn == 1) {
                $q = mysqli_query($con, "INSERT INTO scores VALUES('$usn','$eid' ,'0','0','0','0',NOW())") or die('Error');
            }
            $q = mysqli_query($con, "SELECT * FROM scores WHERE eid='$eid' AND usn='$usn' ") or die('Error115');

            while ($row = mysqli_fetch_array($q)) {
                $s = $row['score'];
                $r = $row['correct'];
            }
            $r++;
            $s = $s + $correct;
            $q = mysqli_query($con, "UPDATE `scores` SET `score`=$s,`level`=$sn,`correct`=$r, date= NOW()  WHERE  usn = '$usn' AND eid = '$eid'") or die('Error124');

        } else {
            $q = mysqli_query($con, "SELECT * FROM exam WHERE eid='$eid' ") or die('Error129');

            while ($row = mysqli_fetch_array($q)) {
                $wrong = $row['wrong'];
            }
            if ($sn == 1) {
                $q = mysqli_query($con, "INSERT INTO scores VALUES('$usn','$eid' ,'0','0','0','0',NOW() )") or die('Error137');
            }
            $q = mysqli_query($con, "SELECT * FROM scores WHERE eid='$eid' AND usn='$usn' ") or die('Error139');
            while ($row = mysqli_fetch_array($q)) {
                $s = $row['score'];
                $w = $row['wrong'];
            }
            $w++;
            $s = $s - $wrong;
            $q = mysqli_query($con, "UPDATE `scores` SET `score`=$s,`level`=$sn,`wrong`=$w, date=NOW() WHERE  usn = '$usn' AND eid = '$eid'") or die('Error147');
        }
        if ($sn != $total) {
            $sn++;
            header("location:account.php?q=exam&step=2&eid=$eid&n=$sn&t=$total") or die('Error152');
        } else if ($_SESSION['key'] != 'b21hcg') {
            $q = mysqli_query($con, "SELECT score,level,gpa FROM scores LEFT JOIN average ON scores.usn = average.usn WHERE eid='$eid' AND scores.usn='$usn'") or die('Error156');
            while ($row = mysqli_fetch_array($q)) {
                $s = $row['score'];
                $total = $row['level'];
                $gpa = $row['gpa'];
                $final = ($s / $total * 100 * 0.6) + ($gpa * 0.4);
            }
            $q = mysqli_query($con, "SELECT * FROM rank WHERE usn='$usn'") or die('Error161');
            $rowcount = mysqli_num_rows($q);


            if ($rowcount == 0) {
                $q2 = mysqli_query($con, "INSERT INTO rank VALUES('$usn','$final',NOW())") or die('Error165');

                // insert to section
                $secid = uniqid();
                if($final>=90) {
                    $q3 = mysqli_query($con, "INSERT INTO section (secid, secn, usn) VALUES  ('$secid', 'Section 1', '$usn')") or die ('Error166');
                } elseif($final<=89 && $final>=80) {
                    $q4 = mysqli_query($con, "INSERT INTO section (secid, secn, usn) VALUES  ('$secid', 'Section 2', '$usn')") or die ('Error167');
                } else
                    $q5 = mysqli_query($con, "INSERT INTO section (secid, secn, usn) VALUES  ('$secid', 'Section 3', '$usn')") or die ('Error168');

            } else {
                while ($row = mysqli_fetch_array($q)) {
                    $sun = $row['final'];
                }
                $sun = $s + $sun;
                $q = mysqli_query($con, "UPDATE `rank` SET `final`=$sun ,time=NOW() WHERE usn= '$usn'") or die('Error174');
            }
            header("location:account.php?q=result&eid=$eid");
        } else {
            header("location:account.php?q=result&eid=$eid");
        }
    }

//restart exam
    if (@$_GET['q'] == 'examre' && @$_GET['step'] == 25) {
        $eid = @$_GET['eid'];
        $n = @$_GET['n'];
        $t = @$_GET['t'];
        $q = mysqli_query($con, "SELECT score FROM scores WHERE eid='$eid' AND usn='$usn'") or die('Error156');
        while ($row = mysqli_fetch_array($q)) {
            $s = $row['score'];
        }
        $q = mysqli_query($con, "DELETE FROM `scores` WHERE eid='$eid' AND usn='$usn' ") or die('Error184');
        $q = mysqli_query($con, "SELECT * FROM rank WHERE usn='$usn'") or die('Error161');
        while ($row = mysqli_fetch_array($q)) {
            $sun = $row['final'];
        }
        $sun = $sun - $s;
        $q = mysqli_query($con, "UPDATE `rank` SET `final`=$sun ,time=NOW() WHERE usn= '$usn'") or die('Error174');
        header("location:account.php?q=exam&step=2&eid=$eid&n=1&t=$t");
    }

    // add to section 7
    if (isset($_POST['Submit']) || ($_SESSION['key'])) {
        if (@$_GET['q'] == 'addsec7' && $_SESSION['key'] == 'b21hcg') {

                $secid = $_POST['secid'];
                $secn = $_POST['secn'];
                $usn = $_POST['usn'];
                $q3 = mysqli_query($con, "UPDATE section SET secid='$secid', secn='$secn' , usn='$usn' WHERE secid='$secid'");

                header("location:dash.php?q=7");
            }
    }

// add to section 8
if (isset($_POST['Submit8']) || ($_SESSION['key'])) {
    if (@$_GET['q'] == 'addsec8' && $_SESSION['key'] == 'b21hcg') {

        $secid = $_POST['secid'];
        $secn = $_POST['secn'];
        $usn = $_POST['usn'];
        $q3 = mysqli_query($con, "UPDATE section SET secid='$secid', secn='$secn' , usn='$usn' WHERE secid='$secid'");

        header("location:dash.php?q=8");
    }
}

// add to section 9
if (isset($_POST['Submit']) || ($_SESSION['key'])) {
    if (@$_GET['q'] == 'addsec9' && $_SESSION['key'] == 'b21hcg') {

        $secid = $_POST['secid'];
        $secn = $_POST['secn'];
        $usn = $_POST['usn'];
        $q3 = mysqli_query($con, "UPDATE section SET secid='$secid', secn='$secn' , usn='$usn' WHERE secid='$secid'");

        header("location:dash.php?q=9");
    }
}

// add to section 10
if (isset($_POST['Submit']) || ($_SESSION['key'])) {
    if (@$_GET['q'] == 'addsec10' && $_SESSION['key'] == 'b21hcg') {

        $secid = $_POST['secid'];
        $secn = $_POST['secn'];
        $usn = $_POST['usn'];
        $q3 = mysqli_query($con, "UPDATE section SET secid='$secid', secn='$secn' , usn='$usn' WHERE secid='$secid'");

        header("location:dash.php?q=10");
    }
}


    // edit exam
if (isset($_SESSION['key'])) {
    if (@$_GET['q'] == 'editexam' && $_SESSION['key'] == 'b21hcg') {
        $name = $_POST['name'];
        $correct = $_POST['right'];
        $wrong = $_POST['wrong'];
        $time = $_POST['time'];
        $tag = $_POST['tag'];
        $desc = $_POST['desc'];
        $eid = $_POST['eid'];
        $q3 = mysqli_query($con, "UPDATE exam SET eid='$eid', title='$name' , correct='$correct' , wrong='$wrong', time='$time' , intro='$desc', tag='$tag', date=NOW() WHERE eid='$eid'");

        header("location:dash.php?q=5");
    }
}
?>



