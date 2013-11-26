<?php 
  	$origen=$_SERVER['HTTP_REFERER'];
  	include("conectar.php");
  	$link=Conectarse();

  	// echo $_GET["id"];

  	$consulta = "UPDATE comprobante SET estado=0 where cod_pedido = ".$_GET["id"];
	$rs2=mysql_query($consulta,$link) or die ("error : $consulta");
	$msn='an1';
	header('location: main_admin.php'.'?msn='.$msn)
?>