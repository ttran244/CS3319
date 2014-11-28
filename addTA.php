<?php
/*
 * addTA.php
 *
 * Computer Science 3319a
 * Assignment 3
 *
 * Author: Tommy Tran (ttrn244@uwo.ca)
 *
 * Adds a new TA into the database
 */
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add Complete - TA Database</title>
</head>
<body bgcolor = "#4C0B5F">
<font color = "white">
<?php
include "upload_file.php";
include "connectdb.php";
$firstname = $_POST["fname"];
$lastname = $_POST["lname"];
$stuNum = $_POST["snum"];
$userId = $_POST["uid"];
$degree = $_POST["degree"];
$headProf = $_POST["prof"];

if (fnmatch("[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]", $stuNum)) {
  if (fnmatch("[a-zA-Z][a-zA-Z][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9]", $userId)) {
    if ($headProf != NULL) {
      $query = 'insert into TA values("'.$firstname.'","'.$lastname.'","'.$stuNum.'","'.$userId.'","'.$degree.'","'.$taPic.'","'.$headProf.'")';
      if(!mysqli_query($connection, $query)) {
        die("Error: insert TA failed. ".mysqli_error($connection));
      }
      else {
        echo "TA added";
      }
    }
    else {
      echo "Error: Head Supervisor required!";
    }
  }
  else {
    echo "Error: invalid user id! (start with 2 letters, no more than 8 letters/numbers";
  }
}
else {
  echo "Error: invalid student number! (9 digits only)";
}
mysqli_close($connection);
?>
<br><br><br><br>
<a href = "secFunctions.php"><font color = "white">Go Back to Secretary Functions</font></a>
</font>
</body>
</html>
        
