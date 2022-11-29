<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
 VerificareLogare();
?>

<?php
if(isset($_POST["Submit"])){
 $Echipa1=mysqli_real_escape_string($con,$_POST["Echipa1"]);
 $Echipa2=mysqli_real_escape_string($con,$_POST["Echipa2"]);
 $Scor1=mysqli_real_escape_string($con,$_POST['Scor1']);
 $Scor2=mysqli_real_escape_string($con,$_POST['Scor2']);
 $Marcator1=mysqli_real_escape_string($con,$_POST["Marcator1"]);
 $Marcator2=mysqli_real_escape_string($con,$_POST["Marcator2"]);
 $Etapa=mysqli_real_escape_string($con,$_POST["Etapa"]);
 $Dataora=mysqli_real_escape_string($con,$_POST["Dataora"]);

if(empty($Dataora)){
 	$_SESSION["Message"]="Completati campul ''Data/Ora''";
    header("Location:AdaugareMeci.php");
    exit();
}
 elseif(empty($Etapa)){
	$_SESSION["Message"]="Completati campul ''Etapa'";
    header("Location:AdaugareMeci.php");
    exit();
}

elseif(!is_numeric($Etapa)){
	$_SESSION["Message"]="Campul ''Etapa'' trebuie sa fie numeric";
    header("Location:AdminMeciuri.php");
    exit();
}

	$Edit=$_GET['Edit'];
	$sql="UPDATE meciuri set echipa1='$Echipa1',echipa2='$Echipa2',scor1='$Scor1',scor2='$Scor2',marcator1='$Marcator1',marcator2='$Marcator2',etapa='$Etapa',data_ora='$Dataora' where id_meci='$Edit'";
	$query=mysqli_query($con,$sql);
	if($query){
		  header("location:AdminMeciuri.php");
		  exit();
	}

}




?>

<?php require_once("Include/header.php");?>
<?php require_once("Include/sidebar.php");?>

   <div class="col-sm-10">
   	<h1 class="text-center">Editare meci</h1>
   	<div><?php echo Message();?>
   	           	
   	</div>
   	
		<div>
<?php

$MeciId=$_GET['Edit'];

$sql="SELECT * FROM meciuri where id_meci='$MeciId' order by id_meci desc";
$query=mysqli_query($con,$sql);
while($Data=mysqli_fetch_array($query)){
	 $Echipa1Edit=$Data['echipa1'];
	 $Echipa2Edit=$Data['echipa2'];
	 $Scor1Edit=$Data['scor1'];
	 $Scor2Edit=$Data["scor2"];
	 $Marcator1Edit=$Data['marcator1'];
	 $Marcator2Edit=$Data['marcator2'];
	 $EtapaEdit=$Data['etapa'];
	 $DataoraEdit=$Data['data_ora'];
}


?>
			<form action="EditareMeci.php?Edit=<?php echo $MeciId;?>" method="post" >
				<fieldset>
					<div class="form-group">
					<span>Echipa gazda:</span>
					<?php echo $Echipa1Edit;?>
					<br>
					<label for="Echipa1">Editare echipa gazda:</label>
					<select class="form-control" id="Echipa1" name="Echipa1">
						
						<?php

						$sql="SELECT * FROM echipe order by nume";
						$query=mysqli_query($con,$sql);
						while($Data=mysqli_fetch_array($query)){
							$Echipa=$Data["nume"];
						?>
						<option><?php echo $Echipa; ?></option>
							<?php } ?>

					</select>
				</div>

					<div class="form-group">
					<span>Echipa oaspete:</span>
					<?php echo $Echipa2Edit;?>
					<br>
					<label for="Echipa2">Editare echipa oaspete:</label>
					<select class="form-control" id="Echipa2" name="Echipa2">
						
						<?php

						$sql="SELECT * FROM echipe order by nume";
						$query=mysqli_query($con,$sql);
						while($Data=mysqli_fetch_array($query)){
							$Echipa=$Data["nume"];
						?>
						<option><?php echo $Echipa; ?></option>
							<?php } ?>

					</select>
				</div>

			<div class="form-group">
					<label for="Scor1">Scor echipa gazda:</label>
					<input value="<?php echo $Scor1Edit;?>" class="form-control" type="text" name="Scor1" id="Scor1">
				</div>
		
				<div class="form-group">
					<label for="Scor2">Scor echipa oaspete:</label>
					<input value="<?php echo $Scor2Edit;?>" class="form-control" type="text" name="Scor2" id="Scor2">
				</div>
					<div class="form-group">
					<label for="Marcator1">Marcatori gazde:</label>
					<textarea class="form-control" name="Marcator1" id="Marcator1">
					<?php
					echo $Marcator1Edit;
					?>	
					</textarea>
				</div>
						<div class="form-group">
					<label for="Marcator2">Marcatori oaspeti:</label>
					<textarea class="form-control" name="Marcator2" id="Marcator2">
					<?php
					echo $Marcator2Edit;
					?>	
					</textarea>
				</div>
					<div class="form-group">
					<label for="Etapa">Etapa:</label>
					<input value="<?php echo $EtapaEdit;?>" class="form-control" type="text" name="Etapa" id="Etapa" placeholder="Numar tricou">
				</div>

					
					<div class="form-group">
					<label for="Dataora">Data/ora:</label>
					<input value="<?php echo $DataoraEdit;?>" class="form-control" type="text" name="Dataora" id="Dataora">
				</div>
			
				
					<br>
				<input class="btn btn-success btn-block" type="submit" name="Submit" value="Editare Meci">
				</fieldset>
				<br>

			</form>
			
</div>	

				



	</div>
	


</div>


</div>



</body>
</html>