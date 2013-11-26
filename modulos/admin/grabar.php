<?php
	include("funciones/function.php");
	include("conectar.php");
	$link=Conectarse();
	$loc="location: ".$_POST["pag"].".php";

	switch ($_POST["pag"]) {
		
		case 'usuario':
			if($_POST["sw"]==1){
			
			$rs=mysql_query("SELECT * FROM usuario WHERE login='".$_POST["login"]."'",$link);
			$numfilas=mysql_num_rows($rs);
			
		
			if($numfilas == 0 ){
				
				mysql_query("INSERT INTO usuario( nombre, apellidos,dni, direccion, telefono, correo, login, clave, cod_nivel) VALUES('".$_POST["nom"]."','".$_POST["ape"]."','".$_POST["dni"]."','".$_POST["dir"]."','".$_POST["tel"]."','".$_POST["email"]."','".$_POST["login"]."','".$_POST["pwd"]."','".$_POST["codniv"]."')",$link);				
				}
			else
			{ 
			
			$msg_error="Login ya existe, intente otro...";
			
			 }
			}elseif($_POST["sw"]==2){

				mysql_query("UPDATE usuario SET nombre='".$_POST["nom"]."', apellidos='".$_POST["ape"]."', dni='".$_POST["dni"]."', direccion='".$_POST["dir"]."', telefono='".$_POST["tel"]."', correo='".$_POST["email"]."', login='".$_POST["login"]."',clave='".$_POST["pwd"]."',cod_nivel='".$_POST["codniv"]."' WHERE cod_usuario='".$_POST["id"]."'",$link);
	
			}else{
				$numreg=count($_POST["check"]);
				for ($i=0;$i<=$numreg-1;$i++){
						mysql_query("DELETE FROM usuario WHERE cod_usuario='".$_POST["check"][$i]."'",$link);
				}
			}
			break;
				
/**********************************************************************************************************************************************/

case 'productos':

	if($_POST["sw"]==1){
			
	$rs=mysql_query("SELECT * FROM producto WHERE cod_producto='".$_POST["id"]."'",$link);
	$numfilas=mysql_num_rows($rs);
			
			//move_uploaded_file($_FILES[imag][tmp_name],"Productos/img".$_POST["id"].".jpg");

			$temporal=$_FILES['imag']['tmp_name'];
			$nombre=$_FILES['imag']['name'];
			
			move_uploaded_file($temporal,"../productos/".$nombre);
			   
			if ($nombre=="")
			  {   
			   $nombre ="no_image.png";
			  }

			/*			move_uploaded_file($_FILES[imag][tmp_name],"../../imagenes/Productos/img".$_POST["id"]);*/
			// cod_producto, descripcion, cod_subcat, precio, imagen, stock, cod_marca, prom			
	
			$rs=@mysql_query("set names utf8",$link);
			$fila=@mysql_fetch_array($rs);

			mysql_query("INSERT INTO producto (descripcion, cod_subcat, precio, imagen, stock, cod_marca) 
						 VALUES('".$_POST["des"]."','" 
								  .$_POST["codcat"]."','"
								  .$_POST["pre"]."','"
								  .$nombre."','"
								  .$_POST["stock"]."','"
								  .$_POST["codmarca"]."')",$link);
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
	
	//move_uploaded_file($_FILES[imag][tmp_name],"../../imagenes/Productos/img".$_POST["id"].".jpg");
	
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


/************************************************************************************************************************************************/


case 'proveedores':

	if($_POST["sw"]==1){
			
	$rs=mysql_query("SELECT * FROM proveedor WHERE cod_proveedor='".$_POST["id"]."'",$link);
	$numfilas=mysql_num_rows($rs);

// cod_proveedor, razon_social, ruc, direccion, distrito, agent_percep 
			
			//move_uploaded_file($_FILES[imag][tmp_name],"Productos/img".$_POST["id"].".jpg");

			// $temporal=$_FILES['imag']['tmp_name'];
			// $nombre=$_FILES['imag']['name'];
			
			move_uploaded_file($temporal,"../productos/".$nombre);
			   
			// if ($nombre=="")
			//   {   
			//    $nombre ="no_image.png";
			//   }
		
			$rs=@mysql_query("set names utf8",$link);
			$fila=@mysql_fetch_array($rs);

			if ($_POST["agp"]=="on") {
				$sagp = 1;
			}else {$sagp = 0;}

			mysql_query("INSERT INTO proveedor (razon_social, ruc, direccion, distrito, agent_percep) VALUES('".$_POST["rzs"]."','" 
							      	   .$_POST["ruc"]."','"
								       .$_POST["dir"]."','"
								  	   .$_POST["dist"]."',"
								  	   .$sagp.")",$link);

			$msn='pr1';
	
			}	
			elseif($_POST["sw"]==2){


			 //   $temporal=$_FILES['imag']['tmp_name'];
			 //   $nombre=$_FILES['imag']['name'];
			   
			 //   $ruta=$nombre;
			   
			 //   if ($nombre =="")
				// {
				//  $ruta=$_POST["imgDef"];
				// }
			
			   // move_uploaded_file($temporal,"../productos/".$nombre);
	
				$rs=@mysql_query("set names utf8",$link);
				$fila=@mysql_fetch_array($rs);
				
				if ($_POST["agp"]=="on") {
					$sagp = 1;
				}else {$sagp = 0;}

				mysql_query("UPDATE proveedor SET razon_social='".$_POST["rzs"].
											 "', ruc='".$_POST["ruc"].
											 "', direccion='".$_POST["dir"].
											 "', distrito='".$_POST["dist"].
											 "', agent_percep=".$sagp.
											 " WHERE cod_proveedor=".$_POST["id"],$link);
				$msn='pr1';
	
	//move_uploaded_file($_FILES[imag][tmp_name],"../../imagenes/Productos/img".$_POST["id"].".jpg");
	
			}else{
				$numreg=count($_POST["check"]);
				for ($i=0;$i<=$numreg-1;$i++){
								
					if($numfilas==0 && $numfilas1==0 ){
						mysql_query("DELETE FROM proveedor WHERE cod_proveedor='".$_POST["check"][$i]."'",$link);

						
					}
				}
				$msn='epr1';
			}
			break;


/************************************************************************************************************************************************/



case 'marca':
			if($_POST["sw"]==1){
			
			$rs=mysql_query("SELECT * FROM marca WHERE desc_marca='".$_POST["desm"]."'",$link);
			$numfilas=mysql_num_rows($rs);
			
//		cod_marca  desc_marca  img_marca
// id
// desm
// imag
			if($numfilas == 0 ){

				$temporal=$_FILES['imag']['tmp_name'];
				$nombre=$_FILES['imag']['name'];
				
				move_uploaded_file($temporal,"../productos/marcas/".$nombre);
				   
				if ($nombre=="")
				  {   
				   $nombre ="no_image.png";
				  }
				
				$rs=@mysql_query("set names utf8",$link);
				$fila=@mysql_fetch_array($rs);

				mysql_query("INSERT INTO marca(desc_marca, img_marca) 
							VALUES('".$_POST["desm"]."','".$nombre."')",$link);	
				$msn='m1';			
				}
			else
			{ 
			
			// $msg_error="Login ya existe, intente otro...";
			$msn="em2";
			 }
			}elseif($_POST["sw"]==2){


			   $temporal=$_FILES['imag']['tmp_name'];
			   $nombre=$_FILES['imag']['name'];
			   
			   $ruta=$nombre;
			   
			   if ($nombre =="")
				{
				 $ruta=$_POST["imgDef"];
				}
			
			  move_uploaded_file($temporal,"../productos/marcas/".$nombre);
	
				$rs=@mysql_query("set names utf8",$link);
				$fila=@mysql_fetch_array($rs);

				mysql_query("UPDATE marca SET desc_marca='".$_POST["desm"]
					."', img_marca='".$ruta
					."' WHERE cod_marca='".$_POST["id"]."'",$link);

				$msn='m1';
	
			}else{
				$numreg=count($_POST["check"]);
				for ($i=0;$i<=$numreg-1;$i++){
						mysql_query("DELETE FROM marca WHERE cod_marca='".$_POST["check"][$i]."'",$link);
				}
				$msn='em1';
			}
			break;


/************************************************************************************************************************************************/

case 'subcategorias':
			if($_POST["sw"]==1){
			
			$rs=mysql_query("SELECT * FROM subcategorias WHERE subcat='".$_POST["nomc"]."'",$link);
			$numfilas=@mysql_num_rows($rs);
			

// cod_subcat, subcat, desc_subcat, img_subcat, cod_tipo	
		
			if($numfilas == 0 ){
				$temporal=$_FILES['imag']['tmp_name'];
				$nombre=$_FILES['imag']['name'];
				
				move_uploaded_file($temporal,"../productos/subcategorias/".$nombre);
				   
				if ($nombre=="")
				  {   
				   $nombre ="no_image.png";
				  }
				
				$rs=@mysql_query("set names utf8",$link);
				$fila=@mysql_fetch_array($rs);

				mysql_query("INSERT INTO subcategorias (subcat, desc_subcat, img_subcat, cod_tipo) 
							VALUES('".$_POST["nomc"]."','".$_POST["des"]."','".$nombre."','".$_POST["codcat"]."')",$link);	
				$msn='s1';			
				}
			else
			{ 
			
			// $msg_error="Login ya existe, intente otro...";
			$msn="e2";
			
			 }
			}elseif($_POST["sw"]==2){

			   $temporal=$_FILES['imag']['tmp_name'];
			   $nombre=$_FILES['imag']['name'];
			   
			   $ruta=$nombre;
			   
			   if ($nombre =="")
				{
				 $ruta=$_POST["imgDef"];
				}
			
			  move_uploaded_file($temporal,"../productos/subcategorias/".$nombre);
	
				$rs=@mysql_query("set names utf8",$link);
				$fila=@mysql_fetch_array($rs);
	

				mysql_query("UPDATE subcategorias SET subcat='".$_POST["nomc"].
								 "', desc_subcat='".$_POST["des"].
								 "', img_subcat='".$ruta.
								 "', cod_tipo='".$_POST["codcat"].
								 "' WHERE cod_subcat=".$_POST["id"],$link);
				$msn='s1';

			}else{
				$numreg=count($_POST["check"]);
				for ($i=0;$i<=$numreg-1;$i++){
				mysql_query("DELETE FROM subcategorias WHERE cod_subcat='".$_POST["check"][$i]."'",$link);
				}
				$msn='es1';
			}
			break;



/************************************************************************************************************************************************/

case 'categoria':
			if($_POST["sw"]==1){
			
			$rs=mysql_query("SELECT * FROM categoria WHERE tipo='".$_POST["tipo"]."'",$link);
			$numfilas=@mysql_num_rows($rs);
			

		// cod_tipo, tipo, descripcion, imgcat
		
			if($numfilas == 0 ){
				$temporal=$_FILES['imag']['tmp_name'];
				$nombre=$_FILES['imag']['name'];
				
				move_uploaded_file($temporal,"../productos/categorias/".$nombre);
				   
				if ($nombre=="")
				  {   
				   $nombre ="no_image.png";
				  }
				
				$rs=@mysql_query("set names utf8",$link);
				$fila=@mysql_fetch_array($rs);

				mysql_query("INSERT INTO categoria (tipo, descripcion, imgcat) 
							VALUES('".$_POST["tipo"]."','".$_POST["des"]."','".$nombre."')",$link);	
				$msn='c1';						
				}
			else
			{ 
			
			// $msg_error="Login ya existe, intente otro...";
			$msn="ec2";	
			
			 }
			}elseif($_POST["sw"]==2){

			   $temporal=$_FILES['imag']['tmp_name'];
			   $nombre=$_FILES['imag']['name'];
			   
			   $ruta=$nombre;
			   
			   if ($nombre =="")
				{
				 $ruta=$_POST["imgDef"];
				}
			
			  move_uploaded_file($temporal,"../productos/categorias/".$nombre);
	
				$rs=@mysql_query("set names utf8",$link);
				$fila=@mysql_fetch_array($rs);
	
				mysql_query("UPDATE categoria SET tipo='".$_POST["tipo"].
								 "', descripcion='".$_POST["des"].
								 "', imgcat='".$ruta.
								 "' WHERE cod_tipo=".$_POST["id"],$link);
				$msn='c1';

			}else{
				$numreg=count($_POST["check"]);
				for ($i=0;$i<=$numreg-1;$i++){
				mysql_query("DELETE FROM categoria WHERE cod_tipo='".$_POST["check"][$i]."'",$link);
				}
				$msn='ec1';
			}
			break;
	

/*******************************************************************************************************************************************/

case 'usuario_temporal':
		
			if($_POST["sw"]==2){
			$rs=mysql_query("SELECT * FROM usuario WHERE login='".$_POST["login"]."'",$link);
			$numfilas=mysql_num_rows($rs);
			
		
			if($numfilas == 0 ){
				mysql_query("INSERT INTO usuario( nombre, apellidos,dni, direccion, telefono, correo, login, clave) VALUES('".$_POST["nom"]."','".$_POST["ape"]."','".$_POST["dni"]."','".$_POST["dir"]."','".$_POST["tel"]."','".$_POST["email"]."','".$_POST["login"]."','".$_POST["pwd"]."')",$link);
				
		mysql_query("DELETE FROM usuario_temporal WHERE cod_usuario='".$_POST["id"]."'",$link);
								
				}
			else
			{ 
			$msg_error="Login ya existe, intente otro...";
			 }
			}
			
			break;
									
	}
	// header($loc) 
	header('location: main_admin.php'.'?msn='.$msn)
?>