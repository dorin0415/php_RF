<?php
require_once("Include/DB.php");


session_start();



function Message(){
	if(isset($_SESSION["Message"])){
		$Mesagge="<div class=\"alert alert-info\">";
		$Mesagge.=htmlentities($_SESSION["Message"]);
		$Mesagge.="</div>";
		$_SESSION["Message"]=null;
		return $Mesagge;
	}

}


function Timp(){
	date_default_timezone_set("Europe/Bucharest");
    $Timp=time();
    return $Timp;
}


function VerificareLogare(){
   if(!isset($_SESSION['logat'])){
   $_SESSION["Message"]="Nu sunteti logat.Logati-va folosind formularul de mai jos";
   header("location:index.php");
		  exit();
}
}


?>