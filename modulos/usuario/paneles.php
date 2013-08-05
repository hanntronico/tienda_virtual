  <div class="login_register_stuff hide"><!-- Login/Register Modal forms - hidded by default to be opened through modal -->
    <div id="login_panel">
      <div class="inner-container login-panel">
        <h3 class="m_title">INGRESE CON SU USUARIO PARA PODER COMPRAR
          <!-- SIGN IN YOUR ACCOUNT TO HAVE ACCESS TO DIFFERENT FEATURES --></h3>
        <form id="login_form" name="login_form" action="grabar.php" method="post">
          <a href="#" class="create_account" onClick="ppOpen('#register_panel', '360');">REGISTRESE</a>
          <input type="text" id="uscorreo" name="uscorreo" class="inputbox" placeholder="Correo">
          <input type="password" id="uspassword" name="uspassword" class="inputbox" placeholder="Contraseña">
          <input type="submit" id="login" name="submit" value="ENTRAR">
          <!-- <a href="#" class="login_facebook">login with facebook</a> -->
        </form><br>
        <div class="links"><a href="#" onClick="ppOpen('#forgot_panel', '350');">Olvidó su usuario?</a> / <a href="#" onClick="ppOpen('#forgot_panel', '350');">Olvidó su contraseña?</a></div>
      </div>
    </div><!-- end login panel -->

    <div id="register_panel">
      <div class="inner-container register-panel">
        <h3 class="m_title">REGISTRO DE USUARIO</h3>
        <form id="register_form" name="register_form" method="post">
<!--           <p>
            <input type="text" id="reg-username" name="username" class="inputbox" placeholder="Usuario">
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
                <td><input type="text" id="txtemail" name="txtemail" class="inputbox" placeholder="Correo electrónico"></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" id="txtpassword" name="txtpassword" class="inputbox" placeholder="Contraseña"></td>
            </tr>
            <tr>
                <td>Confirmar: </td>
                <td><input type="password" id="txtconfpass" name="txtconfpass" class="inputbox" placeholder="Confirmar contraseña"></td>
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
        <div class="links"><a href="#" onClick="ppOpen('#login_panel', '800');">Ya tiene una cuenta?</a></div>
      </div>
    </div><!-- end register panel -->

    <div id="forgot_panel">
      <div class="inner-container forgot-panel">
        <h3 class="m_title">Olvidó sus datos de registro?</h3>
        <form id="forgot_form" name="forgot_form" method="post">
          <p>
            <input type="text" id="forgot-email" name="email" class="inputbox" placeholder="Email Address">
          </p>
          <p>
            <input type="submit" id="recover" name="submit" value="SEND MY DETAILS!">
          </p>
        </form>
        <div class="links"><a href="#" onClick="ppOpen('#login_panel', '800');">Ya recordé mi cuenta!</a></div>
      </div>
    </div><!-- end register panel -->
  </div><!-- end login register stuff -->
