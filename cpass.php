<?php 
session_start();
include("modulos/conectar.php");
$link=Conectarse();
$res=@mysql_query("set names utf8",$link);
$row=@mysql_fetch_array($res);
$sq="select * from usuario where cod_usuario=".$_SESSION["s_cod"];
$res=@mysql_query($sq,$link);
$rowus=@mysql_fetch_array($res);

// if (isset($_SESSION["s_cod"]))
// {
//   if (isset($_SESSION["s_tipo"]))  
//     { 
//      if($_SESSION["s_tipo"]==1) 
//       {  
//         header("location: modulos/admin/");
//         exit;
//       }elseif ($_SESSION["s_tipo"]==2) {
//         header("location: modulos/usuario/principal.php");
//         exit;
//       }
//     }
// }

// include("modulos/conectar.php");
// $link=Conectarse();
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
          <?php// include ("modulos/usuario/cambiapass.php"); ?>
          <section id="msn_block">
            <fieldset>
            <form name="frm_cambiopass" action="cambiapass2.php" method="post" accept-charset="utf-8" onsubmit="return valida_cambiopass();">
            <!-- cod_usuario  login clave nombre  apellidos dni direccion telefono  correo  cod_nivel -->
            <input type="hidden" name="cod_usu" value="<?php echo $rowus[0]?>">
            <table border="0" cellpadding="10" cellspacing="10" width="100%" class="tbdatper">
              <thead>
                <tr>
                  <th colspan="2">Cambie su contraseña</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td colspan="2">
                    <b>Bienvenido! <br> Por favor modifique su contraseña por otra que pueda recordar, luego de ello podrá realizar sus compras</b>
                  </td>
                </tr>
                <tr>
                  <td width="25%">Contraseña actual:</td>
                  <td><input type="password" name="txtpassact" style="width:180px"></td>
                </tr>
                <tr>
                  <td>Nueva contraseña:</td>
                  <td><input type="password" name="txtnuevapass" style="width:180px"></td>
                </tr>
                <tr>
                  <td>Confirma contraseña:</td>
                  <td><input type="password" name="txtconfpass" maxlength="8" style="width:180px"></td>
                </tr>
                <tr>
                  <td colspan="2" height="6px" ></td>
                </tr>
                <tr>
                  <td colspan="2" align="center">
                    <input type="submit" name="btngrabar" value=" Grabar " class="btnblue">&nbsp;&nbsp;&nbsp;&nbsp;
                    <!-- <input type="button" name="btngrabar" value=" Seguir Comprando " onclick="javascript: location.href='principal.php';" class="btnblue"> -->
                    <input type="button" name="btngrabar" value=" Salir " onclick="javascript: location.href='modulos/usuario/salir.php';" class="btnblue">
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <b>Si no desea terminar su registro haga <a href="#" onclick="javascript: location.href='modulos/usuario/salir.php';">click aquí</a></b>
                  </td>
                </tr>
                <tr>
                  <td colspan="2" height="6px" ></td>
                </tr>
              </tbody>
            </table>
            </form>
            </fieldset>
           </section> 





<!--           <section id="msn_block">
            <p><b>Saludos de MERCADO VIRTUAL</b></p> <br>
            <p>Gracias por registrarse en Mercado Virtual, su usuario y contraseña ha sido enviado al correo electrónico con el que se registró.</p> 
            <p>Por favor, chekear su correo e ingresar a comprar en nuestra Tienda Online</p> <br>
            <p style="text-decoration: underline;">La Gerencia de Ventas</p>
          </section> -->
        
        </section>
        
          <!-- <aside> esto es el aside </aside> -->
          <?php include ("footer.php"); ?>
          <br><br>
          <?php include ("config_final.php"); ?>

    </body>
</html>
