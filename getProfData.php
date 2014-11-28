<?php
/*
 * getProfData.php
 *
 * Computer Science 3319a
 * Assignment 3
 *
 * Author: Tommy Tran (ttrab244@uwo.ca)
 *
 * Query to the database that gets the information of the 
 * specified Professor
 */
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Professor - TA Database</title>
</head>
<body bgcolor = "#4C0B5F">
<font color = "white">
<h1> Professor Information</h1>
<?php
include "connectdb.php";
$prof = $_POST["prof"];
$query = 'select * from Professor where userid = "'.$prof.'"';
$result = mysqli_query($connection, $query);
if (!result) {
  die("Database query failed.");
}
$row = mysqli_fetch_assoc($result);
echo "First Name: ".$row["firstname"]."<br>";
echo "Last Name: ".$row["lastname"]."<br>";
echo "User ID: ".$row["userid"]."<br>";
echo "<br>";
mysqli_free_result($result);
?>
<h1>Enter new information to make changes to the specified field(s)</h1>
<br>
<form action = "editProf.php" method = "post">
First Name: <input type = "text" name = "fname">
Last Name: <input type = "text" name = "lname">
<input type = "hidden" name = "prof" value = "<?php echo $prof;?>">
<br><br>
<input type = "submit" value = "Make Edits">
</form>
<h1><font color = "white">Delete Professor</font></h1>
<form action = "deleteProf.php" method = "post">
<input type = :hidden" name = "prof" value = "<?php echo $prof;?>">
<input type = "submit" value = "Delete Professor">
</form>
<?php
mysqli_close($connection);
?>
<br><br>
<a href = "secFunctions.php"><font color = "white">Go Back to Secretary Functions</font></a>
</font>
</body>
</html>
