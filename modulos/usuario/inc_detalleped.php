<?php 

  session_start();
  include("../conectar.php");
  $link=Conectarse();
  $res=@mysql_query("set names utf8",$link);
  $row=@mysql_fetch_array($res);
  $sq="select producto.*, det_pedidos.cantidad, det_pedidos.subtotal 
  	   from det_pedidos, producto 
       where det_pedidos.cod_producto = producto.cod_producto 
       and cod_pedido=".$_GET["cod"]." order by 1";
// select producto.*, det_pedidos.cantidad, det_pedidos.subtotal  
// from det_pedidos, producto 
// where det_pedidos.cod_producto = producto.cod_producto 
// and cod_pedido=50 order by 1

  $res=mysql_query($sq,$link);;	
?>
<div id="sty_detalle">
<table border="0" cellspacing="0" cellpadding="0" width="100%" class="tb_det"> 
	<thead>
		<tr>
			<th>&nbsp;</th>
			<th>Imagen</th>
			<th width="40%">Producto</th>
			<th>Precio</th>
			<th>Cant.</th>
			<th align="right">SubTotal</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	<?php while ($rowp=mysql_fetch_array($res)) { ?>
		<!-- cod_producto	descripcion	cod_subcat	precio	imagen	stock	cod_marca	prom -->
		<tr class="tr_detalle2">
			<td>&nbsp;</td>

			<td><img src="../productos/<?php echo $rowp[4];?>" alt="<?php echo $row[4];?>" width="50" height="40">
			</td>
			<td><?php echo $rowp[1]; ?></td>
			<td>S/. <?php echo sprintf("%01.2f", $rowp[3]); ?></td>
			<td><?php echo $rowp[8]; ?></td>
			<td align="right">S/. <?php echo sprintf("%01.2f", $rowp[9]); ?></td>
			<td>&nbsp;</td>
		</tr>

	<?php 
		$total+=$rowp[9];	
		} ?>
	<tr>
		<td colspan="6" align="right">Total : S/. <?php echo sprintf("%01.2f", $total); ?></td>
		<td>&nbsp;</td>
	</tr>	
	</tbody>
</table>
</div>