<?php
/*
 * getTAData.php 
 *
 * Computer Science 3319a
 * Assignment 3
 *
 * Author: Tommy Tran (ttran244@uwo.ca)
 *
 * Query to the database that gets the information of the 
 * specified TA. 
 */
?>

<!DOCTYPE html> 
<html>
<head>
<meta charset="utf-8">
<title>Edit TA - TA Database</title>
</head>
<body bgcolor = "#4CoB5F">
<font color = "white">
<h1>TA Information</h1>
<?php
include "connectdb.php";
$ta = $_POST["ta"];
$query = 'select * from TA where studentnumber = "'.$ta.'"';
$query2 = 'select Professor.firstname, Professor.lastname from Professor, TA where Professor.userid = TA.Prof_userid and TA.studentnumber = "'.$ta.'"';
$query3 = 'select Professor.firstname, Professor.lastname, Professor.userid from CoSupervise, TA, Professor where CoSupervise.TA_userid = TA.userid and CoSupervise.Prof_userid = Professor.userid and TA.studentnumber = "'.$ta.'"';
$result = mysqli_query($connection, $query);
$result2 = mysqli_query($connection, $query2);
$result3 = mysqli_query($connection, $query3);
if (!$result || !$result2) {
  die("Database query failed.");
}
$row = mysqli_fetch_assoc($result);
$row2 = mysqli_fetch_assoc($result2);
echo '<img src = "'.$row["imagelocation"].'"height = "150" width = "120">';
echo "<br><br>";
echo "First Name: ".$row["firstname"]."<br>"; 
echo "Last Name: ".$row["lastname"]."<br>";
echo "Student Number: ".$row["studentnumber"]."<br>";
echo "User ID: ".$row["userid"]."<br>";
echo "Degree Type: ".$row["gradtype"]."<br>";
echo "Image Location: ".$row["imagelocation"]."<br>";
echo "Head Supervisor: ".$row2["firstname"]." ".$row2["lastname"]." "."(".$row["Prof_userid"].")</br>";
if (empty($row3)) {
  echo "CoSupervisor: None</br>";
}
else {
  while($row3 = mysqli_fetch_assoc($result3)) {
    echo "CoSupervisor: ".$row3["firstname"]." ".$row3["lastname"]." "."(".$row3["userid"].")</br>";
}
echo "<br>";
mysqli_free_result($result3);
}
mysqli_free_result($result);
mysqli_free_result($result2);
?>
<br><br>
<h2>Enter new information to make changes to the specified field(s)</h2>
<br>
<form action = "editTA.php" method = "post" enctype = "multipart/form-data">
First Name: <input type = "text" name = "fname">
Last Name: <input type = "text" name = "lname">
Degree: <input type = "text" name = "degree">
Image Location: <input type = "file" name = id = "file">
<br><br>
<input type = "submit" value = "Make Edits">
</form>
<?php
mysqli_close($connection);
?>
</font>
</body>
</html>