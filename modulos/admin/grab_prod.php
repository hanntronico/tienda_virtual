<?php
	include("funciones/function.php");
	include("conectar.php");
	$link=Conectarse();
	$loc="location: ".$_POST["pag"].".php";

	// echo $_POST["pag"];
	// exit();

	switch ($_POST["pag"]) {
		

case 'inc_prod':

	if($_POST["sw"]==1){
			
	$rs=mysql_query("SELECT * FROM producto WHERE cod_producto='".$_POST["id"]."'",$link);
	$numfilas=mysql_num_rows($rs);
			
			$temporal=$_FILES['imag']['tmp_name'];
			$nombre=$_FILES['imag']['name'];
			
			move_uploaded_file($temporal,"../productos/".$nombre);
			   
			if ($nombre=="")
			  {   
			   $nombre ="no_image.png";
			  }

			$rs=@mysql_query("set names utf8",$link);
			$fila=@mysql_fetch_array($rs);

			mysql_query("INSERT INTO producto (descripcion, cod_subcat, precio, imagen, stock, cod_marca, estado, igv)
						 VALUES('".$_POST["des"]."','" 
								  .$_POST["codcat"]."','"
								  .$_POST["pre"]."','"
								  .$nombre."','"
								  .$_POST["stock"]."','"
								  .$_POST["codmarca"]."', 1, 1)",$link);
			$msn='p1';
	
			}	
			elseif($_POST["sw"]==2){


			   $temporal=$_FILES['imag']['tmp_name'];
			   $nombre=$_FILES['imag']['name'];
			   
			   $ruta=$nombre;
			   
			   if ($nombre =="")
				{
				 $ruta=$_POST["imgDef"];
				}
			
			   move_uploaded_file($temporal,"../productos/".$nombre);
	
				$rs=@mysql_query("set names utf8",$link);
				$fila=@mysql_fetch_array($rs);
				
				mysql_query("UPDATE producto SET descripcion='".$_POST["des"].
											 "', cod_subcat='".$_POST["codcat"].
											 "', precio='".$_POST["pre"].
											 "', imagen='".$ruta.
											 "', stock='".$_POST["stock"].
											 "', cod_marca='".$_POST["codmarca"].
											 "' WHERE cod_producto=".$_POST["id"],$link);
				$msn='p1';
	
	
			}else{
				$numreg=count($_POST["check"]);
				for ($i=0;$i<=$numreg-1;$i++){
								
					if($numfilas==0 && $numfilas1==0 ){
						mysql_query("DELETE FROM producto WHERE cod_producto='".$_POST["check"][$i]."'",$link);
						
					}
				}
				$msn='e1';
			}
			break;
									
	}
	// header($loc) 
	header('location: prod.php'.'?msn='.$msn)
?>