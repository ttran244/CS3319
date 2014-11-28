<?php
/*
 * getCourseData.php
 *
 * Computer Science 3319a
 * Assignment 3
 *
 * Author: Tommy Tran (ttran244@uwo.ca)
 *
 * Query to the database that gets the information of the 
 * specified course.
 */
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Edit Course - TA Database</title>
</head>
<body bgcolor = "#4C0B5F">
<font color = "white">
<h1>Course Information</h1>
<?php
include "connectdb.php";
$code = $_POST["code"];
$query = 'select * from Course where coursenumber = "'.$code.'"';
$result = mysqli_query($connection, $query);
if (!$result) {
  die("Database query failed.");
}
$row = mysqli_fetch_assoc($result);
echo "Course Code: ".$row["coursenumber"]."<br>";
echo "Course Name: ".$row["coursename"]."<br>";
echo "Assigned TA(s): <br>";
$query2 = 'select * from TAAssignedTo where coursenumber = "'.$code.'"';
$result2 = mysqli_query($connection, $query2);
if(!$result2) {
  die("Database query failed.");
}
if (empty($row2 = mysqli_fetch_assoc($result2))) {
  echo "None";
}
else {
  $id = $row2["TA_userid"];
  $query3 = 'select * from TA where userid = "'.$id.'"';
  $result3 = mysqli_query($connection, $query3);
  if (!$result3) {
    die("Database query failed.");
  }
  else {
    $row3 = mysqli_fetch_assoc($result3);
    echo '<img src = "'.$row3["imagelocation"].'"height = "150" width = "120">';
    echo "<br><br>";
    echo $row3["firstname"]." ".$row3["lastname"].", ".$row2["term"]." ".$row2["year"].", ".$row2["numberstudents"];
    echo "<br>";
  }
  while ($row2 = mysqli_fetch_assoc($result2)) {
    $id = $row2["TA_userid"];
    $query3 = 'select * from TA where userid = "'.$id.'"';
    $result3 = mysqli_query($connection, $query3);
    if (!$result3) {
      die("Database query failed.");
    }
    else {
      $row3 = mysqli_fetch_assoc($result3);
      echo '<img src = "'.$row3["imagelocation"].'"height = "150" width = "120">';
      echo "<br><br>";
      echo $row3["firstname"]." ".$row3["lastname"].", ".$row2["term"]." ".$row2["year"].", ".$row2["numberstudents"];
      echo "<br>";
    }
  }
}  
