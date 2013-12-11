<?php 
	session_start();
	include("conectar.php");
	$link=Conectarse();

	// $ord = substr($_GET["ord"], 1);
	// $_SESSION["prec_prod"][$ord][0]=$_GET["dt"];
	// echo var_dump($_SESSION["prec_prod"]);

	$ord = substr($_GET["ord"], 1);
	$_SESSION["ls_prod"][$ord]=$_GET["dt"];
	
	// echo var_dump($_SESSION["prec_prod"]);
	// echo $_SESSION["prec_prod"][$ord];


?>