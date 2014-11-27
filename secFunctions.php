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
<form action = "getTAData.php" method = "post">
<?php
  include "getTA.php";
?>
<input type = "submit" value = "Edit TA">
</form>
<?php
mysqli_close($connection);
?>
