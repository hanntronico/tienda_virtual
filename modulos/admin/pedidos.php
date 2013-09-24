
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
	Title("PEDIDOS");
	$pag = 'pedidos';
	if($_GET["sw"]==1){ 		// NUEVO
		$id=autogenerado("pedidos","cod_pedido",6); 
		$ing = 0;
		$ing2 = 0;
	}elseif($_GET["sw"]==2){ 	// EDITAR
		$rs=@mysql_query("set names utf8",$link);
		$fila=@mysql_fetch_array($res);
		$sql="SELECT cod_pedido AS 'COD', cod_usuario, fecpedido, tipo_pago, fec_entrega, hora_entrega, nom_entrega, direcc_entrega, comprob, rs_clie, ruc_clie, estado FROM pedidos WHERE cod_pedido='".$_GET["id"]."'";
		$rs=mysql_query($sql,$link);
		$fila =mysql_fetch_object($rs);

// cod_pedido	cod_usuario	fecpedido	tipo_pago	fec_entrega	hora_entrega	nom_entrega	direcc_entrega	comprob	rs_clie	ruc_clie	estado		   
		$id  = $fila->cod_pedido;
		$idusu = $fila->cod_usuario;
		$fped = $fila->fecpedido;		
		$tp = $fila->tipo_pago;
		$fent = $fila->fec_entrega;
		$hent = $fila->hora_entrega;
		$nent = $fila->nom_entrega;
		$dent = $fila->direcc_entrega;
		$comp = $fila->comprob;
		$rscli = $fila->rs_clie;
		$ruc = $fila->ruc_clie;
		$est = $fila->estado;
		
		
		mysql_free_result($rs);
	}else{ //		LISTA
		$rs=@mysql_query("set names utf8",$link);
		$fila=@mysql_fetch_array($res);
		
		$sql="SELECT cod_pedido as 'COD', cod_usuario as 'USUARIO', fecpedido as 'FEC_PEDIDO', tipo_pago, fec_entrega, hora_entrega, nom_entrega, direcc_entrega as 'DIRECCION', comprob, rs_clie, ruc_clie, estado FROM pedidos";   
		$tabla=$pag;
		echo $msg_error; 
		paginar2($sql,$tabla,1);
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
			<td>Nombre :</td>
			<td><input name="nomc" type="text" class="Text" id="nomc" value="<?=$sc?>" size="30"></td>
		  </tr>
          
		  <tr> 
			<td>Descripci&oacute;n  :</td>
			<td><input name="des" type="text" class="Text" id="des" value="<?=$des?>" size="50"></td>
		  </tr>
        
          <tr>
		    <td><div align="left">Categoria :</div></td>
		    <td><div align="left">
              <? llenarcombo('categoria','cod_tipo, tipo',' ORDER BY 2', $cat, '','codcat'); ?>
            </div></td>
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
	        					<img src='../productos/subcategorias/$img' width='50' height='50'></td>
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

