<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");

?>


<?php require_once("Include/header.php");?>
<?php require_once("Include/navbar.php");?>

<div class="container">	
<div class="row">
	<div class="col-sm-8">

		<?php
		
		$ArticolePagina=3;
			$sql="SELECT * FROM articole order by data_ora";
			$query=mysqli_query($con,$sql);
			$NrArticole=mysqli_num_rows($query);
			$NrPagini=ceil($NrArticole/$ArticolePagina);
			if(!isset($_GET["Pagina"])){
				$Pagina=1;
			}
			else{
				$Pagina=$_GET["Pagina"];
			}
		$Start=($Pagina-1)*$ArticolePagina;
		$sql="SELECT * FROM articole order by data_ora desc LIMIT $Start,$ArticolePagina";
		$query=mysqli_query($con,$sql);
		while($Data=mysqli_fetch_array($query)){
			$ArticolId=$Data["id_articol"];
			$Dataora=$Data["data_ora"];
			$Titlu=$Data["titlu"];
			$Categorie=$Data["categorie"];
			$Imagine=$Data["imagine"];
			$Post=$Data["post"];


		?>
		<a href="ArticolInfo.php?idArticol=<?php echo $ArticolId;?>">
		<h1 class="text-center" id="titlu"><?php echo htmlentities($Titlu);?></h1>
			<img class="img-responsive imagine" src="Imagini/Stiri/<?php echo $Imagine;?>">
			<br>
			</a>
			
		<?php } ?>


		<nav>
			<ul class="pagination pagination-lg">

				<?php
				if(isset($Pagina)){
				if($Pagina>1) {
				?>
				<li><a href="Stiri.php?Pagina=<?php echo $Pagina-1;?>">&laquo;</a></li>
<?php } } ?>
		<?php

	

		for($i=1;$i<=$NrPagini;$i++){
			if(isset($Pagina)){

			if($i==$Pagina){
		

		?>

			<li class="active"><a href="Stiri.php?Pagina=<?php echo $i;?>"><?php echo $i;?></a></li>
<?php }
	else{
?>
			    <li><a href="Stiri.php?Pagina=<?php echo $i;?>"><?php echo $i;?></a></li>
	<?php }
	 }
     }
	 
	?>
	<?php

				if(isset($Pagina)){
				if($Pagina<$NrPagini) {
				?>
				<li><a href="Stiri.php?Pagina=<?php echo $Pagina+1;?>">&raquo;</a></li>
<?php } } ?>

		</ul>

	</nav>

	</div>


	<div class="col-sm-offset-1 col-sm-3">

				<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="panel-title">Cautare articol</h2>
			</div>
			<div class="panel-body">
		<form action="CautareArticol.php">
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Search" name="Search">
		</div>

		<button class="btn btn-deafult" name="SearchButton">Cautare articol</button>

		</form>	
	

				
			</div>
			
		</div>


				<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="panel-title">Stiri despre echipa favorita</h2>
			</div>
			<div class="panel-body text-center">
				<?php
				$sql="SELECT * FROM categorii order by nume";
				$query=mysqli_query($con,$sql);
				while($Data=mysqli_fetch_array($query)){
					$CategorieId=$Data["id_categorie"];
					$Nume=$Data["nume"];

				
				?>
<a href="CautareCategorie.php?Categorie=<?php echo $Nume;?>">
<span id="titlu"><?php echo $Nume."<br>";?></span>
</a>
<?php } ?>
				
			</div>
		
		</div>

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="panel-title">Postari recente</h2>
			</div>
			<div class="panel-body background">
				<?php
				$sql="SELECT * FROM articole order by data_ora desc LIMIT 0,5";
				$query=mysqli_query($con,$sql);
				while($Data=mysqli_fetch_array($query)){

					$ArticolId=$Data["id_articol"];
					$Titlu=$Data["titlu"];
					$Dataora=$Data["data_ora"];
					$Imagine=$Data["imagine"];
					?>


			<div>
				<img class="pull-left imaginepanel" src="Imagini/Stiri/<?php echo $Imagine; ?>">
				<a href="ArticolInfo.php?idArticol=<?php echo $ArticolId;?>"><p id="titlupanel";"><?php echo $Titlu;?></p></a>
				<p class="datapanel"><?php echo $Dataora;?></p>
				<hr>
			</div>			

				<?php } ?>






				
			</div>
		
		</div>




	</div>
	</div>
</div>

</body>
</html>
