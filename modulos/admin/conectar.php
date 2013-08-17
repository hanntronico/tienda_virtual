<?php

function Conectarse()
{
	if (!($enlace=mysql_connect("localhost","root","root")))
	{
	echo "ERROR EN LA CONEXION";
	exit();
	}
	if (!mysql_select_db("bdtienda",$enlace))
	{
	echo "EEROR EN LA CONEXION BD";
	exit();
	}
return $enlace;
}
?>
