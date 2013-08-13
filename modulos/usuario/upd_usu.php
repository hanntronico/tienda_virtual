<?php 
	include("../conectar.php");
  $link=Conectarse();
	
  
	// $_POST["txtnom"];
	// $_POST["txtape"];
	// $_POST["txtdni"];
	// $_POST["txtdirec"];
	// $_POST["txttelf"];
	// $_POST["txtemail"];

  $res=@mysql_query("set names utf8",$link);
  $row=@mysql_fetch_array($res);
  // cod_usuario	login	clave	nombre	apellidos	dni	direccion	telefono	correo	cod_nivel 
  $sq="UPDATE usuario SET nombre = '".$_POST["txtnom"]."', ".
  								       "apellidos = '".$_POST["txtape"]."', ".	
  								       "dni = '".$_POST["txtdni"]."', ".	
  								       "direccion = '".$_POST["txtdirec"]."', ".	
  								       "telefono = '".$_POST["txttelf"]."', ".	
  								       "correo = '".$_POST["txtemail"]."' ".	
  											 "where cod_usuario =".$_POST["cod_usu"];
  // echo $sq;
  // exit();
  $res=mysql_query($sq,$link);
	header("location:cuenta.php?sw=1");

?>