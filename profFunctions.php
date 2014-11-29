<?php 
/*
 * profFunctions.php
 *
 * Computer Science 3319a
 * Assignment3
 *
 * Author: Tommy Tran (ttran244@uwo.ca)
 *
 * Professor functions to be performed on the TA Database
 */

include "connectdb.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Professor Functions - TA Database</title>
</head>
<body bgcolor = "#4C0B5F">
<font color = "white">
<h1>Select a Professor to see their TA(s)</h1>
<form action = "getProfsTA.php" method = "post">
<?php
include "getProf.php";
?>
<br><br>
<input type = "submit" value = "Check TA(s)">
</form>
<h1>Select a Course, Term, and Year to see the TAs assigned to them</h1>
<form action = "getAssignedTA.php" method = "post">
Choose a Course: <br><br>
<?php
include "getCourse.php";
?>
<br>
Term: <input type = "radio" name = "term" value = "Spring">Spring
<input type = "radio" name = "term" value = "Summer">Summer
<input type = "radio" name = "term" value = "Fall">Fall
<br>
Year: <input type = "text" name = "year">
<br><br>
<input type = "submit" value = "Check Assigned TAs">
</form>
<h1>Select a TA to see how many courses they have been TAed</h1>
<form action = "numCourseTAed.php" method = "post">
Choose a TA: <br><br>
<?php
include "getTA.php";
?>
<br><br>
<input type = "submit" value = "Check Number of Courses">
</form>
<?php
mysqli_close($connection);
?>
<br><br><br><br>
<a href = "index.php"><font color = "white">Back to Home Page</font></a>
</font>
</body>
</html>
