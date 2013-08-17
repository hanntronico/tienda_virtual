<?php
	include("funciones/function.php");
	include("conectar.php");
	$link=Conectarse();
	$loc="location:".$_POST["pag"].".php";

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

case 'producto':
	
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
	$fila=@mysql_fetch_array($res);

	mysql_query("INSERT INTO producto (descripcion, cod_subcat, precio, imagen, stock, cod_marca) 
				 VALUES('".$_POST["des"]."','" 
						  .$_POST["codcat"]."','"
						  .$_POST["pre"]."','"
						  .$nombre."','"
						  .$_POST["stock"]."','"
						  .$_POST["codmarca"]."')",$link);
	
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
	$fila=@mysql_fetch_array($res);
	
	mysql_query("UPDATE producto SET descripcion='".$_POST["des"].
								 "', cod_subcat='".$_POST["codcat"].
								 "', precio='".$_POST["pre"].
								 "', imagen='".$ruta.
								 "', stock='".$_POST["stock"].
								 "', cod_marca='".$_POST["codmarca"].
								 "' WHERE cod_producto=".$_POST["id"],$link);
	
	
	//move_uploaded_file($_FILES[imag][tmp_name],"../../imagenes/Productos/img".$_POST["id"].".jpg");
	
			}else{
				$numreg=count($_POST["check"]);
				for ($i=0;$i<=$numreg-1;$i++){
								
					if($numfilas==0 && $numfilas1==0 ){
						mysql_query("DELETE FROM producto WHERE cod_producto='".$_POST["check"][$i]."'",$link);

						
					}
				}
			}
			break;


/************************************************************************************************************************************************/

case 'marca':
			if($_POST["sw"]==1){
			
			$rs=mysql_query("SELECT * FROM marca WHERE desc_marca='".$_POST["marc"]."'",$link);
			$numfilas=mysql_num_rows($rs);
			
//		cod_marca 	desc_marca
		
			if($numfilas == 0 ){
				mysql_query("INSERT INTO marca(desc_marca) 
							VALUES('".$_POST["marc"]."')",$link);				
				}
			else
			{ 
			
			$msg_error="Login ya existe, intente otro...";
			
			 }
			}elseif($_POST["sw"]==2){

				mysql_query("UPDATE marca SET desc_marca='".$_POST["marc"]."' WHERE cod_marca='".$_POST["id"]."'",$link);
	
			}else{
				$numreg=count($_POST["check"]);
				for ($i=0;$i<=$numreg-1;$i++){
						mysql_query("DELETE FROM marca WHERE cod_marca='".$_POST["check"][$i]."'",$link);
				}
			}
			break;


/************************************************************************************************************************************************/

case 'categoria':
			if($_POST["sw"]==1){
			
			$rs=mysql_query("SELECT * FROM categoria WHERE tipo='".$_POST["tipo"]."'",$link);
			$numfilas=mysql_num_rows($rs);
			
//		cod_tipo 	tipo 	descripcion
		
			if($numfilas == 0 ){
				mysql_query("INSERT INTO categoria (tipo, descripcion) 
							VALUES('".$_POST["tipo"]."','".$_POST["des"]."')",$link);				
				}
			else
			{ 
			
			$msg_error="Login ya existe, intente otro...";
			
			 }
			}elseif($_POST["sw"]==2){

				mysql_query("UPDATE categoria SET tipo='".$_POST["tipo"].
										     "', descripcion='".$_POST["des"].
										  "' WHERE cod_tipo='".$_POST["id"]."'",$link);
	
			}else{
				$numreg=count($_POST["check"]);
				for ($i=0;$i<=$numreg-1;$i++){
						mysql_query("DELETE FROM categoria WHERE cod_tipo='".$_POST["check"][$i]."'",$link);
				}
			}
			break;
	

/***********************************************************************************************************************************************/

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
	header($loc)
?>