<?php
/*
 * getTA.php
 *
 * Computer Science 3319a
 * Assignment 3
 *
 * Author: Tommy Tran (ttran244@uwo.ca)
 *
 * Query that gets all the TAs in the database and lists them
 */

$query = "select * from TA";
$result = mysqli_query($connection, $query);
if (!$result) {
  die("Database query failed.");
}
while ($row = mysqli_fetch_assoc($result)) {
  echo '<input type = "radio" name = "ta" value = "';
  echo $row["studentnumber"];
  echo '">'.$row["firstname"]." ".$row["lastname"]."<br>";
}
mysqli_free_result($result);
?>
