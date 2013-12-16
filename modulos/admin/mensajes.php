<script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>

<script type="text/javascript" src="js/plugins/colorpicker.js"></script>
<script type="text/javascript" src="js/plugins/jquery.alerts.js"></script>

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

  // jQuery('.mens').click
  //  (function(){
  //   var txt=jQuery(this).attr("rel");
  //   var p1=txt.split("&")[0].split("=")[1];
  //   var p2=txt.split("&")[1].split("=")[1];

  //   var script='<p><?php echo "hann";?></p> <textarea name="mensaje" cols=80 rows=10>'+p1+'</textarea>';

  //   jAlert(script, 'Confirmation Results');
    
  //   // alert(p1);
  //   // jPrompt('Ingrese cantidad para producto '+p2+':', '', 'Modificar cantidad', function(r) {
  //   //   if( r ) {
  //   //     jConfirm('Esta seguro que quiere cambiar la CANTIDAD del producto '+p2+'?', 'Confirmar operación', function(re) {
  //   //       // jAlert('Confirmed: ' + r, 'Confirmation Results');
  //   //       if( re ) {
  //   //         var content = jQuery("#contenito");
  //   //         content.fadeIn('slow').load("edit_cant.php?cpe="+p1+"&cpd="+p2+"&cnt="+r);
  //   //       }
  //   //       // var content = jQuery("#conte");
  //   //       // content.fadeIn('slow').load("pedidos.php?id="+p1+"&sw=2");
  //   //     });
  //   //   }
  //   // });
    
  //   return false;
  // });
  
</script>



<body>

<?php
  include ("funciones.php");
  include("conectar.php");
  $link=Conectarse();
  $pag = "MENSAJES";

  $pag_org = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
  //verificamos si en la ruta nos han indicado el directorio en el que se encuentra
  if ( strpos($pag_org, '/') !== FALSE )
      //de ser asi, lo eliminamos, y solamente nos quedamos con el nombre y su extension
  $pag_org = array_pop(explode('/', $pag_org));

 
  $pag_sext=preg_replace('/\.php$/', '' ,$pag_org);

  

  if($_GET["sw"]==1){     // NUEVO
    $id=autogenerado("producto","cod_producto",6); 
    // $ing = 0;
    // $ing2 = 0;

  }elseif($_GET["sw"]==2){  // EDITAR

    $rs=@mysql_query("set names utf8",$link);
    $fila=@mysql_fetch_array($res);
    $sql="SELECT * FROM mensajes WHERE idmens='".$_GET["id"]."'"; 
    $res=@mysql_query($sql,$link);
    $fila =mysql_fetch_object($res);

 // idmens  nom_ape email fec_mens  mensaje estado

    $id  = $fila->idmens;
    $nom = $fila->nom_ape;    
    $email = $fila->email;
    $fecm = $fila->fec_mens;
    $msn = $fila->mensaje;
    $est = $fila->estado;

    $sql="UPDATE mensajes SET estado=1 WHERE idmens='".$_GET["id"]."'"; 
    $res=@mysql_query($sql,$link);
   
    @mysql_free_result($res);

  }else{ //   LISTA
  
  ?>

    <div id="fra_crud">
      <?php if ($_GET["msn"]=='p1') { ?>
        <script type="text/javascript">setTimeout("cerrar()",6000);</script>
        <div class="notibar msgsuccess">
          <a class="close" id="equis"></a>
          <p>Su registro ha sido grabado con exito!!!</p>;
        </div>
      <?php }  ?> 
        
      <?php if ($_GET["msn"]=='e1') { ?>
        <script type="text/javascript">setTimeout("cerrar()",6000);</script>
        <div class="notibar msgsuccess">
          <a class="close" id="equis"></a>
          <p>Su registro ha sido eliminado con exito!!!</p>;
        </div>
      <?php }  ?>

      <?php if ($_GET["msn"]=='d1') { ?>
        <script type="text/javascript">setTimeout("cerrar()",6000);</script>
        <div class="notibar msgsuccess">
          <a class="close" id="equis"></a>
          <p>Su registro ha sido deshabilitado con exito!!!</p>;
        </div>
      <?php }  ?>

    <div class="contenttitle2">
      <h3><?php echo strtoupper($pag); ?></h3>
    </div><!--contenttitle-->
    
    <!-- <br> -->
    
    <!-- <div id="botonera"> -->
         <!-- <button class="stdbtn btn_orange" onclick="G('<?=$pag_org?>?sw=1');" > 
          &nbsp;&nbsp;&nbsp;Nuevo&nbsp;&nbsp;&nbsp;</button>
          
          <input type="button" name="Button3" value=" Deshabilitar " onclick="Disable()" class="stdbtn btn_orange"> -->

          <?php //echo $_SESSION["s_cod"]; 
            $sql="SELECT cod_nivel FROM usuario WHERE cod_usuario='".$_SESSION["s_cod"]."'"; 
            $res=@mysql_query($sql,$link);
            $urg=@mysql_fetch_array($res);
           
            if ($urg[0]==1) {
          ?>
          <!--  <input type="button" name="Button2" value=" Eliminar " onclick="Subm()" class="stdbtn btn_orange"> -->
          <?php } ?>
    <!-- </div>  -->

    <!-- <br>  -->

        <?php 

          $rs=@mysql_query("set names utf8",$link);
          $fila=@mysql_fetch_array($res);
            // idmens  nom_ape email fec_mens  mensaje estado

          $sql="SELECT * FROM mensajes ORDER BY 1 DESC"; 

          $res=@mysql_query($sql,$link);
        ?>

    <form name="frmList" action="grabar.php" method="post"> 
      <input type="hidden" name="pag" value="<?=$pag_sext?>">           
        <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable2">
          <colgroup>
            <col class="con0" style="width: 1%" />
            <col class="con1" style="width: 4%"/>
            <col class="con1" style="width: 30%" />
            <col class="con0" style="width: 20%" />
            <col class="con0" style="width: 15%" />
<!--             <col class="con1" style="width: 8%" />
            <col class="con1" style="width: 6%" />
            <col class="con1" style="width: 10%" /> -->
            <col class="con1" style="width: 8%" />
          </colgroup>
          <thead>
            <tr>
              <th class="head1 nosort">
                <input type="checkbox" name="allbox" onClick="CA();" title="Seleccionar o anular la selección de todos los registros" /></th>
              <th class="head1">COD</th>
              <th class="head1">Nombre</th>
              <th class="head1">Email</th>
              <th class="head1">Fecha</th>
              <th class="head1" style="text-align:center;">VER</th>
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

                      if ($row1['estado']==0) {
                        $colorfil = "style='background: #FDDC8E;'";
                      }else {
                        $colorfil = "";
                      }
          ?>  

              <tr class="gradeX" <?=$colorfil?> >
                <td align="center"><span class="center">
                  <input type='checkbox' name='check[]' value="<?=$row1[0]?>" onClick='CCA(this);'>
                </span></td>
                <td align="center"><?php echo $row1[0]; ?></td>
                <td align="left"><?php echo $row1[1]; ?></td>
                <td><?php echo $row1[2]; ?></td>
                <td class="center"><?php echo dma_chora($row1[3]); ?></td>
                <td class="center">
                  <a href="#" onclick="G('<?=$pag_org?>?id=<?=$row1[0]?>&sw=2');">
                    <div style="background: url('images/icons/sprites.png') -90px -268px no-repeat; width:20px; display:inline-block;">&nbsp;
                    </div>
                    <span style="text-decoration: underline; color: #6B6B6B; font-family:tahoma; font-weight: bold; ">Ver</span></a>  

<!--                   <a href="#" id="getItem_1" class="mens" rel="p1=<?=$row1[0]?>&p2=<?=$row1[0]?>">
                    <div style="background: url('images/icons/sprites.png') -90px -268px no-repeat; width:20px; display:inline-block;">&nbsp;
                    </div>
                      <span style="text-decoration: underline; color: #6B6B6B; font-family:tahoma; font-weight: bold; ">Ver</span>
                  </a> -->

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

  <form name="frm_producto" class="stdform stdform2" method="post" action="grabar.php" enctype="multipart/form-data" onSubmit="return validaFormProducto(this)">
  
  <table class="form_crud">
    <thead>
      <tr>
        <th colspan="3">
          <?php 
              if($_GET["sw"]==1){
                echo "NUEVO REGISTRO";
              }else {
                echo "EDITAR REGISTRO";
              }
           ?>

           <input type="hidden" name="pag" value="<?=$pag_sext?>">
           <input type="hidden" name="sw" value="<?=$_GET["sw"]?>">
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
    <!-- $id  = $fila->idmens;
    $nom = $fila->nom_ape;    
    $email = $fila->email;
    $fecm = $fila->fec_mens;
    $msn = $fila->mensaje;
    $est = $fila->estado; -->


<!--               <p style="padding-left:20px;">
                <b>CODIGO:</b>
                <b><?=$id?></b> <input type='hidden' name='id' class='Text' value='<?=$id?>'>
              </p>  -->

              <p>
                <label>Nombre : </label>
                <span class="field">
                  <input type="text" name="nom" id="nom" value="<?=$nom?>" size="50" readonly>
                </span>
              </p>
                  
              <p>
                <label>Email : </label>
                <span class="field">
                  <input type="text" name="email" id="email" value="<?=$email?>" size="50" readonly>
                </span>
              </p>

              <p>
                <label>Fecha del Mensaje : </label>
                <span class="field">
                  <input type="text" name="fecm" id="fecm" value="<?=dma_chora($fecm)?>" size="50" readonly>
                </span>
              </p>

              <p> 
                <label>Mensaje : </label>
                <span class="field">
                  <textarea name="mensaje" cols="80" rows="15" readonly><?=$msn?></textarea>
                </span>
              </p>


              <p class="stdformbutton">
<!--                 <input name="grabar" type="submit" value="   GRABAR   " class="boton">
                  &nbsp;&nbsp;
                <input type="reset" class="reset radius2" value="CANCELAR" />
                &nbsp;&nbsp;&nbsp; -->
                <input type="button" value="  SALIR  " class="stdbtn btn_orange" onclick="G('<?=$pag_org?>');">
              </p>
   
          </form>  


        </td>
      </tr>
    </tbody>
  </table>

</div>

</body>
</html>