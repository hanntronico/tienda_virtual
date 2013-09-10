<?php

function Conectarse()
{
	if (!($enlace=mysql_connect("localhost","shopgrup_usu078","*gp@123*")))
	{
	echo "ERROR EN LA CONEXION";
	exit();
	}
	if (!mysql_select_db("shopgrup_tienda",$enlace))
	{
	echo "EEROR EN LA CONEXION BD";
	exit();
	}
return $enlace;
}
?>
