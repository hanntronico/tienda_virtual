<?php
session_start();
?>

<SCRIPT LANGUAGE="JavaScript">
<!--

function imprimir() {
	ventana=window.open("imprimir.php","","resizable=NO,scrollbars=yes,HEIGHT=600,WIDTH=600,LEFT=100,TOP=200");
}

// -->
</SCRIPT>

<!-- <link rel="stylesheet" href="../../funciones/style.css" type="text/css"> -->
<script>
function confirma(producto)
{
	if (confirm("Relamente desea eliminar "+producto+" de su canasta de compras?" ))
	{
		return true;
	}
	return false;

}

// function clickButton(val) {
//     var buttons = document.getElementsByTagName('input');
//       for(var i = 0; i < buttons.length; i++) 
//       {
//          if(buttons[i].type == 'button' && buttons[i].value == val) 
//          {
//               buttons[i].click();
//               break; //this will exit for loop, but if you want to click every button with the value button then comment this line
//          }
//       }
// }

function recalcula () {
	frm01.accion[0].click();
}

// function getButtonByValue(value) {
//         var els = document.getElementsByTagName('select');

        
//         for (var i = 0, length = els.length; i < length; i++) {

//             var el = els[i].value;

//             alert(el);
//             // if (el.type.toLowerCase() == 'button' && el.value.toLowerCase() == value.toLowerCase()) {
//             //     return el;
//             //     break;
//             // }
//         }
//     }



</script>

<div id="carrito">
<!-- <table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td align="center"><span style="font-size:14px; font-weight:bold; color:#666">REALIZAR PEDIDO</span></td>
</tr>
</table> -->

<!-- <table width="100%">
<tr>
	<td align="right"><a href="producto.php">Ver Productos</a></td>
</tr>
</table> -->

<?php 
	$k=$_SESSION["s_prod"];

	if (count($k)==0) 
	{
		echo "<div id='msnvacio'>
				TU CANASTA DE COMPRAS ESTÁ VACÍA <br>
				<a href='principal.php'>Retornar a ver productos</a>
             </div>";
		exit();
	}else{

		foreach( $k as $key => $value ){
		$acum+=$value;}

		if ($acum==0) {
			echo "<div id='msnvacio'>
				TU CANASTA DE COMPRAS ESTÁ VACÍA <br>
				<a href='principal.php'>Retornar a ver productos</a>
             </div>";
			exit();
		}
	}

?>

<form name="frm01" action="procesa.php" method="post"> 
<table width="100%" class="tbcar">
	<thead>
		<tr>
			<th colspan="2" align="left"><div align="center">Producto</div></th>
			<th align="left"><div align="center">Precio</div></th>
			<th align="left"><div align="center">Cantidad</div></th>
			<th align="left"><div align="right">Sub Total</div></th>
			<th width="3%">&nbsp;</th>
		</tr>
	</thead>
	<tbody>	
<?php
include("../conectar.php");
$link=Conectarse();
$k=$_SESSION["s_prod"];
$total=0;
if (count($k)>0)
{
foreach( $k as $key => $value ) 
{
$res=@mysql_query("set names utf8",$link);
$row=@mysql_fetch_array($res);
$res=mysql_query("select * from producto where cod_producto=".$key."",$link);
$row=mysql_fetch_array($res);
$total+=($row[3]*$value);
	if ($value<>0)
	{
	?>
	<tr>
		<td valign="middle"><div align="center">
		  <img src="../productos/<?php echo $row[4];?>" alt="<?php echo $row[4];?>" width="50" height="40">     
		</div></td>
		<td valign="middle"><?php echo $row[1]; ?></td>
		<td><div align="right"><?php echo sprintf("%01.2f", $row[3]); ?>&nbsp;&nbsp;</div></td>
		<td>
		  
	      <div align="center">
	        <input type="hidden" name="cprod[]" value="<?php echo $key; ?>">
	        <!-- <input name="cantidad[]" type="text" value="<?php //echo $value; ?>" size="5"> -->
	        <select name="cantidad[]" style="width: 50px;" onchange="recalcula();">
	        <!-- <select name="cantidad[]" style="width: 50px;" onchange="getButtonByValue('button').click();"> -->
	        	<?php 

	        		for ($i=1; $i <= 5 ; $i++) { 
	        			$seleccionar="";
						if($i==$value) $seleccionar="selected";
	        			echo "<option value=".$i." ".$seleccionar.">".$i."</option>";
	        		}

	        	 ?>
	        </select>

            </div></td>
		<td><div align="right"><?php echo sprintf("%01.2f", $row[3]*$value); ?>&nbsp;&nbsp;</div></td>
		<td><div align="center"><a onClick="return confirma('<?php echo $row[1]; ?>');"  href="eli.php?idp=<?php echo $key; ?>"><img src="../../img/tacho.gif" alt="Eliminar" width="15" height="18" border="0"></a></div></td>
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
	<td colspan="5" align="right"><b>Total: <?php echo  sprintf("%01.2f", $total); ?>&nbsp;&nbsp;</b></td>
	<td>&nbsp;</td>
</tr>
<!-- <tr> -->
	
	<!-- <td colspan="6"> -->
		
    <?php
	  // if($_SESSION["boton"]<>1)
	  //  {echo "<input name='accion' type='submit' value='Confirmar' class='boton'>";}
	  //  else{echo "&nbsp;&nbsp;<span style='background-color:#FC3;'><a href='javascript:imprimir()'>&nbsp;&nbsp;Imprimir&nbsp;&nbsp;</a></span>";}
	?>
<!--     </td>
</tr> -->
</tbody>
</table>
<br>
	<div id="botonera" style="tex">
		<input name="accion" type="submit" value="Recalcular" class="btnrecalc">
		<input name="accion" type="submit" value="Seguir Comprando" class="boton">
		<input name="accion" type="submit" value="Confirmar" class="boton">
	</div>
</form>
</div>
