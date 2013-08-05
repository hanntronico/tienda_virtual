<?php
session_start();

		
unset($_SESSION["s_prod"]);
unset($_SESSION["boton"]);
unset($_SESSION["boton2"]);

	header("Location:ver.php");

?>