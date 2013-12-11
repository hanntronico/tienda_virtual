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
  $pag = "GESTION DE USUARIOS DEL SISTEMA";

  $pag_org = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
  //verificamos si en la ruta nos han indicado el directorio en el que se encuentra
  if ( strpos($pag_org, '/') !== FALSE )
      //de ser asi, lo eliminamos, y solamente nos quedamos con el nombre y su extension
  $pag_org = array_pop(explode('/', $pag_org));

 
  $pag_sext=preg_replace('/\.php$/', '' ,$pag_org);

  

  if($_GET["sw"]==1){     // NUEVO
    $id=autogenerado("usuario","cod_usuario",6); 
    // $ing = 0;
    // $ing2 = 0;

  }elseif($_GET["sw"]==2){  // EDITAR

    $rs=@mysql_query("set names utf8",$link);
    $fila=@mysql_fetch_array($res);
    $sql="SELECT * FROM usuario WHERE cod_usuario='".$_GET["id"]."'"; 
    $res=@mysql_query($sql,$link);
    $fila =mysql_fetch_object($res);

// cod_usuario login clave nombre  apellidos dni direccion telefono  correo  cod_nivel
    
    $id  = $fila->cod_usuario;
    $log = $fila->login;    
    $clave = $fila->clave;
    $nom = $fila->nombre;
    $ape = $fila->apellidos;
    $dni = $fila->dni;
    $dir = $fila->direccion;
    $tel = $fila->telefono;
    $correo = $fila->correo;
    $nivel = $fila->cod_nivel;
   
    mysql_free_result($res);

  }else{ //   LISTA
  
  ?>

    <div id="fra_crud">
      <?php if ($_GET["msn"]=='u1') { ?>
        <script type="text/javascript">setTimeout("cerrar()",6000);</script>
        <div class="notibar msgsuccess">
          <a class="close" id="equis"></a>
          <p>Su registro ha sido grabado con exito!!!</p>;
        </div>
      <?php }  ?> 
        
      <?php if ($_GET["msn"]=='ue1') { ?>
        <script type="text/javascript">setTimeout("cerrar()",6000);</script>
        <div class="notibar msgsuccess">
          <a class="close" id="equis"></a>
          <p>Su registro ha sido eliminado con exito!!!</p>;
        </div>
      <?php }  ?>

      <?php if ($_GET["msn"]=='ud1') { ?>
        <script type="text/javascript">setTimeout("cerrar()",6000);</script>
        <div class="notibar msgsuccess">
          <a class="close" id="equis"></a>
          <p>Su registro ha sido deshabilitado con exito!!!</p>;
        </div>
      <?php }  ?>

    <div class="contenttitle2">
      <h3><?php echo strtoupper($pag); ?></h3>
    </div><!--contenttitle-->
    
    <br>
    
    <div id="botonera">
         <button class="stdbtn btn_orange" onclick="G('<?=$pag_org?>?sw=1');" > 
          &nbsp;&nbsp;&nbsp;Nuevo&nbsp;&nbsp;&nbsp;</button>
          
<!--           <input type="button" name="Button3" value=" Deshabilitar " onclick="Disable()" class="stdbtn btn_orange"> -->

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
            
// cod_usuario login clave nombre  apellidos dni direccion telefono  correo  cod_nivel
          $sql="select cod_usuario, 
                       login, 
                       clave, 
                       nombre, 
                       apellidos, 
                       dni, 
                       direccion, 
                       telefono, 
                       correo, 
                       nivel.nivel_descrip,
                       estado
                from usuario inner join nivel 
                on usuario.cod_nivel = nivel.cod_nivel 
                where nivel.cod_nivel>1 and nivel.cod_nivel<3";

          $res=@mysql_query($sql,$link);
        ?>

    <form name="frmList" action="grabar.php" method="post"> 
      <input type="hidden" name="pag" value="<?=$pag_sext?>">           
        <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable2">
          <colgroup>
            <col class="con0" style="width: 1%" />
            <col class="con1" style="width: 5%"/>
            <col class="con0" style="width: 8%" />
            <!-- <col class="con1" style="width: 15%" /> -->
            <col class="con0" style="width: 15%" />
            <col class="con1" style="width: 8%" />
            <!-- <col class="con1" style="width: 6%" /> -->
            <!-- <col class="con1" style="width: 10%" /> -->
            <col class="con1" style="width: 8%" />
            <col class="con1" style="width: 8%" />
            <col class="con1" style="width: 8%" />
            <col class="con1" style="width: 8%" />
            <?php if ($urg[0]==1) {  ?>            
                <col class="con1" style="width: 5%" />
            <?php }  ?>
          
          </colgroup>
          <thead>
            <tr>
              <th class="head1 nosort">
                <input type="checkbox" name="allbox" onClick="CA();" title="Seleccionar o anular la selección de todos los registros" /></th>
              <th class="head1">COD</th>
              <th class="head1">Login</th>
<!--               <th class="head1">Clave</th> -->
              <th class="head1">Nombre</th>
              <th class="head1">Apellidos</th>
              <!-- <th class="head1">DNI</th> -->
              <!-- <th class="head1">Dirección</th> -->
              <th class="head1">Teléfono</th>
              <th class="head1">Correo</th>
              <th class="head1">Nivel</th>
              <th class="head1">EDITAR</th>
              <?php if ($urg[0]==1) {  ?>            
                  <th class="head1">Activación</th>
              <?php }  ?>
              
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
                <td align="left"><?php echo $row1[1]; ?></td>
                <!-- <td><?php //echo $row1[2]; ?></td> -->
                <td align="left"><?php echo $row1[3]; ?></td>
                <td align="left"><?php echo $row1[4]; ?></td>
                <!-- <td align="center"><?php echo $row1[5]; ?></td> -->
                <!-- <td class="center"><?php //echo $row1[6]; ?></td> -->
                <td class="center"><?php echo $row1[7]; ?></td>
                <td class="center"><?php echo $row1[8]; ?></td>
                <td class="center"><?php echo $row1[9]; ?></td>
                <td class="center">
                  <a href="#" onclick="G('<?=$pag_org?>?id=<?=$row1[0]?>&sw=2');">
                    <img src="images/icons/editor.png" alt="">&nbsp;Editar</a>  
                </td>
                <?php 
                    if ($row1['estado']==1) {
                      $fun_str="Disable(); return false;";
                      $act_str="<img src='images/sw_on.png'>";
                    }elseif ($row1['estado']==0) {
                      $fun_str="Enable(); return false;";
                      $act_str="<img src='images/sw_off.png'>";
                    }

                  ?>
                <?php if ($urg[0]==1) {  ?>            
                  <td><a href="#" onclick="<?=$fun_str?>"><?=$act_str?></a></td>
                <?php }  ?>

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
                <label>Login : </label>
                <span class="field">
                  <!-- <input type="text" name="log" id="log" value="<?=$log?>" class="smallinput" > -->
                  <select name="log" id="log" class="uniformselect" style='width:350px;'>
                    <?php 
                      // while($cur = mysql_fetch_array($rs)){
                      //   $seleccionar="";
                      //   if($cur[0]==$seleccionado) $seleccionar="selected";
                      //   echo "<option value=".$cur[0]." ".$seleccionar.">".$cur[1]."</option>";
                      // }
                     ?>
                    <option value="Vendedor" <?php if ($log=="Vendedor"){echo "selected";} ?>>Vendedor</option>
                    <option value="Despachador" <?php if ($log=="Despachador"){echo "selected";} ?>>Despachador</option>
                    <option value="Repartidor" <?php if ($log=="Repartidor"){echo "selected";} ?>>Repartidor</option>
                  </select>
                </span>
              </p>
                          
<!--               <p>
                <label>Subcategoria :</label>
                <span class="field">
                <? //llenarcombo('subcategorias','cod_subcat, subcat',' ORDER BY 2', $scat, '','codcat'); ?>
                </span>
              </p> -->

<!--               <p>
                <label>Clave :</label>
                <span class="field">
                  <input type="text" name="clave" id="clave" value="<?=$clave?>" onKeyPress="return numeros(event)" maxLength="10" class="smallinput"></span>
              </p> -->

              <p>
                <label>Clave :</label>
                <span class="field">
                  <input type="password" name="clave" id="clave" value="<?=$clave?>" class="password" size="58"></span>
                  <input type="hidden" name="ant_clave" id="ant_clave" value="<?=$clave?>">
              </p>

              <p>
                <label>Nombre :</label>
                <span class="field">
                  <input type="text" name="nombre" id="nombre" value="<?=$nom?>" onKeyPress="return letras(event)" class="smallinput">
                </span>
              </p>

              <p>
                <label>Apellidos :</label>
                <span class="field">
                  <input type="text" name="apellidos" id="apellidos" value="<?=$ape?>" onKeyPress="return letras(event)" class="smallinput">
                </span>
              </p>

              <p>
                <label>DNI :</label>
                <span class="field">
                  <input type="text" name="dni" id="dni" value="<?=$dni?>" onKeyPress="return numeros(event)" maxlength="8" class="smallinput">
                </span>
              </p>

              <p>
                <label>Dirección :</label>
                <span class="field">
                  <input type="text" name="dir" id="dir" value="<?=$dir?>" class="smallinput">
                </span>
              </p>

              <p>
                <label>Teléfono :</label>
                <span class="field">
                  <input type="text" name="tel" id="tel" value="<?=$tel?>" onKeyPress="return numeros(event)" maxlength="12" class="smallinput">
                </span>
              </p>

              <p>
                <label>Correo :</label>
                <span class="field">
                  <input type="text" name="correo" id="correo" value="<?=$correo?>" class="smallinput">
                </span>
              </p>

              <p>
                <label>Nivel :</label>
                <span class="field">
                   <? llenarcombo('nivel','cod_nivel, nivel_descrip',' ORDER BY 1', $nivel, '','codnivel'); ?>
                </span>
              </p>


<!--               <p>
                <label>Imagen:</label>
                <span class="field">
                    <input type="file" name="imag" id="imag" class="smallinput" size="40">
                </span>
              </p> -->

<!--                 <?php 
                  // if($_GET["sw"]==1){ 
                  //   echo "&nbsp;";
                  // }else{
                  //   echo "<p>
                  //         <label>Vista Previa :</label>
                  //         <span class='field'>&nbsp;&nbsp;
                  //           <img src='../productos/$img' width='50' height='50'>
                  //           <input type='hidden' name='imgDef' value='".$img."'>
                  //         </span>
                  //         </p>";
                  // }
                ?> -->            


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