
<link rel="stylesheet" href="funciones/style.css" type="text/css">

<script language="JavaScript" src="funciones/script.js"></script>
<script language="JavaScript" src="funciones/validaciones.js"></script>

<style type="text/css">
<!--
.Estilo1 {font-size: 12px}
-->
</style>


<?php 	
	include("funciones/function.php");
	include("conectar.php");
	$link=Conectarse();
	Title("CATEGORIAS");
	$pag = 'categoria';
	if($_GET["sw"]==1){ 		// NUEVO
		$id=autogenerado("categoria","cod_tipo",6); 
		$ing = 0;
		$ing2 = 0;
	}elseif($_GET["sw"]==2){ 	// EDITAR
		$rs=@mysql_query("set names utf8",$link);
		$fila=@mysql_fetch_array($res);
		$sql="SELECT * FROM categoria WHERE cod_tipo='".$_GET["id"]."'";
		$rs=mysql_query($sql,$link);
		$fila =mysql_fetch_object($rs);

// cod_tipo, tipo, descripcion, imgcat		   
		$id  = $fila->cod_tipo;
		$tip = $fila->tipo;
		$des = $fila->descripcion;		
		$img = $fila->imgcat;
		
		
		mysql_free_result($rs);
	}else{ //		LISTA
		$rs=@mysql_query("set names utf8",$link);
		$fila=@mysql_fetch_array($res);
		
		$sql="select cod_tipo as COD, 
					 tipo as Tipo, 
		             descripcion as Descripcion, 
		             concat('<img src=../productos/categorias/',imgcat,' width=50 height=50>') 
		             as Imagen
		      from categoria";   
		$tabla=$pag;
		echo $msg_error; 
		paginar($sql,$tabla,1);
		//CloseConexion();	
		echo "</body></html>";
		exit;
	}
?>	


<form action="grabar.php" method="post" enctype="multipart/form-data" name="form1" onSubmit="return validaFormProducto(this)">
<table width="566" align="center" cellpadding="0" cellspacing="0" class="MTableBorder">
	<tr class="Mtr">
		<td width="562" height="25" class="boton">
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
			<td colspan="2">&nbsp;</td>
		  </tr>
		  <tr> 
			<td width="23%">Codigo:</td>
			<td>
				
              <b><?=$id?></b> <input type='hidden' name='id' class='Text' value='<?=$id?>'>			</td>
		  </tr>
									  
		  <tr> 
			<td>Tipo :</td>
			<td><input name="tipo" type="text" class="Text" id="tipo" value="<?=$tip?>" size="30"></td>
		  </tr>
          
		  <tr> 
			<td>Descripci&oacute;n  :</td>
			<td><input name="des" type="text" class="Text" id="des" value="<?=$des?>" size="50"></td>
		  </tr>
        
		  <tr>
		    <td>Imagen:</td>
		    <td>		      <input name="imag" type="file" class="Text" id="imag" size="40"></td>
          </tr>
		  
          	<?php 
				if($_GET["sw"]==1){ 
					echo "<tr>
						    <td align='left'>&nbsp;</td>
	        				<td align='left'>&nbsp;</td>
                         </tr>";
				}else{
					echo "<tr>
						    <td align='left'>Vista Previa :</td>
	        				<td align='left'>"."&nbsp;&nbsp; 
	        					<img src='../productos/categorias/$img' width='50' height='50'></td>
                            <input type='hidden' name='imgDef' value='".$img."'>
						  </tr>";
				}
			?>
		  
		  <tr>
		    <td colspan="2" align="center">&nbsp;</td>
	      </tr>
		  <tr> 
			<td colspan="2" align="center">
				<INPUT name="grabar" type="submit" value="   Grabar   " class="boton">
				&nbsp;&nbsp;&nbsp; 
				<INPUT type="button" value="  Cancelar  " class="boton" onClick="location='<?=$pag?>.php'">		    </td>
		  </tr>
		  <tr> 
			<td colspan="4">&nbsp;</td>
		  </tr>
		</table>
		</td>
	</tr>
  </table>
</form>

