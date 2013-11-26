<?php 
  	$origen=$_SERVER['HTTP_REFERER'];
  	include("conectar.php");
  	$link=Conectarse();

	//echo $_POST["id"];
	
	$consulta = "UPDATE pedidos SET estado=2 where cod_pedido = ".$_POST["id"];
	$rs2=mysql_query($consulta,$link) or die ("error : $consulta");
	$msn='at1';
	header('location: main_admin.php'.'?msn='.$msn)
?>