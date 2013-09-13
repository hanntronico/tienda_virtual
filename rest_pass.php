<?php 
	$email = $_POST["email"];
	// echo "Correo: ".$email;


// $nom=$_POST["txtnombres"];
// $ape=$_POST["txtapellidos"];
// $dni=$_POST["txtdni"];
// $telf=$_POST["txttelf"];
// $email=$_POST["txtemail"];


include('modulos/conexion.php'); 
$obj = new clsConexion();

// $sql="select * from usuario_temporal where dni='".$dni."'";
// $obj-> abrirConexion();
// $obj-> setcharset();
// $rs = $obj->Query($sql);
// $filas = $obj->NumFilas($rs);
// // $row = $obj->FetchArray($rs);
// $obj-> CerrarConexion();

	// echo $sql;
	// echo $filas;

	// if ($filas==0) {
		
		// $sql="select * from usuario where dni='".$dni."'";
		// $obj-> abrirConexion();
		// $obj-> setcharset();
		// $rs = $obj->Query($sql);
		// $filas2 = $obj->NumFilas($rs);
		// // $row = $obj->FetchArray($rs);
		// $obj-> CerrarConexion();

			// if ($filas2==0) {
				
				$sql="select * from usuario where correo ='".$email."'";
				$obj-> abrirConexion();
				$obj-> setcharset();
				$rs = $obj->Query($sql);
				$filas3 = $obj->NumFilas($rs);
				// $row = $obj->FetchArray($rs);
				$obj-> CerrarConexion();

					if ($filas3>0) {
						
						$sql="select * from usuario where correo ='".$email."'";
						$obj-> abrirConexion();
						$obj-> setcharset();
						$rs = $obj->Query($sql);
						// $filas4 = $obj->NumFilas($rs);
						$row = $obj->FetchArray($rs);
						$obj-> CerrarConexion();
						
						// echo $row[3]." - ".$row[4]." - ".$row[8]." - ".$row[2];

						$nom = $row[3];
						$ape = $row[4];
						$email = $row[8];
						// $opass = $row[2];



									$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890123456789012345678901234567890";
									$cad = "";
									for($i=0;$i<5;$i++) {
									$cad .= substr($str,mt_rand(0,62),1);
									}
									$secpass = $cad;
									// echo $secpass;
									// exit();	

									// $sql="insert into usuario_temporal (clave, nombre, apellidos, dni, telefono, correo, cod_nivel, estado) 
									// 			  values ('".$secpass."', '".$nom."','".$ape."', '".$dni."', '".$telf."', '".$email."', 2, 1)";

									$sql="UPDATE usuario SET clave = MD5('".$secpass."') WHERE cod_usuario =".$row[0]." LIMIT 1" ;			  	

									// echo $sql."<br>".$secpass;
									// exit(); 			  	

									$obj-> abrirConexion();
									$obj-> setcharset();
									$rs = $obj->Query($sql);
									$obj-> CerrarConexion();






						$onombre=$nom." ".$ape;
						$omail=$email;
						$opass=$secpass;



					/***********************************************************************************/

					$mensaje="Mensaje: Solicitud de recuperación de contraseña desde la web".
					  "<br>"."Nombre: "
									.$onombre. "<br>Email: "
									.$omail;

					$mensaje2="<hr>Hola ".$onombre.","."<br><br>".
										"Hemos recibido tu solicitud de restablecimiento de contraseña"."<br>".
							      "Tu cuenta a sido restablecida con exito!"."<br>".
							      "Tu usuario es : <b>".$omail."</b><br>".
							      "Tu password es : ".$opass."</b><br><br>".
							      "Aprovecha ahora http://shop.grupochiappe.com/ y haz tu compras desde tu casa, con delivery directo a tu domicilio <hr>";

					date_default_timezone_set('America/Lima');

					require_once('mail/clases/class.phpmailer.php');

					$mail             = new PHPMailer();

					$body             = file_get_contents('mail/conten.php');
					$body             = eregi_replace("[\]",'',$body);


					$mail->AddReplyTo("no-reply@shop.grupochiappe.com","Mercado Virtual");
					$mail->SetFrom('no-reply@shop.grupochiappe.com', 'Mercado Virtual');
					$mail->AddReplyTo("no-reply@shop.grupochiappe.com","Mercado Virtual");
					$address = "no-reply@shop.grupochiappe.com";
					$mail->AddAddress($address, 'Webmaster');
					$mail->Subject    = "Mercado Virtual Mensaje desde la Web";
					$mail->AltBody    = "Para poder ver el mensaje, por favor use un visor de correos compatible con HTML!";
					$mail->Body=$mensaje;
					$mail->Send();

					$mail->ClearAttachments();
					$mail->ClearAddresses();
					$mail->ClearReplyTos();



					$mail->AddReplyTo("no-reply@shop.grupochiappe.com","Mercado Virtual");
					$mail->SetFrom('no-reply@shop.grupochiappe.com', 'Mercado Virtual');
					$mail->AddReplyTo("no-reply@shop.grupochiappe.com","Mercado Virtual");
					$address = $omail;
					$mail->AddAddress($address, $onombre);
					$mail->Subject = "Ud. se ha comunicado con Mercado Virtual";
					$mail->AltBody = "Para poder ver el mensaje, por favor use un visor de correos compatible con HTML!"; // optional, comment out and test
					                    //// $mail->MsgHTML($body);
					$mail->Body=$mensaje2;

					if(!$mail->Send()) {
					  echo "Mailer Error: " . $mail->ErrorInfo;
					} else {
					  header("location: aviso2.php");
					}


		} else {
			// Tiene cuenta REGISTRADA con ese CORREO
			header("location: index.php?deny=5");
			exit();
		}


			// }else{

			// 	//Tiene cuenta REGISTRADA con ese DNI
			// 	header("location: index.php?deny=2");
			// 	exit();
			// }

	// 	}elseif ($filas>0) {

	// 	// Tiene cuenta por VERIFICAR con ese DNI
	// 	header("location: index.php?deny=1");
	// 	exit();
	// }


 ?>