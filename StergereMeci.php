<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
 VerificareLogare();

?>

<?php
if(isset($_GET["Delete"])){



	$Delete=$_GET['Delete'];
	$sql="DELETE FROM meciuri WHERE id_meci='$Delete'";
	$query=mysqli_query($con,$sql);
	if($query){
		  header("location:AdminMeciuri.php");
		  exit();
	}



}


?>




</body>
</html>