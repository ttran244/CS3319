<?php
/*
 * getAssignedTA.php
 *
 * Computer Science 3319a
 * Assignment 3
 *
 * Author: Tommy Tran (ttran244@uwo.ca)
 *
 * Query to the database that gets the information of the TA assigned to the
 * specified course.
 */

include "connectdb.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>TAs Assigned to Course - TA Database</title>
</head>
<body bgcolor = "#4C0B5F">
<font color = "white">
<h1>TAs assigned to the Course</h1>
<?php
$code = $_POST["code"];
$term = $_POST["term"];
$year = $_POST["year"];
$query = 'select * from TAAssignedTo where coursenumber = "'.$code.'" and year = "'.$year.'" and term = "'.$term.'"';
$result = mysqli_query($connection, $query);
if(!$result) {
  die("Database query failed.");
}
while ($row = mysqli_fetch_assoc($result)) {
  $query2 = 'select * from TA where userid = "'.$row["TA_userid"].'"';
  $result2 = mysqli_query($connection, $query2);
  if (!$result2) {
    die("Database query failed.");
  }
  $row2 = mysqli_fetch_assoc($result2);
  echo '<img src = "'.$row2["imagelocation"].'" height = "150" width = "120">';
  echo "<br><br>";
  echo $row2["firstname"]." ".$row2["lastname"].", Number of Students: ".$row["numberstudents"];
  echo "<br><br><br><br>";
}
mysqli_free_result($result);
mysqli_free_result($result2);
mysqli_close($connection);
?>
<br><br><br><br>
<a href = "profFunctions.php"><font color = "white">Go Back to Professor Functions</font></a>
</font>
</body>
</html>
