
        <header id="header">
          <div id="logo">
             <img src="../../img/logo2.png" alt="logo">
          </div>

          <div id="loginB">
              <div id="menu">
                Bienvenido a nuestra tienda virtual <br>

                <ul>
                    <li><a href="cuenta.php">
                        <img src="../../img/profile.png" alt="" width="22" height="22"> CUENTA</a></li>
                    <li><a href="#" onclick="vercarrito(); return false;">CANASTA</a></li>
                    <li><a href="#" onclick="salir(); return false;">SALIR</a></li>
                </ul>
              </div>
              
              <div id="regis">
                  <?php// echo $solonom; ?>

              <!-- <a href="#register_panel" data-rel="prettyPhoto[register_panel]">Bienvenid@</a><br> -->
                <!-- <h6><a href="#login_panel" data-rel="prettyPhoto[login_panel]"></a></h6> -->
                <h6><a href="#">Bienvenido(a):&nbsp;
                <?php echo $solonom; ?></a></h6>
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