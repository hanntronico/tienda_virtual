<?php 
  	session_start();
  	$origen=$_SERVER['HTTP_REFERER'];
  	include("conectar.php");
  	$link=Conectarse();

  	// echo $_GET["id"];
  	// $_SESSION["precep"]=$_GET["id"];
  	// echo $_SESSION["precep"];
  	$consulta = "SELECT agent_percep FROM proveedor where cod_proveedor=".$_GET["id"];
	$rs2=mysql_query($consulta,$link) or die ("error : $consulta");
	$fil=mysql_fetch_array($rs2);
	$_SESSION["precep"]=$fil[0];
	// echo $_SESSION["precep"];
?>