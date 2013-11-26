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

function letras(e)
{ // 1

tecla = (document.all) ? e.keyCode : e.which; // 2
if (tecla==8) return true; // 3
patron =/[A-Za-z\s\Ñ\ñ\Á\É\Í\Ó\Ú\á\é\í\ó\ú\.\,]/; // 4
te = String.fromCharCode(tecla); // 5
return patron.test(te); // 6
} 

function numeros(n)
{ // 

tecla = (document.all) ? n.keyCode : n.which; // 2
if (tecla==8) return true; // 3
patron =/[0\1-9\-]/; // 4
te = String.fromCharCode(tecla); // 5
return patron.test(te); // 6
} 


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

function ver_direc() {
	// alert("hann");
	// document.direc2.css.visibility('visible');
	// document.getElementById("direc2").style.visibility="visible";
	// var valor 
	// alert(document.frm02.swt.value);
	if (document.frm02.swt.value=='F'){
		document.frm02.swt.value="V";
		var content = jQuery("#direc2");
    	content.fadeIn('slow').load("tel_dir.php");
	}
	else{
		if(document.frm02.swt.value=='V')
		{
		 document.frm02.swt.value="F";	
		 var content = jQuery("#direc2");
    	content.fadeOut('slow').load("tel_dir.php");
		}

	}


}

function ver_nom2() {
	if (document.frm02.swtnom.value=='F'){
		document.frm02.swtnom.value="V";
		var content = jQuery("#nom2");
    	content.fadeIn('slow').load("txtnombre2.php");
	}
	else{
		if(document.frm02.swtnom.value=='V')
		{
		document.frm02.swtnom.value="F";	
		var content = jQuery("#nom2");
   		// content.fadeOut('slow').load("txtnombre2.php");
   		content.fadeOut('slow');
		}

	}


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

	var f = new Date();
	var fec_ped = f.getFullYear() + "-" + (f.getMonth() +1) + "-" +  f.getDate();
	
	var str=document.frm02.fecha.value;
    var n=str.split("/",3);
	var fec_ent = n[2]+"-"+n[1]+"-"+n[0];

	var ent = Date.parse(fec_ent.toString());
	var ped = Date.parse(fec_ped.toString());

	// alert(ent+""+ped);
	if(ent < ped){
 		alert("Por favor ingrese una fecha válida");
		document.frm02.fecha.focus();
		return false;
	}

	if(ent == ped){ 

			var horasel=document.frm02.cbohora.value.toString().substring(0,2);
			var ihorasel=parseInt(horasel);
			var hora_act=parseInt(f.getHours());

			if (ihorasel<hora_act+2) {
				alert("Seleccione una hora válida por favor.");
				return false;
			};

			if (document.frm02.txtnom.value=="") {
					alert("Por favor ingrese fecha");
					// document.frm02.txtnom.focus();
					return false;
			}
	}


	if (document.frm02.swtnom.value=='V') {
		if (document.frm02.txtnom2.value=="") {
			alert("Por favor ingrese nombre de entrega 2");
			document.frm02.txtnom2.focus();
			return false;
		}
	}

	if (document.frm02.chkfac.checked) {
		if (document.frm02.txtrz.value=="") {
			alert("Por favor ingrese razón social");
			document.frm02.txtrz.focus();
			return false;
		}

		if (document.frm02.txtruc.value=="") {
			alert("Por favor ingrese RUC");
			document.frm02.txtruc.focus();
			return false;
		}

		if (document.frm02.txtruc.value.length!=11) {
			alert("Por favor ingrese RUC válido");
			return false;
		}
	}

	
	if (document.frm02.swt.value=='F') {

		if (document.frm02.txttelf.value=="") {
			alert("Por favor ingrese teléfono");
			document.frm02.txttelf.focus();
			return false;
		}

		if (document.frm02.txtdir.value=="") {
			alert("Por favor ingrese calle correctamente");
			document.frm02.txtdir.focus();
			return false;
		}	

		if (document.frm02.txtzona.value=="") {
			alert("Por favor ingrese zona correctamente");
			document.frm02.txtzona.focus();
			return false;
		}

	}


	if (document.frm02.swt.value=='V') {

		if (document.frm02.txttelf2.value=="") {
			alert("Por favor ingrese teléfono 2");
			document.frm02.txttelf2.focus();
			return false;
		}

		if (document.frm02.txtdir2.value=="") {
			alert("Por favor ingrese calle 2 correctamente");
			document.frm02.txtdir2.focus();
			return false;
		}	

		if (document.frm02.txtzona2.value=="") {
			alert("Por favor ingrese zona 2 correctamente");
			document.frm02.txtzona2.focus();
			return false;
		}

	}




	// var hora_ped = f.getHours();
	// alert(hora_ped);
	// alert(document.frm02.cbohora.value.toString().substring(0,2));

	// if(ent == ped){
	// 	var hora_act = f.getHours();
		
	// 	if (parseInt(hora_act)<=8) {
	// 		var hora = 8;
	// 		document.frm02.cbohora.value = (hora+2).toString()+":00";
	// 	}else if (parseInt(hora_act)<=18) {
	// 		// var strhora = document.frm02.cbohora.value.toString().substring(0,2);
	// 		// alert(hora_act.toString());
	// 		var hora = parseInt(hora_act);
	// 		document.frm02.cbohora.value = (hora+2).toString()+":00";
	// 	// alert((hora+2).toString());

	// 	}
	// }
		
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
				<input type="radio" name="chktipago" value="T" />&nbsp;Tarjeta de Crédito
					<select id="tarjeta" name="tarjeta" style="width: 110px;">
						<option value="vs">Visa</roption>
						<option value="mc">Master Card</option>
						<option value="ae">Am. Ex</option>
						<option value="dc">Dinners</option>
					</select>
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
					<option value="07:00">07:00</option>
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
				<span style="font-size:11px; color:#FF0000">Tener en cuenta 2 horas para su pedido.</span>
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
			<td colspan="2">Nombre de entrega: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
				
				<span style="font-size:11px; color:#FF0000">Para agregar otro nombre de entrega, <a href="#" onclick="ver_nom2(); return false;">click aquí</a>.</span>

				<input type="hidden" name="swtnom" id="swtnom" value="F">
				<div id="nom2"></div>
			</td>
		</tr>

		<tr>
			<td>&nbsp;</td>
			<td colspan="2">Teléfono: &nbsp;&nbsp;&nbsp;&nbsp;

				<?php if ($row[7]!="") { ?>

				<input type="text" name="txttelf" value="<?php echo $row[7]; ?>" style="width: 120px;" readonly>
				<!-- <input type="hidden" name="txtdir" value="<?php echo $row[6]; ?>"> -->
				<?php } else {?>
				
				<input type="text" name="txttelf" value="<?php echo $row[7]; ?>" style="width: 120px;" onKeyPress="return numeros(event)" maxLength="10">

				<?php } ?>


			
			</td>
		</tr>

		<tr>
			<td>&nbsp;</td>
			<td colspan="2">Dirección: &nbsp;&nbsp;&nbsp;
				
				<?php if ($row[6]!="") { ?>

				<input type="text" name="txt2" value="<?php echo $row[6]; ?>" style="width: 400px;" readonly>
				<input type="hidden" name="txtdir" value="<?php echo $row[6]; ?>">

					<br>
					<span style="font-size:11px; color:#FF0000">Para agregar otro teléfono de contacto y otra dirección de entrega diferentes, 
					<a href="#" onclick="ver_direc(); return false;">click aquí</a>.</span>
					

				<?php } else { ?>
					
					<select id="dir_epec" name="dir_epec" style="width: 70px;">
						<option value="calle">Calle</option>
						<option value="avenida">Avenida</option>
						<option value="jiron">Jirón</option>
						<option value="avenida">Pasaje</option>
					</select>

					<input type="text" name="txtdir" value="<?php echo $row[6]; ?>" style="width: 180px;">

					<select id="dir_zona" name="dir_zona" style="width: 110px;">
						<option value="urb">Urbanización</option>
						<option value="res">Residencial</option>
						<option value="cond">Condominio</option>
						<option value="uv">Unidad Vecinal</option>
						<option value="pj">Pueblo Joven</option>
					</select>
					
					<input type="text" name="txtzona" value="<?php echo $row[6]; ?>" style="width: 180px;">

					
					<br>
					&nbsp;<span class="tit_grabar">*</span>
					&nbsp;
					
					<span class="tit_grabar">Grabar el teléfono y la dirección en sus datos personales?&nbsp;&nbsp;&nbsp;
					<input type="radio" name="grab_dir" value="S" checked="checked"> Sí &nbsp;
					<input type="radio" name="grab_dir" value="N"> No</span>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
					<span class="tit_grabar">Si desea actualizar sus datos 
						<a href="cuenta.php">entrar aquí</a></span>

				<?php } ?>

					<input type="hidden" name="swt" id="swt" value="F">
					<div id="direc2"></div>
			
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2"><span style="color:#FF0000">Por favor verificar que los datos ingresados sean verdaderos y correctos. De esta manera podremos cumplir con la entrega de su pedido.</span></td>
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
