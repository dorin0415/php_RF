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
    header("Location:AdaugareMeci.php");
    exit();
}
else{
	$sql="INSERT into meciuri (echipa1,echipa2,scor1,scor2,marcator1,marcator2,etapa,data_ora)
	VALUES('$Echipa1','$Echipa2','$Scor1','$Scor2','$Marcator1','$Marcator2','$Etapa','$Dataora')";
	$query=mysqli_query($con,$sql);
	if($query){
		  header("Location:AdminMeciuri.php");
          exit();
	}

}

}


?>

<?php require_once("Include/header.php");?>
<?php require_once("Include/sidebar.php");?>

   <div class="col-sm-10">
   	<h1 class="text-center">Adaugare Meci</h1>
   	<div><?php echo Message();?>
   	           	
   	</div>
   	
		<div>

			<form action="AdaugareMeci.php" method="post">
				<fieldset>
						<div class="form-group">
					<label for="Echipa1">Gazde:</label>
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
					<label for="Echipa2">Oaspeti:</label>
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
					<input type="text" class="form-control" name="Scor1" id="Scor1" placeholder="Scor echipa gazda">
			</div>
				<div class="form-group">
					<label for="Scor2">Scor echipa deplasare:</label>
					<input class="form-control" type="text" name="Scor2" id="Scor2" placeholder="Scor echipa deplasare">
				</div>
				<div class="form-group">
					<label for="Marcator1">Marcator echipa gazda:</label>
					<textarea class="form-control" name="Marcator1" id="Marcator1"></textarea>
				</div>
				<div class="form-group">
					<label for="Marcator2">Marcator echipa deplasare:</label>
					<textarea class="form-control" name="Marcator2" id="Marcator2"></textarea>
				</div>
				<div class="form-group">
					<label for="Etapa">Etapa:</label>
					<input class="form-control" type="text" name="Etapa" id="Etapa" placeholder="Etapa">
				</div>
				<div class="form-group">
					<label for="Dataora">Data/ora meciului:</label>
					<input class="form-control" type="text" name="Dataora" id="Dataora" placeholder="Data/ora meciului">
				</div>				
				
					<br>
				<input class="btn btn-success btn-block" type="submit" name="Submit" value="Adaugare Meci">
				</fieldset>
				<br>

			</form>
			
</div>	

				



	</div>
	


</div>


</div>



</body>
</html>