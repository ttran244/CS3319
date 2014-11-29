<?php
/*
 * addCourse.php
 *
 * Computer Science 3319a
 *
 * Assignment 3
 *
 * Author: Tommy Tran (ttran244@uwo.ca)
 *
 * Adds a new Course into the database
 */

include "connectdb.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add Course Complete - TA Database</title>
</head>
<body bgcolor = "#4C0B5F">
<font color = "white">
<?php
$code = $_POST["code"];
$cname = $_POST["cname"];
if(fnmatch("CS[0-9][0-9][0-9][0-9]",$code)) {
  $query = 'insert into Course values("'.$code.'","'.$cname.'")';
  if(!mysqli_query($connection, $query)) {
    die("Error: insert Course failed. ".mysqli_error($connection));
  }
  else {
    echo "Course added!";
  }
}
else {
  echo "Error: invalid course code! (start with 'CS', followed by 4 digits)";
}
mysqli_close($connection);
?>
<br><br><br><br>
<a href = "secFunctions.php"><font color = "white">Go Back to Secretary Functions</font></a>
</font>
</body>
</html>
