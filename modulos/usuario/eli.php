<?php
session_start();
$_SESSION["s_prod"][$_GET["idp"]]=0;
$origen=$_SERVER['HTTP_REFERER'];
header("location: ".$origen);
?>