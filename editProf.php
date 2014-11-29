<?php
/*
 * editProf.php
 *
 * Computer Science 3319a
 * Assignment 3
 *
 * Author: Tommy Tran (ttran244@uwo.ca)
 *
 * Update the Professor table in the database based on the user's input
 */

include "connectdb.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Professor Edit Complete -TA Database</title>
</head>
<body bgcolor = "#4C0B5F">
<font color = "white">
<?php
$prof = $_POST["prof"];
$firstname = $_POST["fname"];
$lastname = $_POST["lname"];
$query = 'update Professor set ';
if ($firstname != NULL) {
  $query = $query.'firstname = "'.$firstname.'"';
}
if (($firstname != NULL) && ($lastname != NULL)) {
  $query = $query.',lastname = "'.$lastname.'"';
}
else if ($lastname != NULL) {
  $query = $query.'lastname = "'.$lastname.'"';
}
if ($firstname != NULL || $lastname != NULL) {
  $query = $query.' where userid = "'.$prof.'"';
  $result = mysqli_query($connection, $query);
  if (!$result) {
    die("Error: update failed ".mysqli_error($connection));
  }
  echo "Update complete!";
  mysqli_close($connection);
}
?>
<br><br>
<a href = "secFunctions.php"><font color = "white">Go Back to Secretary Functions</font></a>
</font>
</body>
</html>

