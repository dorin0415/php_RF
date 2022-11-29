<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
?>


<?php require_once("Include/header.php");?>
<?php require_once("Include/navbar.php");?>


<div class="container">
<div class="row">
	<div class="col-sm-12">

				
				<h2 class="text-center">Clasament general</h2>
				<br><br>
	
				<div class="table-responsive">
				<table class="table table-striped table-hover">
					<tr>
						<th>#</th>
						<th>Echipa</th>
						<th>Meciuri</th>
						<th>Victorii</th>
						<th>Egaluri</th>
						<th>Infrangeri</th>
						<th>Puncte</th>
					</tr>
	
		<?php
				$sql="SELECT * FROM echipe order by puncte desc ";
				$query=mysqli_query($con,$sql);
				$Nr=0;
				while($Data=mysqli_fetch_array($query)){
					$Nume=$Data["nume"];
					$Meciuri=$Data["meciuri"];
					$Puncte=$Data["puncte"];
					$Victorii=$Data['victorii'];
					$Egaluri=$Data['egaluri'];
					$Infrangeri=$Data['infrangeri'];
					$Nr++;
					?>


			
				
	
				
<tr>

	<td><?php echo $Nr;?></td>
	<td><?php echo $Nume;?></td>
	<td><?php echo $Meciuri;?></td>
	<td><?php echo $Victorii;?></td>
	<td><?php echo $Egaluri;?></td>
	<td><?php echo $Infrangeri;?></td>
	<td><?php echo $Puncte;?></td>
</tr>

<?php } ?>

				</table>


			</div>
		</div>


	</div>


	

	
	</div>
</div>
</div>

</body>
</html>