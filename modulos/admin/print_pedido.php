<?php 
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

/*.tbl01 tr td {
  border: 1px solid #CECECE;
  margin: 0px;
  padding: 0px;
}
*/

#impresora {display:none;}
}
</style>

<?php 

    $rs=@mysql_query("set names utf8",$link);
    $fila=@mysql_fetch_array($res);
    $sql="SELECT p.*, concat(u.nombre, ' ', u.apellidos) as usu 
          FROM pedidos p 
          inner join usuario u 
          on p.cod_usuario = u.cod_usuario  
          WHERE p.cod_pedido ='".$_GET["id"]."'"; 
    $res=@mysql_query($sql,$link);
    $row1=@mysql_fetch_array($res); 

 ?>

 <table cellpadding="1" cellspacing="1" border="0" width="100%" >
  <thead>
    <tr>
      <th colspan="4">
        Lista de Productos en Pedido COD: <?php echo $_GET["id"]; ?>         
      </th>
    </tr>
    <tr>
      <th colspan="4">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <tr class="gradeX">
      <td width="10%"><strong>COD: </strong></td>
      <td width="40%">&nbsp;<?=$row1[0]?></td>
      <td width="10%"><strong>Cliente: </strong></td>
      <td width="40%">&nbsp;<?=$row1[12]?></td>
    </tr>
    <tr class="gradeX">
      <td><strong>Fec. Pedido: </strong></td>
      <td><?php echo date_format(date_create($row1[2]), 'd/m/yy')
          ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Hora:</b> "
          .date_format(date_create($row1[2]), 'H:i:s');?></td>
      <td><strong>Pago: </strong></td>
      <td>&nbsp;<?php if ($row1[2]=='E') {
        echo 'Efectivo';
      } else {
        echo 'Tarjeta';
      }
       ?></td>
    </tr>
    <tr class="gradeX">
      <td><strong>Fec. Entrega: </strong></td>
      <td><?php echo date_format(date_create($row1[4]), 'd/m/yy');?></td>
      <td><strong>Hora Entrega: </strong></td>
      <td>&nbsp;<?=$row1[5]?></td>
    </tr>
    <tr class="gradeX">
      <td><strong>Destinatario: </strong></td>
      <td><?=$row1[6]?></td>
      <td><strong>Dirección: </strong></td>
      <td>&nbsp;<?=$row1[7]?></td>
    </tr>
    <tr class="gradeX">
      <td><strong>Comprobante: </strong></td>
      <td>
      <?php if ($row1[8]=='B') {
        echo 'Boleta';
          } elseif ($row1[8]=='F') {
            echo 'FACTURA';
          }
       ?>
       </td>
      <td><strong>Razón Social: </strong></td>
      <td>&nbsp;<?=$row1[9]?></td>
    </tr>
    <tr class="gradeX">
      <td><strong>RUC: </strong></td>
      <td>&nbsp;<?=$row1[10]?></td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td>&nbsp;</td>
    </tr>

  </tbody>
 </table> 

  <table class="tbl">
      <thead>
        <tr>
          <th colspan="3">&nbsp;
              <!-- Lista de Productos en Pedido COD: <?php echo $_GET["id"]; ?>          -->
          </th>
        </tr>
      </thead>

      <tr>
        <td>

        <table cellspacing="0" cellpadding="0" class="tbl01">
          <colgroup>
            <col class="con0" style="width: 2%" />
            <!-- <col class="con1" style="width: 9%" /> -->
            <col class="con1" style="width: 68%" />
            <col class="con0" style="width: 8%" />
            <col class="con1" style="width: 5%" />
            <col class="con1" style="width: 10%" />
            <col class="con1" style="width: 8%" />
            <!-- <col class="con1" style="width: 10%" /> -->
            <!-- <col class="con1" style="width: 2%" /> -->

          </colgroup>
          <thead>
            <tr>
              <!-- <th class="head1 nosort" align="center"> -->
                <!-- <input type="checkbox" name="allbox" onClick="CA();" title="Seleccionar o anular la selección de todos los registros" /></th> -->
              <th class="head1">COD</th>
              <!-- <th class="head1" align="center">IMAGEN</th> -->
              <th class="head1">PRODUCTOS</th>
              <th class="head1">PRECIO</th>
              <th class="head1">CANT.</th>
              <th class="head1">IGV</th>
              <th class="head1">SUBTOTAL</th>
              <!-- <th class="head1">hann</th> -->
              <!-- <th class="head1">EDITAR</th> -->

            </tr>
          </thead>

          <tbody>

          <?php 

              $rs=@mysql_query("set names utf8",$link);
              $fila=@mysql_fetch_array($res);
              $sql="SELECT dp.cod_producto,
                           concat('<img src=../productos/',p.imagen,' width=50 height=50>') as Img,
                           p.descripcion, 
                           p.precio, 
                           dp.cantidad, 
                           dp.subtotal,
                           dp.igv
                    FROM det_pedidos dp
                    INNER JOIN producto p ON dp.cod_producto = p.cod_producto
                    WHERE dp.cod_pedido ='".$_GET["id"]."'".
                    " AND dp.cantidad<>0"; 
              $res=@mysql_query($sql,$link);
              // echo $sql;
              // exit();
              // echo mysql_num_rows($res);
              $total = 0;
              while($row1=@mysql_fetch_array($res))
              {$i++;

              if ($row1[6]==0) {
                $estrella=" url('images/icons/star.png') no-repeat 98% 50%";
                // $color_row=" #FFCE9D";
               } else{
                $estrella=" none";
              }
          ?>  

              <tr class="gradeX">

                <td align="center"><?php echo $row1[0]; ?></td>
                <!-- <td align="center"><?php echo $row1[1]; ?></td> -->
                <td style="background:<?=$estrella?>;"><?php echo $row1[2]; ?></td>
                <td align="right"><?php echo $row1[3]; ?></td>
                <td align="right"><?php echo $row1[4]; ?></td>

                  <?php //echo $row1[6]; 
                    if ($row1[6]==0) {
                      $txtigv = "0";
                      // $bor="color: #FF8000; font-size:12px; font-weight:bolder;";
                    }else{
                      $txtigv = "18%";
                      // $bor="color: #008040; font-size:12px; font-weight:bolder;";
                    }
                  ?>

                <td align="center" style="<?=$bor?>">
                  <?php echo $txtigv; ?>

                </td>

                <td align="right"><?php echo $row1[5]; ?></td>

              </tr>
          <?php  
                $total = $total + $row1[5];
            } ?> 
              <tr>
                <td colspan="4"></td>
                <td align="right"><strong>TOTAL :</strong></td>
                <td align="right"><?=sprintf("%01.2f", $total)?></td>
              </tr>
              
            <?php 
              $rs=@mysql_query("set names utf8",$link);
              $fila=@mysql_fetch_array($res);
              // $sql="SELECT dp.subtotal,
              //              p.igv
              //       FROM det_pedidos dp
              //       INNER JOIN producto p ON dp.cod_producto = p.cod_producto
              //       WHERE dp.cod_pedido ='".$_GET["id"]."'".
              //       " AND p.igv = 1"; 

              $sql="SELECT sum(dp.subtotal), 
                           (sum(dp.subtotal)/1.18), 
                           ((sum(dp.subtotal)/1.18)*0.18)
                    FROM det_pedidos dp
                    INNER JOIN producto p ON dp.cod_producto = p.cod_producto
                    WHERE dp.cod_pedido ='".$_GET["id"]."'".
                    " AND dp.igv = 1"; 
              $res=@mysql_query($sql,$link);
              $row1=@mysql_fetch_array($res);

              $sql="SELECT sum(dp.subtotal), 
                           (sum(dp.subtotal)/1),
                           ((sum(dp.subtotal)/1)*0)
                    FROM det_pedidos dp
                    INNER JOIN producto p ON dp.cod_producto = p.cod_producto
                    WHERE dp.cod_pedido ='".$_GET["id"]."'".
                    " AND dp.igv = 0"; 
              $res=@mysql_query($sql,$link);
              $row2=@mysql_fetch_array($res);

            ?>



              <tr>
                <td colspan="7" align="right">
                  <table cellspacing="0" cellpadding="0" width="50%">
                      <thead>
                        <tr>
                          <th align="center">Impuesto</th>
                          <th align="center">Compra</th>
                          <th align="center">Base imp.</th>
                          <th align="center">IGV</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td align="left">IGV=18%</td>
                          <td align="right"><?php echo sprintf("%01.2f", $row1[0]); ?></td>
                          <td align="right"><?php echo sprintf("%01.2f", $row1[1]); ?></td>
                          <td align="right"><?php echo sprintf("%01.2f", $row1[2]); ?></td>
                        </tr>
                        <tr>
                          <td align="left">IGV=0</td>
                          <td align="right"><?php echo sprintf("%01.2f", $row2[0]); ?></td>
                          <td align="right"><?php echo sprintf("%01.2f", $row2[1]); ?></td>
                          <td align="right"><?php echo sprintf("%01.2f", $row2[2]); ?></td>
                        </tr>
                        <tr>
                          <td align="left"><b>TOTAL</b></td>
                          <td align="right"><?php echo sprintf("%01.2f", $row1[0]+$row2[0]); ?></td>
                          <td align="right"><?php echo sprintf("%01.2f", $row1[1]+$row2[1]); ?></td>
                          <td align="right"><?php echo sprintf("%01.2f", $row1[2]+$row2[2]); ?></td>
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