<?php
/*
 * assignTA.php
 *
 * Computer Science 3319a
 * Assignment 3
 *
 * Author: Tommy Tran (ttran244@uwo.ca)
 *
 * Assign a TA to a Course in the database
 */

include "connectdb.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Assign TA Complete - TA Database</title>
</head>
<body bgcolor = "#4C0B5F">
<font color = "white">
<?php
$code = $_POST["code"];
$ta = $_POST["ta"];
$year = $_POST["year"];
$term = $_POST["term"];
$numstudents = $_POST["numstu"];
if ($year != NULL && $term != NULL && $numstudents != NULL) {
  $query = 'select * from TA where studentnumber = "'.$ta.'"';
  $result = mysqli_query($connection, $query);
  if(!$result) {
    die("Database query failed.");
  }
  $row = mysqli_fetch_assoc($result);
  $query2 = 'insert into TAAssignedTo values("'.$code.'","'.$row["userid"].'","'.$year.'","'.$term.'","'.$numstudents.'")';
  if(!mysqli_query($connection, $query2)) {
    die("Error: assigning TA failed. ".mysqli_error($connection));
  }
  else {
    echo "TA assigned to Course!";
  }
}

else {
  echo "Error: either year, term, or number of students is missing";
}
mysqli_free_result($result);
mysqli_close($connection);
?>
<br><br><br><br>
<a href = "secFunctions.php"><font color = "white">Go Back to Secretary Functions</font></a>
</font>
</body>
<html>

