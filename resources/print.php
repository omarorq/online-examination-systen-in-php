<?php require_once 'dbConnection.php'; ?>

<html>

<head>
    <title></title>

    <style>

        body{
            font-family: "Segoe UI", serif;

        }
        td {
            font-size: 14px;
        }
        th{
            font-size: 14px;
            text-align: left;;
            padding-left: 4px;
        }

        table {
            width: 100%;
            margin-bottom: 20px;

        }

        @media print{
            #print {
                display:none;
            }
            * { color: black; background: white; }
            table { font-size: 80%; }
        }

        #print {
            width: 60px;
            height: 20px;
            font-size: 12px;
            font-family: arial;
            background: red;
            border-radius: 4px;
            cursor:hand;
            margin-left: 90%;
        }

    </style>

    <script> function printPage() {window.print();} </script>

</head>


<body>
<div class = "container">
    <div id = "header">
        <br/>
        <button type="submit" id="print" onclick="printPage()" >Print</button>

        <!-- Print ranking grade 7 -->
        <?php
        if(@$_GET['q']== 7)
        {
            $q=mysqli_query($con,"SELECT * FROM rank LEFT JOIN student ON rank.usn = student.usn LEFT JOIN average ON rank.usn = average.usn LEFT JOIN scores ON rank.usn = scores.usn WHERE grade = 'grade 7' ORDER BY final DESC " )or die('Error223');
            echo  '<div align="center">
            <h5>Franciscan College of the Immaculate Conception<br /> Baybay, Leyte, Incorporated<br /> 6521 Baybay City, Leyte<br />Philippines</h5>
        </div>
        <div align="left">
            <h5>Grade 7</h5>
        </div><table border="1"><thead>
<tr><td width="50%"><b>Name</b></td><td width="10%"><b>Gender</b></td><td width="10%"><b>Score</b></td><td width="10%"><b>GPA</b></td><td width="10%"><b>Final</b></td><td width="10%"><b>Section</b></td></tr></thead><tbody>';
            $c=0;
            while($row=mysqli_fetch_array($q) )
            {
                $e=$row['usn'];
                $s=$row['score'];
                $fname = $row['fname'];
                $mname = $row['mname'];
                $lname = $row['lname'];
                $gender = $row['gender'];
                $gpa = $row['gpa'];
                $total = $row['level'];
                $final = $row['final'];

                $c++;
                echo '<tr><td>'.$c.'. '.$lname.', '.$fname.' '.$mname.'</td><td>'.$gender.'</td><td>'.$s.'</td><td>'.$gpa.'</td><td>'.$final.'</td>';
                $q5 = mysqli_query($con, "SELECT * FROM section WHERE usn = '$e'"); while ($row=mysqli_fetch_assoc($q5)) { $section = $row['secn']; echo '<td>'. $section .'</td>';  }
            }
            echo '</table></tbody></div></div>';}
        ?>

        <!-- Print ranking grade 8 -->
        <?php
        if(@$_GET['q']== 8)
        {
            $q=mysqli_query($con,"SELECT * FROM rank LEFT JOIN student ON rank.usn = student.usn LEFT JOIN average ON rank.usn = average.usn LEFT JOIN scores ON rank.usn = scores.usn WHERE grade = 'grade 8' ORDER BY final DESC " )or die('Error223');
            echo  '<div align="center">
            <h5>Franciscan College of the Immaculate Conception<br /> Baybay, Leyte, Incorporated<br /> 6521 Baybay City, Leyte<br />Philippines</h5>
        </div>
        <div align="left">
            <h5>Grade 8</h5>
        </div><table border="1"><thead>
<tr><td width="50%"><b>Name</b></td><td width="10%"><b>Gender</b></td><td width="10%"><b>Score</b></td><td width="10%"><b>GPA</b></td><td width="10%"><b>Final</b></td><td width="10%"><b>Section</b></td></tr></thead><tbody>';
            $c=0;
            while($row=mysqli_fetch_array($q) )
            {
                $e=$row['usn'];
                $s=$row['score'];
                $fname = $row['fname'];
                $mname = $row['mname'];
                $lname = $row['lname'];
                $gender = $row['gender'];
                $gpa = $row['gpa'];
                $total = $row['level'];
                $final = $row['final'];

                $c++;
                echo '<tr><td>'.$c.'. '.$lname.', '.$fname.' '.$mname.'</td><td>'.$gender.'</td><td>'.$s.'</td><td>'.$gpa.'</td><td>'.$final.'</td>';
                $q5 = mysqli_query($con, "SELECT * FROM section WHERE usn = '$e'"); while ($row=mysqli_fetch_assoc($q5)) { $section = $row['secn']; echo '<td>'. $section .'</td>';  }
            }
            echo '</table></tbody></div></div>';}
        ?>


        <!-- Print ranking grade 9 -->
        <?php
        if(@$_GET['q']== 9)
        {
            $q=mysqli_query($con,"SELECT * FROM rank LEFT JOIN student ON rank.usn = student.usn LEFT JOIN average ON rank.usn = average.usn LEFT JOIN scores ON rank.usn = scores.usn WHERE grade = 'grade 9' ORDER BY final DESC " )or die('Error223');
            echo  '<div align="center">
            <h5>Franciscan College of the Immaculate Conception<br /> Baybay, Leyte, Incorporated<br /> 6521 Baybay City, Leyte<br />Philippines</h5>
        </div>
        <div align="left">
            <h5>Grade 9</h5>
        </div><table border="1"><thead>
<tr><td width="50%"><b>Name</b></td><td width="10%"><b>Gender</b></td><td width="10%"><b>Score</b></td><td width="10%"><b>GPA</b></td><td width="10%"><b>Final</b></td><td width="10%"><b>Section</b></td></tr></thead><tbody>';
            $c=0;
            while($row=mysqli_fetch_array($q) )
            {
                $e=$row['usn'];
                $s=$row['score'];
                $fname = $row['fname'];
                $mname = $row['mname'];
                $lname = $row['lname'];
                $gender = $row['gender'];
                $gpa = $row['gpa'];
                $total = $row['level'];
                $final = $row['final'];

                $c++;
                echo '<tr><td>'.$c.'. '.$lname.', '.$fname.' '.$mname.'</td><td>'.$gender.'</td><td>'.$s.'</td><td>'.$gpa.'</td><td>'.$final.'</td>';
                $q5 = mysqli_query($con, "SELECT * FROM section WHERE usn = '$e'"); while ($row=mysqli_fetch_assoc($q5)) { $section = $row['secn']; echo '<td>'. $section .'</td>';  }
            }
            echo '</table></tbody></div></div>';}
        ?>

        <!-- Print ranking grade 10 -->
        <?php
        if(@$_GET['q']== 10)
        {
            $q=mysqli_query($con,"SELECT * FROM rank LEFT JOIN student ON rank.usn = student.usn LEFT JOIN average ON rank.usn = average.usn LEFT JOIN scores ON rank.usn = scores.usn WHERE grade = 'grade 10' ORDER BY final DESC " )or die('Error223');
            echo  '<div align="center">
            <h5>Franciscan College of the Immaculate Conception<br /> Baybay, Leyte, Incorporated<br /> 6521 Baybay City, Leyte<br />Philippines</h5>
        </div>
        <div align="left">
            <h5>Grade 10</h5>
        </div><table border="1"><thead>
<tr><td width="50%"><b>Name</b></td><td width="10%"><b>Gender</b></td><td width="10%"><b>Score</b></td><td width="10%"><b>GPA</b></td><td width="10%"><b>Final</b></td><td width="10%"><b>Section</b></td></tr></thead><tbody>';
            $c=0;
            while($row=mysqli_fetch_array($q) )
            {
                $e=$row['usn'];
                $s=$row['score'];
                $fname = $row['fname'];
                $mname = $row['mname'];
                $lname = $row['lname'];
                $gender = $row['gender'];
                $gpa = $row['gpa'];
                $total = $row['level'];
                $final = $row['final'];

                $c++;
                echo '<tr><td>'.$c.'. '.$lname.', '.$fname.' '.$mname.'</td><td>'.$gender.'</td><td>'.$s.'</td><td>'.$gpa.'</td><td>'.$final.'</td>';
                $q5 = mysqli_query($con, "SELECT * FROM section WHERE usn = '$e'"); while ($row=mysqli_fetch_assoc($q5)) { $section = $row['secn']; echo '<td>'. $section .'</td>';  }
            }
            echo '</table></tbody></div></div>';}
        ?>



        <!-- Print grade 7 section 1 -->
        <?php
        if(@$_GET['q']== 71)
        {
            $q=mysqli_query($con,"SELECT * FROM section LEFT JOIN student ON section.usn = student.usn WHERE secn='section 1' && grade ='grade 7' ORDER BY lname DESC " )or die('Error223');
            echo  '<div align="center">
            <h5>Franciscan College of the Immaculate Conception<br /> Baybay, Leyte, Incorporated<br /> 6521 Baybay City, Leyte<br />Philippines</h5>
        </div>
        <div align="left">
            <h5>Grade 7 - Section 1</h5>
        </div><table border="1"><thead>
<tr><td width="80%"><b>Name</b></td><td width="20%"><b>Gender</b></td></tr></thead><tbody>';
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
                echo '<tr><td>'.$c.'. '.$lname.', '.$fname.' '.$mname.'</td><td>'.$gender.'</td>';
            }
            echo '</table></tbody></div></div>';}
        ?>

        <!-- Print grade 7 section 2 -->
        <?php
        if(@$_GET['q']== 72)
        {
            $q=mysqli_query($con,"SELECT * FROM section LEFT JOIN student ON section.usn = student.usn WHERE secn='section 2' && grade ='grade 7' ORDER BY lname DESC " )or die('Error223');
            echo  '<div align="center">
            <h5>Franciscan College of the Immaculate Conception<br /> Baybay, Leyte, Incorporated<br /> 6521 Baybay City, Leyte<br />Philippines</h5>
        </div>
        <div align="left">
            <h5>Grade 7 - Section 2</h5>
        </div><table border="1"><thead>
<tr><td width="80%"><b>Name</b></td><td width="20%"><b>Gender</b></td></tr></thead><tbody>';
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
                echo '<tr><td>'.$c.'. '.$lname.', '.$fname.' '.$mname.'</td><td>'.$gender.'</td>';
            }
            echo '</table></tbody></div></div>';}
        ?>

        <!-- Print grade 7 section 3 -->
        <?php
        if(@$_GET['q']== 73)
        {
            $q=mysqli_query($con,"SELECT * FROM section LEFT JOIN student ON section.usn = student.usn WHERE secn='section 3' && grade ='grade 7' ORDER BY lname DESC " )or die('Error223');
            echo  '<div align="center">
            <h5>Franciscan College of the Immaculate Conception<br /> Baybay, Leyte, Incorporated<br /> 6521 Baybay City, Leyte<br />Philippines</h5>
        </div>
        <div align="left">
            <h5>Grade 7 - Section 3</h5>
        </div><table border="1"><thead>
<tr><td width="80%"><b>Name</b></td><td width="20%"><b>Gender</b></td></tr></thead><tbody>';
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
                echo '<tr><td>'.$c.'. '.$lname.', '.$fname.' '.$mname.'</td><td>'.$gender.'</td>';
            }
            echo '</table></tbody></div></div>';}
        ?>

        <!-- Print grade 8 section 1 -->
        <?php
        if(@$_GET['q']== 81)
        {
            $q=mysqli_query($con,"SELECT * FROM section LEFT JOIN student ON section.usn = student.usn WHERE secn='section 1' && grade ='grade 8' ORDER BY lname DESC " )or die('Error223');
            echo  '<div align="center">
            <h5>Franciscan College of the Immaculate Conception<br /> Baybay, Leyte, Incorporated<br /> 6521 Baybay City, Leyte<br />Philippines</h5>
        </div>
        <div align="left">
            <h5>Grade 8 - Section 1</h5>
        </div><table border="1"><thead>
<tr><td width="80%"><b>Name</b></td><td width="20%"><b>Gender</b></td></tr></thead><tbody>';
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
                echo '<tr><td>'.$c.'. '.$lname.', '.$fname.' '.$mname.'</td><td>'.$gender.'</td>';
            }
            echo '</table></tbody></div></div>';}
        ?>

        <!-- Print grade 8 section 2 -->
        <?php
        if(@$_GET['q']== 82)
        {
            $q=mysqli_query($con,"SELECT * FROM section LEFT JOIN student ON section.usn = student.usn WHERE secn='section 2' && grade ='grade 8' ORDER BY lname DESC " )or die('Error223');
            echo  '<div align="center">
            <h5>Franciscan College of the Immaculate Conception<br /> Baybay, Leyte, Incorporated<br /> 6521 Baybay City, Leyte<br />Philippines</h5>
        </div>
        <div align="left">
            <h5>Grade 8 - Section 2</h5>
        </div><table border="1"><thead>
<tr><td width="80%"><b>Name</b></td><td width="20%"><b>Gender</b></td></tr></thead><tbody>';
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
                echo '<tr><td>'.$c.'. '.$lname.', '.$fname.' '.$mname.'</td><td>'.$gender.'</td>';
            }
            echo '</table></tbody></div></div>';}
        ?>

        <!-- Print grade 8 section 3 -->
        <?php
        if(@$_GET['q']== 83)
        {
            $q=mysqli_query($con,"SELECT * FROM section LEFT JOIN student ON section.usn = student.usn WHERE secn='section 3' && grade ='grade 8' ORDER BY lname DESC " )or die('Error223');
            echo  '<div align="center">
            <h5>Franciscan College of the Immaculate Conception<br /> Baybay, Leyte, Incorporated<br /> 6521 Baybay City, Leyte<br />Philippines</h5>
        </div>
        <div align="left">
            <h5>Grade 8 - Section 3</h5>
        </div><table border="1"><thead>
<tr><td width="80%"><b>Name</b></td><td width="20%"><b>Gender</b></td></tr></thead><tbody>';
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
                echo '<tr><td>'.$c.'. '.$lname.', '.$fname.' '.$mname.'</td><td>'.$gender.'</td>';
            }
            echo '</table></tbody></div></div>';}
        ?>

        <!-- Print grade 9 section 1 -->
        <?php
        if(@$_GET['q']== 91)
        {
            $q=mysqli_query($con,"SELECT * FROM section LEFT JOIN student ON section.usn = student.usn WHERE secn='section 1' && grade ='grade 9' ORDER BY lname DESC " )or die('Error223');
            echo  '<div align="center">
            <h5>Franciscan College of the Immaculate Conception<br /> Baybay, Leyte, Incorporated<br /> 6521 Baybay City, Leyte<br />Philippines</h5>
        </div>
        <div align="left">
            <h5>Grade 9 - Section 1</h5>
        </div><table border="1"><thead>
<tr><td width="80%"><b>Name</b></td><td width="20%"><b>Gender</b></td></tr></thead><tbody>';
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
                echo '<tr><td>'.$c.'. '.$lname.', '.$fname.' '.$mname.'</td><td>'.$gender.'</td>';
            }
            echo '</table></tbody></div></div>';}
        ?>

        <!-- Print grade 9 section 2 -->
        <?php
        if(@$_GET['q']== 92)
        {
            $q=mysqli_query($con,"SELECT * FROM section LEFT JOIN student ON section.usn = student.usn WHERE secn='section 2' && grade ='grade 9' ORDER BY lname DESC " )or die('Error223');
            echo  '<div align="center">
            <h5>Franciscan College of the Immaculate Conception<br /> Baybay, Leyte, Incorporated<br /> 6521 Baybay City, Leyte<br />Philippines</h5>
        </div>
        <div align="left">
            <h5>Grade 9 - Section 2</h5>
        </div><table border="1"><thead>
<tr><td width="80%"><b>Name</b></td><td width="20%"><b>Gender</b></td></tr></thead><tbody>';
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
                echo '<tr><td>'.$c.'. '.$lname.', '.$fname.' '.$mname.'</td><td>'.$gender.'</td>';
            }
            echo '</table></tbody></div></div>';}
        ?>

        <!-- Print grade 9 section 3 -->
        <?php
        if(@$_GET['q']== 93)
        {
            $q=mysqli_query($con,"SELECT * FROM section LEFT JOIN student ON section.usn = student.usn WHERE secn='section 3' && grade ='grade 9' ORDER BY lname DESC " )or die('Error223');
            echo  '<div align="center">
            <h5>Franciscan College of the Immaculate Conception<br /> Baybay, Leyte, Incorporated<br /> 6521 Baybay City, Leyte<br />Philippines</h5>
        </div>
        <div align="left">
            <h5>Grade 9 - Section 3</h5>
        </div><table border="1"><thead>
<tr><td width="80%"><b>Name</b></td><td width="20%"><b>Gender</b></td></tr></thead><tbody>';
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
                echo '<tr><td>'.$c.'. '.$lname.', '.$fname.' '.$mname.'</td><td>'.$gender.'</td>';
            }
            echo '</table></tbody></div></div>';}
        ?>

        <!-- Print grade 10 section 1 -->
        <?php
        if(@$_GET['q']== 101)
        {
            $q=mysqli_query($con,"SELECT * FROM section LEFT JOIN student ON section.usn = student.usn WHERE secn='section 1' && grade ='grade 10' ORDER BY lname DESC " )or die('Error223');
            echo  '<div align="center">
            <h5>Franciscan College of the Immaculate Conception<br /> Baybay, Leyte, Incorporated<br /> 6521 Baybay City, Leyte<br />Philippines</h5>
        </div>
        <div align="left">
            <h5>Grade 10 - Section 1</h5>
        </div><table border="1"><thead>
<tr><td width="80%"><b>Name</b></td><td width="20%"><b>Gender</b></td></tr></thead><tbody>';
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
                echo '<tr><td>'.$c.'. '.$lname.', '.$fname.' '.$mname.'</td><td>'.$gender.'</td>';
            }
            echo '</table></tbody></div></div>';}
        ?>

        <!-- Print grade 10 section 2 -->
        <?php
        if(@$_GET['q']== 102)
        {
            $q=mysqli_query($con,"SELECT * FROM section LEFT JOIN student ON section.usn = student.usn WHERE secn='section 2' && grade ='grade 10' ORDER BY lname DESC " )or die('Error223');
            echo  '<div align="center">
            <h5>Franciscan College of the Immaculate Conception<br /> Baybay, Leyte, Incorporated<br /> 6521 Baybay City, Leyte<br />Philippines</h5>
        </div>
        <div align="left">
            <h5>Grade 10 - Section 2</h5>
        </div><table border="1"><thead>
<tr><td width="80%"><b>Name</b></td><td width="20%"><b>Gender</b></td></tr></thead><tbody>';
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
                echo '<tr><td>'.$c.'. '.$lname.', '.$fname.' '.$mname.'</td><td>'.$gender.'</td>';
            }
            echo '</table></tbody></div></div>';}
        ?>

        <!-- Print grade 10section 3 -->
        <?php
        if(@$_GET['q']== 103)
        {
            $q=mysqli_query($con,"SELECT * FROM section LEFT JOIN student ON section.usn = student.usn WHERE secn='section 3' && grade ='grade 10' ORDER BY lname DESC " )or die('Error223');
            echo  '<div align="center">
            <h5>Franciscan College of the Immaculate Conception<br /> Baybay, Leyte, Incorporated<br /> 6521 Baybay City, Leyte<br />Philippines</h5>
        </div>
        <div align="left">
            <h5>Grade 10 - Section 3</h5>
        </div><table border="1"><thead>
<tr><td width="80%"><b>Name</b></td><td width="20%"><b>Gender</b></td></tr></thead><tbody>';
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
                echo '<tr><td>'.$c.'. '.$lname.', '.$fname.' '.$mname.'</td><td>'.$gender.'</td>';
            }
            echo '</table></tbody></div></div>';}
        ?>

       </div>
</body>
</html>