<script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>

<script type="text/javascript" src="js/plugins/colorpicker.js"></script>
<script type="text/javascript" src="js/plugins/jquery.alerts.js"></script>
<!-- <script type="text/javascript" src="js/custom/general.js"></script>
<script type="text/javascript" src="js/custom/elements.js"></script> -->

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



  
    // jQuery(".cantidad2").click(function(){
    //     var txt=jQuery(this).attr("rel");
    //     var p1=txt.split("&")[0].split("=")[1];
    //     var p2=txt.split("&")[1].split("=")[1];
        
    //     alert( p1 +" --- "+ p2 );
        
    //     return false;
    // });    


  jQuery('.cantidad2').click
  (function(){
    var txt=jQuery(this).attr("rel");
    var p1=txt.split("&")[0].split("=")[1];
    var p2=txt.split("&")[1].split("=")[1];

    <?php  
      // include("conectar.php");
      // $link=Conectarse();

      // $rs=@mysql_query("set names utf8",$link);
      // $fila=@mysql_fetch_array($res);
      // $sql="SELECT descripcion
      //       FROM producto
      //       WHERE cod_producto ='".$_GET["id"]."'"; 
      // $res=@mysql_query($sql,$link);
      // $fila =mysql_fetch_object($res);
    ?>

    jPrompt('Ingrese cantidad para producto '+p2+':', '', 'Modificar cantidad', function(r) {
      if( r ) {
        jConfirm('Esta seguro que quiere cambiar la CANTIDAD del producto '+p2+'?', 'Confirmar operación', function(re) {
          // jAlert('Confirmed: ' + r, 'Confirmation Results');
          if( re ) {
            var content = jQuery("#contenito");
            content.fadeIn('slow').load("edit_cant.php?cpe="+p1+"&cpd="+p2+"&cnt="+r);
          }
          // var content = jQuery("#conte");
          // content.fadeIn('slow').load("pedidos.php?id="+p1+"&sw=2");
        });
      }
    });
    
    return false;
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
  $pag = "pedidos";

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

    $rs=@mysql_query("set names utf8",$link);
    $fila=@mysql_fetch_array($res);
    $sql="SELECT dp.cod_producto, p.descripcion, p.precio, dp.cantidad, dp.subtotal
          FROM det_pedidos dp
          INNER JOIN producto p ON dp.cod_producto = p.cod_producto
          WHERE dp.cod_pedido ='".$_GET["id"]."'"; 
    $res=@mysql_query($sql,$link);
    $fila =mysql_fetch_object($res);

    $codped = $fila->COD;
    $codus = $fila->cod_usuario;    
    $fecped = $fila->fecpedido;
    $tip = $fila->tipo_pago;

    // $img = $fila->imagen;
    // $sto = $fila->stock;
    // $marc = $fila->cod_marca;
    // $prom = $fila->prom;
   
    mysql_free_result($res);

  }else{ //   LISTA
  
  ?>

    <div id="fra_crud">
      <?php if ($_GET["msn"]=='at1') { ?>
            <script type="text/javascript">setTimeout("cerrar()",6000);</script>
            <div class="notibar msgsuccess">
              <a class="close" id="equis"></a>
              <p>El pedido fue atendido con exito!!!</p>;
            </div>
      <?php }  ?>
        
        <div class="contenttitle2">
          <h3><?php echo strtoupper($pag); ?></h3>
        </div><!--contenttitle-->
        <br>
        <!-- <div id="botonera"> -->
<!--          <button class="stdbtn btn_orange" onclick="G('<?=$pag_org?>?sw=1');" > 
          &nbsp;&nbsp;&nbsp;Nuevo&nbsp;&nbsp;&nbsp;</button> -->
          <!-- <input type="button" name="Button2" value=" Eliminar " onclick="Subm()" class="stdbtn btn_orange"> -->
          
        <!-- </div> <br>  -->

        <?php 

          $rs=@mysql_query("set names utf8",$link);
          $fila=@mysql_fetch_array($res);
            

          $sql="SELECT cod_pedido as 'COD', 
                       concat(usuario.nombre, ' ', usuario.apellidos) as 'USUARIO', 
                       fecpedido as 'FEC_PEDIDO', 
                       tipo_pago, 
                       fec_entrega, 
                       hora_entrega, 
                       nom_entrega, 
                       direcc_entrega as 'DIRECCION', 
                       comprob, 
                       rs_clie, 
                       ruc_clie, 
                       estado 
                       FROM pedidos INNER JOIN usuario 
                       ON pedidos.cod_usuario = usuario.cod_usuario
                       order by 1 Desc"; 

          $res=@mysql_query($sql,$link);
        ?>

    <form name="frmList" action="grabar.php" method="post"> 
      <input type="hidden" name="pag" value="<?=$pag_sext?>">           
        <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable2">
          <colgroup>
            <col class="con0" style="width: 1%" />
            <col class="con1" style="width: 4%" />
            <col class="con0" style="width: 14%" />
            <col class="con1" style="width: 8%" />
            <col class="con0" style="width: 6%" />
            <col class="con1" style="width: 8%" />
            <col class="con1" style="width: 6%" />
            <col class="con1" style="width: 14%" />
            <col class="con1" style="width: 4%" />
            <col class="con1" style="width: 4%" />
          </colgroup>
          <thead>
            <tr>
              <th class="head1 nosort">
                <input type="checkbox" name="allbox" onClick="CA();" title="Seleccionar o anular la selección de todos los registros" /></th>
              <th class="head1">COD</th>
              <th class="head1">USUARIO</th>
              <th class="head1">FECHA PEDIDO</th>
              <th class="head1">PAGO</th>
              <th class="head1">FEC. ENTREGA</th>
              <th class="head1">HORA ENT.</th>
              <th class="head1">DESTINATARIO</th>
              <th class="head1">ESTADO</th>
              <th class="head1">EDITAR</th>
            </tr>
          </thead>
    <!--       <tfoot>
            <tr>
              <th class="head0"><span class="center">
                <input type="checkbox" />
              </span></th>
              <th class="head0">COD</th>
              <th class="head1">Browser</th>
              <th class="head0">Platform(s)</th>
              <th class="head1">Engine version</th>
              <th class="head0">CSS grade</th>
            </tr>
          </tfoot> -->
          <tbody>

          <?php while($row1=@mysql_fetch_array($res))
                     {$i++;
            if ($row1[11]==1) {
              $color_row="#FFFF91";
            }elseif ($row1[11]==2) {
              $color_row="#A8FFA8";
            }
          ?>  

              <tr class="gradeX" style="background:<?=$color_row?>">
                <td align="center"><span class="center">
                  <input type='checkbox' name='check[]' value="<?=$row1[0]?>" onClick='CCA(this);'>
                </span></td>
                <td align="center"><?php echo $row1[0]; ?></td>
                <td><?php echo $row1[1]; ?></td>
                <td><?php echo $row1[2]; ?></td>
                <td class="center">
                  <?php 
                    if ($row1[3]=='E') {
                        echo "Efectivo";
                      } else {
                        echo "Tarjeta";
                      }
                        
                    //echo $row1[3]; 
                  ?>
                </td>
                <td align="right"><?php echo $row1[4]; ?></td>
                <td class="center"><?php echo $row1[5]; ?></td>
                <td class="center"><?php echo $row1[6]; ?></td>
                <td class="center"><?php 
                    if ($row1[11]==1) {
                      echo "<span style='color: #CF940A; font-weight: bolder;'>Pendiente</span>";
                    } elseif ($row1[11]==2) {
                      echo "<span style='color: #008000; font-weight: bolder;'>Atendido</span>";
                    } 
                    

                     

                    ?>

                </td>
                <td class="center" align="center">
                  <a href="#" onclick="G('<?=$pag_org?>?id=<?=$row1[0]?>&sw=2'); return false;">
                    <!-- <img src="images/icons/editor.png" alt=""> -->
                    <span style="text-decoration: underline; color: #004080; font-weight: bolder; ">Verificar</span></a>  
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

<div id="fra_crud2">
  <div id="contenito"></div>
  <br>
  <form action="atender.php" method="post" enctype="multipart/form-data" name="form1" onSubmit="return validar(this)">
    <table class="form_crud">
      <thead>
        <tr>
          <th colspan="3">
              Lista de Productos en Pedido COD: <?php echo $_GET["id"]; ?>         
          </th>
        </tr>
      </thead>

      <tr>
        <td>

        <table cellpadding="0" cellspacing="0" border="0" class="stdtable">
          <colgroup>
            <col class="con0" style="width: 2%" />
            <col class="con1" style="width: 6%" />
            <col class="con1" style="width: 70%" />
            <col class="con0" style="width: 8%" />
            <col class="con1" style="width: 5%" />
            <col class="con1" style="width: 6%" />
            <col class="con1" style="width: 10%" />
            <col class="con1" style="width: 20%" />
<!--             <col class="con1" style="width: 15%" />
            <col class="con1" style="width: 8%" /> -->
            <!-- <col class="con1" style="width: 2%" /> -->

          </colgroup>
          <thead>
            <tr>
              <!-- <th class="head1 nosort" align="center"> -->
                <!-- <input type="checkbox" name="allbox" onClick="CA();" title="Seleccionar o anular la selección de todos los registros" /></th> -->
              <th class="head1">COD</th>
              <th class="head1" align="center">IMAGEN</th>
              <th class="head1">PRODUCTOS</th>
              <th class="head1">PRECIO</th>
              <th class="head1">CANT.</th>
              <th class="head1">IGV</th>
              <th class="head1">SUBTOTAL</th>

              <?php 
                $sql="SELECT estado FROM pedidos WHERE cod_pedido ='".$_GET["id"]."'"; 
                $qry1=@mysql_query($sql,$link);
                $tup1=@mysql_fetch_array($qry1);
              
                if ($tup1[0]==1) {
              ?>
                  <th class="head1">ACCION</th>
              <?php } ?> 
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
                    WHERE dp.cod_pedido ='".$_GET["id"]."'"; 
              $res=@mysql_query($sql,$link);
              $total = 0;
              while($row1=@mysql_fetch_array($res))
              {$i++;

              if ($row1[4]==0) {
                $color_row=" #DADADA";
              } else{
                $color_row=" #FFF";
              }

              if ($row1[6]==0) {
                $estrella=" url('images/icons/star.png') no-repeat 98% 50%";
                // $color_row=" #FFCE9D";
               } else{
                $estrella=" none";
              }

              ?>  
<!-- style="border-bottom: 5px solid #FF8000;" -->
              <tr class="gradeX" style="background:<?=$color_row?>;">
<!--                 <td align="center"><span class="center">
                  <input type='checkbox' name='check[]' value="<?=$row1[0]?>" onClick='CCA(this);'>
                </span></td> -->
                <td align="center">
                  <?php echo $row1[0]; ?>
                </td>
                <td align="center"><?php echo $row1[1]; ?></td>
                <td style="background:<?=$estrella?>;"><?php echo $row1[2]; ?></td>
                <td align="right"><?php echo $row1[3]; ?></td>
                <td align="center"><?php echo $row1[4]; ?></td>
                  <?php //echo $row1[6]; 
                    if ($row1[6]==0) {
                      $txtigv = "0";
                      $bor="color: #FF8000; font-size:12px; font-weight:bolder;";
                    }else{
                      $txtigv = "18%";
                      $bor="color: #008040; font-size:12px; font-weight:bolder;";
                    }
                  ?>

                <td align="center" style="<?=$bor?>">
                  <?php echo $txtigv; ?>

                </td>
                <td align="right"><?php echo $row1[5]; ?></td>
                <?php 
                  if ($tup1[0]==1) {
                ?>
                  <td align="center">
                    <a href="#" id="getItem_1" class="cantidad2" rel="p1=<?=$_GET['id']?>&p2=<?=$row1[0]?>"> 
                      <img src="images\icons\application_edit.png" width="18" height="18" alt="">
                      <span style="font-size:10px;">EDITAR</span>
                    </a> 
                  </td>
                <?php } ?>  

                <!-- <td>hann</td> -->
<!--                 <td><?php //echo $row1[2]; ?></td>
                <td class="center"><?php //echo $row1[3]; ?></td>
                <td align="right"><?php //echo $row1[4]; ?></td>
                <td class="center"><?php //echo $row1[5]; ?></td>
                <td class="center"><?php //echo $row1[6]; ?></td> -->
                <!-- <td class="center"> -->
                  <!-- <a href="#" onclick="G('<?=$pag_org?>?id=<?=$row1[0]?>&sw=2');"> -->
                    <!-- <img src="images/icons/editor.png" alt="">&nbsp;Editar</a>  </td> -->
              </tr>
          <?php  
                $total = $total + $row1[5];
            } ?> 
              <tr>
                <td colspan="5"></td>
                <td align="right"><strong>TOTAL :</strong></td>
                <td align="right"><?=sprintf("%01.2f", $total)?></td>
                <!-- <td align="right">&nbsp;</td> -->

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
                <td colspan="7">
                  <table cellspacing="0" cellpadding="0" width="50%">
                      <thead style="background: #C0C0C0;">
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
                <td colspan="7">
                  <p class="stdformbutton">
                    
                    <?php 
                      if ($tup1[0]==1) {
                    ?> 
                        <input name="grabar" type="submit" value="   Atender pedido   " class="boton">
                        &nbsp;&nbsp;&nbsp;
                      <?php  }  ?>

                    <?php $cod=$_GET["id"] ?>      

                    <input type="button" name="imprimir" value="  Imprimir  " class="stdbtn btn_orange" onclick="printview('print_pedido.php?id=<?php echo $cod; ?>'); return false;">
                    &nbsp;&nbsp;&nbsp;
                    <input type="button" name="salir" value="  Salir  " class="stdbtn btn_orange" onclick="G('<?=$pag_org?>');">

<!--                     <a href="" class="anchorbutton cantidad2" id="a1">
                      Dialog with HTML support</a> -->

<!--                     <a id="getItem_1" class="anchorbutton cantidad2" href="#" rel="p1=v1&p2=v2">Llamada</a>  -->
                    

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