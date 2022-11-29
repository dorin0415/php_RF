<?php
require_once("Include/DB.php");
require_once("Include/Functions.php");
VerificareLogare();
?>

<?php 

if(isset($_GET["idComentariu"])){
	$ComentariuId=$_GET["idComentariu"];
$sql="UPDATE comentarii set status='ON' where id_comentariu='$ComentariuId'";
$query=mysqli_query($con,$sql);

	if($query){
		  header("Location:Comentarii.php");
          exit();
	}

}

?>