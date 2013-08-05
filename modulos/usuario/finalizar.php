<?php
session_start();
$tipago=$_POST["chktipago"];
$fec_ent=$_POST["fecha"];
$hora_ent=$_POST["cbohora"];
$nom_ent= $_POST["txtnom"];
$dir_ent=$_POST["txtdir"];
$rz_ent=$_POST["txtrz"];
$ruc_ent=$_POST["txtruc"];
$comp=$_POST["chkfac"];




function autogenerado($tabla,$campocodigo,$numcaracteres){
Global $link;
	//para extraer de la derecha se multiplica por -1
	$numcaracteres=$numcaracteres*(-1);
	$rsTabla=mysql_query("select count($campocodigo) from $tabla",$link);
	$ATabla=mysql_fetch_array($rsTabla);
	$nreg=$ATabla[0];
	if($nreg>0)	{
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


include("../conectar.php");
$link=Conectarse();
$k=$_SESSION["s_prod"];
$total=0;
$id=autogenerado("pedidos","cod_pedido",6); 
if (count($k)>0)
{

// cod_pedido	cod_usuario		fecpedido	tipo_pago	fec_entrega		hora_entrega	nom_entrega
// direcc_entrega		comprob		rs_clie		ruc_clie	estado
	
	$rs=mysql_query("SELECT * FROM usuario WHERE cod_usuario='".$_SESSION["s_cod"]."'",$link);

	$fecha=strftime("%Y-%m-%d", time());
	
	if ($comp == "") {
		$comp = "B";
		$rz_ent = "";
		$ruc_ent = 0;
	}

	$res=@mysql_query("set names utf8",$link);
	$row=@mysql_fetch_array($res);

	$sql1 = "insert into pedidos(cod_usuario, fecpedido, tipo_pago, fec_entrega, hora_entrega, nom_entrega, direcc_entrega, comprob, rs_clie, ruc_clie, estado) 
		values ('".$_SESSION["s_cod"]."','"
				  .$fecha."','"
				  .$tipago."','"
				  .$fec_ent."','"
				  .$hora_ent."','"
				  .$nom_ent."','"
				  .$dir_ent."','"
				  .$comp."','"
				  .$rz_ent."', ".$ruc_ent.","."1)";

	// echo $sql1;
	// echo "<br>";
	// echo $tipago." ".$fec_ent." ".$hora_ent;
	// exit();	

	$res1=mysql_query($sql1,$link);
	// $row1=mysql_fetch_array($res1);

	$idpedido = mysql_insert_id();

	foreach( $k as $key => $value ) 
	{
	$res=mysql_query("select * from producto where cod_producto=".$key."",$link);
	$row=mysql_fetch_array($res);
	$total+=($row[3]*$value);
		if ($value<>0)
		{
			$rs=mysql_query("SELECT * FROM pedidos WHERE cod_pedido='".$id."'",$link);
			$numfilas=mysql_num_rows($rs);

			// $fecha=strftime("%Y-%m-%d", time());  
			// cod_pedido	cod_producto	precio 	cantidad	subtotal	dscto  

// cod_producto	descripcion	cod_tipo	precio	imagen	stock	cod_marca	prom
			
			$sql="insert into det_pedidos() values ('".$idpedido."', '"
												  .$row[0]."', '"
												  .$row[3]."', '"
												  .$value."', '"
												  .($row[3]*$value)."', '"
												  ."')";

				// echo $sql;
				// echo "<br>";
				// echo $tipago." ".$fec_ent." ".$hora_ent;
				// exit();
				
				$rs=mysql_query($sql,$link) or die ("Error :$sql");
		}
	}
}
unset($_SESSION["s_prod"]);
header("location: principal.php?sw=3");
?>