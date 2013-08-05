<?php
session_start();
?>
<html>
<head>
<title><?php $fecha=strftime("%d%m%Y", time());  
   echo "ped".$fecha?></title>
<SCRIPT LANGUAGE="JavaScript">
<!--

function imprimir() {
  if (window.print){
    window.print();
	window.close();
	}
  else
    alert("Disculpe, su navegador no soporta esta opción.");
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

<body onLoad="imprimir()">

<table width="100%">
  <TR>
    <TD colspan="2" vAlign=top background="Imagenes/biz_03.jpg" bgColor="#FC3">
    <font color="#000000"><b>Ferreteria NIETO S.A.C.</b></font></TD>
    <TD background=Imagenes/biz_03.jpg bgColor=#efefef height=9 vAlign=top><div align="right"><span class="Estilo2"><font color=990000 face="comic sans ms">&nbsp;</font></span></div></td>
  </TR>
<tr>
  <td colspan="3" align="center">&nbsp;<span style="font-size: 24px;">ORDEN DE PEDIDO</span></td>
  </tr>
<tr>
	<td width="12%" align="right">Nombre:</td>
    <td width="40%" align="right"><div align="left">
      <?=$_SESSION["nom"]?>
    </div>    </td>
    <td width="48%" align="right">&nbsp;</td>
</tr>
<tr>
  <td align="right">Apellidos:</td>
  <td align="right"><div align="left">
    <?=$_SESSION["ape"]?>  
  </div></td>
  <td align="right"><?php $fecha=strftime("%d/%m/%Y", time()); $hora=strftime("%H-%M-%S", time()); 
   echo "Fecha: ".$fecha."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."Hora: ".$hora;?></td>
</tr>
<tr>
  <td colspan="2" align="right">&nbsp;</td>
  <td align="right">&nbsp;</td>
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
		<? 
		
unset($_SESSION["s_prod"]);
unset($_SESSION["boton"]);
		?>
</body>
</html>
