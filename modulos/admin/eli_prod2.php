<?php
session_start();
include("conectar.php");
$link=Conectarse();

// echo $_GET['sw'];
// echo $_GET['id'];

if ($_GET['sw']==1){
	// $_SESSION["ls_prod"][$_GET["id"]]=$_SESSION["ls_prod"][$_GET["id"]] + 1;
  unset($_SESSION["ls_prod"][$_GET["id"]]);
  unset($_SESSION["prec_prod"][$_GET["id"]]);

}

// exit();
// echo var_dump($_SESSION["ls_prod"]);

// $origen=$_SERVER['HTTP_REFERER'];
// header("location: compra.php");
// echo $_SESSION["ls_prod"][1];
// echo $_GET["id"];
?>
