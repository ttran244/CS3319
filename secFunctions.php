<?php
/* secFunctions.php
 *
 * Computer Science 3319a
 * Assignment3
 *
 * Author: Tommy Tran (ttran244@uwo.ca)
 *
 * Grad Secretary functions to be performed on the TA Database
 */

include "connectdb.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Grad Secretary Functions - TA Database</title>
</head>
<body bgcolor = "#4C0B5F">
<font color = "white">
<form action = "getTAData.php" method = "post">
<?php
  include "getTA.php";
?>
<input type = "submit" value = "Edit TA">
</form>
<?php
mysqli_close($connection);
?>
</font>
</body>
</html>
