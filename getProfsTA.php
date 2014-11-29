<?php 
/*
 * getProfsTA.php
 *
 * Computer Science 3319a
 * Assignment3
 *
 * Author: Tommy Tran (ttran244@uwo.ca)
 *
 * Based on user selected Professor, get a list of TA(s) assigned 
 * to that selected Professor
 */

include "connectdb.php"
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>TAs Assigned to Professor - TA Database</title>
</head>
<body bgcolor = "#4C0B5F">
<font color = "white">
<h1>Head Supervises</h1>
<?php
$prof = $_POST["prof"];
$query = 'select * from TA where Prof_userid = "'.$prof.'"';
$result = mysqli_query($connection, $query);
if (!$result) {
  die("Database query failed.");
}
if (!empty($row = mysqli_fetch_assoc($result))) {
  echo '<img src = "'.$row["imagelocation"].'"height = "150" width = "120">';
  echo "<br><br>";
  echo "First Name: ".$row["firstname"]."<br>"; 
  echo "Last Name: ".$row["lastname"]."<br>";
  echo "Student Number: ".$row["studentnumber"]."<br>";
  echo "User ID: ".$row["userid"]."<br>";
  echo "Degree Type: ".$row["gradtype"]."<br>";
  echo "Image Location: ".$row["imagelocation"]."<br>";
}
echo "<br><br>";
while ($row = mysqli_fetch_assoc($result)) {
  echo '<img src = "'.$row["imagelocation"].'"height = "150" width = "120">';
  echo "<br><br>";
  echo "First Name: ".$row["firstname"]."<br>"; 
  echo "Last Name: ".$row["lastname"]."<br>";
  echo "Student Number: ".$row["studentnumber"]."<br>";
  echo "User ID: ".$row["userid"]."<br>";
  echo "Degree Type: ".$row["gradtype"]."<br>";
  echo "Image Location: ".$row["imagelocation"]."<br><br><br>";
}
mysqli_free_result($result);
?>
<h1>CoSupervises</h1>
<?php
$query2 = 'select * from CoSupervise where Prof_userid = "'.$prof.'"';
$result2 = mysqli_query($connection, $query2);
if (!$result2) {
  die("Database query failed.");
}
if (!empty($row2 = mysqli_fetch_assoc($result2))) {
  $query3 = 'select * from TA where userid = "'.$row2["TA_userid"].'"';
  $result3 = mysqli_query($connection, $query3);
  if (!$result3) {
    die("Database query failed.");
  }
  $row3 = mysqli_fetch_assoc($result3);
  echo '<img src = "'.$row3["imagelocation"].'"height = "150" width = "120">';
  echo "<br><br>";
  echo "First Name: ".$row3["firstname"]."<br>"; 
  echo "Last Name: ".$row3["lastname"]."<br>";
  echo "Student Number: ".$row3["studentnumber"]."<br>";
  echo "User ID: ".$row3["userid"]."<br>";
  echo "Degree Type: ".$row3["gradtype"]."<br>";
  echo "Image Location: ".$row3["imagelocation"]."<br>";
}
echo "<br><br>";
while ($row2 = mysqli_fetch_assoc($result2)) {
  $query3 - 'select * from TA where userid = "'.$row2["TA_userid"].'"';
  $result3 = mysqli_query($connection, $query3);
  if (!$result3) {
    die("Database query failed.");
  }
  $row3 = mysqli_fetch_assoc($result3);
  echo '<img src = "'.$row3["imagelocation"].'"height = "150" width = "120">';
  echo "<br><br>";
  echo "First Name: ".$row3["firstname"]."<br>"; 
  echo "Last Name: ".$row3["lastname"]."<br>";
  echo "Student Number: ".$row3["studentnumber"]."<br>";
  echo "User ID: ".$row3["userid"]."<br>";
  echo "Degree Type: ".$row3["gradtype"]."<br>";
  echo "Image Location: ".$row3["imagelocation"]."<br><br><br>";
}
mysqli_free_result($result2);
mysqli_free_result($result3);
mysqli_close($connection);
?>
<a href = "profFunctions.php"><font color = "white">Go Back to Professor Functions</font></a>
</font>
</body>
</html>
