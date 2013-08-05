<center>
<?php
require("../../funciones/cabeza.htm");
?>
<link rel="stylesheet" href="../../funciones/style.css" type="text/css">
<script language="JavaScript" src="../../funciones/script.js"></script>
<style type="text/css">
<!--
.Estilo1 {font-size: 12px}
.Estilo2 {color: #990000}
-->
</style>
<?php 	
	include("../../funciones/function.php");
	include("../conectar.php");
	$link=Conectarse();
	Title("PRODUCTO");
			$sql="SELECT cod_producto as ID, p.descripcion as DESCRIPCION, tipo as TIPO, imagen as IMAGEN, stock as STOCK FROM producto p INNER JOIN categoria c on p.cod_tipo=c.cod_tipo";
		$tabla=$pag;
		echo $msg_error; 
		paginar4($sql,$tabla,1);
?>	
<table width="780">
<tr>
<td colspan="2"><div align="right"><a href="../../." class="Estilo2">&lt;&lt;&nbsp;Volver</a></div></td></tr>
</table>
<?php
require("../../funciones/pie.htm");
?>