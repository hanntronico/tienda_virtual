<?php
session_start();
?>

<script>
// function confirma(producto)
// {
// 	if (confirm("Relamente desea eliminar "+producto+" de su canasta de compras?" ))
// 	{
// 		return true;
// 	}
// 	return false;

// }

function confirma(producto, idp)
{
	tb_show("CONFIRMAR","boxes2/eli_res.php?nomp="+producto+"&id="+idp+"&placeValuesBeforeTB_=savedValues&TB_iframe=true&height=120&width=300&modal=false");
}

function recalcula () {
	frm012.accion.click();
}
</script>


<?php 
	$k=$_SESSION["s_prod"];

	if (count($k)==0) 
	{
        echo "<a href='#' onclick='hidelista(); return false;'>
                 <span class='tit_ocultar'>&nbsp;&nbsp;&nbsp;&nbsp;</span></a>";     
		echo "<div style='text-align: center;'>TU CANASTA DE COMPRAS <br> ESTÁ VACÍA</div>";
		exit();
	}else{

		foreach( $k as $key => $value ){
		$acum+=$value;}

		if ($acum==0) {
            echo "<a href='#' onclick='hidelista(); return false;'>
                  <span class='tit_ocultar'>&nbsp;&nbsp;&nbsp;&nbsp;</span></a>";
			echo "<div style='text-align: center;'>
				TU CANASTA DE COMPRAS <br> ESTÁ VACÍA</div>";
			exit();
		}
	}

?>
<a href="#" onclick="hidelista(); return false;">
	<span class="tit_ocultar">&nbsp;&nbsp;&nbsp;&nbsp;</span></a>
<!-- <input name="accion" type="submit" value="Confirmar" class="btnblue"> -->

<a href="principal.php?sw=2">
	<span class="tit_pagar">$ Pagar</span></a>
	


	<br><br>
<form name="frm012" action="procesa.php" method="post"> 
<table width="100%" class="tbcar">
	<thead>
		<tr>
			<th colspan="2" align="left"><div align="center">Producto</div></th>
			<th align="left"><div align="center">Precio</div></th>
			<th align="left"><div align="center">Cant.</div></th>
			<th align="left"><div align="right">Sub Total</div></th>
			<th width="3%">&nbsp;</th>
		</tr>
	</thead>
	<tbody>	
<?php
include("../conectar.php");
$link=Conectarse();
$k=$_SESSION["s_prod"];
$total=0;
if (count($k)>0)
{
foreach( $k as $key => $value ) 
{
$res=@mysql_query("set names utf8",$link);
$row=@mysql_fetch_array($res);
$res=mysql_query("select * from producto where cod_producto=".$key."",$link);
$row=mysql_fetch_array($res);
$astck = $row[5];
$total+=($row[3]*$value);
	if ($value<>0)
	{
	?>
	<tr>
		<td valign="middle"><div align="center">
		  <img src="../productos/<?php echo $row[4];?>" alt="<?php echo $row[4];?>" width="50" height="40">     
		</div></td>
		<td valign="middle"><?php echo $row[1]; ?></td>
		<td><div align="right"><?php echo sprintf("%01.2f", $row[3]); ?>&nbsp;&nbsp;</div></td>
		<td>
		  
	      <div align="center">
	        <input type="hidden" name="cprod[]" value="<?php echo $key; ?>">
	        <!-- <input name="cantidad[]" type="text" value="<?php //echo $value; ?>" size="5"> -->
	        <select name="cantidad[]" style="width: 50px;" onchange="recalcula();">
	        <!-- <select name="cantidad[]" style="width: 50px;" onchange="getButtonByValue('button').click();"> -->
	        	<?php 

	        		if ($astck>0) {
		        		for ($i=1; $i <= $astck ; $i++) { 
		        			$seleccionar="";
							if($i==$value) $seleccionar="selected";
		        			echo "<option value=".$i." ".$seleccionar.">".$i."</option>";
		        		}
	        		}else {
	        			echo "<option value='0' selected='selected'>0</option>";
	        			// $value=0;
	        			// $total=0;
	        		}

	        	 ?>
	        </select>

            </div></td>
		<td>
			<div align="right">
				<?php echo sprintf("%01.2f", $row[3]*$value); ?>&nbsp;&nbsp;</div>
		</td>
		<td>
			<div align="center">
<!-- 			<a onClick="return confirma('<?php //echo $row[1]; ?>');"  href="eli.php?idp=<?php //echo $key; ?>"><img src="../../img/tacho.gif" alt="Eliminar" width="15" height="18" border="0"></a> -->
			<a href="#" onClick="confirma('<?php echo $row[1]; ?>', <?php echo $key; ?>); return false;">
				<img src="../../img/tacho.gif" alt="Eliminar" width="15" height="18" border="0"></a>
			</div>
		</td>
	</tr>
	<?php
	}
}
}
else
{
?>
<tr>
	<td colspan="6">NO hay productos</td>
</tr>
<?php
}
?>
<tr>
	<td colspan="5" align="right" class="total"><b>Total: <?php echo  sprintf("%01.2f", $total); ?>&nbsp;&nbsp;</b></td>
	<td>&nbsp;</td>
</tr>
</tbody>
</table>
<input name="accion" type="submit" value="Recalcular" class="btnrecalc">
		
</form>


