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
  $pag = "subcategorias";

  $pag_org = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
  //verificamos si en la ruta nos han indicado el directorio en el que se encuentra
  if ( strpos($pag_org, '/') !== FALSE )
      //de ser asi, lo eliminamos, y solamente nos quedamos con el nombre y su extension
  $pag_org = array_pop(explode('/', $pag_org));

 
  $pag_sext=preg_replace('/\.php$/', '' ,$pag_org);

// cod_subcat, subcat, desc_subcat, img_subcat, cod_tipo
  

  if($_GET["sw"]==1){     // NUEVO
    $id=autogenerado("subcategorias","cod_subcat",6); 
    // $ing = 0;
    // $ing2 = 0;

  }elseif($_GET["sw"]==2){  // EDITAR

    $rs=@mysql_query("set names utf8",$link);
    $fila=@mysql_fetch_array($rs);
    $sql="SELECT * FROM subcategorias WHERE cod_subcat='".$_GET["id"]."'";
    $rs=mysql_query($sql,$link);
    $fila =mysql_fetch_object($rs);

// cod_subcat, subcat, desc_subcat, img_subcat, cod_tipo       
    $id  = $fila->cod_subcat;
    $sc = $fila->subcat;
    $des = $fila->desc_subcat;    
    $img = $fila->img_subcat;
    $cat = $fila->cod_tipo;
  
    mysql_free_result($rs);

  }else{ //   LISTA
  
  ?>

    <div id="fra_crud">
      <?php if ($_GET["msn"]=='s1') { ?>
        <script type="text/javascript">setTimeout("cerrar()",6000);</script>
        <div class="notibar msgsuccess">
          <a class="close" id="equis"></a>
          <p>Su registro ha sido grabado con exito!!!</p>;
        </div>
      <?php }  ?> 
        
      <?php if ($_GET["msn"]=='es1') { ?>
        <script type="text/javascript">setTimeout("cerrar()",6000);</script>
        <div class="notibar msgsuccess">
          <a class="close" id="equis"></a>
          <p>Su registro ha sido eliminado con exito!!!</p>;
        </div>
      <?php }  ?>

      <?php if ($_GET["msn"]=='e2') { ?>
        <script type="text/javascript">setTimeout("cerrar()",6000);</script>
        <div class="notibar msgalert">
          <a class="close" id="equis"></a>
          <p>Su registro ya existe, intente otro nombre!!!</p>;
        </div>
      <?php }  ?>

        <div class="contenttitle2">
          <h3><?php echo strtoupper($pag); ?></h3>
        </div><!--contenttitle-->
        <br>
        <div id="botonera">
         <button class="stdbtn btn_orange" onclick="G('<?=$pag_org?>?sw=1');" > 
          &nbsp;&nbsp;&nbsp;Nuevo&nbsp;&nbsp;&nbsp;</button>
          <input type="button" name="Button2" value=" Eliminar " onclick="Subm()" class="stdbtn btn_orange">
          
        </div> <br> 

        <?php 

          $rs=@mysql_query("set names utf8",$link);
          $fila=@mysql_fetch_array($res);
            
// cod_subcat, subcat, desc_subcat, img_subcat, cod_tipo
          
          $sql="select cod_subcat,  
                concat('<img src=../productos/subcategorias/',img_subcat,' width=50 height=50>') as Img,  subcat, desc_subcat, categoria.tipo
                from subcategorias, categoria 
                where subcategorias.cod_tipo = categoria.cod_tipo"; 

          $res=@mysql_query($sql,$link);
        ?>

    <form name="frmList" action="grabar.php" method="post"> 
      <input type="hidden" name="pag" value="<?=$pag_sext?>">           
        <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable2">
          <colgroup>
            <col class="con0" style="width: 1%" />
            <col class="con1" style="width: 3%"/>
            <col class="con0" style="width: 5%" />
            <col class="con0" style="width: 15%" />
            <col class="con1" style="width: 25%" />
            <col class="con1" style="width: 10%" />
            <col class="con1" style="width: 6%" />
            <col class="con1" style="width: 8%" />

          </colgroup>
          <thead>
            <tr>
              <th class="head1 nosort">
                <input type="checkbox" name="allbox" onClick="CA();" title="Seleccionar o anular la selección de todos los registros" /></th>
              <th class="head1">COD</th>
              <th class="head1">Imagen</th>
              <th class="head1">Subcategoría</th>
              <th class="head1">Descripción</th>
              <th class="head1">Categoria</th>
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
          ?>  

              <tr class="gradeX">
                <td align="center"><span class="center">
                  <input type='checkbox' name='check[]' value="<?=$row1[0]?>" onClick='CCA(this);'>
                </span></td>
                <td><?php echo $row1[0]; ?></td>
                <td align="center"><?php echo $row1[1]; ?></td>
                <td><?php echo $row1[2]; ?></td>
                <td class="center"><?php echo $row1[3]; ?></td>
                <td><?php echo $row1[4]; ?></td>
                <td class="center">
                  <a href="#" onclick="G('<?=$pag_org?>?id=<?=$row1[0]?>&sw=2');">
                    <img src="images/icons/editor.png" alt="">&nbsp;Editar</a>  </td>
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

  <form name="frm" class="stdform stdform2" method="post" action="grabar.php" enctype="multipart/form-data" onSubmit="return validaFormSubCateg(this)">
  
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
                <label>Nombre : </label>
                <span class="field">
                  <input type="text" name="nomc" id="nomc" value="<?=$sc?>" size="30" class="smallinput">
                </span>
              </p>
                          
              <p>
                <label>Descripción :</label>
                <span class="field">
                  <input type="text" name="des" id="des" value="<?=$des?>" size="50">
                <!-- <? //llenarcombo('subcategorias','cod_subcat, subcat',' ORDER BY 2', $scat, '','codcat'); ?> -->
                </span>
              </p>

              <p>
                <label>Categoría :</label>
                <span class="field">
                  <!-- cod_tipo  tipo  descripcion imgcat -->
                  <? llenarcombo('categoria','cod_tipo, tipo',' ORDER BY 2', $cat, '','codcat'); ?>
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
                    echo "&nbsp;";
                  }else{
                    echo "<p>
                          <label>Vista Previa :</label>
                          <span class='field'>&nbsp;&nbsp;
                            <img src='../productos/subcategorias/$img' width='50' height='50'>
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