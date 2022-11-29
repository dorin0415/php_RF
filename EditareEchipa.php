<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
 VerificareLogare();
?>

<?php
if(isset($_POST["Submit"])){
 $Nume=mysqli_real_escape_string($con,$_POST["Nume"]);
 $Sigla=$_FILES["Sigla"]["name"];
 $Target="imagini/Echipe/".basename($_FILES["Sigla"]["name"]);
 $Meciuri=mysqli_real_escape_string($con,$_POST["Meciuri"]);
 $Victorii=mysqli_real_escape_string($con,$_POST["Victorii"]);
 $Egaluri=mysqli_real_escape_string($con,$_POST["Egaluri"]);
 $Infrangeri=mysqli_real_escape_string($con,$_POST["Infrangeri"]);
 $Puncte=mysqli_real_escape_string($con,$_POST["Puncte"]);
 $Stadion=mysqli_real_escape_string($con,$_POST["Stadion"]);
 $Locuri=mysqli_real_escape_string($con,$_POST["Locuri"]);
 $Antrenor=mysqli_real_escape_string($con,$_POST["Antrenor"]);
if(empty($Nume)||empty($Sigla)||empty($Meciuri)||empty($Victorii)||empty($Egaluri)||empty($Infrangeri)||empty($Puncte)||empty($Stadion)||empty($Locuri)||empty($Antrenor)){
	$_SESSION["Message"]="Toate campuriile sunt obligatorii";
    header("Location:AdaugareEchipa.php");
    exit();
}elseif(strlen($Nume)<2){
	$_SESSION["Message"]="Numele jucatorului trebuie sa aiba mai mult de 2 caractere";
    header("Location:AdaugareEchipa.php");
    exit();
}
elseif(strlen($Antrenor)<2){
	$_SESSION["Message"]="Numele antrenorului trebuie sa aiba mai mult de 2 caractere";
    header("Location:AdaugareEchipa.php");
    exit();
}
elseif(strlen($Stadion)<2){
	$_SESSION["Message"]="Numele stadionului trebuie sa aiba mai mult de 2 caractere";
    header("Location:AdaugareEchipa.php");
    exit();
}
elseif(!is_numeric($Meciuri)){
	$_SESSION["Message"]="Campul ''Meciuri'' trebuie sa fie numeric";
	header("Location:AdaugareEchipa.php");
    exit();
}
elseif(!is_numeric($Victorii)){
	$_SESSION["Message"]="Campul ''Victorii'' trebuie sa fie numeric";
	header("Location:AdaugareEchipa.php");
    exit();
}
elseif(!is_numeric($Egaluri)){
	$_SESSION["Message"]="Campul ''Egaluri'' trebuie sa fie numeric";
	header("Location:AdaugareEchipa.php");
    exit();
}
   
elseif(!is_numeric($Infrangeri)){
	$_SESSION["Message"]="Campul ''Infrangeri'' trebuie sa fie numeric";
	header("Location:AdaugareEchipa.php");
    exit();
}

elseif(!is_numeric($Puncte)){
	$_SESSION["Message"]="Campul ''Puncte'' trebuie sa fie numeric";
	header("Location:AdaugareEchipa.php");
    exit();
}

elseif(!is_numeric($Locuri)){
	$_SESSION["Message"]="Campul ''Locuri'' trebuie sa fie numeric";
	header("Location:AdaugareEchipa.php");
    exit();

}
else{
	$Edit=$_GET['Edit'];
	$sql="UPDATE echipe set nume='$Nume',sigla='$Sigla',meciuri='$Meciuri',victorii='$Victorii',egaluri='$Egaluri',infrangeri='$Infrangeri',puncte='$Puncte',stadion='$Stadion',locuri='$Locuri',antrenor='$Antrenor' where id_echipa='$Edit'";
	$query=mysqli_query($con,$sql);
	move_uploaded_file($_FILES["Sigla"]["tmp_name"],$Target);
	if($query){
		  header("location:AdminEchipe.php");
		  exit();
	}

}

}


?>

<?php require_once("Include/header.php");?>
<?php require_once("Include/sidebar.php");?>

   <div class="col-sm-10">
   	<h1 class="text-center">Editare echipa</h1>
   	<div><?php echo Message();?>
   	           	
   	</div>
   	
		<div>
<?php

$EchipaId=$_GET['Edit'];

$sql="SELECT * FROM echipe where id_echipa='$EchipaId' order by id_echipa desc";
$query=mysqli_query($con,$sql);
while($Data=mysqli_fetch_array($query)){
	$NumeEdit=$Data['nume'];
	$SiglaEdit=$Data['sigla'];
	$MeciuriEdit=$Data['meciuri'];
	$VictoriiEdit=$Data['victorii'];
	$EgaluriEdit=$Data['egaluri'];
	$InfrangeriEdit=$Data['infrangeri'];
	$PuncteEdit=$Data['puncte'];
	$StadionEdit=$Data['stadion'];
	$LocuriEdit=$Data['locuri'];
	$AntrenorEdit=$Data['antrenor'];


}


?>
			<form action="EditareEchipa.php?Edit=<?php echo $EchipaId?>" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
					<label for="Nume">Nume Echipa:</label>
					<input value="<?php echo $NumeEdit;?>" class="form-control" type="text" name="Nume" id="Nume" placeholder="Nume">
				</div>
			
			<div class="form-group">
					<span>Sigla actuala:</span>
					<img class="imagineAdmin" src="imagini/Echipe/<?php echo $SiglaEdit;?>">
					<br>
					<label for="Sigla">Sigla:</label>
					<input type="File" class="form-control" name="Sigla" id="Sigla">
			</div>
				<div class="form-group">
					<label for="Meciuri">Meciuri:</label>
					<input value="<?php echo $MeciuriEdit;?>" class="form-control" type="text" name="Meciuri" id="Meciuri" placeholder="Meciuri">
				</div>
					<div class="form-group">
					<label for="Victorii">Victorii:</label>
					<input value="<?php echo $VictoriiEdit;?>" class="form-control" type="text" name="Victorii" id="Victorii" placeholder="Victorii">
				</div>
				<div class="form-group">
					<label for="Egaluri">Egaluri:</label>
					<input value="<?php echo $EgaluriEdit;?>" class="form-control" type="text" name="Egaluri" id="Egaluri" placeholder="Egaluri">
				</div>
				<div class="form-group">
					<label for="Infrangeri">Infrangeri:</label>
					<input value="<?php echo $InfrangeriEdit;?>" class="form-control" type="text" name="Infrangeri" id="Infrangeri" placeholder="Infrangeri">
				</div>
				<div class="form-group">
					<label for="Puncte">Puncte:</label>
					<input value="<?php echo $PuncteEdit;?>" class="form-control" type="text" name="Puncte" id="Puncte" placeholder="Puncte">
				</div>
			<div class="form-group">
					<label for="Stadion">Stadion:</label>
					<input value="<?php echo $StadionEdit;?>" type="text" class="form-control" name="Stadion" id="Stadion" placeholder="Stadion"></input>
				</div>
					<div class="form-group">
					<label for="Locuri">Locuri:</label>
					<input value="<?php echo $LocuriEdit;?>" class="form-control" type="text" name="Locuri" id="Locuri" placeholder="Locuri">
				</div>
					<div class="form-group">
					<label for="Antrenor">Antrenor:</label>
					<input value="<?php echo $AntrenorEdit;?>" class="form-control" type="text" name="Antrenor" id="Antrenor" placeholder="Antrenor">
				</div>
				
					<br>
				<input class="btn btn-success btn-block" type="submit" name="Submit" value="Editare Echipa">
				</fieldset>
				<br>

			</form>
			
</div>	

				



	</div>
	


</div>


</div>



</body>
</html>