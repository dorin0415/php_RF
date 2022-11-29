<?php
require_once("Include/Functions.php");
require_once("Include/DB.php");
VerificareLogare();

?>

<?php require_once("Include/header.php");?>
<?php require_once("Include/sidebar.php");?>

   <div class="col-sm-10">
   	<h1 class="text-center">Administrare echipe</h1>
   	 	<div><?php echo Message();?>
   	           	
   	</div>


 
 <div class="table-responsive">
 	<table class="table table-striped table-hover">
 		<tr>
 			<th>Nr</th>
 			<th>Nume Echipa</th>
 			<th>Sigla</th>
 			<th>Editare/Stergere</th>
 			
 		</tr>

<?php

$sql="SELECT * FROM echipe order by nume";
$query=mysqli_query($con,$sql);
$Nr=0;
while($Data=mysqli_fetch_array($query)){
	$Id=$Data["id_echipa"];
	$Nume=$Data["nume"];
	$Sigla=$Data["sigla"];

	
$Nr++;
?>

	<tr>
		<td><?php echo $Nr?></td>
			<td><?php echo $Nume?></td>
			<td><img class="imagineAdmin" src="Imagini/Echipe/<?php echo $Sigla;?>"></td>
			<td>
			<a href="EditareEchipa.php?Edit=<?php echo $Id;?>">
			<span class="btn btn-warning">Editare</span>
		</a>
			<a href="StergereEchipa.php?Delete=<?php echo $Id;?>">
			<span class="btn btn-danger">Stergere</span>
			</a>
		</td>
		
	</tr>

<?php 
 }
?>
 	</table>



 </div>
		
	</div>
	


</div>


</div>



</body>
</html>
