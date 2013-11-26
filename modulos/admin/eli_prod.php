<?php
session_start();
include("conectar.php");
$link=Conectarse();

//echo $_GET['sw'];
// echo $_GET['id'];

if ($_GET['sw']==1){
	// $_SESSION["ls_prod"][$_GET["id"]]=$_SESSION["ls_prod"][$_GET["id"]] + 1;
  unset($_SESSION["ls_prod"][$_GET["id"]]);
  unset($_SESSION["prec_prod"][$_GET["id"]]);

}

// echo var_dump($_SESSION["prec_prod"]);

// $origen=$_SERVER['HTTP_REFERER'];
// header("location: compra.php");
// echo $_SESSION["ls_prod"][1];
// echo $_GET["id"];
?>

<?php 
  $k=$_SESSION["ls_prod"];
    if (count($k)>0)
      {

 ?>
<table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="listprod">
    <colgroup>
      <col class="con1" style="width: 5%"/>
      <col class="con0" style="width: 60%" />
      <col class="con1" style="width: 10%" />
      <col class="con0" style="width: 5%" />
      <col class="con0" style="width: 8%" />
      <col class="con0" style="width: 5%" />
    </colgroup>

    <thead>
    	<tr>
            <th class="head1">COD</th>
            <th class="head1">Descripción</th>
            <th class="head1">Precio_unit</th>
            <th class="head1">Cant.</th>
            <th class="head1">Subtotal</th>
            <th class="head1">DEL</th>
        </tr>
    </thead>

    <tbody>
<!-- cantidad, prec_unit, dscto, subtotal -->
    	<?php 
					foreach( $k as $key => $value ) 
					{
						$rs=@mysql_query("set names utf8",$link);
	          $fila=@mysql_fetch_array($res);
						$res=mysql_query("select * from producto where cod_producto=".$key."",$link);
						$row=mysql_fetch_array($res);

    	?>
          <tr class="gradeX">
            <td align="center"><?php echo $row[0]; ?></td>
            <td><?php echo $row[1]; ?></td>
            <td align="right"><?php //echo $row[3]; ?>
          	 	<input type="text" name="t<?=$row[0]?>" value="<?=sprintf("%01.2f", $_SESSION["prec_prod"][$row[0]])?>" style="text-align:right;" onkeydown="checkKey2(event,'t<?=$row[0]?>');">
            </td>

            <td align="center"><?php //echo $value; ?>
              <input type="text" name="c<?=$row[0]?>" value="<?=$_SESSION["ls_prod"][$row[0]]?>" style="text-align:center;" onkeydown="checkKey3(event,'c<?=$row[0]?>');">
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
        	   }
        ?>      
        <tr>
        	<td colspan="6">
   					<!-- <a href="#" class="btn btn_blue btn_bell" onclick="ccc();return false;"><span>VALIDAR</span></a> -->

   					<a href="#" class="btn btn2 btn_orange btn_bell" onclick="ccc();return false;"><span>VALIDAR</span></a>
   					<input type="hidden" name="addedp" value="<?=count($_SESSION["prec_prod"])?>" style="width:30%;">
        	</td>
        </tr>
    <?php 
      }
    ?>
    </tbody>
</table>