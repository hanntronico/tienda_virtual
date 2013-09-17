        <div id="iside">
            <a href="cuenta.php">
            &nbsp;&nbsp;&nbsp;&nbsp;
            <img src="../../img/profile.png" alt="profile.png" width="33" height="33">
            &nbsp;&nbsp;&nbsp;&nbsp;<span class="tit_lista">Mis Datos</span>            
        </a></div>

        <div id="side">
            <a href="#" onclick="verlista(); return false;">
            &nbsp;&nbsp;&nbsp;&nbsp;<img src="../../img/list.png" alt=""><br>
            &nbsp;&nbsp;<span class="tit_lista">Mi Lista</span>            
        </a></div>
        
        <div id="list"></div>

        
        <header id="header">
          <div id="logo">
            <img src="../../img/logo2.png" alt="logo">
          </div>
          <div id="loginB">
              <div id="menu2">
                <!-- Bienvenido a nuestra tienda virtual  -->
                <!-- <a href="cuenta.php"><div id="cuenta">Cuenta</div></a> -->
                <!-- <a href="#" onclick="vercarrito(); return false;"><div id="canasta">Mi Compra</div></a> -->
                <a href="compra.php"><div id="canasta">Mi Compra</div></a>
                <!-- <a href="#" onclick="salir(); return false;"><div id="salir">Salir</div></a> -->
                <a href="#" onclick="salir(); return false;"><div id="salir">Salir</div></a>

<!--                 <input id="alert_button" type="button" value="Show Alert" />
                <input id="confirm_button" type="button" value="Show Confirm" />
                <input id="prompt_button" type="button" value="Show Prompt" />
                <input id="alert_button_with_html" type="button" value="Show Alert" />
                <input id="style_1" class="alert_style_example" type="button" value="Style 1" /> -->
                <!-- <input id="style_1" class="alert_style_example" type="button" value="Style 1" /> -->
<!--              <ul>
                    <li><a href="cuenta.php">
                        <img src="../../img/profile.png" alt="" width="14" height="14">
                        Cuenta</a></li>
                    <li><a href="#" onclick="vercarrito(); return false;">CANASTA</a></li>
                    <li><a href="#" onclick="salir(); return false;">SALIR</a></li>
                  </ul> -->
              </div>
              
              <div id="regis">
                  <?php// echo $solonom; ?>

              <!-- <a href="#register_panel" data-rel="prettyPhoto[register_panel]">Bienvenid@</a><br> -->
                <!-- <h6><a href="#login_panel" data-rel="prettyPhoto[login_panel]"></a></h6> -->
                <div id="solo_nom"><a href="#"><span class="f_compra">Bienvenido(a):&nbsp;
                <?php echo $solonom; ?></span></a></div>
                <!-- <a href="#" onclick="vercarrito(); return false;">Compra: S/.  -->
                <a href="compra.php"><span class="f_compra">Compra: S/. 
                <?php 

                $k=$_SESSION["s_prod"];
                $total=0;
                if (count($k)>0)
                  {
                    foreach( $k as $key => $value ) 
                    {
                      $res=mysql_query("select * from producto where cod_producto=".$key."",$link);
                      $row=mysql_fetch_array($res);
                      $total+=($row[3]*$value);
                        if ($value<>0)
                        {
                           // echo sprintf("%01.2f", $total); 
                        }
                    }
                    
                    echo sprintf("%01.2f", $total); 

                  }else{

                    echo sprintf("%01.2f", $total);                     
                  }

                 ?>
                 </span>
                </a>

<!--            <?php  
                  //if ($total>0){
                ?>
                 <a href='principal.php?sw=2'>
                  <div id='b_pagar'>$<div id="txt_pagar">Pagar</div></div></a>
                <?php //} ?> -->


                      
                    <div id="b_pagar">
                      <a href='principal.php?sw=2'>
                        <div id="b_pagarb">
                          $<div id="txt_pagar">Pagar</div>
                        </div>
                      </a>
                    </div>  

                <?php  
                  if ($total>0 && $_GET["sw"]!=2){
                ?>

                <script type="text/javascript">
                  // document.getElementById('moneda').style.display = "block";
                  var content = jQuery("#b_pagar");
                  content.fadeIn(1800);
                </script>

                <?php } ?>
              </div>
          </div>

        </header><!-- /header -->