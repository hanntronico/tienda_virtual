  <div class="login_register_stuff hide"><!-- Login/Register Modal forms - hidded by default to be opened through modal -->
    <div id="login_panel">
      <div class="inner-container login-panel">
        <h3 class="m_title">INGRESE CON SU USUARIO PARA PODER COMPRAR
          <!-- SIGN IN YOUR ACCOUNT TO HAVE ACCESS TO DIFFERENT FEATURES --></h3>
        <form id="login_form" name="login_form" action="login.php" method="post">
          <a href="#" class="create_account" onClick="ppOpen('#register_panel', '360');">
            REGISTRESE</a>
          <!-- <input type="text" id="uscorreo" name="uscorreo" class="inputbox" placeholder="Correo"> -->
          <span style="font-size:12px;">Correo:</span>
          <input type="text" id="uscorreo" name="uscorreo" class="inputbox">
          <!-- <input type="password" id="uspassword" name="uspassword" class="inputbox" placeholder="Contraseña"> -->
          <span style="font-size:12px;">Contraseña:</span> 
          <input type="password" id="uspassword" name="uspassword" class="inputbox">
          <input type="submit" id="login" name="submit" value="ENTRAR">
          
          <!-- <a href="#" class="login_facebook">login with facebook</a> -->
        </form><br>
        <div class="links">
          <a href="#" onClick="ppOpen('#forgot_panel', '350');" id="olv">
            Olvidó su usuario?</a>&nbsp; / &nbsp; 
          <a href="#" onClick="ppOpen('#forgot_panel', '350');">Olvidó su contraseña?</a>
          <!-- <a href="">Salir</a> -->
        </div>
      </div>
    </div><!-- end login panel -->

    <div id="register_panel">
      <div class="inner-container register-panel">
        <h3 class="m_title">REGISTRO DE USUARIO</h3>
        <form id="register_form" name="register_form" method="post" action="registrar.php" onsubmit="return validaform();">
        <!-- <form id="register_form" name="register_form" method="post"> -->
<!--           <p>
            <input type="text" id="reg-username" name="reg-username" class="inputbox" placeholder="Usuario">
          </p> -->

          <table border="0" cellspacing="10" cellpadding="5">
            <tr>
                <td>Nombres:</td>
                <td>
                  <input type="text" id="txtnombres" name="txtnombres" class="inputbox" placeholder="Nombres">
                </td>
            </tr>
            <tr>
                <td>Apellidos:</td>
                <td>
                  <input type="text" id="txtapellidos" name="txtapellidos" class="inputbox" placeholder="Apellidos">
                </td>
            </tr>
            <tr>
              <td>Email: </td>
              <td>
                <input type="text" id="txtemail" name="txtemail" class="inputbox" placeholder="Correo electrónico">
                <!-- <input type="text" id="txtemail" name="txtemail" class="inputbox" placeholder="Correo electrónico" onblur="verifica_email()"> -->
              </td>
            </tr>
<!--             <tr>
                <td>Password: </td>
                <td><input type="password" id="txtpassword" name="txtpassword" class="inputbox" placeholder="Contraseña"></td>
            </tr>
            <tr>
                <td>Confirmar: </td>
                <td><input type="password" id="txtconfpass" name="txtconfpass" class="inputbox" placeholder="Confirmar contraseña"></td>
            </tr> -->
            <tr>
                <td>Nº DNI: </td>
                <td><input type="text" id="txtdni" name="txtdni" class="inputbox" placeholder="DNI" onkeypress="validasolonumeros()" maxlength="8"></td>
            </tr>
            <tr>
                <td>Teléfono: </td>
                <td><input type="text" id="txttelf" name="txttelf" class="inputbox" placeholder="Teléfono" onkeypress="validasolonumeros()" maxlength="12"></td>
            </tr>
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2">
                <input type="submit" id="signup" name="submit" value="Crear mi cuenta">
                <input type="reset" id="reset" name="reset" value="Cancelar">
              </td>
            </tr>

          </table>
<!--           <p>
            Nombres: 
            <input type="text" id="txtnombres" name="txtnombres" class="inputbox" placeholder="Nombres">
          </p>
          <p>Apellidos: 
            <input type="text" id="txtapellidos" name="txtapellidos" class="inputbox" placeholder="Apellidos">
          </p>
          <p>Email: 
            <input type="text" id="txtemail" name="txtemail" class="inputbox" placeholder="Correo electrónico">
          </p>
          <p>Password: 
            <input type="password" id="txtpassword" name="txtpassword" class="inputbox" placeholder="Contraseña">
          </p>
          <p>Confirmar:
            <input type="password" id="txtconfpass" name="txtconfpass" class="inputbox" placeholder="Confirmar contraseña">
          </p>
          <p>
            <input type="submit" id="signup" name="submit" value="Crear mi cuenta">
            <input type="reset" id="reset" name="reset" value="Cancelar">
          </p> -->
        </form>
          <?php 
          if ($_GET["deny"]==1) {
              echo "<div class='msn_error'>DNI ya se encuentra registrado</div>";
          }elseif ($_GET["deny"]==2) {
            echo "<div class='msn_error'>DNI ya se encuentra registrado</div>";
          }elseif ($_GET["deny"]==3) {
            echo "<div class='msn_error'>Email ya se encuentra registrado</div>";
          }elseif ($_GET["deny"]==4) {
            echo "<div class='msn_error'>Email ya se encuentra registrado</div>";
          } 

          ?>
        <div class="links"><a href="#" onClick="ppOpen('#login_panel', '800');">Ya tiene una cuenta?</a></div>
      </div>
    </div><!-- end register panel -->

    <div id="forgot_panel">
      <div class="inner-container forgot-panel">
        <h3 class="m_title">Olvidó sus datos de registro?</h3>
        <form id="forgot_form" name="forgot_form" method="post" action="rest_pass.php">
          <span style="font-size:12px;">Correo electrónico :</span>          
          <p>
            <input type="text" id="forgot-email" name="email" class="inputbox" placeholder="Ingrese aquí su correo" style="width: 300px;">
          </p>
          <p>
            <input type="submit" id="recover" name="submit" value="Enviar datos">
          </p>
        </form>

          <?php 
          if ($_GET["deny"]==5) {
              echo "<div class='msn_error'>Correo no se encuenta registrado</div>";
          } 

          ?>
        <div class="links"><a href="#" onClick="ppOpen('#login_panel', '800');">Ya recordé mi cuenta!</a></div>
      </div>
    </div><!-- end register panel -->

    <div id="caja_msn">
      <div class="inner-container forgot-panel">
        <!-- <h3 class="m_title">MENSAJE</h3> -->
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th><h3 class="m_title">MENSAJE</h3></th>
            </tr>
          </thead>
          <tbody>
            <tr align="center">
              <td>Su cuenta de usuario o password <br> son incorrectos.</td>
            </tr>
            <tr><td>&nbsp;</td> </tr>
            <tr align="center"><td>
              <input type="submit" id="aceptar" value=" Aceptar " onclick="javascript: location.href='index.php';"></td> </tr>
          </tbody>
        </table>

<!--         <p align="center">Su cuenta de usuario o password están equivocados.</p>
        <p align="center">
            <input type="submit" id="aceptar" value=" Aceptar " onclick="javascript: location.href='index.php';">
        </p> -->
<!--         <form id="forgot_form" name="forgot_form" method="post" action="rest_pass.php">
          <p>
            <input type="text" id="forgot-email" name="email" class="inputbox" placeholder="Correo electrónico" style="width: 300px;">
          </p>
          <p>
            <input type="submit" id="recover" name="submit" value="Enviar datos">
          </p>
        </form> -->

          <?php 
          // if ($_GET["deny"]==5) {
          //     echo "<div class='msn_error'>Correo no se encuenta registrado</div>";
          //} 

          ?>
<!--         <div class="links"><a href="#" onClick="ppOpen('#login_panel', '800');">Ya recordé mi cuenta!</a></div> -->
      </div>
    </div>

    <div id="caja_msn2">
      <div class="inner-container forgot-panel">
        <!-- <h3 class="m_title">MENSAJE</h3> -->
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th><h3 class="m_title" align="center">MENSAJE</h3></th>
            </tr>
          </thead>
          <tbody>
            <tr align="center">
              <td>Ingrese con su usuario para comprar <br> y ver los precios<br><br> 
              <div class="links"><a href="#" onClick="ppOpen('#login_panel', '800');">Ya tiene una cuenta?</a></div>
              </td>
            </tr>
            <tr><td>&nbsp;</td> </tr>
            <tr align="center"><td>
              <input type="submit" id="aceptar" value=" Aceptar " onclick="javascript: location.href='index.php';"></td> </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div><!-- end login register stuff -->

