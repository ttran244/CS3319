<?php
/*
 * password.php
 *
 * Computer Science 3319a
 * Assignment 3
 *
 * Author: Tommy Tran (ttran244@uwo.ca)
 *
 * Form that request password from the user. 
 */
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login - TA Database</title>
</head>
<body bgcolor = "#4C0B5F">
<h1><font color = "white">Please enter the password to login</font></h1>
<form action = "validate.php" method = "post">
<font color = "white">Password: <input type = "password" name = "pass"> </font>
<input type = "submit" value = "Submit">
</form>
</body>
</html>
