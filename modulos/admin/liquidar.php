<?php 
  	session_start();
  	$origen=$_SERVER['HTTP_REFERER'];
  	include("conectar.php");
  	$link=Conectarse();

	$fec_liq = date("Y-m-d H:i:s");
	$consulta = "INSERT INTO liquidaciones (cod_comprob,  nro_ticket, tipo_comprob, cod_usuario, fec_liquid, total_liq, desc_liq) 
				VALUES (".$_POST["id"].", '".
						  $_POST["ticket"]."','".
						  $_POST["tipoc"]."', ".
					      $_SESSION["s_cod"].",'".
					      $fec_liq."', ".
					      $_POST["total"].
					      ", 'ok')";
	// echo $consulta;
	// exit();	
	$rs2=mysql_query($consulta,$link) or die ("error : $consulta");

	$consulta = "UPDATE comprobante SET estado=2 where cod_comprob=".$_POST["id"];
	$rs2=mysql_query($consulta,$link) or die ("error : $consulta");

	$msn='lq1';
	header('location: main_admin.php'.'?msn='.$msn)
?>