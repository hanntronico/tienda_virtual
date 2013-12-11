<?php 
    include("funciones.php");
    include("conectar.php");
    $link=Conectarse();
    // echo $_GET["id"];

    list($dia,$mes,$anio)=explode("/",$_GET["fci"]); 
    $fec_ini = $anio."-".$mes."-".$dia;

    list($dia,$mes,$anio)=explode("/",$_GET["fcf"]); 
    $fec_fin = $anio."-".$mes."-".$dia;

    if ($_GET["band"]==1) {
      $sql="SELECT p.cod_producto, 
                   concat('<img src=../productos/',p.imagen,' width=50 height=50>') as Img,
                   p.descripcion,
                   p.precio,
                   p.stock, 
                   count(dp.cod_producto) as Total
            FROM pedidos pe LEFT JOIN det_pedidos dP
            ON pe.cod_pedido = dp.cod_pedido
            INNER JOIN producto p 
            ON dp.cod_producto = p.cod_producto
            WHERE pe.estado=4
            GROUP BY 1
            ORDER BY Total DESC";
       $titulo="MÁS VENDIDOS";
    
    }elseif ($_GET["band"]==2) {
      $sql="SELECT p.cod_producto, 
                   concat('<img src=../productos/',p.imagen,' width=50 height=50>') as img,
                   p.descripcion,
                   p.precio,
                   p.stock,
                   m.desc_marca
            FROM producto p INNER JOIN marca m
            ON p.cod_marca = m.cod_marca
            WHERE stock = 0";
      $titulo="SIN VALIDAR";
    
    }elseif ($_GET["band"]==3) {
      $sql="SELECT p.cod_producto, 
                   concat('<img src=../productos/',p.imagen,' width=50 height=50>') as img,
                   p.descripcion,
                   p.precio,
                   p.stock,
                   m.desc_marca
            FROM producto p INNER JOIN marca m
            ON p.cod_marca = m.cod_marca
            WHERE stock <= 35
            ORDER BY stock";
      $titulo="CON stock mínimo";
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
        <p align="center">REPORTE DE PRODUCTOS <?php echo $titulo; ?></p>
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
          <th colspan="3">&nbsp;</th>
        </tr>
      </thead>

      <tr>
        <td>

        <table cellpadding="0" cellspacing="0" class="tbl01">
          <colgroup>
<!-- cod_producto, imagen, descripcion, precio, stock, Total -->
            <col class="con1" style="width: 2%"/>
            <!-- <col class="con1" style="width: 4%"/> -->
            <col class="con0" style="width: 60%" />
            <col class="con1" style="width: 8%" />
            <col class="con1" style="width: 8%" />
            <col class="con0" style="width: 8%" />
            <!-- <col class="con0" style="width: 8%" /> -->

            <?php //if ($_GET["band"]==3) { ?> <!-- <col class='con0' style='width: 8%' /> --> 
            <?php // } ?>
          
          </colgroup>
          <thead>
            <tr>
              <th class="head1">COD</th>
              <!-- <th class="head1">IMAGEN</th> -->
              <th class="head1">DESCRIPCION</th>
              <th class="head1">PRECIO</th>
              <th class="head1">STOCK</th>
              <th class="head1">
                <?php 
                  if ($_GET["band"]==1) {echo "TOTAL";}
                  elseif ($_GET["band"]>=2) {echo "MARCA";}
                 ?>
              </th>
              <!-- <th class="head1">Correo</th> -->
            <?php //if ($_GET["band"]==3) { ?> <!-- <th class="head1">Nro de Compras</th> --> 
            <?php //} ?>  
            </tr>
          </thead>

          <tbody>

          <?php 

              $rs=@mysql_query("set names utf8",$link);
              $fila=@mysql_fetch_array($rs);

              $res=@mysql_query($sql,$link);
              $numfilas=@mysql_num_rows($res);
              // echo $sql;exit();

              while($row1=@mysql_fetch_array($res))
              {$i++;
          ?>  

            <tr class="gradeX">
                <td align="center"><?php echo $row1[0]; ?></td>
                <!-- <td><?php echo $row1[1]; ?></td> -->
                <td><?php echo $row1[2]; ?></td>
                <td align="center"><?php echo $row1[3]; ?></td>
                <td align="center"><?php echo $row1[4]; ?></td>
                <td align="center"><?php echo $row1[5];?></td>
                <!-- <td><?php //echo $row1[8]; ?></td> -->
                <?php 
                // if ($_GET["band"]==3) { 
                //   echo "<td align='center'>".$row1[11]."</td>";
                //   } 
                ?>  
              </tr>
          <?php } ?>    

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