<?php
/*
 * folders.php
 *
 * Computer Science 3319a
 * Assignment 3
 *
 * Author: Tommy Tran (ttran244@uwo.ca)
 *
 * Class that creates a new subfolder if it didn't already exist. 
 * Images will be stored in this folder.
 */

class Folder {
  function createFolder($foldername) {
  
    //if folder already exists, just return  
    if(is_dir($foldername)) {
      return false; 
      }
    
    //if folder doesn't exist, then create it and set permissions
    else {
      mkdir($foldername, 0755);
      $error = error_get_last();
      echo $error['message'];
      return false;
    }
  }
}
?>
