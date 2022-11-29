<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
?>


<?php require_once("Include/header.php");?>
<?php require_once("Include/navbar.php");?>

<div class="container">
<div class="row">
	<div class="col-sm-8">

		<h2 class="text-center">Rezultate</h2>
		<br>
		<br>

		<?php
		if(isset($_GET["SearchButton"])){
			$Search=$_GET["Search"];
			$sql="SELECT * FROM echipe where nume like '%$Search%'";
		}
		$query=mysqli_query($con,$sql);
		while($Data=mysqli_fetch_array($query)){
			$EchipaId=$Data["id_echipa"];
			$Nume=$Data['nume'];
			$Sigla=$Data["sigla"];


		?>
			<a href="EchipaInfo.php?idEchipa=<?php echo $EchipaId;?>">
				<h3><?php echo $Nume;?></h3>
			</a>

			
		
		
		<br>
		<br>





		<?php } ?>








	</div>

	<div class="col-sm-offset-1 col-sm-3">
					<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="panel-title">Cautare echipa</h2>
			</div>
			<div class="panel-body background">
		<form action="CautareEchipa.php">
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Search" name="Search">
		</div>
		<button class="btn btn-deafult" name="SearchButton">Cautare echipa</button>
		</form>

			</div>
		</div>

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="panel-title">Clasament</h2>
			</div>
			<div class="panel-body background">

					<div class="table-responsive">
				<table class="table table-striped table-hover">
					<tr>
						<th>#</th>
						<th>Echipa</th>
						<th>Pct</th>
					</tr>
	
		<?php
				$sql="SELECT * FROM echipe order by puncte desc LIMIT 0,5";
				$query=mysqli_query($con,$sql);
				$Nr=0;
				while($Data=mysqli_fetch_array($query)){
					$Nume=$Data["nume"];
					$Puncte=$Data["puncte"];
					$Nr++;
					?>


			
				
	
				
<tr>

	<td><?php echo $Nr;?></td>
	<td><?php echo $Nume;?></td>
	<td><?php echo $Puncte;?></td>
</tr>

<?php } ?>

				</table>


			</div>


					


				
			</div>
			<div class="panel-footer">
				<a class="text-center" href="ClasamentEchipe.php"><p>Clasament complet</p></a>
				
			</div>
		</div>

	

	
	</div>
</div>
</div>

</body>
</html>