    <div id="opciones2">
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
        if ($numreg==0) {
            echo "Sin resultados";
          }  
      ?>  


    
    </div>

<table border="0" cellpadding="2" cellspacing="2">

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
        <tr>
          <td>
            <a href="#" onClick="enviar(<?php echo $rwc[0]?>); return false;">
              <img src="../productos/<?php echo $strimag.$rwc['imagen'];?>" alt="<?php echo $strimag.$rwc[3];?>" width="30" height="30">
            </a>
          </td>
          <td>&nbsp;</td>
          <td width="45%">
            <a href="#" onClick="enviar(<?php echo $rwc[0]?>); return false;">
            <?php echo $rwc[1]; ?> </a>
          </td>
          <td align="right">
            <a href="#" onClick="enviar(<?php echo $rwc[0]?>); return false;">
            <?php echo "S/.".$rwc[3]; ?> </a>
          </td>
        </tr>





<!--               <section id="bloqueA">
                <div id="imgprod">
                  <a href="#" onClick="enviar(<?php //echo $rwc[0]?>); return false;">
                    <img src="../productos/<?php //echo $strimag.$rwc['imagen'];?>" alt="<?php //echo $strimag.$rwc[3];?>" width="30" height="30">
                  </a>    
                </div>
                <div id="descprod">
           
                <a href="#" onClick="enviar(<?php //echo $rwc[0]?>); return false;">
                  <?php //echo $rwc[1]."<br> <span class='precio'>S/ ".$rwc[3]."</span>"; ?> </a>

                </div>
                <div id="btnpro">
                  <input type="button"  value=" Comprar " onClick="enviar(<?php //echo $rwc[0]?>)" class="btnprod">
                </div>
              </section> -->





      <?php } ?>    
    </table>