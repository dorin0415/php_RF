<?php
require_once("Include/DB.php");
require_once("Include/Functions.php");
VerificareLogare();

?>

<?php 

if(isset($_GET["idComentariu"])){
	$Delete=$_GET["idComentariu"];
$sql="DELETE FROM  comentarii where id_comentariu='$Delete'";
$query=mysqli_query($con,$sql);

	if($query){
		  header("location:Comentarii.php");
		  exit();
	}


}

?>