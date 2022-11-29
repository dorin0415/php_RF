<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
 VerificareLogare();
?>

<?php
	if(isset($_GET["Delete"])){
	$Delete=$_GET['Delete'];
	$sql="DELETE FROM articole WHERE id_articol='$Delete'";
	$query=mysqli_query($con,$sql);
	if($query){
		  header("location:AdminArticole.php");
		  exit();
	}



}


?>
