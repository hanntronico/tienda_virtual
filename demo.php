<?php 
session_start();
if (isset($_SESSION["s_cod"]))
{
  if (isset($_SESSION["s_tipo"]))  
    { 
     if($_SESSION["s_tipo"]==1) 
      {  
        header("location: modulos/admin/");
        exit;
      }elseif ($_SESSION["s_tipo"]==2) {
        header("location: modulos/usuario/principal.php");
        exit;
      }
    }
}

include("modulos/conectar.php");
$link=Conectarse();
?>

<?php include ("head.php"); ?>
    
    <body <?php 
      if ($_GET["deny"]==1 || $_GET["deny"]==2 || $_GET["deny"]==3 || $_GET["deny"]==4) 
          {echo "onload='carga_registro();'";} ?> >
        
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

          <?php include ("paneles.php"); ?>
          <?php include ("header.php"); ?>
          <?php include ("nav.php"); ?>

        <section id="contenedor">
          <?php //include ("contenedor.php"); ?>
          <?php //include ("nuevosprod.php"); ?>
          <section id="msn_block">
            <div id="cont_text" style="padding:10px;">

              <fieldset>
                <table border="0" cellpadding="10" cellspacing="10" width="100%" class="tbdatper">
                  <thead>
                    <tr>
                      <th colspan="2">DEMOSTRACION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
                    </tr>
                    <tr>
                      <td colspan="2" height="6px" ></td>
                    </tr>
                  </tbody>
                </table>
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
