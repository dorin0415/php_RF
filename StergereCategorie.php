<?php
require_once("Include/DB.php");
require_once("Include/Functions.php");
VerificareLogare();

?>

<?php 

if(isset($_GET["idCategorie"])){
	$Delete=$_GET["idCategorie"];
$sql="DELETE FROM categorii where id_categorie='$Delete'";
$query=mysqli_query($con,$sql);

	if($query){
		  header("location:Categorii.php");
		  exit();
	}


}

?>