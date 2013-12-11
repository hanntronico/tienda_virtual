<?php 
  	$origen=$_SERVER['HTTP_REFERER'];
  	include("conectar.php");
  	$link=Conectarse();

	//echo $_POST["id"];
	
	$consulta = "UPDATE pedidos SET estado=3 where cod_pedido = ".$_POST["id"];
	$rs2=mysql_query($consulta,$link) or die ("error : $consulta");
	$msn='dp1';
	header('location: main_admin.php'.'?msn='.$msn)
?>