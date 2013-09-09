<?php 
session_start();
if (!isset($_SESSION["s_cod"]))
{
	header("location: ../../");
	exit;
}
if (!isset($_SESSION["s_tipo"]))
{
	header("location: ../../");
	exit;
}
if (!isset($_SESSION["s_solonom"]))
{
	header("location: ../../");
	exit;
}
if (!isset($_SESSION["s_nombreC"]))
{
	header("location: ../../");
	exit;
}

include("../conectar.php");
$link=Conectarse();

$consul="select dni from usuario where cod_usuario=".$_SESSION["s_cod"];
// echo $consul;
$rsa=mysql_query($consul,$link);
$rwa=mysql_fetch_array($rsa);

$dni = $rwa[0];

$consul="select clave from usuario where dni=".$dni;
// echo $consul;
$rs01=mysql_query($consul,$link);
$rw1=mysql_fetch_array($rs01);

$consul="select clave from usuario_temporal where dni=".$dni;
// echo $consul;
$rs02=mysql_query($consul,$link);
$rw2=mysql_fetch_array($rs02);

if ($rw1[0] == md5($rw2[0])) {
	header("location: ../../cpass.php");
	exit;
	// echo "hanntronico";
}

?>