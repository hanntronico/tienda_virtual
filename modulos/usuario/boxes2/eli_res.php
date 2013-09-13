<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
<script language="JavaScript">
<!--
function carga()
{
	 
  parent.window.location="../eli.php?idp="+<?php echo $_GET["id"] ?>;
	self.parent.tb_remove();
}
function cerrar()
{
	self.parent.tb_remove();
}
//-->
</script>
<style type="text/css">
<!--
.Estilo1 {
	font-family: Tahoma;
	font-weight: bold;
	font-size: 12px;
}
-->
</style>
</head>

<body style="background-color:#FFF2A8">
  <form action="#" method="post" name="form1">

    <table width="100%">
    
        <tr>
        	<td colspan="2" align="center" class="txt_error" ><br />
              <span class="Estilo1">¿Relamente desea eliminar <?php echo $_GET['nomp']; ?>  de su canasta de compras?</span></td>
      </tr>
      <tr>
      	<td colspan="2">&nbsp;</td>
      </tr>
        <tr>
        	<td align="center"><input type="button"  value="Si" onclick="carga()"  style="width:60px" /></td>
            <td align="center"><input type="button" value="No" onclick="cerrar()"  style="width:60px"/></td>
        </tr>
    </table>
   
    </form>
</body>
</html>
