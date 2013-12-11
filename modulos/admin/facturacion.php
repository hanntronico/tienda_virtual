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
  jQuery('.notibar .close').click(function(){
    jQuery(this).parent().fadeOut(function(){
      jQuery(this).remove();
    });
  });

  function cerrar() {
    document.getElementById('equis').click();
  }
  
</script>

<?php include 'funciones.php'; ?>



<body>

<?php
  include("conectar.php");
  $link=Conectarse();
  $pag = "ENTREGA - EMISION DE COMPROBANTE";

  $pag_org = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
  //verificamos si en la ruta nos han indicado el directorio en el que se encuentra
  if ( strpos($pag_org, '/') !== FALSE )
      //de ser asi, lo eliminamos, y solamente nos quedamos con el nombre y su extension
  $pag_org = array_pop(explode('/', $pag_org));

 
  $pag_sext=preg_replace('/\.php$/', '' ,$pag_org);

  

  if($_GET["sw"]==1){     // NUEVO
    $id=autogenerado("pedidos","cod_pedido",6); 
    // $ing = 0;
    // $ing2 = 0;

  }elseif($_GET["sw"]==2){  // EDITAR

    // $rs=@mysql_query("set names utf8",$link);
    // $fila=@mysql_fetch_array($res);

    // $sql="SELECT *
    //       FROM pedidos
    //       WHERE cod_pedido ='".$_GET["id"]."'"; 
   
    // $res=@mysql_query($sql,$link);
    // $fila =mysql_fetch_object($res);

    // cod_pedido, cod_usuario, fecpedido, tipo_pago, fec_entrega, hora_entrega, nom_entrega, direcc_entrega, comprob, rs_clie, ruc_clie, estado

    // $id = $fila->cod_pedido;
    // $codus = $fila->cod_usuario;    
    // $fecped = $fila->fecpedido;
    // $tip = $fila->tipo_pago;

    // $img = $fila->imagen;
    // $sto = $fila->stock;
    // $marc = $fila->cod_marca;
    // $prom = $fila->prom;

    // echo $_GET["id"];

    $rs=@mysql_query("set names utf8",$link);
    $fila=@mysql_fetch_array($res);

    $sql="SELECT *
          FROM comprobante
          WHERE cod_pedido ='".$_GET["id"]."'"; 
    // echo $sql       
   
    $res=@mysql_query($sql,$link);
    $rowA=@mysql_fetch_array($res);
    $numfilas = @mysql_num_rows($res);
    // echo "  Filas:".$numfilas;

    if ($numfilas==0){
        $rs=@mysql_query("set names utf8",$link);
        $fila=@mysql_fetch_array($res);
        $sql="SELECT * 
              FROM pedidos 
              WHERE cod_pedido='".$_GET["id"]."'"; 
        // echo $sql; 
        $res=@mysql_query($sql,$link);
        $row2=@mysql_fetch_array($res);

                
        $sql="SELECT dp.cod_producto,
                     concat('<img src=../productos/',p.imagen,' width=50 height=50>') as Img,
                     p.descripcion, 
                     dp.precio, 
                     dp.cantidad, 
                     dp.subtotal
              FROM det_pedidos dp
              INNER JOIN producto p ON dp.cod_producto = p.cod_producto
              WHERE dp.cod_pedido ='".$_GET["id"]."'"; 

        $res=@mysql_query($sql,$link);
        $total = 0;
        while($row1=@mysql_fetch_array($res))
        {$i++;
          $total = $total + $row1[5];
        }

        $ticket = autogenerado3("comprobante","nro_tiket",10);
        $id=$row2[0];

        if ($row2[8]==F) {
          $tipo = 'FACTURA';
        } elseif ($row2[8]==B) {
          $tipo = 'BOLETA';
        } 


        if ($row2[8]==F) {
          $subtot = ($total/1.18);
        }elseif ($row2[8]==B) {
          $subtot = $total;
        }  
        
        if ($row2[8]==F) {
          $igv = ($subtot*0.18);
        }elseif ($row2[8]==B) {
          $igv = 0;
        }          
      
    }else{
      // echo json_encode($rowA[2]);
      // cod_comprob nro_tiket fec_pedido cod_pedido  tipo  subtotal  igv total estado
      $ticket=$rowA[1];
      $fec_em=$rowA[2];
      $id=$rowA[3];
      // $tipo=$rowA[3];
      if ($rowA[4]==F) {
          $tipo = 'FACTURA';
      } elseif ($rowA[4]==B) {
          $tipo = 'BOLETA';
      }
      $subtot=$rowA[5];
      $igv=$rowA[6];
      $total=$rowA[7];
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
            
          // $sql="SELECT pedidos.cod_pedido as 'COD', 
          //              fecpedido as 'FEC_PEDIDO', 
          //              comprob, 
          //              rs_clie, 
          //              ruc_clie, 
          //              comprobante.estado 
          //              FROM pedidos LEFT JOIN comprobante 
          //              ON pedidos.cod_pedido = comprobante.cod_pedido
          //              order by 1 asc";

          // $sql="SELECT pedidos.cod_pedido as 'COD', 
          //              fecpedido as 'FEC_PEDIDO', 
          //              comprob, 
          //              rs_clie, 
          //              ruc_clie, 
          //              comprobante.estado,
          //              cod_usuario 
          //              FROM pedidos LEFT JOIN comprobante 
          //              ON pedidos.cod_pedido = comprobante.cod_pedido
          //              INNER JOIN usuario
          //              ON pedidos.cod_usuario = usuario.cod_usuario 
          //              WHERE pedidos.estado > 2
          //              order by 6, 1 asc";

          $sql="SELECT pedidos.cod_pedido as 'COD', 
                       fecpedido as 'FEC_PEDIDO', 
                       comprob, 
                       rs_clie, 
                       ruc_clie, 
                       comprobante.estado,
                       concat(u.nombre, ' ', u.apellidos) as Usuario 
                FROM pedidos LEFT JOIN comprobante 
                ON pedidos.cod_pedido = comprobante.cod_pedido
                INNER JOIN usuario u
                ON pedidos.cod_usuario = u.cod_usuario 
                WHERE pedidos.estado > 2
                ORDER BY 6, 1 ASC";

// WHERE comprobante.estado = 1
          $res=@mysql_query($sql,$link);
        ?>

    <form name="frmList" action="grabar.php" method="post"> 
      <input type="hidden" name="pag" value="<?=$pag_sext?>">           
        <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable2">
          <colgroup>
            <col class="con0" style="width: 1%" />
            <col class="con1" style="width: 1%" />
            <col class="con1" style="width: 2%" />
            <col class="con1" style="width: 8%" />
            <col class="con1" style="width: 2%" />
            <col class="con1" style="width: 12%" />
            <col class="con1" style="width: 2%" />
            <col class="con1" style="width: 3%" />
            <col class="con1" style="width: 5%" />

          </colgroup>
          <thead>
            <tr>
              <th class="head1 nosort">
                <input type="checkbox" name="allbox" onClick="CA();" title="Seleccionar o anular la selección de todos los registros" /></th>
              <th class="head1">COD</th>
              <th class="head1">FEC. PEDIDO</th>
              <th class="head1">CLIENTE</th>
              <th class="head1">COMPROB.</th>
              <th class="head1">RAZON SOCIAL</th>
              <th class="head1" style="text-align: center;">RUC</th>
              <th class="head1">ESTADO</th>
              <th class="head1 nosort" style="text-align: center;">ACCION</th>
            </tr>
          </thead>

          <tbody>

          <?php while($row1=@mysql_fetch_array($res))
                     {$i++;
            if ($row1[5]==NULL) {
              $color_row=" #D7D7D7";
            }elseif ($row1[5]==0) {
              // $color_row=" #FFFF91";
              $color_row=" #FFAA82";
            }elseif ($row1[5]==1) {
              $color_row=" #A8FFA8";
            }
          ?>  

              <tr class="gradeX" style="background:<?=$color_row?>">
                <td align="center"><span class="center">
                  <input type='checkbox' name='check[]' value="<?=$row1[0]?>" onClick='CCA(this);'>
                </span></td>
                <td align="center"><?php echo $row1[0]; ?></td>
                <td><?php echo dma_shora($row1[1]); ?></td>
                <td><?php echo $row1[6]; ?></td>
                <td><?php if ($row1[2]=="B") {echo "BOLETA";} else {echo "FACTURA";} 
                //echo $row1[2]; ?></td>
                <td align="left"><?php echo $row1[3]; ?></td>
                <td class="center"><?php if ($row1[4]==0) {echo "-----";} else {echo $row1[4];} //echo $row1[4]; ?></td>
                <td align="center"><?php 
                    //echo $row1[5];
                    if ($row1[5]==NULL) {
                      echo "<span style='color: #757575; font-weight: bolder;'>Sin Comprobante</span>";
                    } elseif ($row1[5]==1) {
                      echo "<span style='color: #008000; font-weight: bolder;'>EMITIDA</span>";
                    } elseif ($row1[5]==0) {
                      echo "<span style='color: #FF0000; font-weight: bolder;'>ANULADA</span>";
                    } 
                    ?>

                </td>
                <td class="center" align="center">
                  <a href="#" onclick="G('<?=$pag_org?>?id=<?=$row1[0]?>&sw=2');">
                    <!-- <img src="images/icons/editor.png" alt=""> -->
                    <span style="text-decoration: underline; color: #004080; font-weight: bolder; ">VER</span></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="#" onclick="form_child('edit_entrega.php?id=<?=$row1[0]?>&sw=2');">
                    <!-- <img src="images/icons/editor.png" alt=""> -->
                    <span style="text-decoration: underline; color: #004080; font-weight: bolder; ">CAMBIAR</span></a> 
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
  <form action="emitir.php" method="post" enctype="multipart/form-data" name="form1" onSubmit="return validar(this)">
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
              
                <b><?=$id?></b> 
                <input type='hidden' name='id' id="id" class='Text' value='<?=$id?>'>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <b>Fecha Emisión: &nbsp;&nbsp;<?=$fec_em?></b>
              </td>
            </tr>
            <tr>
              <td width="8%"><label>Ticket : </label></td>
              <td>
                <span class="field">
                      <input type="text" name="ticket" id="ticket" value="<?=$ticket?>" class="smallinput" readonly>
                    </span>
              </td>
            </tr> 
            <tr>
              <td width="8%"><label>Tipo : </label></td>
              <td>
                <span class="field">
                    <input type="text" name="tipoc" id="tipoc" value="<?=$tipo?>" class="smallinput" style="width:10%; text-align:center;" readonly>
                    </span>
              </td>
            </tr> 
            
            <?php 

            ?>

            <tr>
              <td width="8%"><label>Subtotal : </label></td>
              <td><span class="field">
                <input type="text" name="subtotal" id="subtotal" value="<?=sprintf("%01.2f", $subtot)?>" class="smallinput" style="width:10%; text-align:right;" readonly>
                    </span>&nbsp;Nuevos soles.
              </td>
            </tr> 

            <?php 

            ?>      
            <tr>
              <td width="8%"><label>IGV : </label></td>
              <td>
                <span class="field">
                <input type="text" name="igv" id="igv" value="<?=sprintf("%01.2f", $igv)?>" class="smallinput" style="width:10%; text-align:right;" readonly>
                </span>&nbsp;Nuevos soles.
              </td>
            </tr>
             

            <tr>
              <td width="8%"><label>Total : </label></td>
              <td>
                <span class="field">
                <input type="text" name="total" id="total" value="<?=sprintf("%01.2f", $total)?>" class="smallinput" style="width:10%; text-align:right;" readonly>
                    </span>&nbsp;Nuevos soles.
              </td>
            </tr>             
            
            <tr>
              <td colspan="2">

              <p class="stdformbutton">
                <?php 

                      //echo $_GET["id"]; 
                      $cod=$_GET["id"];                     
                      $sql="SELECT estado 
                            FROM comprobante 
                            WHERE cod_pedido ='".$_GET["id"]."'"; 
                      $res=@mysql_query($sql,$link);
                      $row1=@mysql_fetch_array($res);
                      
                      if ($row1[0]==NULL) {
                      ?> 
                        <input name="grabar" type="submit" value="   Emitir comprobante   " class="boton">
                        &nbsp;&nbsp;&nbsp;
                      <?php  }  
                        elseif ($row1[0]==1) {
                      ?>     
                        
                        <input type="button" name="anular"  value="   Anular comprobante   " class="stdbtn btn_orange" onclick="anula(<?=$_GET["id"]?>);">
                        &nbsp;&nbsp;&nbsp;
                        <input type="button" name="imprimir" value="  Imprimir  " class="stdbtn btn_orange" onclick="printview('print_comprob.php?id=<?php echo $cod; ?>'); return false;">
                    &nbsp;&nbsp;&nbsp;

                      <?php
                         } 
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