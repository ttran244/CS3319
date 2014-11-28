<?php
/*
 * deleteProf.php
 *
 * Computer Science 3319a
 * Assignment 3
 *
 * Author: Tommy Tran (ttran244@uwo.ca)
 *
 * Deletes a Professor from the database
 */
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Delete Professor Complete - TA Database</title>
</head>
<body bgcolor = "#4C0B5F">
<font color = "white">
<?php
include "connectdb.php";
$prof = $_POST["prof"];
$query = 'select * from TA where Prof_userid = "'.$prof.'"';
$result = mysqli_query($connection, $query);
if ((empty($row = mysqli_fetch_assoc($result)))) {
  $query2 = 'delete from CoSupervise where Prof_userid = "'.$prof.'"';
  mysqli_query($connection, $query2);
  $query3 = 'delete from Professor where userid = "'.$prof.'"';
  $result3 = mysqli_query($connection, $query3);
  if (!$result3) {
    die("Error: delete Professor failed. ".mysqli_error($connection));
  }
  echo "Professor deleted!";
}

else {
  echo "Error: Professor is Head Supervisor of ".$row["firstname"]." ".$row["lastname"].". Delete the TA or change the Head Supervisor first!";
  while($row = mysqli_fetch_assoc($result)) {
    echo "Error: Professor is Head Supervisor of ".$row["firstname"]." ".$row["lastname"].". Delete the TA or change the Head Supervisor first!";
  }
  mysqli_free_result($result);
}
mysqli_close($connection);
?>
<br><br><br><br>
<a href = "secFunctions.php"><font color = "white">Go Back to Secretary Functions</font></a>
</font>
</body>
</html>

