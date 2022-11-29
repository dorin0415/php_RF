<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
?>


<?php require_once("Include/header.php");?>
<?php require_once("Include/navbar.php");?>


<div class="container">
<div class="row">
	<div class="col-sm-12">


				<h2 class="text-center">Clasament stadioane</h2>
				<br><br>

				<div class="table-responsive">
				<table class="table table-striped table-hover">
					<tr>
						<th>#</th>
						<th>Nume Stadion</th>
						<th>Echipa</th>
						<th>Locuri</th>

					</tr>
	
		<?php
				$sql="SELECT * FROM echipe order by locuri desc ";
				$query=mysqli_query($con,$sql);
				$Nr=0;
				while($Data=mysqli_fetch_array($query)){
					$Nume=$Data["nume"];
					$Stadion=$Data["stadion"];
					$Locuri=$Data['locuri'];
					$Nr++;
					?>


			
				
	
				
<tr>

	<td><?php echo $Nr;?></td>
	<td><?php echo $Stadion;?></td>
	<td><?php echo $Nume;?></td>
	<td><?php echo $Locuri;?></td>
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