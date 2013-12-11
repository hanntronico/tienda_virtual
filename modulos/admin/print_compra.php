<?php 
    include ("funciones.php");
    include("conectar.php");
    $link=Conectarse();
    // echo $_GET["id"];
 ?>
<!-- <link rel="stylesheet" href="css/style.default.css" type="text/css" /> -->
<!-- <link rel="stylesheet" href="../../css/estilos_admin.css" type="text/css" /> -->
<style type="text/css" media="screen">
  
  * {
    /*color: #ff0000;*/
    font-family: sans-serif;
    font-size: 10px;
  }

  .tbl {
    border: none;
    padding: 0;
    margin: 0;
    width: 100%
  }

  /*.tbl01 {
    border: 1px solid #00FF00;
    padding: 0;
    margin: 0;
  }*/

  .tbl01 tr td {
    border: 1px solid #CECECE;
    margin: 0px;
    padding: 0px;
  }


  /*.tbl01 tr {
    color: #FF0000;
    border: 1px solid #FF0000;
    font-size: 10px;
    margin: 0px;
    padding: 0px;
  }*/


</style>


<style type="text/css" media="print">
@media print {
* {
    color: #000000;
    font-family: Arial;
    font-size: 10px;
}

.tbl {
  border: none;
  padding: 0;
  margin: 0;
  width: 70%
}

.tbl01 tr td {
  border: 1px solid #CECECE;
  margin: 0px;
  padding: 0px;
}

#impresora {display:none;}
}
</style>

<?php 

    $rs=@mysql_query("set names utf8",$link);
    $fila=@mysql_fetch_array($rs);
    
    $sql="SELECT c.cod_compra, 
                 pr.razon_social,
                 pr.ruc,  
                 c.fec_emision,
                 c.fec_venc, 
                 c.nro_comprobante
          FROM compra c inner join proveedor pr
          ON c.cod_proveedor = pr.cod_proveedor 
          WHERE cod_compra = ".$_GET["id"]; 
    // echo $sql       
   
    $res=@mysql_query($sql,$link);
    $row1=@mysql_fetch_array($res); 

 ?>

 <table cellpadding="1" cellspacing="1" border="0" width="100%" >
  <thead>
    <tr>
      <th colspan="4">
        DETALLE EN REGISTRO DE COMPRA - COD: <?php echo $_GET["id"]; ?>         
      </th>
    </tr>
    <tr>
      <th colspan="4">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <tr class="gradeX">
      <td width="15%"><strong>COD: </strong></td>
      <td width="40%">&nbsp;<?=$row1[0]?></td>
      <td width="15%"><strong>Nro. Comprob. : </strong></td>
      <td width="20%">&nbsp;<?=$row1[5]?></td>
    </tr>
    <tr class="gradeX">
      <td><strong>PROVEEDOR :</strong></td>
      <td><?=$row1[1]?></td>
      <td><strong>RUC :</strong></td>
      <td><?=$row1[2]?></td>
    </tr>
    <tr class="gradeX">
      <td><strong>FEC. EMISION :</strong></td>
      <td><?=dma_shora($row1[3])?></td>
      <td><strong>FEC. VENC. :</strong></td>
      <td><?=dma_shora($row1[4])?></td>
    </tr>

  </tbody>
 </table> 

  <table class="tbl">
      <thead>
        <tr>
          <th colspan="3">&nbsp;
              <!-- Lista de Productos en Pedido COD: <?php echo $_GET["id"]; ?> -->
          </th>
        </tr>
      </thead>

      <tr>
        <td>

        <table cellspacing="0" cellpadding="0" class="tbl01">
          <colgroup>
            <col class="con1" style="width: 5%"/>
            <col class="con0" style="width: 55%" />
            <col class="con1" style="width: 12%" />
            <col class="con0" style="width: 15%" />
            <col class="con0" style="width: 8%" />
          </colgroup>
          <thead>
            <tr>
              <th class="head1">COD</th>
              <th class="head1">Descripción</th>
              <th class="head1">Cantidad</th>
              <th class="head1">Prec. Unit.</th>
              <th class="head1">Valor</th>
            </tr>
          </thead>

          <tbody>
                  <?php 
                        $sql1="SELECT p.cod_producto, 
                                      p.descripcion, 
                                      dc.cantidad, 
                                      dc.prec_unit, 
                                      dc.dscto, 
                                      dc.subtotal
                              FROM det_compra dc INNER JOIN producto p
                              ON dc.cod_producto = p.cod_producto 
                              WHERE cod_compra=".$_GET["id"]; 
                    $res1=@mysql_query($sql1,$link);  
                    while($row1=@mysql_fetch_array($res1))
                          {$i++;
                  ?>  

                      <tr class="gradeX">
                        <td align="center"><?php echo $row1[0]; ?></td>
                        <td><?php echo $row1[1]; ?></td>
                        <td align="center"><?php echo $row1[2]; ?></td>
                        <td align="right"><?php echo $row1[3]; ?></td>
                        <td align="right"><?php echo $row1[5]; ?></td>
<!--                         <td class="center">
                          <a href="#" onclick="addprod(<?=$row1[0]?>); return false;">
                            <img src="images/icons/attachment.png" alt="">&nbsp;Agregar
                          </a>  
                        </td> -->
                      </tr>
                  <?php 
                       $valor = $valor + $row1[5];
                      } 
                  ?>    
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td colspan="2" align="right">VALOR :</td>
                      <td align="right"><?=sprintf("%01.2f",$valor)?></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td colspan="2" align="right">I.G.V. :</td>
                      <td align="right"><?=sprintf("%01.2f",($valor*0.18))?></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td colspan="2" align="right">SUB-TOTAL :</td>
                      <td align="right"><?=sprintf("%01.2f",($valor*1.18))?></td>
                    </tr>                                        
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td colspan="2" align="right">PERCEPCION :</td>
                      <td align="right"><?=sprintf("%01.2f",(($valor*1.18)*0.02))?></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td colspan="2" align="right">TOTAL A PAGAR :</td>
                      <td align="right"><?=sprintf("%01.2f",(($valor*1.18)*1.02))?></td>
                    </tr>                                        
                  </tbody>

        </table>

                </td>
              </tr>


              <tr>
                <td colspan="6">
                  <div id="impresora">
                    <button onclick="javascript:print(document.overviewhead);"><img src="images/print.png"  /></button>
                  </div>
                </td>
              </tr> 
            </tbody>
          </table>
        </td>    
      </tr>
    </table>