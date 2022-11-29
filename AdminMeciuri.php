<?php
  require_once("Include/DB.php");
  require_once("Include/Functions.php");
VerificareLogare();

?>

<?php require_once("Include/header.php");?>
<?php require_once("Include/sidebar.php");?>

   <div class="col-sm-10">
   	<h1 class="text-center">Administrare meciuri</h1>
   	 	<div><?php echo Message();?>
   	           	
   	</div>


   
 <div class="table-responsive">
 	<table class="table table-striped table-hover">
 		<tr>
 			<th>Nr.</th>
 			<th>Data</th>
 			<th>Gazde</th>
 			<th>Oaspeti</th>
 			<th>Editare/Stergere</th>
 			
 		</tr>

<?php


			$Nr=0;
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
					$Dataora=$Data["data_ora"];
					$Nr++;
					
	

?>

	<tr>
			<td><?php echo $Nr;?></td>
		    <td><?php echo $Dataora;?></td>
			<td><?php echo $Echipa1;?></td>
			<td><?php echo $Echipa2;?></td>
			<td>
			<a href="EditareMeci.php?Edit=<?php echo $MeciId;?>">
			<span class="btn btn-warning">Editare</span>
		</a>
			<a href="StergereMeci.php?Delete=<?php echo $MeciId;?>">
			<span class="btn btn-danger">Stergere</span>
			</a>
		</td>
		
	</tr>

<?php 
 }
?>
 	</table>
 	<h2 class="text-center">Alegeti etapa</h2>
 	<nav>
			<ul class="pagination pagination-lg pull-left">

				<?php
				if(isset($Pagina)){
				if($Pagina>1) {
				?>
				<li><a href="AdminMeciuri.php?Pagina=<?php echo $Pagina-1;?>">&laquo;</a></li>
<?php } } ?>
		<?php

	

		for($i=1;$i<=$Etape;$i++){
			if(isset($Pagina)){

			if($i==$Pagina){
		

		?>

			<li class="active"><a href="AdminMeciuri.php?Pagina=<?php echo $i;?>"><?php echo $i;?></a></li>
<?php }
	else{
?>
			    <li><a href="AdminMeciuri.php?Pagina=<?php echo $i;?>"><?php echo $i;?></a></li>
	<?php }
	 }
     }
	 
	?>
	<?php

				if(isset($Pagina)){
				if($Pagina<$Etape) {
				?>
				<li><a href="AdminMeciuri.php?Pagina=<?php echo $Pagina+1;?>">&raquo;</a></li>
<?php } } ?>

		</ul>

	</nav>



 </div>
		
	</div>
	


</div>


</div>



</body>
</html>   	
