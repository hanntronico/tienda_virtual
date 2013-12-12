<?php session_start(); ?>
<script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>

<script type="text/javascript" src="js/plugins/colorpicker.js"></script>

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
<script type="text/javascript" src="js/plugins/jquery.alerts.js"></script>

<script type="text/javascript" src="js/custom/elements.js"></script>

<script type="text/javascript" src="js/custom/forms.js"></script>
<script type="text/javascript" src="js/custom/tables.js"></script>
<script type="text/javascript" src="js/custom/dashboard.js"></script>



<script type="text/javascript">
  jQuery("form[name='frm_regcompra']" ).submit(function( event ) {
    event.preventDefault();
  });

  jQuery('.notibar .close').click(function(){
    jQuery(this).parent().fadeOut(function(){
      jQuery(this).remove();
    });
  });

  function cerrar() {
    document.getElementById('equis').click();
  }

  jQuery( "#fec_em" ).datepicker();
  jQuery( "#fec_vnc" ).datepicker();

  // jQuery('#listprod').dataTable({
  //   "sPaginationType": "full_numbers",
  //   "aaSortingFixed": [[0,'asc']],
  //   "fnDrawCallback": function(oSettings) {
  //       jQuery('input:checkbox,input:radio').uniform();
  //       // jQuery.uniform.update();
  //       }
  // });

  jQuery('#listprod').dataTable({
    "sPaginationType": "full_numbers"
  });

  function result_bus () {
    var dato = document.frm_regcompra.txtbusqueda.value;
    var content = jQuery("#res_bus");
    content.fadeIn('fast').load("tbl_productos.php?dat="+dato);
  }

  function checkKey (key, id) {

    jQuery("form[name='frm_regcompra']" ).submit(function( event ) {
        event.preventDefault();
    });

    var unicode;
    if (key.charCode)
    {unicode=key.charCode;}
    else
    {unicode=key.keyCode;}
    //alert(unicode); // Para saber que codigo de tecla presiono , descomentar
                
    if (unicode == 13) {
      jQuery("form[name='frm_regcompra']" ).submit(function( event ) {
        event.preventDefault();
      });
      // document.getElementById('bus_prod').click();
      result_bus ();
    };
  }

  function checkKey2 (key, id) {
   
    var unicode;
    if (key.charCode)
    {unicode=key.charCode;}
    else
    {unicode=key.keyCode;}
    //alert(unicode); // Para saber que codigo de tecla presiono , descomentar
                
    if (unicode == 13) {
      jQuery("form[name='frm_regcompra']" ).submit(function( event ) {
        event.preventDefault();
      });

       // result_bus ();
      var elementos = document.getElementsByName(id);
      // alert(id);
      // alert(elementos[0].value.trim());
/********* OK ************/
    var content = jQuery("#dep");
    content.fadeIn('slow').load("ing_precio.php?ord="+id+"&dt="+elementos[0].value.trim());

      var content = jQuery("#list_prod");
      var nid = id.substring(1)
      content.fadeIn('slow').load("agreg_prod.php?id="+nid+"&sw=2");
/********************************/
    };
  }

  function checkKey3 (key, id) {
   
    var unicode;
    if (key.charCode)
    {unicode=key.charCode;}
    else
    {unicode=key.keyCode;}
    //alert(unicode); // Para saber que codigo de tecla presiono , descomentar
                
    if (unicode == 13) {
      jQuery("form[name='frm_regcompra']" ).submit(function( event ) {
        event.preventDefault();
      });

      var elementos = document.getElementsByName(id);
      // alert(id);
      // alert(elementos[0].value);
      var content = jQuery("#dep");
      content.fadeIn('slow').load("ing_cant.php?ord="+id+"&dt="+elementos[0].value.trim());

      var content = jQuery("#list_prod");
      var nid = id.substring(1)
      content.fadeIn('slow').load("agreg_prod.php?id="+nid+"&sw=2");
    };
  }


  function salirp(UR) {
    var content = jQuery("#conte");
    content.fadeIn('slow').load(UR);
  }

  function validar() {

    jQuery("form[name='frm_regcompra']" ).submit(function( event ) {
      event.preventDefault();
    });

    var prov = document.frm_regcompra.codprov.value;    
    // alert(telf);
    if (prov==""){
      alert ("Por favor seleccione proveedor");
      // jAlert('Por favor seleccione proveedor', 'Mensaje del Sistema');
      document.frm_regcompra.codprov.focus();
      return false;        
    } 

    var f_em = document.frm_regcompra.fec_em.value;    
    if (f_em==""){
      alert ("Por favor ingrese fecha de emisión");
      // jAlert('Por favor ingrese fecha de emisión', 'Mensaje del Sistema');
      document.frm_regcompra.fec_em.focus();
      return false;        
    }

    var f_vc = document.frm_regcompra.fec_vnc.value;    
    if (f_vc==""){
      alert ("Por favor ingrese fecha de vencimiento");
      // jAlert('Por favor ingrese fecha de vencimiento', 'Mensaje del Sistema');
      document.frm_regcompra.fec_vnc.focus();
      return false;        
    }

    var nro_co = document.frm_regcompra.nro_comp.value;    
    if (nro_co==""){
      alert ("Por favor ingrese nro de comprobante");
      // jAlert('Por favor ingrese nro de comprobante', 'Mensaje del Sistema');      
      document.frm_regcompra.nro_comp.focus();
      return false;        
    }

    return true;
  }

  function ccc() {

    var prod_agre = document.frm_regcompra.addedp.value;    
    if (prod_agre>0){
      jQuery("form[name='frm_regcompra']").submit(function(event) {
         event.preventDefault();
         jQuery(this).unbind('submit').submit();
      });    
    }else {
      // alert ("Por favor agregue productos");
      jAlert('Por favor agregue productos', 'Mensaje del Sistema');
      return false;   
    }

    // jQuery("form[name='frm_regcompra']").submit(function(event) {
    //    event.preventDefault();
    //    jQuery(this).unbind('submit').submit();
    // }); 
  }

</script>

<body>
<?php
  include ("funciones.php");
  include("conectar.php");
  $link=Conectarse();
  $pag = "REGISTRO DE COMPRAS";

  $pag_org = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
  //verificamos si en la ruta nos han indicado el directorio en el que se encuentra
  if ( strpos($pag_org, '/') !== FALSE )
      //de ser asi, lo eliminamos, y solamente nos quedamos con el nombre y su extension
  $pag_org = array_pop(explode('/', $pag_org));

 
  $pag_sext=preg_replace('/\.php$/', '' ,$pag_org);

  

  if($_GET["sw"]==1){     // NUEVO
    $id=autogenerado("compra","cod_compra",6); 
    unset($_SESSION["ls_prod"]);
    unset($_SESSION["prec_prod"]);

    // $ing = 0;
    // $ing2 = 0;

  }elseif($_GET["sw"]==2){  // EDITAR
  
    $cod=$_GET["id"];

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
    $rwa=@mysql_fetch_array($res);


    // $rwb=@mysql_fetch_array($res1);


    // $numfilas = @mysql_num_rows($res);
    // echo "  Filas:".$numfilas;

    // if ($numfilas==0){
        // $rs=@mysql_query("set names utf8",$link);
        // $fila=@mysql_fetch_array($res);
        // $sql="SELECT * 
        //       FROM pedidos 
        //       WHERE cod_pedido='".$_GET["id"]."'"; 
        // // echo $sql; 
        // $res=@mysql_query($sql,$link);
        // $row2=@mysql_fetch_array($res);

                
        // $sql="SELECT dp.cod_producto,
        //              concat('<img src=../productos/',p.imagen,' width=50 height=50>') as Img,
        //              p.descripcion, 
        //              p.precio, 
        //              dp.cantidad, 
        //              dp.subtotal
        //       FROM det_pedidos dp
        //       INNER JOIN producto p ON dp.cod_producto = p.cod_producto
        //       WHERE dp.cod_pedido ='".$_GET["id"]."'"; 

        // $res=@mysql_query($sql,$link);
        // $total = 0;
        // while($row1=@mysql_fetch_array($res))
        // {$i++;
        //   $total = $total + $row1[5];
        // }

        // $ticket = autogenerado2("comprobante","nro_tiket",10);
        // $id=$row2[0];
 
              
      
    // }else{

    // }
    // echo "hanntronico";
   
   ?>
      <div id="fra_crud2" style="padding:10px;">
        <table class="form_crud">
          <thead>
            <tr>
              <th>DATOS COMPRA COD: <?=$_GET["id"]?></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>

                <table cellpadding="0" cellspacing="0" border="1" class="stdtable">
                  <tbody>
                      <tr>
                        <td width="10%"><b>COD :</b></td>
                        <td width="30%"><?=$rwa[0]?></td>
                        <td width="12%"><b>NRO. COMPROB. :</b></td>
                        <td width="40%"><?=$rwa[5]?></td>
                      </tr>
                      <tr>
                        <td><b>PROVEEDOR :</b></td>
                        <td><?=$rwa[1]?></td>
                        <td><b>RUC :</b></td>
                        <td><?=$rwa[2]?></td>
                      </tr>
                      <tr>
                        <td><b>FEC. EMISION :</b></td>
                        <td><?=dma_shora($rwa[3])?></td>
                        <td><b>FEC. VENC. :</b></td>
                        <td><?=dma_shora($rwa[4])?></td>
                      </tr>
                  </tbody>
                </table>

              </td>
            </tr>
            <tr>
              <td>
                <div id="bt_nav" style="padding:10px;">
                  <input type="button" name="imprimir" value="  Imprimir  " class="stdbtn btn_orange" onclick="printview('print_compra.php?id=<?php echo $cod; ?>'); return false;">
                  &nbsp;&nbsp;&nbsp;
                  <input type="button" name="salir" value="  Salir  " class="stdbtn btn_orange" onclick="salirp('reg_compras.php');">
                </div>
              </td>
            </tr>
            <tr>
              <td>
              <!-- <br> -->
              <table cellpadding="0" cellspacing="0" border="0" class="stdtable">
                  <colgroup>
                    <col class="con1" style="width: 5%"/>
                    <col class="con0" style="width: 60%" />
                    <col class="con1" style="width: 8%" />
                    <col class="con0" style="width: 8%" />
                    <col class="con0" style="width: 8%" />
                    <!-- <col class="con0" style="width: 15%" /> -->
                    <!-- <col class="con1" style="width: 6%" /> -->
                  </colgroup>
                  <thead>
                    <tr>
                      <th class="head1">COD</th>
                      <th class="head1">Descripción</th>
                      <th class="head1">Cantidad</th>
                      <th class="head1">Prec. Unit.</th>
                      <th class="head1">Valor</th>
                      <!-- <th class="head1">Acción</th> -->
                      <!-- <th class="head1">EDITAR</th> -->
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

          </tbody>
        </table>  
      </div>
    </body>
    </html>

  <?php
    exit();
  // mysql_free_result($res);
  }else{ //   LISTA
  
  ?>

    <div id="fra_crud">
      
      <?php if ($_GET["msn"]=='rc1') { ?>
            <script type="text/javascript">setTimeout("cerrar()",6000);</script>
            <div class="notibar msgsuccess">
              <a class="close" id="equis"></a>
              <p>La compra de registró con exito!!!</p>;
            </div>
      <?php }  ?>

      <?php if ($_GET["msn"]=='rce1') { ?>
            <script type="text/javascript">setTimeout("cerrar()",6000);</script>
            <div class="notibar msgerror">
              <a class="close" id="equis"></a>
              <p>Ocurrió un error al grabar!!!</p>;
            </div>
      <?php }  ?>
        
        <div class="contenttitle2">
          <h3><?php echo strtoupper($pag); ?></h3>
        </div><!--contenttitle-->
        <br>

        <?php 

          $rs=@mysql_query("set names utf8",$link);
          $fila=@mysql_fetch_array($res);
            
          // $sql="SELECT pedidos.cod_pedido as 'COD', 
          //              fecpedido as 'FEC_PEDIDO', 
          //              comprob, 
          //              rs_clie, 
          //              ruc_clie, 
          //              comprobante.estado 
          //              FROM pedidos LEFT JOIN comprobante 
          //              ON pedidos.cod_pedido = comprobante.cod_pedido
          //              order by 1 asc";
          //              // WHERE comprobante.estado = 1
          
          // cod_compra, cod_proveedor, fec_emision, fec_venc, cod_usuario, nro_comprobante

          $sql="select c.cod_compra, 
                       pr.razon_social as proveedor,
                       pr.ruc, 
                       c.fec_emision, 
                       c.fec_venc, 
                       u.login,
                       c.nro_comprobante 
                from compra c 
                inner join proveedor pr
                on c.cod_proveedor = pr.cod_proveedor
                inner join usuario u
                on c.cod_usuario=u.cod_usuario;";
          $res=@mysql_query($sql,$link);
        ?>

    <div id="botonera">
         <button class="stdbtn btn_orange" onclick="G('<?=$pag_org?>?sw=1');" > 
          &nbsp;&nbsp;&nbsp;Nuevo&nbsp;&nbsp;&nbsp;</button>
          <!-- <input type="button" name="Button2" value=" Eliminar " onclick="Subm()" class="stdbtn btn_orange"> -->
    </div><br>

    <form name="frmList" action="grabar.php" method="post"> 
      <input type="hidden" name="pag" value="<?=$pag_sext?>">           
        <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable2">
          <colgroup>
            <!-- <col class="con0" style="width: 1%" /> -->
            <col class="con1" style="width: 5%" />
            <col class="con1" style="width: 40%" />
            <col class="con1" style="width: 8%" />
            <col class="con1" style="width: 10%" />
            <col class="con1" style="width: 10%" />

          </colgroup>
          <thead>
            <tr>
<!--              <th class="head1 nosort">
               <input type="checkbox" name="allbox" onClick="CA();" title="Seleccionar o anular la selección de todos los registros" /></th> -->
              <th class="head1">COD</th>
              <th class="head1">PROVEEDOR</th>
              <th class="head1">RUC</th>
              <th class="head1">FEC. EMISION</th>
              <th class="head1">FEC. VENCIM.</th>
              <th class="head1">USUARIO</th>
              <th class="head1">NRO. COMPROB.</th>
              <th class="head1">ACCION</th>
            </tr>
          </thead>

          <tbody>

          <?php while($row1=@mysql_fetch_array($res))
                     {$i++;
        
                    // if ($row1[5]==NULL) {
                    //   $color_row="#D7D7D7";
                    // }elseif ($row1[5]==0) {
                    //   // $color_row=" #FFFF91";
                    //   $color_row=" #FFAA82;";
                    // }elseif ($row1[5]==1) {
                    //   $color_row="#A8FFA8";
                    // }
          ?>  

              <tr class="gradeX" style="background:<?=$color_row?>">
<!--                 <td align="center"><span class="center">
                  <input type='checkbox' name='check[]' value="<?=$row1[0]?>" onClick='CCA(this);'>
                </span></td> -->
                <td align="center"><?php echo $row1[0]; ?></td>
                <td align="left"><?php echo $row1[1]; ?></td>
                <td align="right">
                  <?php //if ($row1[2]=="B") {echo "BOLETA";} else {echo "FACTURA";} 
                echo $row1[2]; ?>
                </td>
                <td align="right"><?php echo $row1[3]; ?></td>
                <td align="right">
                   <?php //if ($row1[4]==0) {echo "-----";} else {echo $row1[4];} 
                   echo $row1[4]; ?></td>
                <td align="right">
                  <?php 
                    echo $row1[5];
                    // if ($row1[5]==NULL) {
                    //   echo "<span style='color: #757575; font-weight: bolder;'>Sin Comprobante</span>";
                    // } elseif ($row1[5]==1) {
                    //   echo "<span style='color: #008000; font-weight: bolder;'>EMITIDA</span>";
                    // } elseif ($row1[5]==0) {
                    //   echo "<span style='color: #FF0000; font-weight: bolder;'>ANULADA</span>";
                    // } 
                  ?>

                </td>
                <td><?php echo $row1[6]; ?></td>
                <td class="center" align="center">
                  <a href="#" onclick="G('<?=$pag_org?>?id=<?=$row1[0]?>&sw=2');">
                  <!-- <a href="#" onclick="javascript:alert('ver');return false;"> -->
                    <!-- <img src="images/icons/editor.png" alt=""> -->
                    <span style="text-decoration: underline; color: #004080; font-weight: bolder; ">Ver</span></a>  
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

  <form action="grab_compra.php" method="post" enctype="multipart/form-data" name="frm_regcompra" onSubmit="return validar(this)">
  <!-- <form action="grab_compra.php" method="post" enctype="multipart/form-data" name="frm_regcompra" onSubmit="return false"> -->
    <table class="form_crud">
      <thead>
        <tr>
          <th colspan="3">
              <!-- COMPROBANTE DE PEDIDO: <?php //echo $_GET["id"]; ?>          -->
          <?php 
              if($_GET["sw"]==1){
                echo "NUEVO REGISTRO";
              }else {
                echo "EDITAR REGISTRO";
              }
           ?>

           <input type="hidden" name="pag" value="<?=$pag_sext?>">
           <input type="hidden" name="sw" value="<?=$_GET["sw"]?>"
          </th>
        </tr>
      </thead>
<!-- // cod_compra, cod_proveedor, fec_emision, fec_venc, cod_usuario, nro_comprobante -->
      <table cellpadding="0" cellspacing="0" border="0" class="stdtable">
        <tbody>
            <tr>
              <td colspan="2"><b>CODIGO:</b>
              
                <b><?=$id?></b> 
                <input type='hidden' name='id' id="id" class='Text' value='<?=$id?>'>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!-- <b>Fecha Emisión: &nbsp;&nbsp;<?=$fec_em?></b> -->
              </td>
            </tr>

            <tr>
              <td width="12%"><label>Proveedor : </label></td>
              <td>
                <span class="field">
                <?=llenarcombo('proveedor','cod_proveedor, concat(ruc, " - " ,razon_social)',' ORDER BY 2', $prov, '','codprov'); ?>
                </span>
              </td>
            </tr> 

            <tr>
              <td colspan="2">
                <label>Fecha emisión : </label>&nbsp;
                <span class="field">
                    <!-- <input type="text" name="tipoc" id="tipoc" value="<?=$tipo?>" 
                    class="smallinput" style="width:10%; text-align:center;" readonly> -->
                    <input type="text" id="fec_em" name="fec_em" class="width100" />
                </span>
                &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                <label>Fecha Vencimiento : </label>&nbsp;
                <span class="field">
                    <!-- <input type="text" name="tipoc" id="tipoc" value="<?=$tipo?>" 
                    class="smallinput" style="width:10%; text-align:center;" readonly> -->
                    <input type="text" id="fec_vnc" name="fec_vnc" class="width100" />
                </span>
                &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                <label>Nro. Comprobante : </label>&nbsp;
                <span class="field">
                <input type="text" name="nro_comp" id="nro_comp" value="" style="width:12%;" onKeyPress="return numeros(event)" maxLength="15">
                <!-- <input type="text" name="nro_comp" id="nro_comp" value="<?=sprintf("%01.2f", $subtot)?>" class="smallinput" style="width:10%; text-align:right;" readonly> -->
                </span> 
                 
                
              </td>

            </tr> 
            <tr>
              <td colspan="2">
                Ingrese producto :
                <form name="frmboton" method="post" onSubmit="return false;">
                  <input type="text" name="txtbusqueda" id="txtbusqueda" style="width:25%" onkeydown="checkKey(event,'txtbusqueda');">
                </form>
                &nbsp;&nbsp;&nbsp;

                <a href="" id="bus_prod" class="btn btn_orange btn_search radius50" onclick="result_bus();return false;"><span>Busca</span></a>
                &nbsp;&nbsp;&nbsp;
                
                <a href="" class="btn btn_orange btn_book radius50" onclick="w_child('prod.php?sw=1');return false;"><span>Nuevo</span></a>
                <br><br>
                <!-- <a href="#" onclick="result_bus();return false;">BUSCA</a><br><br> -->
                <div id="res_bus" style="border: 1px solid #FF8040;">&nbsp;</div>

              </td>
            </tr>
            <tr>
              <td colspan="2">
              <p class="stdformbutton">
                <?php 

                      //echo $_GET["id"]; 
                      // $cod=$_GET["id"];                     
                      // $sql="SELECT estado 
                      //       FROM comprobante 
                      //       WHERE cod_pedido ='".$_GET["id"]."'"; 
                      // $res=@mysql_query($sql,$link);
                      // $row1=@mysql_fetch_array($res);
                      
                      //if ($row1[0]==NULL) {
                      ?> 
                        <!-- <input name="grabar" type="submit" value="   Emitir comprobante   " class="boton"> -->
                        <!-- &nbsp;&nbsp;&nbsp; -->
                      <?php  //}  
//                        elseif ($row1[0]==1) {
                      ?>     
                        
<!--                         <input type="button" name="anular"  value="   Anular comprobante   " class="stdbtn btn_orange" onclick="anula(<?=$_GET["id"]?>);">
                        &nbsp;&nbsp;&nbsp; -->
                        <!-- <input type="button" name="imprimir" value="  Imprimir  " class="stdbtn btn_orange" onclick="printview('print_comprob.php?id=<?php echo $cod; ?>'); return false;"> -->
                    <!-- &nbsp;&nbsp;&nbsp; -->

                      <?php
                         // } 
                      ?>
                    <input type="submit" name="grabar"  value="   Grabar   " class="boton">
                    
                    <!-- <input type="button" name="salir" value="  Salir  " class="stdbtn btn_orange" onclick="G('<?=$pag_org?>');"> -->
                    
                    <input type="button" name="salir" value="  Salir  " class="stdbtn btn_orange" onclick="salirp('reg_compras.php');">

                    <div id="dep" style="visibility: hidden;">&nbsp;</div>
                    <!-- <div id="dep"></div> -->
                    <input type="hidden" value="<?php echo $_GET["id"]; ?>" name="id">
                  </p>
                </td>
              </tr> 

              <tr>
                <td colspan="2">
                  <div id="list_prod"></div>
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