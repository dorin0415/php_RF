<?php
  require_once("Include/DB.php");
  require_once("Include/Functions.php");
  VerificareLogare();
?>

<?php require_once("Include/header.php");?>
<?php require_once("Include/sidebar.php");?>

   <div class="col-sm-10">
   	 	<div><?php echo Message();?>
   	           	
   	</div>


   	<h1 class="text-center">Comentarii ne-aprobate</h1>
 
<div class="table-responsive">
	
	<table class="table table-striped table-hover">

		<tr>
			<th>No.</th>
			<th>Nume</th>
			<th>Data</th>
			<th>Comentariu</th>
			<th>Aprobare Comentariu</th>
			<th>Stergere Comentariu</th>



		</tr>
		
<?php
$sql="SELECT *FROM comentarii where status='OFF' order by data_ora desc";
$query=mysqli_query($con,$sql);
$Nr=0;
		while($Data=mysqli_fetch_array($query)){
			$ComentariuId=$Data["id_comentariu"];
			$Dataora=$Data["data_ora"];
			$Nume=$Data["nume"];
			$Comentariu=$Data["comentariu"];
			$ArticolId=$Data["id_articol"];
			$Nr++;
if(strlen($Comentariu)>18){
	$Comentariu=substr($Comentariu,0,18).'...';
}
				

?>	

<tr>
	<td><?php echo $Nr;?></td>
	<td><?php echo $Nume;?></td>
	<td><?php echo $Dataora;?></td>
	<td><?php echo $Comentariu;?></td>
	<td><a href="AprobareComentariu.php?idComentariu=<?php echo $ComentariuId;?>"><span class="btn btn-success">Aprobare</span></a></td>
	<td><a href="StergereComentariu.php?idComentariu=<?php echo $ComentariuId;?>""><span class="btn btn-danger">Stergere</span></a></td>
</tr>	

<?php } ?>
	</table>
</div>


  	<h1 class="text-center">Comentarii aprobate</h1>
 
<div class="table-responsive">
	
	<table class="table table-striped table-hover">

		<tr>
			<th>No.</th>
			<th>Nume</th>
			<th>Data</th>
			<th>Comentariu</th>
			<th>Stergere Comentariu</th>
			<th>Live</th>



		</tr>
		
<?php
$sql="SELECT *FROM comentarii where status='ON' order by data_ora desc";
$query=mysqli_query($con,$sql);
$Nr=0;
		while($Data=mysqli_fetch_array($query)){
			$ComentariuId=$Data["id_comentariu"];
			$Dataora=$Data["data_ora"];
			$Nume=$Data["nume"];
			$Comentariu=$Data["comentariu"];
			$ArticolId=$Data["id_articol"];
			$Nr++;
if(strlen($Comentariu)>18){
	$Comentariu=substr($Comentariu,0,18).'...';
}
			

?>	

<tr>
	<td><?php echo $Nr;?></td>
	<td><?php echo $Nume;?></td>
	<td><?php echo $Dataora;?></td>
	<td><?php echo $Comentariu;?></td>
	<td><a href="StergereComentariu.php?idComentariu=<?php echo $ComentariuId;?>""><span class="btn btn-danger">Stergere</span></a></td>
	<td><a href="ArticolInfo.php?idArticol=<?php echo $ArticolId;?>" target="_blank"><span class="btn btn-primary">Vizualizare Comentariu</span></a></td>
</tr>	

<?php } ?>
	</table>
</div>


 </div>
		
	</div>
	


</div>


</div>



</body>
</html>