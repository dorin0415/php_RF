 <?php
 require_once("Include/Functions.php");


 ?>

 <?php
 
session_destroy();
header("location:index.php");
exit();

 ?>