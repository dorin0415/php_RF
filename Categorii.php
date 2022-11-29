<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
  VerificareLogare();
?>

<?php
if(isset($_POST["Submit"])){
 $Nume=mysqli_real_escape_string($con,$_POST["Nume"]);


 if(empty($Nume)){
	$_SESSION["Message"]="Introduceti numele categoriei";
    header("location:Categorii.php");
    exit();
}elseif(strlen($Nume)<2){
	$_SESSION["Message"]="Numele categoriei trebuie sa aiba mai mult de 2 caractere";
    header("location:Categorii.php");
    exit();
}
else{
	$sql="INSERT into categorii(nume)
	VALUES('$Nume')";
	$query=mysqli_query($con,$sql);
	if($query){
		header("location:Categorii.php");
		exit();
	}

}

}


?>

<?php require_once("Include/header.php");?>
<?php require_once("Include/sidebar.php");?>

   <div class="col-sm-10">
   	<h1 class="text-center">Categorii</h1>
   	<div><?php echo Message();?>
   	           	
   	</div>
   	
		<div>

			<form action="Categorii.php" method="post">
				<fieldset>
					<div class="form-group">
					<label for="Nume">Nume Categorie:</label>
					<input class="form-control" type="text" name="Nume" id="Nume" placeholder="Nume">
				</div>
				<br>
				<input class="btn btn-success btn-block" type="submit" name="Submit" value="Adaugare categorie">
				</fieldset>
				<br>

			</form>
			</div>	
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<tr>
						<th>Nr</th>
						<th>Nume</th>
						<th>Stergere</th>
					</tr>

<?php

$Nr=0;

$sql="SELECT * FROM categorii order by nume";
$query=mysqli_query($con,$sql);
while($Data=mysqli_fetch_array($query)){
	$CategorieId=$Data["id_categorie"];
	$Nume=$Data["nume"];
	$Nr++;
	
?>

				
<tr>

	<td><?php echo $Nr;?></td>
	<td><?php echo $Nume;?></td>
	<td><a href="StergereCategorie.php?idCategorie=<?php echo $CategorieId;?>">
	<span class="btn btn-danger">Stergere</span></a>
	</td>
</tr>

<?php } ?>

				</table>


			</div>

		


	</div>
	


</div>


</div>



</body>
</html>