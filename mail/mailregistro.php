<?php
// $onombre=$_POST['nombre'];
// $omail=$_POST["email"];
// $oasunto=$_POST["asunto"];
// $omensaje=$_POST["mensaje"];

// $mensaje="Mensaje desde la web<br>Nombre: "
// 		.$onombre. "<br>Email: "
// 		.$omail."<br>Asunto: "
// 		.$oasunto."<br><br>"
// 		.$omensaje;

// $altmensaje="Mensaje desde la web
// 			 Nombre: ".$onombre. "
// 			 Email: ".$omail."
// 			 Asunto: ".$oasunto." ".$omensaje;


$onombre="Pedro Luis Bernal Almeyda";
$omail="pedro.bernal.84@gmail.com";
$opass="yd0YDjh";

// $oasunto=$_POST["asunto"];
// $omensaje=$_POST["mensaje"];

$mensaje="Mensaje desde la web<br>Nombre: "
		.$onombre. "<br>Email: "
		.$omail;

$mensaje2="<hr>Hola ".$onombre.","."<br><br>"."Queremos darte la bienvenida a MERCADO VIRTUAL!"."<br>".
		  "Tu usuario es : ".$omail."<br>".
		  "Tu password es : ".$opass."<br><br>".
		  "Entra ya a http://shop.grupochiappe.com/ y haz tu compras desde tu casa, con delivery directo a tu domicilio <hr>";

// echo $mensaje2;
// exit();

date_default_timezone_set('America/Lima');

require_once('clases/class.phpmailer.php');

$mail             = new PHPMailer(); // defaults to using php "mail()"

$body             = file_get_contents('conten.php');
$body             = eregi_replace("[\]",'',$body);


$mail->AddReplyTo("no-reply@shop.grupochiappe.com","Mercado Virtual");
$mail->SetFrom('no-reply@shop.grupochiappe.com', 'Mercado Virtual');
$mail->AddReplyTo("no-reply@shop.grupochiappe.com","Mercado Virtual");
$address = "no-reply@shop.grupochiappe.com";
$mail->AddAddress($address, 'Webmaster');
$mail->Subject    = "Mercado Virtual Mensaje desde la Web";
$mail->AltBody    = "Para poder ver el mensaje, por favor use un visor de correos compatible con HTML!";
//$mail->AltBody    = "ADMIN To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
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
$mail->Subject    = "Ud. se ha registrado en Mercado Virtual";
$mail->AltBody    = "Para poder ver el mensaje, por favor use un visor de correos compatible con HTML!"; // optional, comment out and test
$mail->Body=$mensaje2;
// $mail->MsgHTML($body);


//$mail->AddAttachment("imagenes/rotulo2.jpg");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  //include ("enviado.php");
  header("location: ../contacto.php?m=1");
}

?>

