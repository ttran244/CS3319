<?php
/* secFunctions.php
 *
 * Computer Science 3319a
 * Assignment3
 *
 * Author: Tommy Tran (ttran244@uwo.ca)
 *
 * Grad Secretary functions to be performed on the TA Database
 */

include "connectdb.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Grad Secretary Functions - TA Database</title>
</head>
<body bgcolor = "#4C0B5F">
<font color = "white">
<h1>Choose a TA to edit</h1>
<form action = "getTAData.php" method = "post">
<?php
  include "getTA.php";
?>
<br>
<input type = "submit" value = "Edit TA">
</form>
<h1>Add new TA</h1>
<form action = "addTA.php" method = "post" enctype = "multipart/form-data">
First Name: <input type = "text" name = "fname">
Last Name: <input type = "text" name = "lname">
Student Number: <input type = "text" name = "snum">
User Id: <input type = "text" name = "uid">
Degree: <input type = "radio" name = "degree" value = "Masters">Masters
<input type = "radio" name = "degree" value = "PhD">PhD
<br><br>
Image: <input type = "file" name = "file" id = "file">
<br><br>
Head Supervisor: <br>
<?php
include "getProf.php";
?>
<br>
<input type = "submit" value = "Add New TA">
</form>
<h1>Choose a Professor to edit</h1>
<form action = "getProfData.php" method = "post">
<?php
  include "getProf.php";
?>
<br>
<input type = "submit" value = "Edit Professor">
</form>
<h1>Add new Professor</h1>
<form action = "addProf.php" method = "post">
First Name: <input type = "text" name = "fname">
Last Name: <input type = "text" name = "lname">
User Id: <input type ="text" name = "uid">
<br><br>
<input type = "submit" value = "Add New Professor">
</form>
<h1>Choose a Course to edit</h1>
<form action = "getCourseData.php" method = "post">
<?php
  include "getCourse.php";
?>
<br>
<input type = "submit" value = "Edit Course">
</form>
<h1>Add new Course</h1>
<form action = "addCourse.php" method = "post">
Course Code: <input type = "text" name = "code">
Course Name: <input type = "text" name = "cname">
<br><br>
<input type = "submit" value = "Add New Course">
</form>
<?php
mysqli_close($connection);
?>
<br><br><br><br>
<a href = "index.php"><font color = "white">Back to Home Page</font></a>
</font>
</body>
</html>
