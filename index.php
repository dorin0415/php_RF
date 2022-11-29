<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");

?>

<?php
if(isset($_POST["Submit"])){
$Username=mysqli_real_escape_string($con,$_POST["Username"]);
$Parola=mysqli_real_escape_string($con,$_POST["Parola"]);

 if(empty($Username)||empty($Parola)){
	$_SESSION["Message"]="Toate campurile sunt obligatorii";
    header("Location:index.php");
    exit();
}
else{
	$sql="SELECT * FROM administratori where nume = '$Username' ";
	$query=mysqli_query($con,$sql);
	$Data=mysqli_fetch_array($query);
	$ParolaV=password_verify($Parola, $Data["parola"]);
	if ($ParolaV==false){
		$_SESSION["Message"]="Datele introduse nu sunt corecte";
	}
	else{
		$_SESSION['logat'] = true;
		header("Location:AdminArticole.php");
		exit();
	}



}


}


?>

<?php require_once("Include/header.php");?>
<div class="container-fluid">

<div class="row">


   <div class="col-sm-offset-4 col-sm-4">
   		<br><br><br><br><br><br>
   		<div><?php echo Message();?> 	           	
   	</div>
   	
		<div>

			<form action="index.php" method="post">
				<fieldset>
					<div class="form-group">
					
					<label for="Username">Username:</label>
					<div class="input-group input-group-lg">
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-envelope text-primary"></span>
							</span>
					<input class="form-control" type="text" name="Username" id="Username" placeholder="Username">
				</div>
				</div>
					<div class="form-group">
					<label for="Parola">Parola:</label>
					<div class="input-group input-group-lg">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-lock text-primary"></span>
						</span>
					<input class="form-control" type="Password" name="Parola" id="Parola" placeholder="Parola">
				</div>
				</div>
				
				<br>
				<input class="btn btn-info btn-block" type="submit" name="Submit" value="Login">
				</fieldset>
				<br>

			</form>
			</div>	
	

		


	</div>
	


</div>


</div>



</body>
</html>
