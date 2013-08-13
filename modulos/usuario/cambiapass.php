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
<form name="frm_cambiopass" action="cambiapass2.php" method="post" accept-charset="utf-8" onsubmit="return validar();">
<!-- cod_usuario	login	clave	nombre	apellidos	dni	direccion	telefono	correo	cod_nivel -->
<input type="hidden" name="cod_usu" value="<?php echo $rowus[0]?>">
<table border="0" cellpadding="10" cellspacing="10" width="100%" class="tbdatper">
	<thead>
		<tr>
			<th colspan="2">Cambie su contraseña</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td width="25%">Contraseña actual:</td>
			<td><input type="password" name="txtpassact" style="width:180px"></td>
		</tr>
		<tr>
			<td>Nueva contraseña:</td>
			<td><input type="password" name="txtnuevapass" style="width:180px"></td>
		</tr>
		<tr>
			<td>Confirma contraseña:</td>
			<td><input type="password" name="txtconfpass" maxlength="8" style="width:180px"></td>
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