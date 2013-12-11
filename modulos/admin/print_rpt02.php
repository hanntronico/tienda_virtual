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
       $sql="SELECT * FROM usuario WHERE cod_nivel=3";
       $titulo="VALIDADOS";
    }elseif ($_GET["band"]==2) {
       $sql="SELECT * FROM usuario_temporal WHERE cod_nivel=3 AND estado =1";
       $titulo="SIN VALIDAR";
    }elseif ($_GET["band"]==3) {
      $sql="SELECT u.*, count(*) as 'Nro de Compras' 
            FROM pedidos pe
            INNER JOIN usuario u
            ON pe.cod_usuario = u.cod_usuario
            WHERE pe.estado=4 GROUP BY 2 ORDER BY 7 DESC";
      $titulo="CON MÁS COMPRAS";
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
        <p align="center">REPORTE DE CLIENTES <?php echo $titulo; ?></p>
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
            <col class="con1" style="width: 5%"/>
            <col class="con1" style="width: 12%"/>
            <col class="con0" style="width: 12%" />
            <col class="con1" style="width: 8%" />
            <col class="con1" style="width: 30%" />
            <col class="con0" style="width: 8%" />
            <col class="con0" style="width: 8%" />
            <?php if ($_GET["band"]==3) { ?> <col class='con0' style='width: 8%' /> <?php } ?>
          </colgroup>
          <thead>
            <tr>
              <th class="head1">COD</th>
              <th class="head1">Nombres</th>
              <th class="head1">Apellidos</th>
              <th class="head1">DNI</th>
              <th class="head1">Dirección</th>
              <th class="head1">Teléfono</th>
              <th class="head1">Correo</th>
            <?php if ($_GET["band"]==3) { ?> <th class="head1">Nro de Compras</th> <?php } ?>  
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
                <td><?php echo $row1[3]; ?></td>
                <td><?php echo $row1[4]; ?></td>
                <td><?php echo $row1[5]; ?></td>
                <td><?php echo $row1[6]; ?></td>
                <td><?php echo $row1[7];?></td>
                <td><?php echo $row1[8]; ?></td>
                <?php if ($_GET["band"]==3) { 
                  echo "<td align='center'>".$row1[11]."</td>";
                  } 
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