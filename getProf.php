<?php
/*
 * getProf.php
 *
 * Computer Science 3319a
 * Assignment 3
 *
 * Author: Tommy Tran (ttran244@uwo.ca)
 *
 * Query that gets all the Professors in the database and lists them
 */

$query = "select * from Professor";
$result = mysqli_query($connection, $query);
if (!$result) {
  die("Database query failed.");
}
while ($row = mysqli_fetch_assoc($result)) {
  echo '<input type = "radio" name = "prof" value = "';
  echo $row["userid"];
  echo '">'.$row["firstname"]." ".$row["lastname"]."<br>";
}
mysqli_free_result($result);
?>
