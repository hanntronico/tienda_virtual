<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Estilo12 {color: #FFFFFF}
.Estilo15 {color: #990000; font-weight: bold; }
.Estilo2 {color: #0099CC}
.Estilo17 {color: #006699}
-->
</style>
<style type="text/css">
<!--
.Estilo20 {color: #990000}
-->
</style>
<link href="../../funciones/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<form name="form1" method="post" action="guardar_usu.php">
  <p>&nbsp;</p>
  <table width="401" height="156"  border="0" align="center" cellpadding="1" cellspacing="1">
    <tr bgcolor="#006699">
      <td colspan="4" bgcolor="#FFFFFF"><div align="center" class="Estilo15">MODULO USUARIO </div></td>
    </tr>
    <tr>
      <td colspan="4" bgcolor="#FFFFFF" class="Estilo17">&nbsp;</td>
    </tr>
    <tr>
      <td height="5" bgcolor="#FFFFFF" class="Estilo12"><span class="Estilo2"><span class="Estilo15">Nuevo Password:</span></span></td>
      <td height="5" colspan="3" bgcolor="#FFFFFF"><input name="txtpws" type="password" id="txtpws"></td>
    </tr>
    <tr>
      <td width="154" height="5" bgcolor="#FFFFFF" class="Estilo12"><div align="left" class="Estilo20"><strong>Confirmar Password:</strong></div></td>
      <td height="5" colspan="3" bgcolor="#FFFFFF"><div align="left" class="Estilo17">
          <input name="txtpasword" type="password" id="txtpasword" >
      </div></td>
    </tr>
    <tr>
      <td height="7" bgcolor="#FFFFFF" class="Estilo17">&nbsp;</td>
      <td colspan="3" bgcolor="#FFFFFF"><span class="Estilo17"></span></td>
    </tr>
    <tr>
      <td height="7" colspan="4" bgcolor="#FFFFFF" class="Estilo2"><div align="center" class="Estilo17">
          <?php if(isset($_GET["error"]))
		{
		if($_GET["error"] == "V")
			echo "<TABLE  width=100%><TR><TD align=center><Font size=4 color=red>[ INGRESAR LAS CONTRASE&Ntilde;AS ]</Font></TD></TR></TABLE>";
		elseif($_GET["error"] == "U")
			echo "<TABLE  width=100%><TR><TD align=center><Font size=4 color=red>[ CONTRASE&Ntilde;AS NO SON IGUALES ]</Font></TD></TR></TABLE>";
			}
			?>
      </div></td>
    </tr>
    <tr>
      <td height="16" colspan="3" bgcolor="#FFFFFF" class="Estilo2"><div align="center" class="Estilo17">
          <div align="right">
            <input name="Enviar" type="submit" class="boton" value=".: Guardar :.">
          </div>
      </div></td>
      <td width="212" height="16" bgcolor="#FFFFFF" class="Estilo2"><div align="center" class="Estilo17">
          <div align="left">&nbsp;&nbsp;&nbsp;
              <input name="Submit2" type="reset" class="boton" onClick="location='../contenido.htm'" value=".: Cerrar :.">
          </div>
      </div></td>
    </tr>
  </table>
</form>
</body>
</html>