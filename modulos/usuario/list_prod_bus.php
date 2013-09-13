    <div id="opciones">
        <?php 
        $dat=$_GET["dat"];
        $pag=$_GET["pag"];  

        // echo "dato: ".$dat." pagina:".$pag; 

        if ($pag==""){
          $pag=0;
          $filini =0;
        }else {
          $filini = ($pag-1)*6;
        }

        include("../conectar.php");
        $link=Conectarse();
        
        // if($dat==0){
          $sq="select * from producto where stock <> 0 and descripcion like '%".$_GET["dat"]."%'";
          $res=mysql_query($sq,$link);
          $numreg=mysql_num_rows($res);
        // }
        
        // echo $sq." ".$numreg;

      ?>  

      <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
          <td>
            <?php 
                  $res=@mysql_query("set names utf8",$link);
                  $row=@mysql_fetch_array($res);
                  $sqlq="select * from producto where stock <> 0 and descripcion like '%".$_GET["dat"]."%'";
                  // echo $sqlq;  
                  $res=mysql_query($sqlq, $link);
                  $rwc=mysql_fetch_array($res);
                  // if ($_GET["cod"]==0) {
                  //   $str1="TODAS";  
                  // }else{
                  //   $str1=$rwc[1];
                  // }
                  // echo $str1;
            	echo "Mostrando ".$numreg." resultados";
            ?>

          </td>
          <td align="right"><?php $npag=ceil($numreg/6); 
            for ($i=1; $i <= $npag; $i++) { 

            // echo "<input type='button' value='".$i."' class='btnpag' onClick='verpag3(,$i);'>";}
            // echo $dat." ".$pag;
            	?>
            	<input type="button" value="<?=$i?>" class="btnpag" onClick="verpag3('<?=$dat?>',<?=$i?>);">

           <?php } ?>
          </td>
        </tr>
      </table>
    
    </div>
    <?php 
      $res=@mysql_query("set names utf8",$link);
      $row=@mysql_fetch_array($res);
                  
      // if($dat==''){
        $sq="select * from producto where stock <> 0 and descripcion like '%".$_GET["dat"]."%' order by 2 LIMIT $filini,6";
        // echo $sq;
        // exit();
        $res=mysql_query($sq,$link);
        $strimag="";

      // }
      
       // echo $sq; exit();          
                  
      while ($rwc=mysql_fetch_array($res))
       	{
// cod_producto, descripcion, cod_subcat, precio, imagen, stock, cod_marca, prom
      ?> 
             
              <section id="bloqueA">
                <div id="imgprod">
                  <a href="#" onClick="enviar(<?php echo $rwc[0]?>); return false;">
                    <img src="../productos/<?php echo $strimag.$rwc['imagen'];?>" alt="<?php echo $strimag.$rwc[3];?>">
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