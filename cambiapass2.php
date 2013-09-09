<?php 
	include("modulos/conectar.php");
  $link=Conectarse();
	
	// $_POST["txtnom"];
	// $_POST["txtape"];
	// $_POST["txtdni"];
	// $_POST["txtdirec"];
	// $_POST["txttelf"];
	// $_POST["txtemail"];

  $res=@mysql_query("set names utf8",$link);
  $row=@mysql_fetch_array($res);
  $sq="select * from usuario where clave='".md5($_POST["txtpassact"])."'";
  $res=mysql_query($sq,$link);
  $numfilas=mysql_num_rows($res);

  if ($numfilas>0) {
    $sq="UPDATE usuario SET clave = '".md5($_POST["txtnuevapass"])."' ".
                            "where cod_usuario =".$_POST["cod_usu"];
    // echo $sq;
    // exit();
    $res=mysql_query($sq,$link);
   }else{
    //********** no de encuentra usuario con clave actual ingresada ***************
    header("location:cuenta.php?deny=1");
    exit();
   } 


  // cod_usuario  login clave nombre  apellidos dni direccion telefono  correo  cod_nivel 
  header("location: modulos/usuario/");

?>