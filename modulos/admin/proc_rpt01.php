<?php 
	include("funciones.php");
	include("conectar.php");
  	$link=Conectarse();

  	// list($dia,$mes,$anio)=explode("/",$_GET["fci"]); 
  	// echo $_GET["pr1"]."<br>";
  	$param1 = explode("%",$_GET["pr1"]);
  	
  	// echo count($param1);

  	if (count($param1)>1) {
  		// echo substr($param1[0], 0, -2);
  		for ($i=0; $i < count($param1); $i++) { 
  			// $prmt = $prmt." ".substr($param1[$i], 0, -2);
  			// echo substr($param1[$i], 0, -2);
  			$prmt = $prmt.str_replace("20", " ", $param1[$i]);
  		}
  	}else {
      $prmt = $_GET["pr1"];
    }


  	// echo $prmt;
  	// exit();

	list($dia,$mes,$anio)=explode("/",$_GET["fci"]); 
  	$fec_ini = $anio."-".$mes."-".$dia;

  	list($dia,$mes,$anio)=explode("/",$_GET["fcf"]); 
  	$fec_fin = $anio."-".$mes."-".$dia;

  	if ($_GET["pr1"]!="") {
  		$sql="select pe.cod_pedido, 
                   u.cod_usuario, 
                   concat(u.nombre, ' ', u.apellidos) as usuario, 
                   pe.fecpedido, 
                   pe.tipo_pago, 
                   pe.fec_entrega, 
                   pe.hora_entrega, 
                   pe.comprob, 
                   pe.rs_clie, 
                   pe.ruc_clie 
          from comprobante c inner join pedidos pe
          on c.cod_pedido = pe.cod_pedido
          inner join usuario u
          on pe.cod_usuario = u.cod_usuario
          where (concat(u.nombre, ' ', u.apellidos) like '".$prmt."%'
          or u.cod_usuario like '".$prmt."%')";
          // echo $sql; exit();
  	}

  	if ($_GET["fci"]!="" && $_GET["fcf"]!="") {
  		$sql="select pe.cod_pedido, 
                   u.cod_usuario, 
                   concat(u.nombre, ' ', u.apellidos) as usuario, 
                   pe.fecpedido, 
                   pe.tipo_pago, 
                   pe.fec_entrega, 
                   pe.hora_entrega, 
                   pe.comprob, 
                   pe.rs_clie, 
                   pe.ruc_clie 
            from comprobante c inner join pedidos pe
            on c.cod_pedido = pe.cod_pedido
            inner join usuario u
            on pe.cod_usuario = u.cod_usuario
            where pe.fecpedido between '".$fec_ini."' AND '".$fec_fin."'";
  	}

        $rs=@mysql_query("set names utf8",$link);
        $fila=@mysql_fetch_array($res);
                        
 
		// echo $sql;exit();

        $res=@mysql_query($sql,$link);
        $numfilas=@mysql_num_rows($res);
?>       

		<table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="listprod">
          <colgroup>
            <col class="con1" style="width: 5%"/>
            <col class="con1" style="width: 6%"/>
            <col class="con0" style="width: 40%" />
            <col class="con1" style="width: 10%" />
            <col class="con1" style="width: 8%" />
            <col class="con0" style="width: 8%" />
            <col class="con0" style="width: 8%" />
            <col class="con0" style="width: 8%" />
          </colgroup>
          <thead>
            <tr>
              <th class="head1">COD</th>
              <th class="head1">Cod. Us.</th>
              <th class="head1">Usuario</th>
              <th class="head1">Fecha Pedido</th>
              <th class="head1">Hora Pedido</th>
              <th class="head1">T. Pago</th>
              <th class="head1">Fec. Entrega</th>
              <th class="head1">Hora Entrega</th>
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
                <td align="center"><?php echo $row1[1]; ?></td>
                <td><?php echo $row1[2]; ?></td>
                <td><?php echo dma_shora($row1[3]); ?></td>
                <td><?php echo substr($row1[3], 11, 8); ?></td>
                <td><?php if ($row1[4]=="E") {
                	echo "Efectivo";
                }else {echo "Tarjeta";} ?></td>
                <td><?php echo dma_shora($row1[5]); ?></td>
                <td><?php echo $row1[6]; ?></td>
              </tr>
          <?php } ?>    
          </tbody>
        </table>





