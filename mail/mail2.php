<?php
$onombre=$_POST['nombre'];
$omail=$_POST["email"];
$oasunto=$_POST["asunto"];
$omensaje=$_POST["mensaje"];

$mensaje="Mensaje desde la web<br>Nombre: "
		.$onombre. "<br>Email: "
		.$omail."<br>Asunto: "
		.$oasunto."<br><br>"
		.$omensaje;

$altmensaje="Mensaje desde la web
			 Nombre: ".$onombre. "
			 Email: ".$omail."
			 Asunto: ".$oasunto." ".$omensaje;



date_default_timezone_set('America/Lima');

require_once('clases/class.phpmailer.php');

$mail             = new PHPMailer(); // defaults to using php "mail()"

$body             = file_get_contents('contenido.html');
$body             = eregi_replace("[\]",'',$body);


$mail->AddReplyTo("gerencia@jabaanka.com","JABA ANKA Security SAC");
$mail->SetFrom('gerencia@jabaanka.com', 'JABA ANKA Security SAC');
$mail->AddReplyTo("gerencia@jabaanka.com","JABA ANKA Security SAC");
$address = "gerencia@jabaanka.com";
$mail->AddAddress($address, 'Webmaster');
$mail->Subject    = "JABA ANKA Security SAC Mensaje desde la Web";
$mail->AltBody    = "Para poder ver el mensaje, por favor use un visor de correos compatible con HTML!";
//$mail->AltBody    = "ADMIN To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
$mail->Body=$mensaje;
$mail->Send();

$mail->ClearAttachments();
$mail->ClearAddresses();
$mail->ClearReplyTos();



$mail->AddReplyTo("gerencia@jabaanka.com","JABA ANKA Security SAC");
$mail->SetFrom('gerencia@jabaanka.com', 'JABA ANKA Security SAC');
$mail->AddReplyTo("gerencia@jabaanka.com","JABA ANKA Security SAC");
$address = $omail;
$mail->AddAddress($address, $onombre);
$mail->Subject    = "Ud. se ha comunicado con JABA ANKA Security SAC";
$mail->AltBody    = "Para poder ver el mensaje, por favor use un visor de correos compatible con HTML!"; // optional, comment out and test
$mail->MsgHTML($body);


//$mail->AddAttachment("imagenes/rotulo2.jpg");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  //include ("enviado.php");
  header("location: ../contacto.php?m=1");
}

?>

