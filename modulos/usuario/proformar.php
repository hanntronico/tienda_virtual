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
<script>
function confirma(producto)
{
	if (confirm("Relamente desea eliminar "+producto+" de su carrito de compras?" ))
	{
		return true;
	}
	return false;

}
</script>
</head>

<body>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td align="center"><span style="font-size:14px; font-weight:bold; color:#666">REALIZAR PROFORMA</span></td>
</tr>
</table>


<table width="100%">
<tr>
	<td align="right"><a href="producto.php">Ver Productos</a></td>
</tr>
</table>
<form action="procesa.php" method="post"> 
<table width="100%" border="1" cellpadding="0" cellspacing="0">
	<tr>
		<th colspan="2" align="left"><div align="center">Producto</div></th>
		<th align="left"><div align="center">Precio</div></th>
		<th align="left"><div align="center">Cantidad</div></th>
		<th align="left"><div align="center">Sub Total</div></th>
		<th><div align="center">Opci&oacute;n</div></th>
	</tr>
<?php
include("../conectar.php");
$link=Conectarse();
$k=$_SESSION["s_prod"];
$total=0;
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
		<td valign="middle"><div align="center">
		  <?=$row[4]?>
		</div></td>
		<td valign="middle"><?php echo $row[1]; ?></td>
		<td><div align="right"><?php echo sprintf("%01.2f", $row[3]); ?>&nbsp;&nbsp;</div></td>
		<td>
		  
	      <div align="center">
	        <input type="hidden" name="cprod[]" value="<?php echo $key; ?>">
	        <input name="cantidad[]" type="text" value="<?php echo $value; ?>" size="5">
            </div></td>
		<td><div align="right"><?php echo sprintf("%01.2f", $row[3]*$value); ?>&nbsp;&nbsp;</div></td>
		<td><div align="center"><a onClick="return confirma('<?php echo $row[1]; ?>');"  href="eli.php?idp=<?php echo $key; ?>"><img src="../../imagenes/tacho.gif" alt="Eliminar" width="15" height="18" border="0"></a></div></td>
	</tr>
	<?php
	}
}
}
else
{
?>
<tr>
	<td colspan="6">NO hay productos</td>
</tr>
<?php
}
?>
<tr>
	<td colspan="6" align="right"><b>Total: <?php echo  sprintf("%01.2f", $total); ?></b></td>
</tr>
<tr>
	<td colspan="3"><input name="accion" type="submit" value="Recalcular" class="boton"></td>
	<td colspan="3">
    <?php
	  if($_SESSION["boton2"]<>1)
	   {echo "<input name='accion' type='submit' value='Proformar' class='boton'>";}
	   else{echo "&nbsp;&nbsp;<span style='background-color:#FC3;'><a href='javascript:imprimir()'>&nbsp;&nbsp;Imprmir Proforma&nbsp;&nbsp;</a></span>";}
	?>
    </td>
</tr>
</table>
</form>
</body>
</html>
