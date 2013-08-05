<?php
session_start();
$origen=$_SERVER['HTTP_REFERER'];
$tipo=$_POST["accion"];

if ($tipo=="Seguir Comprando")
{
	header("location: principal.php");
	exit();
}


if ($tipo=="Recalcular")
{

	$k=$_POST["cantidad"];
	$pr=$_POST["cprod"];
	
	// echo $k[0]." ".$_SESSION["s_prod"][$pr[0]];
	// exit();
	
	for ($i=0;$i<count($k);$i++)
	{
		$_SESSION["s_prod"][$pr[$i]]=$k[$i];
	}
	// header("location: ".$origen."?sw=1");
	header("location: principal.php?sw=1");
}
else
{
  if ($tipo=="Proformar")
	  {
	   header("location: exeproforma.php");
	  }
  else
	  {	
	   // header("location: listar.php");
	   

	   header("location: principal.php?sw=2");
	  }
}


?>