<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
 VerificareLogare();
?>

<?php
if(isset($_POST["Submit"])){
 $Titlu=mysqli_real_escape_string($con,$_POST["Titlu"]);
  $Categorie=mysqli_real_escape_string($con,$_POST["Categorie"]);
  $Post=mysqli_real_escape_string($con,$_POST["Post"]);
 date_default_timezone_set("Europe/Bucharest");
$Timp=time();
$Dataora=strftime("%B-%d-%Y %H:%M:%S",$Timp);
$Imagine=$_FILES["Imagine"]["name"];
$Folder="imagini/Stiri/".basename($_FILES["Imagine"]["name"]);
if(empty($Titlu)||empty($Categorie)||empty($Imagine)){
	$_SESSION["Message"]="Toate campurile sunt obligatorii";
    header("Location:AdminArticole.php");
    exit();
}
	elseif(strlen($Titlu)<2){
	$_SESSION["Message"]="Titlul trebuie sa aiba mai mult de 2 caractere";
    header("Location:AdminArticole.php");
    exit();
}
    elseif(strlen($Post)<5){
	$_SESSION["Message"]="Articolul trebuie sa aiba mai mult de 5 caractere";
    header("Location:AdminArticole.php");
    exit();
}
else{
	$Edit=$_GET['Edit'];
	$sql="UPDATE articole set data_ora='$Dataora',titlu='$Titlu',categorie='$Categorie',imagine='$Imagine',post='$Post' where id_articol='$Edit'";
	$query=mysqli_query($con,$sql);
	move_uploaded_file($_FILES["Imagine"]["tmp_name"],$Folder);
	if($query){
	  header("location:AdminArticole.php");
	  exit();
	}


}

}


?>

<?php require_once("Include/header.php");?>
<?php require_once("Include/sidebar.php");?>


   <div class="col-sm-10">
   	<h1 class="text-center">Editare articol</h1>
   	<div><?php echo Message();?>
   	           	
   	</div>
   	
		<div>
<?php

$ArticolId=$_GET['Edit'];

$sql="SELECT * FROM articole where id_articol='$ArticolId' order by data_ora desc";
$query=$con->query($sql);
while($Data=mysqli_fetch_array($query)){
	$TitleE=$Data['titlu'];
	$CategoryE=$Data['categorie'];
	$ImageE=$Data['imagine'];
	$PostE=$Data['post'];
}


?>
			<form action="EditareArticol.php?Edit=<?php echo $ArticolId?>" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
					<label for="Titlu">Titlu:</label>
					<input value="<?php echo $TitleE;?>" class="form-control" type="text" name="Titlu" id="Titlu" placeholder="Titlu">
				</div>


				<div class="form-group">
					<span>Categorie actuala:</span>
					<?php echo $CategoryE;?>
					<br>
					<label for="Categorie">Categorie:</label>
					<select class="form-control" id="Categorie" name="Categorie">
						
						<?php

$sql="SELECT * FROM categorii order by nume";
$query=mysqli_query($con,$sql);
while($Data=mysqli_fetch_array($query)){
	$Nume=$Data["nume"];
?>
<option><?php echo $Nume; ?></option>
	<?php } ?>

					</select>
				</div>
			<div class="form-group">
				<span>Imagine actuala:</span>
					<img class="imagineAdmin" src="imagini/Stiri/<?php echo $ImageE;?>">
					<br>
					<label for="Imagine">Alegeti imagine:</label>
					<input type="File" class="form-control" name="Imagine" id="Imagine">
			</div>
			<div class="form-group">
					<label for="Post">Post:</label>
					<textarea class="form-control" name="Post" id="Post">
					<?php
					echo $PostE;
					?>	
					</textarea>
				</div>
					<br>
				<input class="btn btn-success btn-block" type="submit" name="Submit" value="Editare articol">
				</fieldset>
				<br>

			</form>
			
</div>	

				



	</div>
	


</div>


</div>



</body>
</html>