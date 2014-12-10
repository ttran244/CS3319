<?php
/*
 * connectdb.php
 * 
 * Computer Science 3319a
 * Assignment 3
 *
 * Author: Tommy Tran (ttran244@uwo.ca)
 *
 * Connects the database to the php web page
 */

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "ttran244tadb";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (mysqli_connect_errno()) {
  die("database connection failed :".
  mysqli_connect_error().
  "(". mysqli_connect_errno(). ")"
  );
}
?>


