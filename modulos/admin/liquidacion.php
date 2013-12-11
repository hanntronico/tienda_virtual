<script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.flot.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.slimscroll.js"></script>
<script type="text/javascript" src="js/plugins/charCount.js"></script>
<script type="text/javascript" src="js/plugins/ui.spinner.min.js"></script>
<script type="text/javascript" src="js/plugins/chosen.jquery.min.js"></script>
<script type="text/javascript" src="js/custom/forms.js"></script>
<script type="text/javascript" src="js/custom/tables.js"></script>
<script type="text/javascript" src="js/custom/dashboard.js"></script>

<script type="text/javascript">
  function valida_liquid(frm){
    var total = frmliquid.total.value;  
    if (total=="") { 
      alert("Por Favor, ingrese total.");
      frmliquid.total.focus(); 
      return false;
    }  

    return true;
  }
</script>

<body>

<?php
  include 'funciones.php';
  include("conectar.php");
  $link=Conectarse();
  $pag = "LIQUIDACION DE VENTAS".$_SESSION["s_cod"];

  $pag_org = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
  //verificamos si en la ruta nos han indicado el directorio en el que se encuentra
  if ( strpos($pag_org, '/') !== FALSE )
      //de ser asi, lo eliminamos, y solamente nos quedamos con el nombre y su extension
  $pag_org = array_pop(explode('/', $pag_org));

 
  $pag_sext=preg_replace('/\.php$/', '' ,$pag_org);

  

  if($_GET["sw"]==1){     // NUEVO
    $id=autogenerado("pedidos","cod_pedido",6); 


  }elseif($_GET["sw"]==2){  // EDITAR

    $rs=@mysql_query("set names utf8",$link);
    $fila=@mysql_fetch_array($rs);

    $sql="SELECT *
          FROM liquidaciones
          WHERE cod_comprob =".$_GET["id"]; 
    // echo $sql; exit();
    $res=@mysql_query($sql,$link);
    $rowA=@mysql_fetch_array($res);
    $numfilas = @mysql_num_rows($res);
    
    // echo "  Filas:".$numfilas;

    if ($numfilas==0){
        $rs=@mysql_query("set names utf8",$link);
        $fila=@mysql_fetch_array($res);
        $sql="SELECT * 
              FROM comprobante 
              WHERE cod_comprob=".$_GET["id"]; 
        // echo $sql; 
        $res=@mysql_query($sql,$link);
        $row2=@mysql_fetch_array($res);

        $idcomp=$row2[0];
        $tipo=$row2["tipo"];
        $ticket = $row2["nro_tiket"];
        $sololec="";
        $desact="";
        // $fec_em = date("Y-m-d H:i:s");
      
    }else{

        $idcomp=$rowA[1];
        $ticket=$rowA[2];
        $tipo=$rowA[3];
        $total=$rowA[6];
        $sololec=" readonly";
        $desact=" disabled='disabled'";  

    }

  mysql_free_result($res);

  }else{ //   LISTA
  
  ?>

    <div id="fra_crud">
      <?php if ($_GET["msn"]=='et1') { ?>
            <script type="text/javascript">setTimeout("cerrar()",6000);</script>
            <div class="notibar msgsuccess">
              <a class="close" id="equis"></a>
              <p>El comprobante se emitió con exito!!!</p>;
            </div>
      <?php }  ?>

      <?php if ($_GET["msn"]=='an1') { ?>
            <script type="text/javascript">setTimeout("cerrar()",6000);</script>
            <div class="notibar msgsuccess">
              <a class="close" id="equis"></a>
              <p>El comprobante se anuló con exito!!!</p>;
            </div>
      <?php }  ?>
        
        <div class="contenttitle2">
          <h3><?php echo strtoupper($pag); ?></h3>
        </div><!--contenttitle-->
        <br>

        <?php 

          $rs=@mysql_query("set names utf8",$link);
          $fila=@mysql_fetch_array($rs);
            
          $sql="SELECT c.cod_comprob, 
                       c.nro_tiket, 
                       c.fec_emision, 
                       c.cod_pedido, 
                       c.tipo, 
                       c.total, 
                       c.estado,
                       l.cod_liquid,
                       l.fec_liquid
              FROM comprobante c LEFT JOIN liquidaciones l
              ON c.cod_comprob = l.cod_comprob
              WHERE c.estado>=1";

          $res=@mysql_query($sql,$link);
        ?>

    <form name="frmList" action="grabar.php" method="post"> 
      <input type="hidden" name="pag" value="<?=$pag_sext?>">           
        <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable2">
          <colgroup>
            <col class="con0" style="width: 1%" />
            <col class="con1" style="width: 1%" />
            <col class="con1" style="width: 2%" />
            <col class="con1" style="width: 4%" />
            <col class="con1" style="width: 4%" />
            <col class="con1" style="width: 4%" />
            <col class="con1" style="width: 3%" />
            <!-- <col class="con1" style="width: 2%" /> -->
            <col class="con1" style="width: 3%" />
            <col class="con1" style="width: 5%" />

          </colgroup>
          <thead>
            <tr>
              <th class="head1 nosort">
                <input type="checkbox" name="allbox" onClick="CA();" title="Seleccionar o anular la selección de todos los registros" /></th>
              <th class="head1">COD</th>
              <th class="head1">NRO. TICKET</th>
              <th class="head1" style="text-align: center;">FEC. EMISION</th>
              <th class="head1" style="text-align: center;">FEC. LIQUID</th>
              <th class="head1">TIPO COMP.</th>
              <th class="head1">COD. PEDIDO</th>
              <!-- <th class="head1" style="text-align: center;">RUC</th> -->
              <th class="head1" style="text-align: center;">ESTADO</th>
              <th class="head1 nosort" style="text-align: center;">ACCION</th>
            </tr>
          </thead>

          <tbody>

          <?php while($row1=@mysql_fetch_array($res))
                     {$i++;
            if ($row1['cod_liquid']==NULL) {
              $color_row=" #D7D7D7";
            }elseif ($row1['cod_liquid']==0) {
              // $color_row=" #FFFF91";
              $color_row=" #FFAA82";
            }elseif ($row1['cod_liquid']==1) {
              $color_row=" #A8FFA8";
            }
          ?>  

              <tr class="gradeX" style="background:<?=$color_row?>">
                <td align="center"><span class="center">
                  <input type='checkbox' name='check[]' value="<?=$row1[0]?>" onClick='CCA(this);'>
                </span></td>
                <td align="center"><?php echo $row1[0]; ?></td>
                <td><?php echo $row1[1]; ?></td>
                <td align="center"><?php echo dma_shora($row1[2]); ?></td>
                <td align="center">
                    <?php if ($row1["cod_liquid"]==NULL) {
                        echo "-------";
                    } elseif ($row1["cod_liquid"]==1) {
                        echo dma_shora($row1["fec_liquid"]);
                    }
                  ?>

                </td>
                <td><?php if ($row1[4]=="B") {echo "BOLETA";} else {echo "FACTURA";} 
                //echo $row1[2]; ?></td>
                <td align="left"><?php echo $row1[3]; ?></td>
<!--                 <td class="center">
                  <?php //if ($row1[4]==0) {echo "-----";} else {echo $row1[4];} ?>
                </td> -->
                <td align="center"><?php 
                    //echo $row1[5];
                    if ($row1["cod_liquid"]==NULL) {
                      echo "<span style='color: #757575; font-weight: bolder;'>Sin Comprobante</span>";
                    } elseif ($row1["cod_liquid"]==1) {
                      echo "<span style='color: #008000; font-weight: bolder;'>LIQUIDADO</span>";
                    } elseif ($row1["cod_liquid"]==0) {
                      echo "<span style='color: #FF0000; font-weight: bolder;'>ANULADA</span>";
                    } 
                    ?>
                </td>
                <td class="center" align="center">
                  <a href="#" onclick="G('<?=$pag_org?>?id=<?=$row1[0]?>&sw=2');">
                    <!-- <img src="images/icons/editor.png" alt=""> -->
                    <span style="text-decoration: underline; color: #004080; font-weight: bolder; ">VER</span></a>
                    <!-- &nbsp;&nbsp;&nbsp;&nbsp; -->
<!--                     <a href="#" onclick="form_child('edit_entrega.php?id=<?=$row1[0]?>&sw=2');">
                    <img src="images/icons/editor.png" alt="">
                    <span style="text-decoration: underline; color: #004080; font-weight: bolder; ">CAMBIAR</span></a>  -->
                </td>
              </tr>
          <?php } ?>    
          </tbody>
        </table>
      </form>
            
    </div>


<?php  
    echo "</body>\n";
    echo "</html>";
    exit();
   } 
 ?>

<div id="fra_crud">
  <br>
  <form action="liquidar.php" method="post" enctype="multipart/form-data" name="frmliquid" onSubmit="return valida_liquid(this)">
    <table class="form_crud">
      <thead>
        <tr>
          <th colspan="3">
              COMPROBANTE DE PEDIDO: <?php echo $_GET["id"]; ?>         
          </th>
        </tr>
      </thead>

      <table cellpadding="0" cellspacing="0" border="0" class="stdtable">
        <tbody>
          
          <!-- cod_comprob nro_tiket cod_pedido  tipo  monto igv estado -->

            <tr>
              <td colspan="2"><b>CODIGO:</b>
              
                <b><?=$idcomp?></b> 
                <input type='hidden' name='id' id="id" class='Text' value='<?=$idcomp?>'>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!--                 <b>Fecha de Liquidación: &nbsp;&nbsp;<?=$fec_em?></b>
                <input type='text' name='fec_liq' id="fec_liq" class="smallinput" value='<?=$fec_em?>' style="width:120px;"> -->
              </td>
            </tr>
            <tr>
              <td width="8%"><label>Ticket : </label></td>
              <td>
                <span class="field">
                      <input type="text" name="ticket" id="ticket" value="<?=$ticket?>" class="smallinput" style="width:20%;" readonly>
                    </span>
              </td>
            </tr> 
            <tr>
              <td width="8%"><label>Tipo : </label></td>
              <td>
                <span class="field">
                 <!-- <input type="text" name="tipoc" id="tipoc" value="<?=$tipo?>" class="smallinput" style="width:10%; text-align:center;"> -->

                <select name="tipoc" id="tipoc" class="uniformselect" style='width:350px;' <?=$desact?>>
                  <option value="B" <?php if ($tipo=="B"){echo "selected";} ?>>Boleta</option>
                  <option value="F" <?php if ($tipo=="F"){echo "selected";} ?>>Factura</option>
                </select>

                </span>
              </td>
            </tr> 
            
            <tr>
              <td width="8%"><label>Total : </label></td>
              <td>
                <span class="field">
                  <input type="text" name="total" id="total" class="smallinput" style="width:10%; text-align:right;" value="<?=$total?>" <?=$sololec?>>
                </span>&nbsp;Nuevos soles.
              </td>
            </tr>             
            
            <tr>
              <td colspan="2">

              <p class="stdformbutton">
                <?php 

                      //echo $_GET["id"]; 
                      $cod=$_GET["id"];                     
                      $sql="SELECT cod_liquid 
                            FROM liquidaciones 
                            WHERE cod_comprob ='".$_GET["id"]."'"; 
                      $res=@mysql_query($sql,$link);
                      $row1=@mysql_fetch_array($res);
                      
                      if ($row1[0]==NULL) {
                      ?> 
                        <input name="grabar" type="submit" value="   Liquidar   " class="boton">
                        &nbsp;&nbsp;&nbsp;
                      <?php  }  
                        // elseif ($row1[0]==1) {  ?>     
<!--                         <input type="button" name="anular"  value="   Anular comprobante   " class="stdbtn btn_orange" onclick="anula(<?=$_GET["id"]?>);">
                        &nbsp;&nbsp;&nbsp;
                        <input type="button" name="imprimir" value="  Imprimir  " class="stdbtn btn_orange" onclick="printview('print_comprob.php?id=<?php //echo $cod; ?>'); return false;">
                    &nbsp;&nbsp;&nbsp; -->

                      <?php
                         // } 
                      ?>
                    <input type="button" name="salir" value="  Salir  " class="stdbtn btn_orange" onclick="G('<?=$pag_org?>');">
                    <input type="hidden" value="<?php echo $_GET["id"]; ?>" name="id">
                  </p>
                </td>
              </tr>   
            </tbody>
          </table>

        </td>    
      </tr>
    </table>
  </form>

</div>

</body>
</html>