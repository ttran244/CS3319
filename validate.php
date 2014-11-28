<?php
/*
 * Computer Science 3319a
 * Assignment 3
 * 
 * Author: Tommy Tran (ttran244@uwo.ca)
 *
 * Checks if password is correct. If so, gives access
 * to grad secretary functions. Otherwise, error message
 */
 
$pass = "janice";
if ($pass == $_POST["pass"]) {
  include "secFunctions.php";
}
else {
?>
<html>
<head>
<meta charset="utf-8">
<title>Password Error - TA Database</title>
</head>
<body bgcolor = "#4C0B5F">
<h1><font color = "white">Password is incorrect!</font></h1> 
<a href = "password.php"><font color = "white">Go Back</font></a>
</body>
</html>
<?php
}
?>

