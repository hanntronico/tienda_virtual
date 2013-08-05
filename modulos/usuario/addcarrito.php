<?php
session_start();
$_SESSION["s_prod"][$_GET["id"]]=$_SESSION["s_prod"][$_GET["id"]] + 1;
$origen=$_SERVER['HTTP_REFERER'];
header("location: ".$origen);
?>