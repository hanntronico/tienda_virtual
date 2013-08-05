              <div id="opciones">
                <?php  
                  include("../conectar.php");
                  $link=Conectarse();
                  // echo $sc=$_GET["cod"];
                  $sqlq = "select cod_tipo from subcategorias where subcategorias.cod_subcat=".$_GET["cod"];  
                  // echo $sqlq;
                  // exit();
                  $res=mysql_query($sqlq, $link);
                  $rwc=mysql_fetch_array($res);
                  $cat = $rwc[0];
                ?>
                

                <input type="button" value="CATEGORIAS" onClick="vertodos(<?php echo $cat; ?>);">&nbsp;&nbsp;&nbsp;
                
                <?php //echo $_GET["cod"]; 
                  $res=@mysql_query("set names utf8",$link);
                  $row=@mysql_fetch_array($res);
                  $sqlq = "select * from subcategorias where cod_subcat=".$_GET["cod"];  
                  $res=mysql_query($sqlq, $link);
                  $rwc=mysql_fetch_array($res);
                  echo $rwc[1];
                ?>
               
              </div>

    
              <?php 
                  $codcat=$_GET["cod"];
                  $res=@mysql_query("set names utf8",$link);
                  $row=@mysql_fetch_array($res);
                  
                  if($codcat==0){
                    $res=mysql_query("select * from producto",$link);
                  }elseif ($codcat>0) {
                    $res=mysql_query("select * from producto where cod_subcat=".$codcat,$link);
                  }
                  
                  
                  while ($rwc=mysql_fetch_array($res))
                    {
           // cod_producto descripcion cod_subcat  precio  imagen  stock cod_marca prom
              ?> 

              <section id="bloqueA">
                <div id="imgprod">
                  <a href="#" onClick="enviar(<?php echo $rwc[0]?>); return false;">
                    <img src="../productos/<?php echo $rwc[4];?>" alt="<?php echo $rwc[4];?>">
                  </a>    
                </div>
                <div id="descprod">
           
                <a href="#" onClick="enviar(<?php echo $rwc[0]?>); return false;">
                  <?php echo $rwc[1]."<br> <span class='precio'>S/ ".$rwc[3]."</span>"; ?> </a>

                </div>
                <div id="btnpro">
                  <input type="button"  value=" Comprar " onClick="enviar(<?php echo $rwc[0]?>)" class="btnprod">
                </div>
              </section> 

              <?php } ?>

<!--               <section id="bloqueA">
                <div id="imgprod">
                  &nbsp;
                </div>
                <div id="descprod">

                <a href="#" onClick="enviar(37); return false" >Descripción del producto aquí</a></div>
                <div id="btnpro">
                      <input type="button"  value=" Comprar " onClick="enviar(37)" class="btnprod">
                </div>
              </section>

              <section id="bloqueA">
                <div id="imgprod">
                  &nbsp;
                </div>
                <div id="descprod"><a href="#">Descripción del producto aquí</a></div>
                <div id="btnpro">
                  <input type="button" value=" Comprar " class="btnprod">
                </div>
              </section>

              <section id="bloqueA">
                <div id="imgprod">
                  &nbsp;
                </div>
                <div id="descprod"><a href="#">Descripción del producto aquí</a></div>
                <div id="btnpro">
                  <input type="button" value=" Comprar " class="btnprod">
                </div>
              </section>

              <section id="bloqueA">
                <div id="imgprod">
                  &nbsp;
                </div>
                <div id="descprod"><a href="#">Descripción del producto aquí</a></div>
                <div id="btnpro">
                  <input type="button" value=" Comprar " class="btnprod">
                </div>
              </section>

              <section id="bloqueA">
                <div id="imgprod">
                  &nbsp;
                </div>
                <div id="descprod"><a href="#">Descripción del producto aquí</a></div>
                <div id="btnpro">
                  <input type="button" value=" Comprar " class="btnprod">
                </div>
              </section>  -->                                         