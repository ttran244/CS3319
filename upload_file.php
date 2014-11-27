<?php
/*
 * upload_file.php
 *
 * Computer Science 3319a
 * Assignment 3
 *
 * Author: Tommy Tran (ttran244@uwo.ca)
 *
 * Checks to make sure the image file is the right type and size.
 * Stores the image in a subfolder called upload
 */

include ("folders.php");
$allowedExts = "jpg";
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
$extension = strtolower($extension);
$uploadholder = dirname(__FILE__)."/upload";
$uploadFolder = new Folder;
if ((fnmatch("P[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9].jpg", $_FILES["file"]["name"])) && ($_FILES["file"]["type"] == "image/jpg") && ($_FILES["file"]["size"] < 500000) && ($extension == $allowedExts)) {
  if ($_FILES["files"]["error"] > 0) {
    echo "Return Code: ".$_FILES["file"]["error"]."<br>";
  }
  else {
    $uploadFolder->createFolder($uploadholder);
    if(file_exists("upload/" .$_FILES["file"]["name"])) {
      echo '<p><hr>';
      echo $_FILES["file"]["name"]." already exists.";
      echo '<p><hr>';
      $taPic = "NULL";
    }
    else {
      move_uploaded_filed($_FILES["file"]["tmp_name"],"upload/".$_FILES["file"]["name"]);
      $taPic = "upload/".$_FILES["file"]["name"];
    }
  }
}
  else {
    echo "Invalid file";
  }
?>  
