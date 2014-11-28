<?php
/*
 * deleteCourse.php
 *
 * Computer Science 3319a
 * Assignment 3
 *
 * Author: Tommy Tran (ttran244@uwo.ca)
 *
 * Deletes a Course from the database
 */
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Delete Course Complete - TA Database</title>
</head>
<body bgcolor = "#4C0B5F">
<font color = "white">
<?php
include "connectdb.php";
$code = $_POST["code"];
$query1 = 'delete from TAAssignedTo where coursenumber = "'.$code.'"';
mysqli_query($connection, $query1);
$query2 = 'delete from Course where coursenumber = "'.$code.'"';
$result2 = mysqli_query($connection, $query2);
if (!$result2) {
  die("Error: delete Course failed. ".mysqli_error($connection));
}
echo "Course deleted!";
mysqli_close($connection);
?>
<br><br><br><br>
<a href = "secFunctions.php"><font color = "white">Go Back to Secretary Functions</font></a>
</font>
</body>
</html>
