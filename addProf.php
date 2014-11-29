<?php
/*
 * addProf.php
 *
 * Computer Science 3319a
 * Assignment 3
 *
 * Author: Tommy Tran (ttran244@uwo.ca)
 *
 * Adds a new Professor into the database
 */

include "connectdb.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add Professor Complete - TA Database</title>
</head>
<body bgcolor = "#4C0B5F">
<font color = "white">
<?php
$firstname = $_POST["fname"];
$lastname = $_POST["lname"];
$userId = $_POST["uid"];

if(fnmatch("[a-zA-Z][a-zA-Z][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9]",$userId)) {
  $query = 'insert into Professor values("'.$firstname.'","'.$lastname.'","'.$userId.'")';
  if(!mysqli_query($connection, $query)) {
    die("Error: insert Prof failed. ".mysqli_error($connection));
  }
  else {
    echo "Professor added!";
  }
}
else {
  echo "Error: invalid user id! (start with 2 letters, no more than 8 letters/numbers";
}
mysqli_close($connection);
?>
<br><br><br><br>
<a href = "secFunctions.php"><font color = "white">Go Back to Secretary Functions</font></a>
</font>
</body>
</html>

