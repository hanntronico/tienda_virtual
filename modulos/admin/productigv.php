<?php session_start(); ?>
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
  $pag = "gestion de IGV para Productos ";

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
    $sql="SELECT * FROM producto WHERE cod_producto='".$_GET["id"]."'"; 
    $res=@mysql_query($sql,$link);
    $fila =mysql_fetch_object($res);

// cod_producto, descripcion, cod_subcat, precio, imagen, stock, cod_marca, estado       
    $id  = $fila->cod_producto;
    $des = $fila->descripcion;    
    $scat = $fila->cod_subcat;
    $pre = $fila->precio;
    $img = $fila->imagen;
    $sto = $fila->stock;
    $marc = $fila->cod_marca;
    $est = $fila->estado;
   
    mysql_free_result($res);

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

      <?php if ($_GET["msn"]=='igv1') { ?>
        <script type="text/javascript">setTimeout("cerrar()",6000);</script>
        <div class="notibar msgsuccess">
          <a class="close" id="equis"></a>
          <p>El IGV ha sido Habilitado con exito!!!</p>;
        </div>
      <?php }  ?>

      <?php if ($_GET["msn"]=='igv2') { ?>
        <script type="text/javascript">setTimeout("cerrar()",6000);</script>
        <div class="notibar msgsuccess">
          <a class="close" id="equis"></a>
          <p>El IGV ha sido Deshabilitado con exito!!!</p>;
        </div>
      <?php }  ?>

    <div class="contenttitle2">
      <h3><?php echo strtoupper($pag); ?></h3>
    </div><!--contenttitle-->
    
    <br>
    
    <div id="botonera">
<!--          <button class="stdbtn btn_orange" onclick="G('<?=$pag_org?>?sw=1');" > 
          &nbsp;&nbsp;&nbsp;Nuevo&nbsp;&nbsp;&nbsp;</button> -->
          
          <!-- <input type="button" name="Button3" value=" Deshabilitar " onclick="Disable()" class="stdbtn btn_orange"> -->

          <?php //echo $_SESSION["s_cod"]; 
            $sql="SELECT cod_nivel FROM usuario WHERE cod_usuario='".$_SESSION["s_cod"]."'"; 
            $res=@mysql_query($sql,$link);
            $urg=@mysql_fetch_array($res);
           
            if ($urg[0]==1) {
          ?>
           <input type="button" name="Button2" value=" Eliminar " onclick="Subm()" class="stdbtn btn_orange">
          <?php } ?>
    </div> 

    <br> 

        <?php 

          $rs=@mysql_query("set names utf8",$link);
          $fila=@mysql_fetch_array($res);
            

          $sql="select cod_producto as COD, 
                concat('<img src=../productos/',imagen,' width=50 height=50>') as Img, 
                descripcion as Descripcion, 
                subcategorias.subcat as Subcat, 
                precio, 
                stock, 
                marca.desc_marca as Marca, 
                estado,
                igv
                from producto, subcategorias, marca
                where producto.cod_subcat = subcategorias.cod_subcat
                and producto.cod_marca = marca.cod_marca
                order by 9,1 asc"; 

          $res=@mysql_query($sql,$link);
        ?>

    <form name="frmList" action="grabar.php" method="post"> 
      <input type="hidden" name="pag" value="<?=$pag_sext?>">           
        <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable2">
          <colgroup>
            <col class="con0" style="width: 1%" />
             <col class="con1" style="width: 5%"/>
            <col class="con0" style="width: 5%" />
            <col class="con1" style="width: 38%" />
            <col class="con0" style="width: 15%" />
            <col class="con1" style="width: 8%" />
            <col class="con1" style="width: 6%" />
            <col class="con1" style="width: 10%" />
<!--             <col class="con1" style="width: 8%" /> -->
            <col class="con1" style="width: 5%" />
          </colgroup>
          <thead>
            <tr>
              <th class="head1 nosort">
                <input type="checkbox" name="allbox" onClick="CA();" title="Seleccionar o anular la selección de todos los registros" /></th>
              <th class="head1">COD</th>
              <th class="head1">Imagen</th>
              <th class="head1">Descripción</th>
              <th class="head1">Subcategoría</th>
              <th class="head1">Precio</th>
              <th class="head1">Stock</th>
              <th class="head1">Marca</th>
              <!-- <th class="head1">EDITAR</th> -->
              <th class="head1">IGV</th>
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

                      if ($row1['igv']==0) {
                        $colorfil = "style='background: #E2C6FF;'";
                      }else {
                        $colorfil = "";
                      }
          ?>  

              <tr class="gradeX" <?=$colorfil?> >
                <td align="center"><span class="center">
                  <input type='checkbox' name='check[]' value="<?=$row1[0]?>" onClick='CCA(this);'>
                </span></td>
                <td align="center"><?php echo $row1[0]; ?></td>
                <td align="center"><?php echo $row1[1]; ?></td>
                <td><?php echo $row1[2]; ?></td>
                <td class="center"><?php echo $row1[3]; ?></td>
                <td align="right"><?php echo $row1[4]; ?></td>
                <td align="center"><?php echo $row1[5]; ?></td>
                <td class="center"><?php echo $row1[6]; ?></td>
<!--                 <td class="center">
                  <a href="#" onclick="G('<?=$pag_org?>?id=<?=$row1[0]?>&sw=2');">
                    <img src="images/icons/editor.png" alt="">&nbsp;Editar</a>  </td> -->
                <?php 
                    if ($row1['igv']==1) {
                      $fun_str="Disable(); return false;";
                      $act_str="<img src='images/sw_on.png'>";
                    }elseif ($row1['igv']==0) {
                      $fun_str="Enable(); return false;";
                      $act_str="<img src='images/sw_off.png'>";
                    }
                ?>
                <td><a href="#" onclick="<?=$fun_str?>"><?=$act_str?></a></td>      

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


              <p style="padding-left:20px;">
                <b>CODIGO:</b>
                <b><?=$id?></b> <input type='hidden' name='id' class='Text' value='<?=$id?>'>
              </p> 

              <p>
                <label>Descripción : </label>
                <span class="field">
                  <input type="text" name="des" id="des" value="<?=$des?>" size="50">
                </span>
              </p>
                          
              <p>
                <label>Subcategoria :</label>
                <span class="field">
                <? llenarcombo('subcategorias','cod_subcat, subcat',' ORDER BY 2', $scat, '','codcat'); ?>
                </span>
              </p>

              <p>
                <label>Precio :</label>
                <span class="field">
                  <input type="text" name="pre" id="pre" value="<?=$pre?>" onKeyPress="return numeros(event)" maxLength="10" class="smallinput"> Nuevos Soles (S/.)
                </span>
              </p>

              <p>
                <label>Stock :</label>
                <span class="field">
                  <input type="text" name="stock" id="stock" value="<?=$sto?>" onKeyPress="return numeros(event)" maxlength="5" class="smallinput">
                </span>
              </p>

              <p>
                <label>Marca:</label>
                <span class="field">
                  <? llenarcombo('marca','cod_marca, desc_marca',' ORDER BY 2', $marc, '','codmarca'); ?>
                </span>
              </p>

              <p>
                <label>Imagen:</label>
                <span class="field">
                    <input type="file" name="imag" id="imag" class="smallinput" size="40">
                </span>
              </p>

                <?php 
                  if($_GET["sw"]==1){ 
                    // echo "<p>
                    //       <label>&nbsp;</label>
                    //       <span class='field'>&nbsp;
                    //       </span>
                    //       </p>";
                    echo "&nbsp;";
                  }else{
                    // echo "<tr>
                    //       <td align='left'>Vista Previa :</td>
                    //         <td align='left'>"."&nbsp;&nbsp; 
                    //           <img src='../productos/$img' width='50' height='50'></td>
                    //                   <input type='hidden' name='imgDef' value='".$img."'>
                    //     </tr>";

                    echo "<p>
                          <label>Vista Previa :</label>
                          <span class='field'>&nbsp;&nbsp;
                            <img src='../productos/$img' width='50' height='50'>
                            <input type='hidden' name='imgDef' value='".$img."'>
                          </span>
                          </p>";
                  }
                ?>            


              <p class="stdformbutton">
                <input name="grabar" type="submit" value="   GRABAR   " class="boton">
                  &nbsp;&nbsp;
                <input type="reset" class="reset radius2" value="CANCELAR" />
                &nbsp;&nbsp;&nbsp;
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