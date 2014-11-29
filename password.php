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
<font color = "white">
<h1>Please enter the password to login</h1>
<form action = "validate.php" method = "post">
Password: <input type = "password" name = "pass"> 
<input type = "submit" value = "Submit">
</form>
</font>
</body>
</html>
