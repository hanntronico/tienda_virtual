<?php
session_start();
$tipago=$_POST["chktipago"];

// echo $_POST["txtrz"]." ".$_POST["txtruc"];
// exit();
// echo $_POST["swt"];
// exit();



// $fec_ent=strftime("%Y-%m-%d", $_POST["fecha"]);
// $fec_ent= $_POST["fecha"];
list($dia, $mes, $anio) = split('[/.-]', $_POST["fecha"]);
$fec_ent=$anio."-".$mes."-".$dia;

$grab = $_POST["grab_dir"];



$hora_ent=$_POST["cbohora"];
// $nom_ent= $_POST["txtnom"];

// $dir_ent=$_POST["txtdir"];

if ($_POST["swt"]=="F") {
	$tel_ent=$_POST["txttelf"];

	if ($_POST["dir_epec"]=="") {
		$dir_ent=$_POST["txtdir"];	
	}else{
		$dir_ent = $_POST["dir_epec"]." ".
	    		   $_POST["txtdir"]." - ".
			       $_POST["dir_zona"]." ".
				   $_POST["txtzona"];
	}	

}else{
	if ($_POST["swt"]=="V") {
		$tel_ent=$_POST["txttelf2"];
		$dir_ent = $_POST["dir_epec2"]." ".
				   $_POST["txtdir2"]." - ".
		   		   $_POST["dir_zona2"]." ".
		   		   $_POST["txtzona2"];
	}
}

if ($_POST["swtnom"]=="F") {
	$nom_ent= $_POST["txtnom"];
}else{
	$nom_ent= $_POST["txtnom2"];
}

// echo $dir_ent;
// exit ();

$rz_ent=$_POST["txtrz"];
$ruc_ent=$_POST["txtruc"];
$comp=$_POST["chkfac"];

// echo $_POST["swtnom"];
// echo $_POST["swt"];

// echo "Tipo de pago: ".$tipago."<br>";
// echo "Nombre de entrega: ".$nom_ent."<br>";
// echo "Dirección de entrega: ".$dir_ent."<br>";
// echo "Teléfono de entrega: ".$tel_ent."<br>";
// echo "Fecha de entrega: ".$fec_ent."<br>";
// echo "Hora de entrega: ".$hora_ent."<br>";
// echo "Razon social: ".$rz_ent."<br>";
// echo "RUC: ".$ruc_ent."<br>";
// echo "Comprobante: ".$comp."<br>";

// exit ();

date_default_timezone_set('America/Lima');


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
	$res=@mysql_query("set names utf8",$link);
	$row=@mysql_fetch_array($res);
	$rs=mysql_query("SELECT * FROM usuario WHERE cod_usuario='".$_SESSION["s_cod"]."'",$link);
	$rf=mysql_fetch_array($rs);


	$fecha=strftime("%Y-%m-%d %H:%M:%S", time());
	
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

// insert into pedidos(cod_usuario, fecpedido, tipo_pago, fec_entrega, hora_entrega, nom_entrega, direcc_entrega, comprob, rs_clie, ruc_clie, estado) values ('12','2013-09-11','E','11/9/2013','08:00','Lourdes Sofía Torres Gonzales','','B','', 0,1)

	// echo $sql1;
	// echo "<br>";
	// echo $tipago." ".$fec_ent." ".$hora_ent;
	// exit();	

	$res1=mysql_query($sql1,$link) or die ("Error insert pedido:$sql");
	// $row1=mysql_fetch_array($res1);
// :insert into det_pedidos() values ('104', '44', '6.26', '1', '6.26', '',1)
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

// cod_producto, descripcion, cod_tipo, precio, imagen, stock, cod_marca, prom
			// if ($row['igv']==1) {
			// }
			
			$sql="insert into det_pedidos() values ('".$idpedido."', '"
												  .$row[0]."', '"
												  .$row[3]."', '"
												  .$value."', '"
												  .($row[3]*$value)."', '"
												  ."',".$row['igv'].")";

				// echo $sql;
				// echo "<br>";
				// exit();
				$rs=mysql_query($sql,$link) or die ("Error insert det_pedido:$sql");
				
				


	// cod_usuario	login	clave	nombre	apellidos	dni	direccion	telefono	correo	cod_nivel				
	// echo $rf[0]." ".
	// 	 $rf[1]." ".
	// 	 $rf[2]." ".
	// 	 $rf[3]." ".
	// 	 $rf[4]." ".
	// 	 $rf[5]." ".
	// 	 $rf[6]." ".
	// 	 $rf[7]." ".
	// 	 $rf[8];

	// exit();


		}

		$idprod = $row[0]; 
		$stck = $row[5];
		$cant = $value;

		// echo $idprod." - ".$stck." - ".$cant;


		$sql2="UPDATE producto SET stock = ".($stck-$cant).
				      " WHERE cod_producto =".$idprod;	
		// echo $sql2."<br>";
		// exit();      
		$rs3=mysql_query($sql2,$link) or die ("Error update producto:$sql2");
	}
}

// exit();

if ($grab=="S") {
$sql4="UPDATE usuario SET direccion = '".$dir_ent."', telefono = '".$_POST["txttelf"]."'"." WHERE cod_usuario =".$_SESSION["s_cod"]." LIMIT 1";
// echo $sql;
// exit();
$rs4=mysql_query($sql4,$link) or die ("Error :$sql");
}

/*********************************  ENVIO DE CORREO  **************************************/
// $onombre=$rf[3]." ".$rf[4];
// $omail=$rf[8];
// // $opass=$secpass;


// $mensaje="Pedido ".$idpedido." realizado"."<br>".
// 		"Cliente :".$rf[0]."<br>".
// 		"Email: ".$omail."<br>".
// 		"Fecha de pedido: ".$fecha;

// $mensaje2="<hr>Saludos ".$onombre.","."<br><br>".
// 		  "Gracias por haber hecho tu compra en MERCADO VIRTUAL!"."<br>".
// 		  "Tu Pedido Nro: ".$idpedido." esta siendo procesado y ser&aacute atendido a la brevedad."."<br>"."Para ver el detalle de su pedido entre a <a href='http://shop.grupochiappe.com'>http://shop.grupochiappe.com</a> y acceda a su cuenta. <hr>";


// require_once('../../mail/clases/class.phpmailer.php');

// $mail             = new PHPMailer(); 
// $body             = file_get_contents('../../mail/conten.php');
// $body             = eregi_replace("[\]",'',$body);


// $mail->AddReplyTo("no-reply@shop.grupochiappe.com","Mercado Virtual");
// $mail->SetFrom('no-reply@shop.grupochiappe.com', 'Mercado Virtual');
// $mail->AddReplyTo("no-reply@shop.grupochiappe.com","Mercado Virtual");
// $address = "no-reply@shop.grupochiappe.com";
// $mail->AddAddress($address, 'Webmaster');
// $mail->Subject    = "Mercado Virtual Mensaje desde la Web";
// $mail->AltBody    = "Para poder ver el mensaje, por favor use un visor de correos compatible con HTML!";
// $mail->Body=$mensaje;
// $mail->Send();

// $mail->ClearAttachments();
// $mail->ClearAddresses();
// $mail->ClearReplyTos();



// $mail->AddReplyTo("no-reply@shop.grupochiappe.com","Mercado Virtual");
// $mail->SetFrom('no-reply@shop.grupochiappe.com', 'Mercado Virtual');
// $mail->AddReplyTo("no-reply@shop.grupochiappe.com","Mercado Virtual");
// $address = $omail;
// $mail->AddAddress($address, $onombre);
// $mail->Subject = "Ud. se ha comunicado con Mercado Virtual";
// $mail->AltBody = "Para poder ver el mensaje, por favor use un visor de correos compatible con HTML!";
// $mail->Body=$mensaje2;

// if(!$mail->Send()) {
//   echo "Mailer Error: " . $mail->ErrorInfo;
// } 
// // else {
// //   header("location: aviso.php");
// // }
/************************************************************************************/

unset($_SESSION["s_prod"]);
header("location: finalizado.php");
?>