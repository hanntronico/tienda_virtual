<?php 

	// echo "<script type='text/javascript'>
	// 		alert('hanntronico');
	// 	  </script>";

	include("conectar.php");
  	$link=Conectarse();
	// $origen=$_SERVER['HTTP_REFERER'];
	// echo $origen;	
	// echo $_GET["cpe"]." - ";
	// exit();
	// echo $_GET["cpd"]." - ";
	// echo $_GET["cnt"]." - ";


  	$query = "Select precio from det_pedidos where cod_pedido = ".
 	             $_GET["cpe"]." and cod_producto = ".$_GET["cpd"];
 	$res=mysql_query($query,$link) or die ("error : $consulta");
 	$row=mysql_fetch_array($res);

 	$consulta = "UPDATE det_pedidos SET cantidad=".
 	             $_GET["cnt"].", subtotal=".($row[0]*$_GET["cnt"])." where cod_pedido = ".
 	             $_GET["cpe"]." and cod_producto = ".
 	             $_GET["cpd"];

	$rs2=mysql_query($consulta,$link) or die ("error : $consulta");

 ?>




<script type="text/javascript">
    var content = jQuery("#conte");
	content.fadeIn('slow').load("edit_entrega.php?id="+<?=$_GET["cpe"]?>+"&sw=2");
    // alert("hann");    
</script>