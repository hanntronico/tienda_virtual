<?php
session_start();
include("conectar.php");
$link=Conectarse();

//echo $_GET['sw'];

if ($_GET['sw']==1){
	$_SESSION["ls_prod"][$_GET["id"]]=$_SESSION["ls_prod"][$_GET["id"]] + 1;
}

// $origen=$_SERVER['HTTP_REFERER'];
// header("location: compra.php");
// echo $_SESSION["ls_prod"][1];
// echo $_GET["id"];
?>
<script type="text/javascript">
  var prov = document.frm_regcompra.codprov.value;
  var content = jQuery("#perc");
  content.fadeIn('fast').load("percepcion.php?id="+prov);
  // alert('<?php session_start();echo $_SESSION["precep"];?>');
</script>
<!-- <div id="perc" style="visibility: hidden;"></div> -->
<div id="perc"></div>
<table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="listprod">
    <colgroup>
      <col class="con1" style="width: 5%"/>
      <col class="con0" style="width: 50%" />
      <col class="con1" style="width: 8%" />
      <col class="con1" style="width: 10%" />
      <col class="con0" style="width: 8%" />
      <col class="con0" style="width: 12%" />
      <col class="con0" style="width: 5%" />
    </colgroup>

    <thead>
    	<tr>
            <th class="head1">COD</th>
            <th class="head1">Descripción</th>
            <th class="head1">Prec. Ant.</th>
            <th class="head1">Precio_unit</th>
            <th class="head1">Cantidad</th>
            <th class="head1">Subtotal</th>
            <th class="head1">ACC</th>
        </tr>
    </thead>

    <tbody>
<!-- cantidad, prec_unit, dscto, subtotal -->
    	<?php 
		   	$k=$_SESSION["ls_prod"];
				if (count($k)>0)
				{
					foreach( $k as $key => $value ) 
					{
						$rs=@mysql_query("set names utf8",$link);
	          $fila=@mysql_fetch_array($rs);
						$res=mysql_query("select * from producto where cod_producto=".$key."",$link);
						$row=mysql_fetch_array($res);

    	 ?>
          <tr class="gradeX">
            <td align="center"><?php echo $row[0]; ?></td>
            <td><?php echo $row[1]; ?></td>
            <?php 
              // $consul=mysql_query("select * from producto where cod_producto=".$key."",$link);
              $consul=mysql_query("select prec_unit from det_compra where cod_producto = ".$key." order by 1 desc limit 1",$link);
              $punit=mysql_fetch_array($consul);
              
             ?>

            <td><?php if ($punit[0]==""){ echo "---";} else{ echo $punit[0];} ?></td>
            
            <td align="right"><?php //echo $row[3]; ?>
          	 	<input type="text" name="t<?=$row[0]?>" value="<?=sprintf("%01.2f", $_SESSION["prec_prod"][$row[0]])?>" style="text-align:right;" onKeyPress="return numeros(event)" onkeydown="checkKey2(event,'t<?=$row[0]?>');" >
            </td>
            <td align="center"><?php //echo $value; ?>
              <input type="text" name="c<?=$row[0]?>" value="<?=$_SESSION["ls_prod"][$row[0]]?>" style="text-align:center;" onKeyPress="return numeros(event)" onkeydown="checkKey3(event,'c<?=$row[0]?>');" >
            </td>
            <td align="right">
            	<?php echo sprintf("%01.2f", ($_SESSION["prec_prod"][$row[0]]*$value)); ?>
            </td>
            <td align="center">
              <a href="#" onclick="eliprod(<?=$row[0]?>); return false;">
                <img src="images/icons/trash.png">
              </a>
            </td>
          </tr>
        <?php  
        		  $valor = $valor + ($_SESSION["prec_prod"][$row[0]]*$value); 
            }
			}
        ?>      
        <tr>
          <td colspan="3"></td>
          <td colspan="2" align="right">VALOR</td>
          <td align="right"><?=sprintf("%01.2f",$valor)?></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3"></td>
          <td colspan="2" align="right">IGV</td>
          <td align="right"><?=sprintf("%01.2f",($valor*0.18))?></td>
          <td>&nbsp;</td>
        </tr>        
        <tr>
          <td colspan="3"></td>
          <td colspan="2" align="right">SUB-TOTAL</td>
          <td align="right"><?=sprintf("%01.2f",($valor*1.18))?></td>
          <td>&nbsp;</td>
        </tr>   
        <tr>
          <td colspan="3"></td>
          <td colspan="2" align="right">PERCEPCION</td>
          <td align="right">
            <?php 
              if ($_SESSION["precep"]==1) {
                echo sprintf("%01.2f",(($valor*1.18)*0.02));
              }elseif ($_SESSION["precep"]==0) {
                echo "---";
              }
            ?>
          </td>
          <td>&nbsp;</td>
        </tr>   
        <tr>
          <td colspan="3"></td>
          <td colspan="2" align="right">TOTAL A PAGAR</td>
          <td align="right"><?=sprintf("%01.2f",(($valor*1.18)*1.02))?></td>
          <td>&nbsp;</td>
        </tr>   
        <tr>
        	<td colspan="7">
   					<!-- <a href="#" class="btn btn_blue btn_bell" onclick="ccc();return false;"><span>VALIDAR</span></a> -->

   					<a href="#" class="btn btn2 btn_orange btn_bell" onclick="ccc();return false;"><span>VALIDAR</span></a>
   					<input type="hidden" name="addedp" value="<?=count($_SESSION["prec_prod"])?>" style="width:30%;">
        	</td>
        </tr>	
    </tbody>
</table>