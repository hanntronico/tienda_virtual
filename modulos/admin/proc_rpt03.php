<?php 
	include("funciones.php");
	include("conectar.php");
  	$link=Conectarse();

  	// list($dia,$mes,$anio)=explode("/",$_GET["fci"]); 
    // echo $_GET["pr1"]."<br>";
  	// echo $_GET["band"]."<br>";exit();

  	$param1 = explode("%",$_GET["pr1"]);
  	// echo count($param1);
  	if (count($param1)>1) {
  		// echo substr($param1[0], 0, -2);
  		for ($i=0; $i < count($param1); $i++) { 
  			// $prmt = $prmt." ".substr($param1[$i], 0, -2);
  			// echo substr($param1[$i], 0, -2);
  			$prmt = $prmt.str_replace("20", " ", $param1[$i]);
  		}
  	}
  	// echo $prmt;
  	// exit();

	list($dia,$mes,$anio)=explode("/",$_GET["fci"]); 
  	$fec_ini = $anio."-".$mes."-".$dia;

  	list($dia,$mes,$anio)=explode("/",$_GET["fcf"]); 
  	$fec_fin = $anio."-".$mes."-".$dia;

    if ($_GET["band"]==1) {
      $sql="SELECT p.cod_producto, 
                   concat('<img src=../productos/',p.imagen,' width=50 height=50>') as Img,
                   p.descripcion,
                   p.precio,
                   p.stock, 
                   count(dp.cod_producto) as Total
            FROM pedidos pe LEFT JOIN det_pedidos dP
            ON pe.cod_pedido = dp.cod_pedido
            INNER JOIN producto p 
            ON dp.cod_producto = p.cod_producto
            WHERE pe.estado=4
            GROUP BY 1
            ORDER BY Total DESC";

    }elseif ($_GET["band"]==2) {
      $sql="SELECT p.cod_producto, 
                   concat('<img src=../productos/',p.imagen,' width=50 height=50>') as img,
                   p.descripcion,
                   p.precio,
                   p.stock,
                   m.desc_marca
            FROM producto p INNER JOIN marca m
            ON p.cod_marca = m.cod_marca
            WHERE stock = 0";

    }elseif ($_GET["band"]==3) {
      $sql="SELECT p.cod_producto, 
                   concat('<img src=../productos/',p.imagen,' width=50 height=50>') as img,
                   p.descripcion,
                   p.precio,
                   p.stock,
                   m.desc_marca
            FROM producto p INNER JOIN marca m
            ON p.cod_marca = m.cod_marca
            WHERE stock <= 35
            ORDER BY stock";
    }

  	// if ($_GET["pr1"]!="") {
  	// 	$sql="select pe.cod_pedido, 
   //            u.cod_usuario,
   //            concat(u.nombre, ' ', u.apellidos) as usuario,
   //            pe.fecpedido, 
   //            pe.tipo_pago, 
   //            pe.fec_entrega, 
   //            pe.hora_entrega, 
   //            pe.comprob, 
   //            pe.rs_clie, 
   //            pe.ruc_clie 
   //            from pedidos pe inner join usuario u on pe.cod_usuario = u.cod_usuario 
   //            where pe.estado = 2 
   //            and (concat(u.nombre, ' ', u.apellidos) like '".$_GET["pr1"]."%'
   //            or u.cod_usuario like '".$_GET["pr1"]."%')";
   //            // echo $sql; exit();
  	// }

  	// if ($_GET["fci"]!="" && $_GET["fcf"]!="") {
  	// 	$sql="select pe.cod_pedido, 
   //            u.cod_usuario,
   //            concat(u.nombre, ' ', u.apellidos) as usuario, 
   //            pe.fecpedido, 
   //            pe.tipo_pago, 
   //            pe.fec_entrega, 
   //            pe.hora_entrega, 
   //            pe.comprob, 
   //            pe.rs_clie, 
   //            pe.ruc_clie 
   //            from pedidos pe inner join usuario u on pe.cod_usuario = u.cod_usuario 
   //            where pe.estado = 2 
   //            and pe.fecpedido between '".$fec_ini."' AND '".$fec_fin."'";
  	// }

// cod_usuario login clave nombre  apellidos dni direccion telefono  correo  cod_nivel estado

       
        $rs=@mysql_query("set names utf8",$link);
        $fila=@mysql_fetch_array($rs);
                        
 
		// echo $sql;exit();

        $res=@mysql_query($sql,$link);
        $numfilas=@mysql_num_rows($res);
?>       

		<table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="listprod">
          <colgroup>
<!-- cod_producto, imagen, descripcion, precio, stock, Total -->
            <col class="con1" style="width: 2%"/>
            <col class="con1" style="width: 4%"/>
            <col class="con0" style="width: 60%" />
            <col class="con1" style="width: 8%" />
            <col class="con1" style="width: 8%" />
            <col class="con0" style="width: 8%" />
            <!-- <col class="con0" style="width: 8%" /> -->

            <?php //if ($_GET["band"]==3) { ?> <!-- <col class='con0' style='width: 8%' /> --> 
            <?php // } ?>
          
          </colgroup>
          <thead>
            <tr>
              <th class="head1">COD</th>
              <th class="head1">IMAGEN</th>
              <th class="head1">DESCRIPCION</th>
              <th class="head1">PRECIO</th>
              <th class="head1">STOCK</th>
              <th class="head1">
                <?php 
                  if ($_GET["band"]==1) {echo "TOTAL";}
                  elseif ($_GET["band"]>=2) {echo "MARCA";}
                 ?>
              </th>
              <!-- <th class="head1">Correo</th> -->
            <?php //if ($_GET["band"]==3) { ?> <!-- <th class="head1">Nro de Compras</th> --> 
            <?php //} ?>  
            </tr>
          </thead>

          <tbody>
          	<tr>
          		<tr colspan="7">Resultado: <?php echo $numfilas;?> registros encontrados.</tr>
          	</tr>
          <?php while($row1=@mysql_fetch_array($res))
                  {$i++;
          ?>  
            <tr class="gradeX">
                <td align="center"><?php echo $row1[0]; ?></td>
                <td><?php echo $row1[1]; ?></td>
                <td><?php echo $row1[2]; ?></td>
                <td align="center"><?php echo $row1[3]; ?></td>
                <td align="center"><?php echo $row1[4]; ?></td>
                <td align="center"><?php echo $row1[5];?></td>
                <!-- <td><?php //echo $row1[8]; ?></td> -->
                <?php 
                // if ($_GET["band"]==3) { 
                //   echo "<td align='center'>".$row1[11]."</td>";
                //   } 
                ?>  
              </tr>
          <?php } ?>    
          </tbody>
        </table>