<?php
session_start();
include("../conectar.php");
$link=Conectarse();

if($_POST["txtpasword"]!="" && $_POST["txtpws"]!="" ) 
		{
	if($_POST["txtpasword"] == $_POST["txtpws"] ) {
		$txtpasword=$_POST["txtpasword"];
		$sql="update usuario set clave='".$txtpasword."' where login='".$_SESSION["nomusuario"]."'";
		$sr=mysql_query($sql,$link) or die ("Error :$sql");
		header("location:../contenido.htm");
	}
	else
		{
		header("Location:cuenta_usu.php?error=U");
		}
	}
else{
	header("Location:cuenta_usu.php?error=V");
	}
?>