
          <section id="land">


            <?php 
            function autogenerado($tabla,$campocodigo,$numcaracteres){
              Global $link;
                //para extraer de la derecha se multiplica por -1
                $numcaracteres=$numcaracteres*(-1);
                $rsTabla=mysql_query("select count($campocodigo) from $tabla",$link);
                $ATabla=mysql_fetch_array($rsTabla);
                $nreg=$ATabla[0];
                if($nreg>0) {
                  $rsTabla=mysql_query("select $campocodigo from $tabla",$link);
                  mysql_data_seek($rsTabla,$nreg-1);
                  $ATabla=mysql_fetch_array($rsTabla);
                }
                $cod=$ATabla[0]+1;
                $cod="00000000000000".$cod;
                $generado=substr($cod,$numcaracteres);
                mysql_free_result($rsTabla);
                return $generado;
              }

              if ($_GET["sw"]==2) {
                // include("../conectar.php");
                // $link=Conectarse();
                $id=autogenerado("pedidos","cod_pedido",3); 
              ?>

              <?php include 'vercarrito2.php'; ?>

              <?php 
                                             
               }else { 

            ?>

            <div id="control">
              Categorías :<br>
              <!-- <select name="cbocateg" id="cbocateg" onchange="ver_cat();" multiple="multiple" class="selcateg"> -->
              <select name="cbocateg" id="cbocateg" onclick="ver_cat();" multiple="multiple" class="selcateg">
                <option value="0">Todas...</option>
                <?php 
                    
                  // cod_tipo  tipo  descripcion  

                  $res=@mysql_query("set names utf8",$link);
                  $row=@mysql_fetch_array($res);
                  $res=mysql_query("select * from categoria ORDER BY 2",$link);
                  while ($rwc=mysql_fetch_array($res))
                    {
                ?>
                <option value="<?php echo $rwc[0]; ?>"> <?php echo $rwc[1]; ?></option>
                <?php } ?>  
                
              </select>
              
              <br><br>
              Buscar: <br><input type="text" name="txtbusqueda" id="txtbusqueda"> <br>
              <input type="button" value="Aceptar" onclick="verlist_bus();">

            </div>

            <div id="productos"></div>
            
            <?php } ?>

          </section>
          <br>

          <?php 

          $res=@mysql_query("set names utf8",$link);
          $row=@mysql_fetch_array($res);
          $res=mysql_query("select * from producto ORDER BY 1 limit 0,3",$link);
 
          while ($rwc=mysql_fetch_array($res))
            {
           // cod_producto descripcion cod_tipo  precio  imagen  stock cod_marca prom
           ?>
              <section id="bloque01">
                <div id="nompro">
                  <div id="subnompro"><?php echo $rwc[1]?></div>
                  <div id="prec">S/. <?php echo $rwc[3]?></div>
                  <a href="#" onClick="enviar(<?php echo $rwc[0]?>); return false;">
                    <div id="nubecompra">COMPRAR <br>AHORA</div></a>
                </div>
                <article>
                    <img src="../productos/<?php echo $rwc[4];?>" alt="">
                </article>
              </section>

          <?php  } ?>
