<?php 
  	$origen=$_SERVER['HTTP_REFERER'];
  	include("conectar.php");
  	$link=Conectarse();

	if ($_POST["tipoc"]=='FACTURA') {
    	$tipo = 'F';
    } elseif ($_POST["tipoc"]=='BOLETA') {
        $tipo = 'B';
    }

	$consulta = "INSERT INTO comprobante 
				(nro_tiket, fec_emision, cod_pedido, tipo, subtotal, igv, total, estado)
				values ('".$_POST["ticket"]."', '".
					      date("Y-m-d")."', ".
					      $_POST["id"].", '".
					      $tipo."', ".
					      $_POST["subtotal"].", ".
					      $_POST["igv"].", ".
					      $_POST["total"].", ".
					      "1".")" ;
	
	$rs2=mysql_query($consulta,$link) or die ("error : $consulta");

	$consulta = "UPDATE pedidos SET estado=4 where cod_pedido = ".$_POST["id"];
	$rs2=mysql_query($consulta,$link) or die ("error : $consulta");

	$msn='et1';
	header('location: main_admin.php'.'?msn='.$msn)
?>