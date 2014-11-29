<?php
/*
 * getAssignedTA.php
 *
 * Computer Science 3319a
 * Assignment 3
 *
 * Author: Tommy Tran (ttran244@uwo.ca)
 *
 * Query to the database that gets the information of the TA assigned to the
 * specified course.
 */
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>TAs Assigned to Course - TA Database</title>
</head>
<body bgcolor = "#4C0B5F">
<font color = "white">
<h1>TAs assigned to the Course</h1>
<?php
include "connectdb.php";
$code = $_POST["code"];
