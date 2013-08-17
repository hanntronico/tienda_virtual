        <div id="side">
            <a href="#" onclick="verlista(); return false;">
            &nbsp;&nbsp;&nbsp;<img src="../../img/list.png" alt=""><br>
            &nbsp;&nbsp;Lista            
        </a></div>
          <div id="list"></div>
        <header id="header">
          <div id="logo">
             <img src="../../img/logo2.png" alt="logo">
          </div>

          <div id="loginB">
              <div id="menu2">
                <!-- Bienvenido a nuestra tienda virtual  -->
                <a href="cuenta.php"><div id="cuenta">Cuenta</div></a>
                <a href="#" onclick="vercarrito(); return false;"><div id="canasta">Canasta</div></a>
                <a href="#" onclick="salir(); return false;"><div id="salir">Salir</div></a>
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
                <div id="solo_nom"><a href="#">Bienvenido(a):&nbsp;
                <?php echo $solonom; ?></a></div>
                <a href="#" onclick="vercarrito(); return false;">Compra: S/. 
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
                </a>

              </div>
          </div>

        </header><!-- /header -->