<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
?>


<?php require_once("Include/header.php");?>
<?php require_once("Include/navbar.php");?>

<div class="container">
<div class="row">
	<div class="col-sm-12">
		<?php
		if(isset($_GET["SearchButton"])){
			$Search=$_GET["Search"];
			$sql="SELECT * FROM echipe where nume like '%$Search%'";
		}
		else{
			$IdFromURL=$_GET["idEchipa"];
		$sql="SELECT * FROM echipe where id_echipa='$IdFromURL' order by id_echipa";
	}
		$query=mysqli_query($con,$sql);
		while($Data=mysqli_fetch_array($query)){
			$EchipaId=$Data["id_echipa"];
			$Nume=$Data['nume'];
			$Sigla=$Data["sigla"];
			$Meciuri=$Data['meciuri'];
			$Victorii=$Data['victorii'];
			$Egaluri=$Data['egaluri'];
			$Infrangeri=$Data['infrangeri'];
			$Puncte=$Data['puncte'];
			$Stadion=$Data['stadion'];
			$Locuri=$Data['locuri'];
			$Antrenor=$Data['antrenor'];


		?>
		<div class="col-sm-6">
		<div class="text-center">
			<img class="img-responsive img-rounded imagineechipa" src="Imagini/Echipe/<?php echo $Sigla;?>">
			<br>
			<br>
			
		
		</div>
		<br>
		<br>
		<br>
		<br>





		






	</div>

		<div class="col-sm-4">
		<div class="text-center">

			<br>
			<br>
			<div class="date">
				<p>Nume Echipa:<?php echo htmlentities($Nume);?></p>
				<p>Stadion:<?php echo htmlentities($Stadion);?></p>
				<p>Capacitate:<?php echo htmlentities($Locuri);?></p>
				<p>Antrenor:<?php echo htmlentities($Antrenor);?></p>
			</div>
		
		</div>
		<br>
		<br>
		<br>
		<br>





		<?php } ?>






	</div>


</div>
</div>

</body>
</html>
