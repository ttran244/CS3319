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

include "connectdb.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Delete TA Complete - TA Database</title>
</head>
<body bgcolor = "#4C0B5F">
<font color = "white">
<?php
$ta = $_POST["ta"];
$query = 'select * from TA where studentnumber = "'.$ta.'"';
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
$query2 = 'delete from CoSupervise where TA_userid = "'.$row["userid"].'"';
mysqli_query($connection, $query2);
$query3 = 'delete from TAAssignedTo where TA_userid = "'.$row["userid"].'"';
mysqli_query($connection, $query3);
mysqli_free_result($result);
$query4 = 'delete from TA where studentnumber = "'.$ta.'"';
$result4 = mysqli_query($connection, $query4);
if (!$result4) {
  die("Error: delete TA failed ".mysqli_error($connection));
}
echo "TA deleted!";
mysqli_close($connection);
?>
<br><br><br><br>
<a href = "secFunctions.php"><font color = "white">Go Back to Secretary Functions</font></a>
</font>
</body>
</html>


