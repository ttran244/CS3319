<?php
/*
 * getCourse.php
 *
 * Computer Science 3319a
 * Assignment 3
 *
 * Author: Tommy Tran (ttran244@uwo.ca)
 *
 * Query that gets all the Courses in the database and list them
 */

$query = "select * from Course";
$result = mysqli_query($connection, $query);
if (!$result) {
  die("Database query fail.");
}
while ($row = mysqli_fetch_assoc($result)) {
  echo '<input type = "radio" name = "code" value = "';
  echo $row["coursenumber"];
  echo '">'.$row["coursenumber"].' ('.$row["coursename"].')'.'<br>';
}
mysqli_free_result($result);
?> 
