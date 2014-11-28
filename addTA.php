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


