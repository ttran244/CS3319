<?php
/*
 * deleteTA.php
 *
 * Computer Science 3319a
 * Assignment 3
 *
 * Author: Tommy Tran (ttran244@uwo.ca)
 *
 * Deletes a TA from the database
 */
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Delete Complete - TA Database</title>
</head>
<body bgcolor = "#4C0B5F">
<font color = "white">
<?php
include "connectdb.php";
$ta = $_POST["ta"];
$query = 'select * from TA where studentnumber = "'.$ta.'"';
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
$query2 = 'delete from CoSupervise where TA_userid = "'.$row["userid"].'"';
mysqli_query($connection, $query2);
mysqli_free_result($result);
$query3 = 'delete from TA where studentnumber = "'.$ta.'"';
$result3 = mysqli_query($connection, $query3);
if (!$result3) {
  die("Error: delete TA failed ".mysqli_error($connection));
}
echo "TA deleted";
mysqli_close($connection);
?>
<br><br><br><br>
<a href = "secFunctions.php"><font color = "white">Go Back to Secretary Functions</font></a>
</font>
</body>
</html>




