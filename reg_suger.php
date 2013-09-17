<?php 
	include("modulos/conectar.php");
  $link=Conectarse();

  $res=@mysql_query("set names utf8",$link);
  $row=@mysql_fetch_array($res);
  $sq="insert into mensajes (nom_ape, email, mensaje) values('".$_POST["txtnomape"]."','".$_POST["txtemail"]."','".$_POST["txtmensaje"]."')";
  // $res=mysql_query($sq,$link);

  if (!mysql_query($sq,$link)) {
    header("location:sugerencias.php?deny=1");
    exit();
   } 

   header("location:sugerencias.php?msn=1");

?>