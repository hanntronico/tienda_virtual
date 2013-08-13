<?php 
	session_start();
	include("../conectar.php");
  $link=Conectarse();
  $res=@mysql_query("set names utf8",$link);
  $row=@mysql_fetch_array($res);
  $sq="select * from usuario where cod_usuario=".$_SESSION["s_cod"];
  $res=mysql_query($sq,$link);
  $rowus=mysql_fetch_array($res);
  
?>
<fieldset>
<form name="frm_datper" action="upd_usu.php" method="post" accept-charset="utf-8" onsubmit="return validaform();">
<!-- cod_usuario	login	clave	nombre	apellidos	dni	direccion	telefono	correo	cod_nivel -->
<input type="hidden" name="cod_usu" value="<?php echo $rowus[0]?>">
<table border="0" cellpadding="10" cellspacing="10" width="100%" class="tbdatper">
	<thead>
		<tr>
			<th colspan="2">Actualice sus datos personales</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td width="15%">Nombres:</td>
			<td><input type="text" name="txtnom" value="<?php echo $rowus[3]?>" style="width:300px"></td>
		</tr>
		<tr>
			<td>Apellidos:</td>
			<td><input type="text" name="txtape" value="<?php echo $rowus[4]?>" style="width:300px"></td>
		</tr>
		<tr>
			<td>DNI:</td>
			<td><input type="text" name="txtdni" value="<?php echo $rowus[5]?>" maxlength="8" style="width:120px"></td>
		</tr>
		<tr>
			<td>Dirección:</td>
			<td><input type="text" name="txtdirec" value="<?php echo $rowus[6]?>" style="width:400px"></td>
		</tr>
		<tr>
			<td>Teléfono:</td>
			<td><input type="text" name="txttelf" value="<?php echo $rowus[7]?>"></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="text" name="txtemail" value="<?php echo $rowus[8]?>" style="width:300px"></td>
		</tr>
		<tr>
			<td colspan="2" height="6px" ></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" name="btngrabar" value=" Grabar " class="btnblue">&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="button" name="btngrabar" value=" Seguir Comprando " onclick="javascript: location.href='principal.php';" class="btnblue">
			</td>
		</tr>
		<tr>
			<td colspan="2" height="6px" ></td>
		</tr>
	</tbody>
</table>


</form>
</fieldset>