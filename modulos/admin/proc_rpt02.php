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
      $sql="SELECT * FROM usuario WHERE cod_nivel=3";  
    }elseif ($_GET["band"]==2) {
      $sql="SELECT * FROM usuario_temporal WHERE cod_nivel=3 AND estado =1";  
    }elseif ($_GET["band"]==3) {
      $sql="SELECT u.*, count(*) as 'Nro de Compras' 
            FROM pedidos pe
            INNER JOIN usuario u
            ON pe.cod_usuario = u.cod_usuario
            WHERE pe.estado=4 GROUP BY 2 ORDER BY 7 DESC";
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
            <col class="con1" style="width: 5%"/>
            <col class="con1" style="width: 12%"/>
            <col class="con0" style="width: 12%" />
            <col class="con1" style="width: 8%" />
            <col class="con1" style="width: 30%" />
            <col class="con0" style="width: 8%" />
            <col class="con0" style="width: 8%" />

            <?php if ($_GET["band"]==3) { ?> <col class='con0' style='width: 8%' /> <?php } ?>
          
          </colgroup>
          <thead>
            <tr>
              <th class="head1">COD</th>
              <th class="head1">Nombres</th>
              <th class="head1">Apellidos</th>
              <th class="head1">DNI</th>
              <th class="head1">Dirección</th>
              <th class="head1">Teléfono</th>
              <th class="head1">Correo</th>
            <?php if ($_GET["band"]==3) { ?> <th class="head1">Nro de Compras</th> <?php } ?>  
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
                <td><?php echo $row1[3]; ?></td>
                <td><?php echo $row1[4]; ?></td>
                <td><?php echo $row1[5]; ?></td>
                <td><?php echo $row1[6]; ?></td>
                <td><?php echo $row1[7];?></td>
                <td><?php echo $row1[8]; ?></td>
                <?php if ($_GET["band"]==3) { 
                  echo "<td align='center'>".$row1[11]."</td>";
                  } 
                ?>  
              </tr>
          <?php } ?>    
          </tbody>
        </table>