<?php
/*
 * editTA.php
 *
 * Computer Science 3319a
 * Assignment 3
 * 
 * Author: Tommy Tran (ttran244@uwo.ca)
 *
 * Update the TA table in the database based on the user's input
 */
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>TA Edit Complete - TA Database</title>
</head>
<body bgcolor = "#4C0B5F">
<font color = "white">
<?php
include "upload_file.php";
include "connectdb.php";
$ta = $_POST["ta"];
$firstname = $_POST["fname"];
$lastname = $_POST["lname"];
$degree = $_POST["degree"];
$headProf = $_POST["prof"];
$addCoProf = $_POST["prof2"];
$delCoProf = $_POST["prof3"];
$query = 'update TA set ';
if ($firstname != NULL) {
  $query = $query.'firstname = "'.$firstname.'"';
}
if (($firstname != NULL) && ($lastname != NULL)) {
  $query = $query.',lastname = "'.$lastname.'"';
}
else if($lastname != NULL) {
  $query = $query.'lastname = "'.$lastname.'"';
}
if (($firstname != NULL || $lastname != NULL) && ($degree != NULL)) {
  $query = $query.',gradtype = "'.$degree.'"';
}
else if ($degree != NULL) {
  $query = $query.'gradtype = "'.$degree.'"';
}
if (($firstname != NULL || $lastname != NULL || $degree != NULL) && ($taPic != NULL)) {
  $query = $query.',imagelocation = "'.$taPic.'"';
}
else if ($taPic != NULL) {
  $query = $query.'imagelocation = "'.$taPic.'"';
}
if (($firstname != NULL || $lastname != NULL || $degree != NULL || $taPic != NULL) && ($headProf != NULL)) {
  $query = $query.',Prof_userid = "'.$headProf.'"';
}
else if ($headProf != NULL) {
  $query = $query.'Prof_userid = "'.$headProf.'"';
}
if ($addCoProf != NULL) {
  $query2 = 'select * from TA where studentnumber = "'.$ta.'"';
  $result2 = mysqli_query($connection, $query2);
    if (!$result2) {
      die("Error: add CoSupervisor failed. ".mysqli_error($connection));
    }
    $row2 = mysqli_fetch_assoc($result2);
    $query3 = 'insert into CoSupervise values("'.$addCoProf.'","'.$row2["userid"].'")';
    if(!mysqli_query($connection, $query3)) {
      die("Error: insert CoSupervisor failed. ".mysqli_error($connection));
    }
    echo "CoSupervisor added";
    mysqli_free_result($result2);
}
if ($delCoProf != NULL) {
  $query2 = 'select * from TA where studentnumber = "'.$ta.'"';
  $result2 = mysqli_query($connection, $query2);
    if (!$result2) {
      die("Error: delete CoSupervisor failed. ".mysqli_error($connection));
    }
    $row2 = mysqli_fetch_assoc($result2);
    $query3 = 'delete from CoSupervise where Prof_userid = "'.$delCoProf.'" and TA_userid = "'.$row2["userid"].'"';
    if(!mysqli_query($connection, $query3)) {
      die("Error: insert CoSupervisor failed. ".mysqli_error($connection));
    }
    echo "CoSupervisor deleted";
    mysqli_free_result($result2);
}

if ($firstname != NULL || $lastname != NULL || $degree != NULL || $headProf != NULL) {
  $query = $query.' where studentnumber = "'.$ta.'"';
  $result = mysqli_query($connection, $query);
  if (!$result) {
    die("Error: update failed ".mysqli_error($connection));
  }
  echo "Update complete!";
  mysqli_close($connection);
}
?>
<br><br>
<a href = "secFunctions.php"><font color = "white">Go Back to Secretary Functions </font></a>
</font>
</body>
</html> 

