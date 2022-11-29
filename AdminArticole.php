<?php
require_once("Include/Functions.php");
require_once("Include/DB.php");
VerificareLogare();
?>
<?php require_once("Include/header.php");?>
<?php require_once("Include/sidebar.php");?>



   <div class="col-sm-10">
   	<h1 class="text-center">Administrare articole</h1>
   	 	<div><?php echo Message();?>
  
   	           	
   	</div>


 <div class="table-responsive">
 	<table class="table table-striped table-hover">
 		<tr>
 			<th>Nr</th>
 			<th>Titlu articol</th>
 			<th>Data_ora</th>
 			<th>Categorie</th>
 			<th>Imagine</th>
 			<th>Editare/Stergere</th>
 			<th>Live</th>
 		</tr>

<?php

$ArticolePagina=3;
			$sql="SELECT * FROM articole";
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

$sql="SELECT * FROM articole order by id_articol desc limit $Start,$ArticolePagina";
$query=mysqli_query($con,$sql);
$Nr=0;
while($Data=mysqli_fetch_array($query)){
	$ArticolId=$Data["id_articol"];
	$Dataora=$Data["data_ora"];
	$Titlu=$Data["titlu"];
	$Categorie=$Data["categorie"];
	$Imagine=$Data["imagine"];
	$Post=$Data["post"];
$Nr++;
?>

	<tr>
		<td><?php echo $Nr?></td>
			<td><?php 

			if(strlen($Titlu)>20){
				$Titlu=substr($Titlu,0,20).'...';
			}

			echo $Titlu?></td>
			<td><?php echo $Dataora?></td>
			<td><?php echo $Categorie?></td>
			<td><img class="imagineAdmin" src="Imagini/Stiri/<?php echo $Imagine;?>"></td>
			<td>
			<a href="EditareArticol.php?Edit=<?php echo $ArticolId;?>">
			<span class="btn btn-warning">Editare</span>
		</a>
			<a href="StergereArticol.php?Delete=<?php echo $ArticolId;?>">
			<span class="btn btn-danger">Stergere</span>
			</a>
		</td>
			<td><a href="ArticolInfo.php?idArticol=<?php echo $ArticolId;?>" target="_blank"><span class="btn btn-primary">Vizualizare Articol</span></a></td>

	</tr>

<?php 
 }
?>
 	</table>



 </div>

 	<nav>
			<ul class="pagination pagination-lg">

				<?php
				if(isset($Pagina)){
				if($Pagina>1) {
				?>
				<li><a href="AdminArticole.php?Pagina=<?php echo $Pagina-1;?>">&laquo;</a></li>
<?php } } ?>
		<?php

	

		for($i=1;$i<=$NrPagini;$i++){
			if(isset($Pagina)){

			if($i==$Pagina){
		

		?>

			<li class="active"><a href="AdminArticole.php?Pagina=<?php echo $i;?>"><?php echo $i;?></a></li>
<?php }
	else{
?>
			    <li><a href="AdminArticole.php?Pagina=<?php echo $i;?>"><?php echo $i;?></a></li>
	<?php }
	 }
     }
	 
	?>
	<?php

				if(isset($Pagina)){
				if($Pagina<$NrPagini) {
				?>
				<li><a href="AdminArticole.php?Pagina=<?php echo $Pagina+1;?>">&raquo;</a></li>
<?php } } ?>

		</ul>

	</nav>
		
	</div>
	


</div>


</div>



</body>
</html>
