<?php
/*
 * numCourseTAed.php
 *
 * Computer Science 3319a
 * Assignment 3
 *
 * Author: Tommy Tran (ttran244@uwo.ca)
 *
 * Displays the number of courses the selected TA has TAed for,
 * and if they can still TA more
 */

include "connectdb.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Number of Courses TAed - TA Database</title>
</head>
<body bgcolor = "#4C0B5F">
<font color = "white">
<?php
$ta = $_POST["ta"];
$query = 'select * from TA where studentnumber = "'.$ta.'"';
$result = mysqli_query($connection, $query);
if (!$result) {
  die("Database query failed.");
}
$row = mysqli_fetch_assoc($result);
$query2 = 'select count(*) from TAAssignedTo where TA_userid = "'.$row["userid"].'"';
$result2 = mysqli_query($connection, $query2);
if (!$result) {
  die("Database query failed.");
}
$row2 = mysqli_fetch_assoc($result2);
if ($row["gradtype"] == "Masters") {
  if ($row2["count(*)"] > 3) {
    echo "Number of courses TAed: ".$row2["count(*)"]." (Number of courses TAed is over the limit)";
  }
  else {
  echo "Number of courses TAed: ".$row2["count(*)"]." (Can still TA more)";
  }
}
else {
  if ($row2["count(*)"] > 8) {
    echo "Number of courses TAed: ".$row2["count(*)"]." (Number of courses TAed is over the limit)";
  }
  else {
    echo "Number of courses TAed: ".$row2["count(*)"]." (Can still TA more)";
  }
}

mysqli_free_result($result);
mysqli_free_result($result2);
mysqli_close($connection);
?>

<br><br><br><br>
<a href = "profFunctions.php"><font color = "white">Go Back to Professor Functions</font></a>
</font>
</body>
</html>
