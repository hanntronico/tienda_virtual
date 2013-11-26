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

.tbl01 tr td {
  border: 1px solid #CECECE;
  margin: 0px;
  padding: 0px;
}
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
    $fila=@mysql_fetch_array($res);
    // $sql="SELECT p.*, concat(u.nombre, ' ', u.apellidos) as usu 
    //       FROM pedidos p 
    //       inner join usuario u 
    //       on p.cod_usuario = u.cod_usuario  
    //       WHERE p.cod_pedido ='".$_GET["id"]."'"; 
    // $res=@mysql_query($sql,$link);
    // $row1=@mysql_fetch_array($res); 
    $sql="SELECT c.*,
          concat(u.nombre, ' ', u.apellidos) as usu,
          p. * 
          FROM comprobante c
          inner join pedidos p 
          on c.cod_pedido = p.cod_pedido
          inner join usuario u 
          on p.cod_usuario = u.cod_usuario
          WHERE c.cod_pedido = '".$_GET["id"]."'"; 
    $res=@mysql_query($sql,$link);
    $row1=@mysql_fetch_array($res);
    // cod_comprob nro_tiket fec_emision cod_pedido  tipo  subtotal  igv total estado  usu
    // cod_pedido  cod_usuario fecpedido tipo_pago fec_entrega hora_entrega  nom_entrega direcc_entrega  comprob rs_clie ruc_clie  estado
 ?>

 <table cellpadding="0" cellspacing="0" border="0">
  <thead>
    <tr>
      <th colspan="4">
        <p align="center">
          Mercado Virtual
          <br>
          Chiclayo
          <br>
          Dirección: Km 10 - Carretera Pimentel
          <br>
          RUC: 202020456789
          <br>
          Telf: 306587
          
          <p align="left">Fecha de Expedicion: <?php echo $row1['fec_emision']?>
          </p>

        </p>
        <!-- Lista de Productos en Pedido          -->
      </th>
      <tr alt="left">
        <th colspan="4" alt="left">
          <p align="left">Nº de TICKET: <?php echo $row1['nro_tiket'] ?></p>
        </th>
      </tr>
    </tr>
  </thead>
  <tbody>
    <tr class="gradeX">
      <td width="10%">COD: </td>
      <td width="40%"><?=$row1[3]?></td>
      <td width="10%">Cliente: </td>
      <td width="40%"><?=$row1[9]?></td>
    </tr>
    <tr class="gradeX">
      <td width="10%">Fec. Emision: </td>
      <td width="40%"><?=$row1[2]?></td>
      <td width="10%">Tipo Pago: </td>
      <td width="40%"><?php 
      if ($row1['tipo_pago']=='E') {
        echo 'Efectivo';
      } else {
        echo 'Tarjeta';
      }
       ?></td>
    </tr>
    <tr class="gradeX">
      <td width="10%">Fec. Entrega: </td>
      <td width="40%"><?=$row1['fec_entrega']?></td>
      <td width="10%">Hora Entrega: </td>
      <td width="40%"><?=$row1['hora_entrega']?></td>
    </tr>
    <tr class="gradeX">
      <td width="10%">Destinatario: </td>
      <td width="40%"><?=$row1['nom_entrega']?></td>
      <td width="10%">Dirección: </td>
      <td width="40%"><?=$row1['direcc_entrega']?></td>
    </tr>
    <tr class="gradeX">
      <td width="10%">Comprobante: </td>
      <td width="40%">
      <?php if ($row1['comprob']=='B') {
        echo 'Boleta';
          } elseif ($row1['comprob']=='F') {
            echo 'FACTURA';
          }
       ?>
       </td>
      <td width="10%">Razón Social: </td>
      <td width="40%"><?=$row1['rs_clie']?></td>
    </tr>
    <tr class="gradeX">
      <td width="10%">RUC: </td>
      <td width="40%"><?=$row1['ruc_clie']?></td>
      <td width="10%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td width="40%">&nbsp;</td>
    </tr>

  </tbody>
 </table> 

  <table class="tbl">
      <thead>
        <tr>
          <th colspan="3">&nbsp;
            <!-- Lista de Productos en Pedido COD: <?php //echo $_GET["id"]; ?> -->

          </th>
        </tr>
      </thead>

      <tr>
        <td>

        <table cellpadding="0" cellspacing="0" class="tbl01">
          <colgroup>
            <col class="con0" style="width: 2%" />
            <!-- <col class="con1" style="width: 9%" /> -->
            <col class="con1" style="width: 70%" />
            <col class="con0" style="width: 8%" />
            <col class="con1" style="width: 5%" />
            <col class="con1" style="width: 10%" />
            <!-- <col class="con1" style="width: 10%" /> -->

            <!-- <col class="con1" style="width: 2%" /> -->

          </colgroup>
          <thead>
            <tr>
              <!-- <th class="head1 nosort" align="center"> -->
                <!-- <input type="checkbox" name="allbox" onClick="CA();" title="Seleccionar o anular la selección de todos los registros" /></th> -->
              <th class="head1">COD</th>
              <th class="head1">PRODUCTOS</th>
              <th class="head1">PRECIO</th>
              <th class="head1">CANT.</th>
              <th class="head1">IGV</th>              
              <th class="head1">SUBTOTAL</th>

            </tr>
          </thead>

          <tbody>

          <?php 

              $rs=@mysql_query("set names utf8",$link);
              $fila=@mysql_fetch_array($res);
              // $sql="SELECT dp.cod_producto,
              //              concat('<img src=../productos/',p.imagen,' width=50 height=50>') as Img,
              //              p.descripcion, 
              //              p.precio, 
              //              dp.cantidad, 
              //              dp.subtotal
              //       FROM det_pedidos dp
              //       INNER JOIN producto p ON dp.cod_producto = p.cod_producto
              //       WHERE dp.cod_pedido ='".$_GET["id"]."'";
              $sql="SELECT dp.cod_producto,
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
              // echo mysql_num_rows($res);
              $total = 0;
              while($row1=@mysql_fetch_array($res))
              {$i++;
          ?>  

              <tr class="gradeX">

                <td align="center"><?php echo $row1[0]; ?></td>
                <td align="left"><?php echo $row1[1]; ?></td>
                <td align="right"><?php echo $row1[2]; ?></td>
                <td align="center"><?php echo $row1[3]; ?></td>
                  
                  <?php //echo $row1[6]; 
                    if ($row1[5]==0) {
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

                <td align="right"><?php echo $row1[4]; ?></td>

              </tr>
            <?php  
                $total = $total + $row1[4];
            } ?> 
              <tr>
                <td colspan="4"></td>
                <td align="right"><strong>TOTAL :</strong></td>
                <td align="right"><?=sprintf("%01.2f", $total)?></td>
              </tr>


            <?php 
              $rs=@mysql_query("set names utf8",$link);
              $fila=@mysql_fetch_array($res);
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
                <td colspan="6" align="right">
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
                    <button onclick="javascript:print(document.overviewhead);">
                    <img src="images/print.png"  /></button>
                  </div>
                </td>
              </tr>

            </tbody>
          </table>
        </td>    
      </tr>
    </table>