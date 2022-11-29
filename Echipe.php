<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
?>


<?php require_once("Include/header.php");?>
<?php require_once("Include/navbar.php");?>

<div class="container">
<div class="row">
	<div class="col-sm-8">

			

					<div class="table-responsive">
						<h2 class="text-center">Rezultate</h2>
						<br><br>
				<table class="table table-hover">



		<?php
		$MeciuriPagina=8;
			$sql="SELECT * FROM meciuri";
			$query=mysqli_query($con,$sql);
			$NrMeciuri=mysqli_num_rows($query);
			$Etape=ceil($NrMeciuri/$MeciuriPagina);
			if(!isset($_GET["Pagina"])){
				$Pagina=1;
			}
			else{
				$Pagina=$_GET["Pagina"];
			}
			$Start=($Pagina-1)*$MeciuriPagina;
				$sql="SELECT * FROM meciuri order by etapa,data_ora limit $Start,$MeciuriPagina";
				$query=mysqli_query($con,$sql);
				while($Data=mysqli_fetch_array($query)){
					$MeciId=$Data["id_meci"];
					$Echipa1=$Data["echipa1"];
					$Echipa2=$Data["echipa2"];
					$Scor1=$Data["scor1"];
					$Scor2=$Data['scor2'];
					$Dataora=$Data["data_ora"];
					$Etapa=$Data["etapa"];
					
					?>


				<tr>	
					
		<td>Data:<?php echo $Dataora;?></td>
	    <td><?php echo $Echipa1;?></td>
		<td><a href="MeciInfo.php?idMeci=<?php echo $MeciId;?>"><?php echo $Scor1;echo "-"; echo $Scor2;?></a></td>
	    <td><?php echo $Echipa2;?></td>
	    
</tr>
	
			
				
	
 <?php } ?> 
</table>

   <h2 class="text-center">Etapa</h2>
	<nav>
			<ul class="pagination pagination-lg pull-left">

				<?php
				if(isset($Pagina)){
				if($Pagina>1) {
				?>
				<li><a href="Echipe.php?Pagina=<?php echo $Pagina-1;?>">&laquo;</a></li>
<?php } } ?>
		<?php

	

		for($i=1;$i<=$Etape;$i++){
			if(isset($Pagina)){

			if($i==$Pagina){
		

		?>

			<li class="active"><a href="Echipe.php?Pagina=<?php echo $i;?>"><?php echo $i;?></a></li>
<?php }
	else{
?>
			    <li><a href="Echipe.php?Pagina=<?php echo $i;?>"><?php echo $i;?></a></li>
	<?php }
	 }
     }
	 
	?>
	<?php

				if(isset($Pagina)){
				if($Pagina<$Etape){
				?>
				<li><a href="Echipe.php?Pagina=<?php echo $Pagina+1;?>">&raquo;</a></li>
<?php } } ?>

		</ul>

	</nav>
 					</div>
			

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

			<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="panel-title">Cele mai mari stadioane</h2>
			</div>
			<div class="panel-body background">

					<div class="table-responsive">
				<table class="table table-striped table-hover">
					<tr>
						<th>#</th>
						<th>Stadion</th>
						<th>Pct</th>
					</tr>
	
		<?php
				$sql="SELECT * FROM echipe order by locuri desc LIMIT 0,5";
				$query=mysqli_query($con,$sql);
				$Nr=0;
				while($Data=mysqli_fetch_array($query)){
					$Stadion=$Data["stadion"];
					$Locuri=$Data["locuri"];
					$Nr++;
					?>


			
				
	
				
<tr>

	<td><?php echo $Nr;?></td>
	<td><?php echo $Stadion;?></td>
	<td><?php echo $Locuri;?></td>
</tr>

<?php } ?>

				</table>


			</div>


					


				
			</div>
			<div class="panel-footer">
				<a class="text-center" href="ClasamentStadioane.php"><p>Clasament complet</p></a>
				
			</div>
		</div>

	
	</div>
</div>
</div>

</body>
</html>