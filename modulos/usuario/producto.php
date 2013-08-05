<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<link rel="stylesheet" href="../../funciones/style.css" type="text/css">
<script language="JavaScript" src="../../funciones/script.js"></script>
<script>
function confirma(producto)
{
	if (confirm("Desea agregar el producto seleccionado a su carrito de compras?" ))
	{
		return true;
	}
	return false;

}
</script>
<style type="text/css">
<!--
.Estilo1 {font-size: 12px}
-->
</style>
</head>
<body>
<?php 	
	include("../../funciones/function.php");
	include("../conectar.php");
	$link=Conectarse();
	Title("PRODUCTO");
	$pag = 'producto';
	if($_GET["sw"]==1){ 		// NUEVO
		$id=autogenerado("producto","cod_producto",6); 
		$ing = 0;
		$ing2 = 0;
	}elseif($_GET["sw"]==2){ 	// EDITAR
		$sql="SELECT * FROM producto WHERE cod_producto='".$_GET["id"]."'";
		$rs=mysql_query($sql,$link);
		$fila =mysql_fetch_object($rs);
		$id  = $fila->cod_producto;
		$des = $fila->descripcion;		
		$tip = $fila->cod_tipo;
		$pre = $fila->precio;
		$img = $fila->imagen;
		$sto = $fila->stock;
		
		mysql_free_result($rs);
	}else{ //		LISTA
			$sql="SELECT cod_producto as ID, p.descripcion as DESCRIPCION, tipo as TIPO, precio as PRECIO, imagen as IMAGEN, stock as STOCK FROM producto p INNER JOIN categoria c on p.cod_tipo=c.cod_tipo";
		$tabla=$pag;
		echo $msg_error; 
		paginar3($sql,$tabla,1);
		echo "</body></html>";
		exit;
	}
?>	
<form action="grabar.php" method="post" enctype="multipart/form-data" name="form1" onSubmit="return validar(this)">
<table width="566" align="center" cellpadding="0" cellspacing="0" class="MTableBorder">
	<tr class="Mtr">
		<td width="562" height="25">
			<?php 
				if($_GET["sw"]==1){ 
					echo "<b>&nbsp;Nuevo Registro</b>";
				}else{
					echo "<b>&nbsp;Editar Registro</b>";
				}
			?>
			<input type="hidden" name="pag" value="<?=$pag?>">
			<input type="hidden" name="sw" value="<?=$_GET["sw"]?>">
	  </td>
	</tr>
	<tr>
		<td>
		<table width="102%">
		  <tr> 
			<td colspan="3">&nbsp;</td>
		  </tr>
		  <tr> 
			<td width="22%">Codigo:</td>
			<td colspan="2">
				<b><?=$id?></b><input type='hidden' name='id' class='Text' value='<?=$id?>'>			</td>
		  </tr>
									  
		  <tr> 
			<td>Descripci&oacute;n  :</td>
			<td colspan="2"><input name="nom" type="text" class="Text" id="nom" value="<?=$des?>" size="50"></td>
		  </tr>
		  <tr>
		    <td><div align="left">Tipo :</div></td>
		    <td colspan="2"><div align="left">
              <? llenarcombo('categoria','cod_tipo, tipo',' ORDER BY 2', $tip, '','codi'); ?>
            </div></td>
	      </tr>
		  <tr> 
			<td>Precio:</td>
			<td colspan="2">
		    <input name="pre" class="Text" id="pre" value="<?=$pre?>" size="10" maxLength="10">
		    <span class="Estilo1">$.</span></td>
		  </tr>
		  		  			  
		  <tr>
		    <td><div align="left">Stock:</div></td>
		    <td colspan="2"><div align="left">
              <input name="stoc" class="Text" id="email" value="<?=$sto?>" size="8" maxlength="5"  >
            </div></td>
	      </tr>
		  <tr>
		    <td>Imagen:</td>
		    <td width="9%">
             <div align="left">
                <?=$img?>
            </div></td>
	        <td width="69%"><input name="imag" type="file" class="Text" id="imag" size="40"></td>
		  </tr>
		  
		  		  			  
		  
		  
		  
		  <tr>
		    <td colspan="3" align="center">&nbsp;</td>
	      </tr>
		  <tr> 
			<td colspan="3" align="center">
				<INPUT name="grabar" type="submit" value="   Grabar   " class="boton">
				&nbsp;&nbsp;&nbsp; 
				<INPUT type="button" value="  Cancelar  " class="boton" onClick="location='<?=$pag?>.php'">		    </td>
		  </tr>
		  <tr> 
			<td colspan="5">&nbsp;</td>
		  </tr>
		</table>
		</td>
	</tr>
  </table>
</form>
</body>
</html>
