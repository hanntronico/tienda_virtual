<?php 

// cod_pedido	cod_usuario	fecpedido	tipo_pago	fec_entrega	hora_entrega	nom_entrega	direcc_entrega	comprob	rs_clie	ruc_clie	estado

	session_start();
	include("../conectar.php");
  $link=Conectarse();
  $res=@mysql_query("set names utf8",$link);
  $row=@mysql_fetch_array($res);
  $sq="select * from pedidos where cod_usuario=".$_SESSION["s_cod"]." and estado=1";
  $res=mysql_query($sq,$link);
  
?>
<fieldset>

	<table border="0" cellpadding="0" cellspacing="0" class="tb_list_ped">
		<caption>Mis Pedidos Pendientes</caption>
		<thead>
			<tr>
				<th>&nbsp;</th>
				<th>Cod.</th>
				<th>Fecha</th>
				<th>Tipo de Pago</th>
				<th>Comprobante</th>
				<th>VER</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
		
		<?php while ($rowp=mysql_fetch_array($res)) { ?>
			<tr>
				<td>&nbsp;</td>
				<td><?php echo $rowp[0]; ?></td>
				<td><?php echo date_format(date_create($rowp[2]),"d/m/Y"); ?></td>
				<td><?php 
						if ($rowp[3]=='E') 
							{echo 'Efectivo';}  
						elseif ($rowp[3]=='T') {
							echo 'Tarjeta';
						}
						?>
				</td>
				<td><?php 
						if ($rowp[8]=='B') 
							{echo 'Boleta';}  
						elseif ($rowp[8]=='F') {
							echo 'Factura';
						}
				?></td>
				<td><a href="#" onclick="verdetalle(<?php echo $rowp[0]; ?>); return false;">VER</a></td>
				<td>&nbsp;</td>
			</tr>
			<tr class="tr_detalle">
				<td colspan="7"><div id="detalle<?php echo $rowp[0]; ?>" name="det"></div></td>
			</tr>
		<?php } ?>				
		
		</tbody>
	</table>
	<br>
</fieldset>