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

include "connectdb.php";
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
mysqli_free_result($result);
$query2 = 'select * from TAAssignedTo where coursenumber = "'.$code.'" order by year desc';
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
    echo $row3["firstname"]." ".$row3["lastname"].", ".$row2["term"]." ".$row2["year"].", Number of Students: ".$row2["numberstudents"];
    echo "<br><br><br><br>";
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
      echo $row3["firstname"]." ".$row3["lastname"].", ".$row2["term"]." ".$row2["year"].", Number of Students: ".$row2["numberstudents"];
      echo "<br><br><br><br>";
    }
  }
mysqli_free_result($result2);
mysqli_free_result($result3);
}
?>
<h1>Delete Course</h1>
<form action = "deleteCourse.php" method = "post">    
<input type = "hidden" name = "code" value = "<?php echo $code;?>"> 
<input type = "submit" value = "Delete Course">
</form>
<h1>Add TA to Course</h1>
<form action = "assignTA.php" method = "post">
Term: <input type = "radio" name = "term" value = "Spring">Spring
<input type = "radio" name = "term" value = "Summer">Summer
<input type = "radio" name = "term" value = "Fall">Fall
<br>
Year: <input type = "text" name = "year">
Number of Students: <input type = "text" name = "numstu">
<br><br>
Select a TA:<br>
<?php
include "getTA.php";
?>
<br>    
<input type = "hidden" name = "code" value = "<?php echo $code;?>"> 
<input type = "submit" value = "Assign TA to Course">
</form>

<?php
mysqli_close($connection);
?>
<br><br>
<a href = "secFunctions.php"><font color = "white">Go Back to Secretary Functions</font></a>
</font>
</body>
</html> 
