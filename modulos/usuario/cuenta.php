<?php include ("head.php"); ?>
    
    
    <body onload="verdatos();accion();">
<!--     <body 
      <?php //if ($_GET['sw']==1) { ?>
        onload="show_msn();"
      <?php //}else { ?>
        onload="verdatos();"
      <?php //} ?>

    > -->
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

          <?php include ("paneles.php"); ?>
          <?php include ("header.php"); ?>
          <?php include ("nav.php"); ?>
        <section id="contenedor">
          <?php  if ($_GET['sw']==1 || $_GET['sw']==2) { ?>
          <div id='msn_box_ok'>
              Sus datos se grabaron con exito!!
          </div>
          <?php } ?> 
          <?php  //if ($_GET['deny']==1) { ?>
<!--           <div id='msn_box_ok'>
              Sus datos se grabaron con exito!!
          </div> -->
          <?php //} ?>  
          
      <!-- <a href="#" onclick="show_msn(); return false;" id="ha1">hann</a> -->
    <!--  <script type="text/javascript">
          document.getElementById('ha1').click();
      </script> -->
          <section id="land">
            <div id="control">
              <ul>
                  <li><a href="#" onclick="verform(1); return false;"> » Datos Personales</a></li>
                  <li><a href="#" onclick="verform(2); return false;"> » Mis compras</a></li>
                  <li><a href="#" onclick="verform(3); return false;"> » Pedidos Pendientes</a></li>
                  <li><a href="#" onclick="verform(4); return false;"> » Cambiar Contraseña</a></li>
                  <!-- <li><a href="">>> Pedidos Pendientes</a></li> -->

              </ul>
            </div>
            <div id="content"></div>

          </section>  

        </section>
        
          <!-- <aside> esto es el aside </aside> -->
          <?php include ("footer.php"); ?>
          <br><br>
          <?php include ("config_final.php"); ?>

    </body>
</html>