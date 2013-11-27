<?php 
    include("funciones.php");
    include("conectar.php");
    $link=Conectarse();
    // echo $_GET["id"];

    list($dia,$mes,$anio)=explode("/",$_GET["fci"]); 
    $fec_ini = $anio."-".$mes."-".$dia;

    list($dia,$mes,$anio)=explode("/",$_GET["fcf"]); 
    $fec_fin = $anio."-".$mes."-".$dia;

    if ($_GET["pr1"]!="") {
      $sql="select pe.cod_pedido, 
              u.cod_usuario,
              concat(u.nombre, ' ', u.apellidos) as usuario,
              pe.fecpedido, 
              pe.tipo_pago, 
              pe.fec_entrega, 
              pe.hora_entrega, 
              pe.comprob, 
              pe.rs_clie, 
              pe.ruc_clie 
              from pedidos pe inner join usuario u on pe.cod_usuario = u.cod_usuario 
              where pe.estado = 2 
              and (concat(u.nombre, ' ', u.apellidos) like '".$_GET["pr1"]."%'
              or u.cod_usuario like '".$_GET["pr1"]."%')";
              // echo $sql; exit();
        $titulo = "Cliente : ".$_GET["pr1"];
    }

    if ($_GET["fci"]!="" && $_GET["fcf"]!="") {
      $sql="select pe.cod_pedido, 
              u.cod_usuario,
              concat(u.nombre, ' ', u.apellidos) as usuario, 
              pe.fecpedido, 
              pe.tipo_pago, 
              pe.fec_entrega, 
              pe.hora_entrega, 
              pe.comprob, 
              pe.rs_clie, 
              pe.ruc_clie 
              from pedidos pe inner join usuario u on pe.cod_usuario = u.cod_usuario 
              where pe.estado = 2 
              and pe.fecpedido between '".$fec_ini."' AND '".$fec_fin."'";
      $titulo = "Fechas : ".$fec_ini." al ".$fec_fin;        
    }

 // echo $sql; exit();




 ?>
<!-- <link rel="stylesheet" href="css/style.default.css" type="text/css" /> -->
<!-- <link rel="stylesheet" href="../../css/estilos_admin.css" type="text/css" /> -->
<style type="text/css" media="screen">
@media screen {
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
    padding: 4px;
  }
  #impresora { 
    border: 1px solid #CECECE;
    width: 100%
  }
}
</style>

<style type="text/css" media="print">
@media print {

* {
    color: #000000;
    font-family: Arial;
    font-size: 10px;
}

body {
  text-align: center;
  margin: 0px auto;
  padding-top: 20px;
  padding-left: 30px;
}

.tbl {
  border: none;
  padding: 0;
  margin: 0;
  width: 90%
}

.tbl01 {
  width: 100%;
}

.tbl01 thead th{
  background: #C0C0C0;
  border: 1px solid #CECECE;
}

.tbl01 tr td {
  border: 1px solid #CECECE;
  margin: 0px;
  padding: 4px;
}

#impresora {display:none;}
}
</style>

<?php 

    $rs=@mysql_query("set names utf8",$link);
    // $fila=@mysql_fetch_array($res);

    // $sql="SELECT c.*,
    //       concat(u.nombre, ' ', u.apellidos) as usu,
    //       p. * 
    //       FROM comprobante c
    //       inner join pedidos p 
    //       on c.cod_pedido = p.cod_pedido
    //       inner join usuario u 
    //       on p.cod_usuario = u.cod_usuario
    //       WHERE c.cod_pedido = '".$_GET["id"]."'"; 
    // $res=@mysql_query($sql,$link);
    // $row1=@mysql_fetch_array($res);

 ?>

 <table cellpadding="0" cellspacing="0" border="0" width="100%">
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
        </p>
      </th>
    </tr>
    <tr align="center">
      <th colspan="4" align="center" >
        <br>
        <p align="center">REPORTE DE VENTAS <?php echo $titulo; ?></p>
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>&nbsp;</td>
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
            <col class="con1" style="width: 5%"/>
            <col class="con1" style="width: 6%"/>
            <col class="con0" style="width: 30%" />
            <col class="con1" style="width: 10%" />
            <col class="con1" style="width: 8%" />
            <col class="con0" style="width: 8%" />
            <col class="con0" style="width: 8%" />
            <col class="con0" style="width: 8%" />
          </colgroup>
          <thead>
            <tr>
              <th class="head1">COD</th>
              <th class="head1">Cod. Us.</th>
              <th class="head1">Usuario</th>
              <th class="head1">Fecha Pedido</th>
              <th class="head1">Hora Pedido</th>
              <th class="head1">T. Pago</th>
              <th class="head1">Fec. Entrega</th>
              <th class="head1">Hora Entrega</th>
            </tr>
          </thead>

          <tbody>

          <?php 

              $rs=@mysql_query("set names utf8",$link);
              $fila=@mysql_fetch_array($res);

              $res=@mysql_query($sql,$link);
              // echo $sql;exit();

              while($row1=@mysql_fetch_array($res))
              {$i++;
          ?>  

              <tr class="gradeX">
                <td align="center"><?php echo $row1[0]; ?></td>
                <td align="center"><?php echo $row1[1]; ?></td>
                <td><?php echo $row1[2]; ?></td>
                <td><?php echo dma_shora($row1[3]); ?></td>
                <td><?php echo substr($row1[3], 11, 8); ?></td>
                <td><?php if ($row1[4]=="E") {
                  echo "Efectivo";
                }else {echo "Tarjeta";} ?></td>
                <td><?php echo dma_shora($row1[5]); ?></td>
                <td><?php echo $row1[6]; ?></td>
              </tr>
          <?php } ?>    
<!--               <tr>
                <td colspan="8">
                  
                </td>
              </tr> -->

            </tbody>
          </table>
        </td>    
      </tr>
    </table>
    <p align="left">Reporte del <?php echo date("Y-m-d H:i:s"); ?></p>
    <div id="impresora">
      <button onclick="javascript:print(document.overviewhead);">
      <img src="images/print.png"  /></button>
    </div>