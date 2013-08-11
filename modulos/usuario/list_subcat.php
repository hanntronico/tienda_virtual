    <div id="opciones">
      <?php //echo $_GET["cod"]; 
        $codcat=$_GET["cod"];
        $pag=$_GET['pag'];      
        if ($pag==""){
          $pag=0;
          $filini =0;
        }else {
          $filini = ($pag-1)*6;
        }

        include("../conectar.php");
        $link=Conectarse();
        
        if($codcat==0){
          $sq="select * from categoria";
          $res=mysql_query($sq,$link);
          $numreg=mysql_num_rows($res);

        }elseif ($codcat>0) {
          $sq="select * from subcategorias where cod_tipo=".$codcat;
          $res=mysql_query($sq,$link);
          $numreg=mysql_num_rows($res);
        }
        
        // echo $sq." ".$numreg;

      ?>  

      <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
          <td>
            <?php 
                  $res=@mysql_query("set names utf8",$link);
                  $row=@mysql_fetch_array($res);
                  $sqlq="select * from categoria where cod_tipo=".$_GET["cod"];  
                  $res=mysql_query($sqlq, $link);
                  $rwc=mysql_fetch_array($res);
                  if ($_GET["cod"]==0) {
                    $str1="TODAS";  
                  }else{
                    $str1=$rwc[1];
                  }
                  echo $str1;
            ?>
          </td>
          <td align="right"><?php $npag=ceil($numreg/6); 
            for ($i=1; $i <= $npag; $i++) {
            echo "<input type='button' value='".$i."' class='btnpag' onClick='verpag($codcat,$i);'>";}
            // echo $codcat." ".$pag;
            ?>
          </td>
        </tr>
      </table>
    
    </div>
    <?php 
      $res=@mysql_query("set names utf8",$link);
      $row=@mysql_fetch_array($res);
                  
      if($codcat==0){
        $sq="select * from categoria LIMIT $filini,6";
        $res=mysql_query($sq,$link);
        $strimag="categorias/";
      }elseif ($codcat>0) {
        $sq="select * from subcategorias where cod_tipo=".$codcat." LIMIT $filini,6";
        $res=mysql_query($sq,$link);
        $strimag="";
      }
      
       // echo $sq; exit();          
                  
      while ($rwc=mysql_fetch_array($res))
       		{
           // cod_subcat	subcat	desc_subcat	img_subcat	cod_tipo
      ?> 
              <section id="bloqueSC">
                <a href="#" onClick="ver_prod(<?php echo $rwc[0]?>); return false;">
                  <div id="imgprod">
                    <img src="../productos/<?php echo $strimag.$rwc[3];?>" alt="<?php echo $strimag.$rwc[3];?>">
                  </div>
                </a>    
  
                <div id="desc_scat">
	                <a href="#" onClick="ver_prod(<?php echo $rwc[0]?>); return false;">
                  <?php echo $rwc[1]; ?> </a>
	              </div>
              </section> 

      <?php } ?>      