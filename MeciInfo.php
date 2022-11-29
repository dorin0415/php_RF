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
			$IdFromURL=$_GET["idMeci"];
		$sql="SELECT * FROM meciuri where id_meci='$IdFromURL' order by id_meci";
		$query=mysqli_query($con,$sql);
		while($Data=mysqli_fetch_array($query)){
					$MeciId=$Data["id_meci"];
					$Echipa1=$Data["echipa1"];
					$Echipa2=$Data["echipa2"];
					$Scor1=$Data["scor1"];
					$Scor2=$Data['scor2'];
					$Marcator1=$Data["marcator1"];
					$Marcator2=$Data["marcator2"];
					$Dataora=$Data["data_ora"];


		?>
		<div class="text-center ">
			<br>
			<br>
			<div class="row scor">
				<div class="col-sm-5">
					<p><?php echo htmlentities($Echipa1);?></p>
					<br>
					<p><?php echo htmlentities($Scor1);?></p>
					<br>
					<p><?php echo nl2br($Marcator1);?>
			</div>
				<div class="col-sm-2">
					<p><?php echo htmlentities($Dataora);?></p>
				</div>
				<div class="col-sm-5 scor">
					<p><?php echo htmlentities($Echipa2);?></p>
					<br>
					<p><?php  echo htmlentities($Scor2);?></p>
					<br>
					<p><?php  echo nl2br($Marcator2);?></p>
				</div>
			</div>
			</div>
		
		</div>
		<br>
		<br>
		<br>
		<br>





		<?php } ?>










</div>
</div>

</body>
</html>