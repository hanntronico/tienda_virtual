<?php 
  $origen=$_SERVER['HTTP_REFERER'];
  include("conectar.php");
  $link=Conectarse();
  // echo $_GET["dat"];

  if ($_GET["dat"]=="") {
    $datbus="**";
  }else {
    $datbus=$_GET["dat"];
  }


  $rs=@mysql_query("set names utf8",$link);
  $fila=@mysql_fetch_array($res);
  // $sql="select * from producto where descripcion like '".$_GET["dat"]."%'"; 

  // $sql="select cod_producto as COD, 
  //               concat('<img src=../productos/',imagen,' width=50 height=50>') as Img, 
  //               descripcion as Descripcion, 
  //               subcategorias.subcat as Subcat, 
  //               precio, 
  //               stock, 
  //               marca.desc_marca as Marca, 
  //               estado 
  //               from producto, subcategorias, marca
  //               where producto.cod_subcat = subcategorias.cod_subcat
  //               and producto.cod_marca = marca.cod_marca
  //               and ((producto.descripcion like '".$_GET["dat"]."%') 
  //               or (subcategorias.subcat like '".$_GET["dat"]."%') 
  //               or (producto.cod_producto like '".$_GET["dat"]."%'))";

    $sql="select cod_producto as COD, 
                 descripcion as Descripcion, 
                 subcategorias.subcat as Subcat, 
                 marca.desc_marca as Marca, 
                 estado 
                 from producto, subcategorias, marca
                 where producto.cod_subcat = subcategorias.cod_subcat
                 and producto.cod_marca = marca.cod_marca
                 and producto.estado <> 0
                 and ((producto.descripcion like '%".$datbus."%')
                 or (marca.desc_marca like '%".$datbus."%')  
                 or (subcategorias.subcat like '%".$datbus."%') 
                 or (producto.cod_producto like '%".$datbus."%'))";

  // echo $sql; 
  $res=@mysql_query($sql,$link);
  // $row1=@mysql_fetch_array($res);

  // while($row1=@mysql_fetch_array($res))
  //   {//$i++;
  //     echo $row1[1]."<br>";   
  //   }

?>

<table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="listprod">
          <colgroup>
            <col class="con1" style="width: 5%"/>
            <col class="con0" style="width: 25%" />
            <col class="con1" style="width: 8%" />
            <col class="con0" style="width: 15%" />
            <col class="con0" style="width: 15%" />
            <!-- <col class="con1" style="width: 6%" /> -->
          </colgroup>
          <thead>
            <tr>
              <th class="head1">COD</th>
              <th class="head1">Descripción</th>
              <th class="head1">Subcategoría</th>
              <th class="head1">Marca</th>
              <th class="head1">Acción</th>
              <!-- <th class="head1">EDITAR</th> -->
            </tr>
          </thead>

          <tbody>
          <?php while($row1=@mysql_fetch_array($res))
                  {$i++;
          ?>  

              <tr class="gradeX">
                <td><?php echo $row1[0]; ?></td>
                <td><?php echo $row1[1]; ?></td>
                <td><?php echo $row1[2]; ?></td>
                <td><?php echo $row1[3]; ?></td>
                <td class="center">
                  <a href="#" onclick="addprod(<?=$row1[0]?>); return false;">
                    <img src="images/icons/attachment.png" alt="">&nbsp;Agregar
                  </a>  
                </td>
              </tr>
          <?php } ?>    
          </tbody>
        </table>





<!--     <form name="frmList" action="grabar.php" method="post"> 
      <input type="hidden" name="pag" value="<?=$pag_sext?>">           
        <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="listprod">
          <colgroup>
            <col class="con1" style="width: 5%"/>
            <col class="con0" style="width: 8%" />
            <col class="con1" style="width: 25%" />
            <col class="con0" style="width: 15%" />
            <col class="con1" style="width: 8%" />
            <col class="con1" style="width: 8%" />
            <col class="con1" style="width: 8%" />
            <col class="con1" style="width: 6%" />
          </colgroup>
          <thead>
            <tr> -->
<!--               <th class="head1 nosort">
                <input type="checkbox" name="allbox" onClick="CA();" title="Seleccionar o anular la selección de todos los registros" /></th> -->
<!--               <th class="head1">COD</th>
              <th class="head1">Imagen</th>
              <th class="head1">Descripción</th>
              <th class="head1">Subcategoría</th>
              <th class="head1">Precio</th>
              <th class="head1">Stock</th>
              <th class="head1">Marca</th>
              <th class="head1">EDITAR</th>
            </tr>
          </thead>

          <tbody> -->
          <?php //while($row1=@mysql_fetch_array($res))
                  //   {$i++;
          ?>  

<!--               <tr class="gradeX">
                <td><?php //echo $row1[0]; ?></td>
                <td align="center"><?php //echo $row1[1]; ?></td>
                <td><?php //echo $row1[2]; ?></td>
                <td class="center"><?php //echo $row1[3]; ?></td>
                <td align="right"><?php //echo $row1[4]; ?></td>
                <td class="center"><?php //echo $row1[5]; ?></td>
                <td class="center"><?php //echo $row1[6]; ?></td>
                <td class="center">
                  <a href="#" onclick="G('<?=$pag_org?>?id=<?=$row1[0]?>&sw=2');">
                    <img src="images/icons/editor.png" alt="">&nbsp;Editar</a>  </td>
              </tr> -->
          <?php //} ?>    
<!--           </tbody>
        </table>
      </form> -->