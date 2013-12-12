<?php 
	include("../conectar.php");
  $link=Conectarse();

  $fec_liq = date("Y-m-d H:i:s");
  $res=@mysql_query("set names utf8",$link);
  $row=@mysql_fetch_array($res);
  $sq="insert into mensajes (nom_ape, email, fec_mens, mensaje) values('".$_POST["txtnomape"]."','".$_POST["txtemail"]."','".$fec_liq."','".$_POST["txtmensaje"]."')";
  // $res=mysql_query($sq,$link);

  if (!mysql_query($sq,$link)) {
    header("location:sugerencias.php?deny=1");
    exit();
   } 

   header("location:sugerencias.php?msn=1");

?>