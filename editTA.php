<?php
/*
 * editTA.php
 *
 * Computer Science 3319a
 * Assignment 3
 * 
 * Author: Tommy Tran (ttran244@uwo.ca)
 *
 * Update the TA table in the database based on the user's input
 */
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Complete - TA Database</title>
</head>
<body bgcolor = "#4C0B5F">
<font color = "white">
<?php
include "upload_file.php";
include "connectdb.php";
$ta = $_POST["ta"];
$firstname = $_POST["fname"];
$lastname = $_POST["lname"];
$degree = $_POST["degree"];
$query = 'update TA set ';
if ($firstname != NULL) {
  $query = $query.'firstname = "'.$firstname.'"';
}
if (($firstname != NULL) && ($lastname != NULL)) {
  $query = $query.',lastname = "'.$lastname.'"';
}
else if($lastname != NULL) {
  $query = $query.'lastname = "'.$lastname.'"';
}
if (($firstname != NULL || $lastname != NULL) && ($degree != NULL)) {
  $query = $query.',gradtype = "'.$degree.'"';
}
else if ($degree != NULL) {
  $query = $query.'gradtype = "'.$degree.'"';
}
if (($firstname != NULL || $lastname != NULL || $degree != NULL) && ($taPic != NULL)) {
  $query = $query.',imagelocation = "'.$taPic.'"';
}
else if ($taPic != NULL) {
  $query = $query.'imagelocation = "'.$taPic.'"';
}
$query = $query.' where studentnumber = "'.$ta.'"';
$result = mysqli_query($connection, $query);
if (!$result) {
  die("Error: update failed ".mysqli_error($connection));
}
echo "Update complete!";
mysqli_close($connection);
?>
<br><br>
<a href = "secFunctions.php"><font color = "white">Go Back to TA List </font></a>
</font>
</body>
</html> 

