<?php 

$res=@mysql_query("set names utf8",$link);
$row=@mysql_fetch_array($res);
$res=mysql_query("select * from producto ORDER BY 1 limit 0,3",$link);
    // $row=mysql_fetch_array($res);
?>
          <section id="land">
            <img src="img/slider.png" alt="">
          </section>
          
          <?php 
          while ($rwc=mysql_fetch_array($res))
            {
              //echo $rwc[0]." ";
           // cod_producto descripcion cod_tipo  precio  imagen  stock cod_marca prom
           ?>

          <section id="bloque01">
            <div id="nompro">
              <div id="subnompro"><?php echo $rwc[1];?></div>
              <a href="#"><div id="nubecompra">COMPRAR <br>AHORA</div></a>
            </div>
            <article>
                <img src="modulos/productos/<?php echo $rwc[4];?>" alt="">
            </article>
          </section>

          <?php  } ?>

<!--           <section id="bloque02">
            <div id="nompro">
              <div id="subnompro">LECHE <br> GLORIA</div>
              <div id="nubecompra">nube</div>
            </div>
            <article>
                <img src="img/1.png" alt="">
            </article>
          </section>

          <section id="bloque03">
            <div id="nompro">
              <div id="subnompro">LECHE <br> GLORIA</div>
              <div id="nubecompra">nube</div>
            </div>
            <article>
                <img src="img/1.png" alt="">
            </article>
          </section>            --> 