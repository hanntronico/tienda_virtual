<?php 
  session_start();
  $origen=$_SERVER['HTTP_REFERER'];
  include("conectar.php");
  $link=Conectarse();

  list($anio,$mes,$dia)=explode("/",$_POST["fec_em"]); 
  $fec_em = $dia."-".$mes."-".$anio;

  list($anio,$mes,$dia)=explode("/",$_POST["fec_vnc"]); 
  $fec_vnc = $dia."-".$mes."-".$anio;


	$consulta = "INSERT INTO compra 
							(cod_proveedor, 
							 fec_emision, 
							 fec_venc, 
							 cod_usuario, 
							 nro_comprobante) 
				 VALUES (".$_POST["codprov"].", '".
				 		   $fec_em."', '".
				 		   $fec_vnc."', ".
				 		   $_SESSION["s_cod"].", '".
				 		   $_POST["nro_comp"]."')" ;


	$rs2=mysql_query($consulta,$link) or die ("error : $consulta");

	$idcompra = mysql_insert_id();


	$k=$_SESSION["ls_prod"];
	 	if (count($k)>0)
		{
			foreach( $k as $key => $value ) 
			{
				$query="select * from producto where cod_producto=".$key;
				$res=mysql_query($query,$link);
				$row=mysql_fetch_array($res);


			  $total+=($_SESSION["ls_prod"][$key]*$_SESSION["prec_prod"][$key]);

			  $rs=mysql_query("SELECT * FROM compra WHERE cod_compra='".$idcompra."'",$link);
				$numfilas=mysql_num_rows($rs);

				if ($numfilas>0) {
					// cod_compra, cod_producto, cantidad, prec_unit, dscto, subtotal
					$sql="INSERT INTO DET_COMPRA() 
					      VALUES(".$idcompra.", ".$key.", ".$_SESSION["ls_prod"][$key].", ".sprintf("%01.2f", $_SESSION["prec_prod"][$key]).", 0, ".sprintf("%01.2f", ($_SESSION["ls_prod"][$key]*$_SESSION["prec_prod"][$key])).")";
					$rs=mysql_query($sql,$link) or die ("Error :$sql");

				}

				$stck = $row[5];
				$sql2="UPDATE producto SET stock = ".($stck+$_SESSION["ls_prod"][$key]).
				      " WHERE cod_producto =".$key;	
				// echo $sql2."<br>";
				// exit();      
				$rs3=mysql_query($sql2,$link) or die ("Error :$sql2"); 

  		}
			// echo $total;

		}	

	unset($_SESSION["ls_prod"]);	
	unset($_SESSION["prec_prod"]);	
	$msn='rc1';
	header('location: main_admin.php'.'?msn='.$msn)
?>