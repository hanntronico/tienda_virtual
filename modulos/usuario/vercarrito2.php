<?php
session_start();
date_default_timezone_set('America/Lima');
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
	if (confirm("Relamente desea eliminar "+producto+" de su carrito de compras?" ))
	{
		return true;
	}
	return false;

}

function ver_factura() {
 	if (document.frm02.chkfac.checked) {
      var content = jQuery("#raz_soc");
      content.fadeIn('slow').load("factura.php");
 	}else	{
		  var content = jQuery("#raz_soc");
      content.fadeOut('slow').load("factura.php");
 	}	
 		// alert(document.frm02.chkcomp[1].checked);



 // 	if (document.frm02.chkcomp[1].checked == true) {
 //      var content = jQuery("#raz_soc");
 //      content.fadeIn('slow').load("factura.php");
 // 	}	

	// if (document.frm02.chkcomp[1].checked == false) {
 //      var content = jQuery("#raz_soc");
 //      content.fadeOut('slow').load("factura.php");
 // 	} 

 // 	if (document.frm02.chkcomp[0].checked == true) {
 // 			return false;
 // 	} 	

} 


function recalcula () {
	frm01.accion[0].click();
}



</script>


<div id="carrito">

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
		// exit();
	}else{

		foreach( $k as $key => $value ){
		$acum+=$value;}

		if ($acum==0) {
			echo "<div id='msnvacio'>
				TU CANASTA DE COMPRAS ESTÁ VACÍA <br>
				<a href='principal.php'>Retornar a ver productos</a>
             </div>";
			// exit();
		}
	}

$k=$_SESSION["s_prod"];
$total=0;
// $id=autogenerado("pedidos","cod_pedido",6); 
if (count($k)>0)
{
	foreach( $k as $key => $value ) 
	{
		$res=mysql_query("select * from producto where cod_producto=".$key."",$link);
		$row=mysql_fetch_array($res);
		$total+=($row[3]*$value);
	}
}

// exit();
?>

<!-- 
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td align="left"><span style="font-size:14px; font-weight:bold; color:#666">TIPO DE PAGO </span></td>
</tr>
</table> -->

<form name="frm02" action="finalizar.php" method="post"> 
<table width="100%" class="tbcar2">
	<thead>
		<tr>
			<td colspan="2">Datos adicionales del pedido</td>
		</tr>
	</thead>
	<tbody>	
		<tr> 
			<td>Codigo del pedido:  <?php echo $id; ?></td>
			<td>Total del pedido:  S/. <?php echo sprintf("%01.2f", $total); ?></td>
		</tr>
		<tr>
			<td colspan="2">Tipo de pago: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" name="chktipago" value="E" checked="checked" />
				&nbsp;Efectivo contra entrega &nbsp;&nbsp;&nbsp;
				<input type="radio" name="chktipago" value="T" />&nbsp;Tarjeta Visa
			</td>
		</tr>
		<tr> 
			<td width="20%">Fecha y hora de entrega</td>
			<td>
				<?php require('datepicker/calendario.php'); ?>
				<!-- Fecha de entrega: -->
				<input type="text" name="fecha" id="fecha" value="<?php echo date('Y-m-d'); ?> "  /> 
				<a onclick="show_calendar()" style="cursor: pointer;"><small>(calendario)</small></a>
				<div id="calendario"><?php calendar_html() ?></div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<!-- <input type="text" name="txthora" value="<?php //echo date('h:i'); ?> " placeholder=""> -->
				Hora:
				<select name="cbohora" style="width: 80px;">
					<option value="08:00">08:00</option>
					<option value="09:00">09:00</option>
					<option value="10:00">10:00</option>
					<option value="11:00">11:00</option>
					<option value="12:00">12:00</option>
					<option value="13:00">13:00</option>
					<option value="14:00">14:00</option>
					<option value="15:00">15:00</option>
					<option value="16:00">16:00</option>
					<option value="17:00">17:00</option>
					<option value="18:00">18:00</option>
					<option value="19:00">19:00</option>
					<option value="20:00">20:00</option>
				</select>
			</td>
		</tr>

<!-- 		<tr>
			<td colspan="2">Hann: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
<!-- 				<input type="radio" name="chknompago" value="T" />
				&nbsp;Tarjeta Visa &nbsp;&nbsp;&nbsp;
				<input type="radio" name="chknompago" value="E" />
				&nbsp;Efectivo contra entrega -->
<!-- 				<input type="checkbox" name="chknompago" value="">	
			</td>
		</tr> -->
		
		<tr>
			<td colspan="2">Nombre: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<?php $codusu=$_SESSION["s_cod"]; 
					 // echo $codusu;

					 $res=@mysql_query("set names utf8",$link);
			 		 $row=@mysql_fetch_array($res);
					 $res=mysql_query("select * from usuario where cod_usuario = ".$codusu,$link);
			 		 // echo "select * from usuario where cod_usuario = ".$codusu;
			 		 $row=mysql_fetch_array($res);
				?>
				<input type="text" name="txt1" value="<?php echo $row[3].' '.$row[4]; ?>" style="width: 400px;" disabled="disabled">
				<input type="hidden" name="txtnom" value="<?php echo $row[3].' '.$row[4]; ?>">
			</td>
		</tr>

		<tr>
			<td colspan="2">Dirección: &nbsp;&nbsp;&nbsp;
				<input type="text" name="txt2" value="<?php echo $row[6]; ?>" style="width: 400px;" disabled="disabled">
				<input type="hidden" name="txtdir" value="<?php echo $row[6]; ?>">
			</td>
		</tr>

		<tr>
			<td colspan="2">Teléfono: &nbsp;&nbsp;&nbsp;&nbsp;
				<input type="text" name="txt3" value="<?php echo $row[7]; ?>" style="width: 120px;" disabled="disabled">
			</td>
		</tr>

		<tr>
			<td colspan="2">
					Si desea recibir FACTURA por su compra haga check aquí : &nbsp;&nbsp;&nbsp;
					<input type="checkbox" name="chkfac" onclick="ver_factura();" value="F"> Factura
<!-- 				<input type="radio" name="chkcomp" value="T" onclick="ver_factura();" checked="checked" />
						&nbsp;Boleta &nbsp;&nbsp;&nbsp;
				<input type="radio" name="chkcomp" value="E" onclick="ver_factura();" />
						&nbsp;Factura -->

			</td>
		</tr>
</tbody>
</table>
<div id="raz_soc"></div>

<br>
	<div id="botonera" style="tex">
		<!-- <input name="accion" type="submit" value="Recalcular" class="btnrecalc"> -->
		<input name="accion" type="submit" value="Finalizar" class="boton">
	</div>
</form>
</div>