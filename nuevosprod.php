          <section id="nuevos">
              <hgroup> <h1>Nuevos Productos</h1> </hgroup>

              <?php 
                  $res=@mysql_query("set names utf8",$link);
                  $row=@mysql_fetch_array($res);
                  // $res=mysql_query("select * from producto where stock <> 0 and estado=2",$link);
                  $cns="select * from producto where estado=1 and stock <> 0 ORDER BY 1 DESC limit 0,4";
                  $res=mysql_query($cns,$link);

                  while ($rwc=mysql_fetch_array($res))
                    {
           // cod_producto descripcion cod_tipo  precio  imagen  stock cod_marca prom
              ?> 

              <section id="bloqueA">
                <div id="imgprod">
                  <!-- <a href="#" onClick="enviar(<?php //echo $rwc[0]?>); return false;"> -->
                  <a href="#caja_msn2" data-rel="prettyPhoto[caja_msn2]">
                    <img src="modulos/productos/<?php echo $rwc[4];?>">
                  </a>
                </div>

                <div id="descprod">
                <!-- <a href="#" onClick="enviar(<?php //echo $rwc[0]?>); return false;"><?php echo $rwc[1]; ?> </a> -->
                  <a href="#caja_msn2" data-rel="prettyPhoto[caja_msn2]"><?php echo $rwc[1]; ?> </a>
                </div>
                
                <div id="btnpro">
                  <!-- <input type="button"  value=" Comprar " onClick="enviar(<?php echo $rwc[0]?>)" class="btnprod"> -->
                  <input type="button"  value=" Comprar " class="btnprod">
                </div>
              </section> 

              <?php } ?>


<!--               <section id="bloqueA">
                <div id="imgprod">
                  &nbsp;
                </div>
                <div id="descprod"><a href="#">Descripción del producto aquí</a></div>
                <div id="btnpro">
                  <input type="button" value=" Comprar " class="btnprod">
                </div>
              </section>

              <section id="bloqueB">
                <div id="imgprod">
                  &nbsp;
                </div>
                <div id="descprod"><a href="#">Descripción del producto aquí</a></div>
                <div id="btnpro">
                  <input type="button" value=" Comprar " class="btnprod">
                </div>
              </section>
              
              <section id="bloqueC">
                <div id="imgprod">
                  &nbsp;
                </div>
                <div id="descprod"><a href="#">Descripción del producto aquí</a></div>
                <div id="btnpro">
                  <input type="button" value=" Comprar " class="btnprod">
                </div>
              </section>

              <section id="bloqueD">
                <div id="imgprod">
                  &nbsp;
                </div>
                <div id="descprod"><a href="#">Descripción del producto aquí</a></div>
                <div id="btnpro">
                  <input type="button" value=" Comprar " class="btnprod">
                </div>
              </section> -->
          </section>