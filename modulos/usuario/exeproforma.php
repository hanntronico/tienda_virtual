<?php
session_start();
?>
<html>
<head>
<title>Untitled Document</title>
<SCRIPT LANGUAGE="JavaScript">
<!--

function imprimir() {
	ventana=window.open("imprimir_prof.php","","resizable=NO,scrollbars=yes,HEIGHT=600,WIDTH=600,LEFT=100,TOP=200");
}

// -->
</SCRIPT>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../../funciones/style.css" type="text/css">
<style type="text/css">
<!--
.Estilo1 {font-family: Geneva, Arial, Helvetica, sans-serif}
-->
</style>
</head>

<body>
<table width="100%">
<tr>
	<td align="right"><a href="producto.php">Ver Productos</a></td>
</tr>
</table>
<table width="100%" border="1" cellpadding="0" cellspacing="0">
	<tr>
		<th colspan="2" align="left"><div align="center">Producto</div></th>
		<th align="left"><div align="center">Precio</div></th>
		<th align="left"><div align="center">Cantidad</div></th>
		<th align="left"><div align="center">Sub Total</div></th>
	</tr>
<?php
include("../../funciones/function.php");
include("../conectar.php");
$link=Conectarse();
$k=$_SESSION["s_prod"];
$total=0;
$id=autogenerado("pedidos","cod_pedido",6); 
if (count($k)>0)
{
foreach( $k as $key => $value ) 
{
$res=mysql_query("select * from producto where cod_producto=".$key."",$link);
$row=mysql_fetch_array($res);
$total+=($row[3]*$value);
	if ($value<>0)
	{
	?>
	<tr>
		<td valign="middle"><?php echo $row[4]; ?></td>
		<td valign="middle"><?php echo $row[1]; ?></td>
		<td><div align="right"><?php echo sprintf("%01.2f", $row[3]); ?></div></td>
		<td><div align="center"><?php echo $value; ?></div></td>
		<td><div align="right"><?php echo sprintf("%01.2f", $row[3]*$value); ?></div></td>
		<?php 

/*			$rs=mysql_query("SELECT * FROM pedidos WHERE cod_pedido='".$id."'",$link);
			$numfilas=mysql_num_rows($rs);*/

$fecha=strftime("%Y-%m-%d", time());  
$sql="insert into pedidos() values ('".$id."','".$row[0]."','".$_SESSION["codusu"]."','".$row[3]."','".$value."','".($row[3]*$value)."','".$fecha."',"."0)";


$rs=mysql_query($sql,$link) or die ("Error :$sql");

		?>
	</tr>
	<?php
	}
}
}
else
{
?>
	<tr>
		<td  colspan="5">No hay productos</td>
	</tr>
<?php
}
?>
<tr>
	<td colspan="5" align="right"><b>Total: <?php echo  sprintf("%01.2f", $total); ?></b></td>
</tr>
</table>
<? if (count($k)>0)
{ ?>
<div align="center">
  <p><br>
      <span class="Estilo1">Su Pedido se Realiz&oacute; Satisfactoriamente...!</span></p>
  <p><a href="javascript:imprimir()"><img src="../../imagenes/print.gif" width="97" height="27" border="0"></a></p>
</div>
 <?php }
   $_SESSION["boton2"]=1;
 ?>
 
 
</body>
</html>
