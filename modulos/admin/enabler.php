<?php 
  	$origen=$_SERVER['HTTP_REFERER'];
  	include("conectar.php");
  	$link=Conectarse();

  	// echo $_GET["id"];
  	// echo $_GET["pag"];
  	// exit();
  	
  	switch ($_GET["pag"]) {
  		
  		case 'productos':
		  	$consulta = "UPDATE producto SET estado=1 where cod_producto = ".$_GET["id"];
			  $rs2=mysql_query($consulta,$link) or die ("error : $consulta");
        $msn='d1';
  		break;

      case 'product2':
        $consulta = "UPDATE producto SET estado=2 where cod_producto = ".$_GET["id"];
        $rs2=mysql_query($consulta,$link) or die ("error : $consulta");
        $msn='dpr1';
      break;

      case 'productigv':
        $consulta = "UPDATE producto SET igv=1 where cod_producto = ".$_GET["id"];
        $rs2=mysql_query($consulta,$link) or die ("error : $consulta");
        $msn='igv1';
      break;

  		case 'usuarios':
		  	$consulta = "UPDATE usuario SET estado=1 where cod_usuario = ".$_GET["id"];
        $rs2=mysql_query($consulta,$link) or die ("error : $consulta");
        $msn='ud1';
  		break;

  	}
    header('location: main_admin.php'.'?msn='.$msn)
?>