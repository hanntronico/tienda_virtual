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

function valid_form() {
	
	if (document.frm02.chktipago[0].checked==false && document.frm02.chktipago[1].checked==false) 
		{
			alert("Por favor seleccionar tipo de pago");
			document.frm02.chktipago[0].focus();
			return false;
		}

	if (document.frm02.fecha.value=="") {
			alert("Por favor ingrese fecha");
			document.frm02.fecha.focus();
			return false;
	}
	if (document.frm02.txtnom.value=="") {
			alert("Por favor ingrese fecha");
			// document.frm02.txtnom.focus();
			return false;
	}
	if (document.frm02.txtdir.value=="") {
			alert("Por favor ingrese dirección");
			// document.frm02.txtdir.focus();
			return false;
	}
	if (document.frm02.txt3.value=="") {
			alert("Por favor ingrese teléfono");
			// document.frm02.txt3.focus();
			return false;
	}


	var f = new Date();
	var fec_ped = f.getFullYear() + "-" + (f.getMonth() +1) + "-" +  f.getDate();
	
	var str=document.frm02.fecha.value;
    var n=str.split("/",3);
	var fec_ent = n[2]+"-"+n[1]+"-"+n[0];

	var ent = Date.parse(fec_ent.toString());
	var ped = Date.parse(fec_ped.toString());

	if(ent < ped){
 		alert("Por favor ingrese una fecha válida");
		document.frm02.fecha.focus();
		return false;
	}

	// var hora_ped = f.getHours();
	// alert(hora_ped);
	// alert(document.frm02.cbohora.value.toString().substring(0,2));

	if(ent == ped){
		var hora_act = f.getHours();
		
		if (parseInt(hora_act)<=8) {
			var hora = 8;
			document.frm02.cbohora.value = (hora+2).toString()+":00";
		}else if (parseInt(hora_act)<=18) {
			// var strhora = document.frm02.cbohora.value.toString().substring(0,2);
			// alert(hora_act.toString());
			var hora = parseInt(hora_act);
			document.frm02.cbohora.value = (hora+2).toString()+":00";
		// alert((hora+2).toString());

		}
	}
		
	return true;
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

<form name="frm02" action="finalizar.php" method="post" onsubmit="return valid_form();"> 
<table width="100%" class="tbcar2">
	<thead>
		<tr>
			<td colspan="3">Datos adicionales del pedido</td>
		</tr>
	</thead>
	<tbody>	
		<tr>  
			<!-- #FF8000 #FF9A35 #004080-->
			<td>&nbsp;</td>
			<td width="60%">Codigo del pedido:  <?php echo $id; ?></td>
			<td><span style="color:#FF0000 ; font-size:18px; text-decoration:underline;">Total del pedido:  S/. <?php echo sprintf("%01.2f", $total); ?></span></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2">Tipo de pago: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" name="chktipago" value="E" checked="checked" />
				&nbsp;Efectivo contra entrega &nbsp;&nbsp;&nbsp;
				<input type="radio" name="chktipago" value="T" />&nbsp;Tarjeta Visa
			</td>
		</tr>
		<tr> 
			<td>&nbsp;</td>
			<td width="20%" colspan="2">Horario de entrega
				<?php //require('datepicker/calendario.php'); ?>

				<!-- <input type="text" name="fecha" id="fecha" value="<?php //echo date('Y-m-d'); ?> "  />  -->
				<!-- <a onclick="show_calendar()" style="cursor: pointer;"><small>(calendario)</small></a> -->
				<!-- <div id="calendario"><?php //calendar_html() ?></div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				Fecha: 
				<?php include 'calendario/calendario.php'; ?>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
			<td>&nbsp;</td>
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
			<td>&nbsp;</td>
			<td colspan="2">Dirección: &nbsp;&nbsp;&nbsp;
				
				<?php if ($row[6]!="") { ?>

				<input type="text" name="txt2" value="<?php echo $row[6]; ?>" style="width: 400px;" disabled="disabled">
				<input type="hidden" name="txtdir" value="<?php echo $row[6]; ?>">

				<?php } else { ?>
					
					<input type="text" name="txtdir" value="<?php echo $row[6]; ?>" style="width: 400px;">&nbsp;<span class="tit_grabar">*</span>
					&nbsp;&nbsp;&nbsp;
					<span class="tit_grabar">Grabar esta dirección?&nbsp;&nbsp;&nbsp;
					<input type="radio" name="grab_dir" value="S" checked="checked"> Sí &nbsp;
					<input type="radio" name="grab_dir" value="N"> No</span>
					<br>
					<span class="tit_grabar">Si desea grabar otra dirección en sus datos 
						<a href="cuenta.php">entrar aquí</a></span>

				<?php } ?>

			
			</td>
		</tr>

		<tr>
			<td>&nbsp;</td>
			<td colspan="2">Teléfono: &nbsp;&nbsp;&nbsp;&nbsp;
				<input type="text" name="txt3" value="<?php echo $row[7]; ?>" style="width: 120px;" disabled="disabled">
			</td>
		</tr>

		<tr>
			<td>&nbsp;</td>
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
	<div id="botonera">
		<!-- <input name="accion" type="submit" value="Recalcular" class="btnrecalc"> -->
		<a href="principal.php">¿Olvidaste algo? todavía estas a tiempo de regresar, 
			<span style="text-decoration: underline;">pulsa aquí</span></a>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input name="accion" type="submit" value="Finalizar" class="btnblue">
	</div>
</form>
</div>
