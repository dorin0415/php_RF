<?php
 require_once("Include/DB.php");
 require_once("Include/Functions.php");
?>

<?php 

if(isset($_POST["Submit"])){
  $Nume=mysqli_real_escape_string($con,$_POST["Nume"]);
  $Email=mysqli_real_escape_string($con,$_POST["Email"]);
  $Comentariu=mysqli_real_escape_string($con,$_POST["Comentariu"]);
  $Dataora=strftime("%B-%d-%Y %H:%M:%S",Timp());
  if(empty($Nume)||empty($Email)||empty($Comentariu)){
	$_SESSION["Message"]="Toate campurile sunt obligatorii";
}
elseif(!filter_var($Email,FILTER_VALIDATE_EMAIL)) {
  	$_SESSION["Message"]="Email-ul introdus nu are formatul corect ";
}
elseif(strlen($Comentariu)>100){
	$_SESSION["Message"]="Comentariul are peste 100 de caractere";
}

else{
	$ArticolId=$_GET['idArticol'];
	$sql="INSERT into comentarii (data_ora,nume,email,comentariu,status,id_articol)
	VALUES('$Dataora','$Nume','$Email','$Comentariu','OFF','$ArticolId')";
	$query=mysqli_query($con,$sql);
	
	if($query){
		$_SESSION["Message"]="Comentariu adaugat cu succes.Asteptati aprobarea administratorului pentru a vedea comentariul.";
		  header("location:ArticolInfo.php?idArticol={$ArticolId}");
		  exit();
	}
}

}


?>

<?php require_once("Include/header.php");?>
<?php require_once("Include/navbar.php");?>

<div class="container">
<div class="row">
	<div class="col-sm-8">
		<?php
		if(isset($_GET["SearchButton"])){
			$Search=$_GET["Search"];
			$sql="SELECT * FROM articole where titlu like '%$Search%' or post like '%$Search%'";
		}
		else{
			$ArticolId=$_GET["idArticol"];
		$sql="SELECT * FROM articole where id_articol='$ArticolId' order by data_ora desc";
	}

		$query=mysqli_query($con,$sql);
		while($Data=mysqli_fetch_array($query)){
			$ArticolId=$Data["id_articol"];
			$Dataora=$Data["data_ora"];
			$Titlu=$Data["titlu"];
			$Categorie=$Data["categorie"];
			$Imagine=$Data["imagine"];
			$Post=$Data["post"];


		?>
		    <h1 class="text-center" id="titlu"><?php echo htmlentities($Titlu);?></h1>
		    <br>
			<img class="img-responsive imagine" src="Imagini/Stiri/<?php echo $Imagine;?>">
			<br><br>
			
				<p class="data">Categorie:<?php echo htmlentities($Categorie);?> Data postarii:<?php echo htmlentities($Dataora);?></p>
				<br>
				<p class="post">
				<?php 

				//$Post = utf8_encode($Post);
				//$Post = iconv('utf-8', 'iso-8859-2//TRANSLIT', $Post);
				
				echo nl2br($Post);?>
				</p>
			
		
		<br>
		<br>
		<br>
		<br>





		<?php } ?>


<?php

$ArticolId=$_GET["idArticol"];
$sql="SELECT * FROM comentarii where id_articol='$ArticolId' and status='ON'";
		$query=mysqli_query($con,$sql);
		while($Data=mysqli_fetch_array($query)){
			$Dataora=$Data["data_ora"];
			$Nume=$Data["nume"];
			$Comentariu=$Data["comentariu"];

	

?>

<div class="ComentariuFundal comentariudata">

	<img class="pull-left imaginecomentariu" src="Imagini/user.png";">
	<p><?php echo $Nume; ?></p>
	<p><?php echo $Dataora; ?></p>
	<p><?php echo nl2br($Comentariu); ?></p>
</div>



<hr>

<?php } 
?>


	
			<div><?php echo Message();?>
   	           	
   	</div>


   	<form action="ArticolInfo.php?idArticol=<?php echo $ArticolId;?>" method="post" >
				<fieldset>
					<div class="form-group">
					<label for="nume">Nume:</label>
					<input class="form-control" type="text" name="Nume" id="nume" placeholder="Nume">
				</div>
				
				<div class="form-group">
					<label for="email">Email:</label>
					<input class="form-control" type="text" name="Email" id="email" placeholder="Email">
				</div>
					
			<div class="form-group">
					<label for="Comentariu">Comentariu:</label>
					<textarea class="form-control" name="Comentariu" id="Comentariu"></textarea>
				</div>
					<br>
				<input class="btn btn-primary" type="submit" name="Submit" value="Adauga comentariu">
				</fieldset>
				<br>

			</form>







	


</div>

	<div class="col-sm-offset-1 col-sm-3">


		
				<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="panel-title">Cautare articol</h2>
			</div>
			<div class="panel-body background">
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
