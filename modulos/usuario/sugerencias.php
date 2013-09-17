<?php include ("head.php"); ?>
    
    <body onload="accion();">
        
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

          <?php include ("paneles.php"); ?>
          <?php include ("header.php"); ?>
          <?php include ("nav.php"); ?>

        <section id="contenedor">
          <?php //include ("contenedor.php"); ?>
          <?php //include ("nuevosprod.php"); ?>

          <?php  if ($_GET['msn']==1) { ?>
          <div id='msn_box_ok'>
              Su mensaje se envió con exito!! Gracias por la sugerencia
          </div>
          <?php } ?> 

          <section id="msn_block">
            <div id="cont_text" style="padding:10px;">

              <fieldset>
                <form name="frm_suger" action="reg_suger.php" method="post" accept-charset="utf-8" onsubmit="return valida_suger();">
<!--            <input type="hidden" name="cod_usu" value="<?php echo $rowus[0]?>"> -->
                <table border="0" cellpadding="10" cellspacing="10" width="100%" class="tbdatper">
                  <thead>
                    <tr>
                      <th colspan="2">Sugerencias</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td width="25%"><b>Nombre y Apellidos:</b></td>
                      <td><input type="text" name="txtnomape" style="width:180px"></td>
                    </tr>
                    <tr>
                      <td><b>Correo electrónico:<b></td>
                      <td><input type="text" name="txtemail" style="width:180px"></td>
                    </tr>
                    <tr>
                      <td><b>Mensaje:</b></td>
                      <td>
                        <textarea name="txtmensaje" cols="50" rows="8"></textarea>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2" height="6px" ></td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center">
                        <input type="submit" name="btngrabar" value=" Grabar " class="btnblue">&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="button" name="btngrabar" value=" Cancelar " onclick="javascript: location.href='index.php';" class="btnblue">
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2" height="6px" ></td>
                    </tr>
                  </tbody>
                </table>
                </form>
                </fieldset>
            </div>
          </section>
        </section>
        
          <!-- <aside> esto es el aside </aside> -->
          <?php include ("footer.php"); ?>
          <br><br>
          <?php include ("config_final.php"); ?>

    </body>
</html>
