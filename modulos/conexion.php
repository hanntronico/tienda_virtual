<?php

class clsConexion {
/*
	var $strServidor;	//Direccion Ip o Nombre del Servidor
	var $strUsuario;	//Nombre del Usuario
	var $strClave;		//Clave
	var $strBD;			//Nombre de la Base de Datos
	var $link;			//Link de Conexion
	var $type;
*/
	protected $strServidor, $strUsuario, $strClave, $strBD, $type, $link;
		
		/*var $strServidor = "localhost";
		var $strUsuario = "root";
		var $strClave = "root";
		var $strBD = "dbacademico01";
		var $type = "MYSQLI";*/

	public function __construct() {
		$this->strServidor 	= "localhost";
		$this->strUsuario 	= "root";
		$this->strClave 	= "root";
		$this->strBD 		= "bdtienda";
		$this->type			= "MYSQLI";
	 	}

  	public function AbrirConexion() {  	
		//Establecemos la Conexion
		if (strtoupper($this->type)=="MYSQL") {
			$this->link = mysql_connect($this->strServidor, 
										$this->strUsuario,
										$this->strClave, false, 65536);	
			if(!mysql_select_db($this->strBD,$this->link))	{
				echo "ERROR SELECCIONANDO LA BASE DE DATOS :".$this->strServidor;
				exit();
				}		
			}
		elseif (strtoupper($this->type)=="MYSQLI") {
			$this->link = mysqli_connect($this->strServidor, 
										$this->strUsuario,
										$this->strClave,
										$this->strBD);	
								
			if(!mysqli_select_db($this->link,$this->strBD))	{
				echo "ERROR SELECCIONANDO LA BASE DE DATOS :".$this->strServidor;
				exit();
				}		
			
			}
		elseif (strtoupper($this->type)=="SQL") {
			$this->link = mssql_connect($this->strServidor, 
										$this->strUsuario, 
										$this->strClave);	
			if(!mssql_select_db($this->strBD,$this->link))	{
				echo "ERROR SELECCIONANDO LA BASE DE DATOS :".$this->strBD."EN ".$this->strServidor;
				exit();
				}
			}
		else {
			echo "No selecciono el Tipo de Conexion: SQL o MySQL";
			exit;
			}	
		if(!($this->link))	{
				echo "ERROR CONECTANDO AL SERVIDOR : ".$this->strServidor;
				exit();
				}		
		return $this->link;	
		}
	
	function CerrarConexion() {
		if(strtoupper($this->type)=="MYSQL") mysql_close($this->link);
		elseif(strtoupper($this->type)=="MYSQLI") mysqli_close($this->link);
		elseif(strtoupper($this->type)=="SQL") mssql_close($this->link);
		}
	function Begin() {
		mysql_query("BEGIN", $this->link);
		}

	function Rollback() {
		mysql_query("ROLLBACK", $this->link);
		}

	function Commit() {
		mysql_query("COMMIT", $this->link);
		}
		
	function Query($sql) {
		if($sql=="") return NULL;
		elseif(strtoupper($this->type)=="MYSQL") {
			if($rs = mysql_query($sql,$this->link)) return $rs;	
			else return mysql_error();
			}
		elseif(strtoupper($this->type)=="MYSQLI") {
			if($rs = mysqli_query($this->link, $sql)) return $rs;	
			else return mysqli_error($this->link);
			}
		elseif(strtoupper($this->type)=="SQL") {
			if($rs = mssql_query($sql,$this->link)) return $rs;
			else echo "ERROR AL PROCESAR: ".$sql;
			}
		}

	function setcharset() {
		
        $this->Query("SET NAMES 'utf8'");
		}
		

	function FetchArray($rs) {
		if(strtoupper($this->type)=="MYSQL") return mysql_fetch_array($rs);	
		elseif(strtoupper($this->type)=="MYSQLI") return mysqli_fetch_array($rs);	
		elseif(strtoupper($this->type)=="SQL") return mssql_fetch_array($rs);
		}
	
	function NumFilas($rs) { 
		if(strtoupper($this->type)=="MYSQL") return mysql_num_rows($rs);	
		elseif(strtoupper($this->type)=="MYSQLI") return mysqli_num_rows($rs);
		elseif(strtoupper($this->type)=="SQL") return mssql_num_rows($rs);
		}
	
	function NumField($rs) { 
		if(strtoupper($this->type)=="MYSQL") return mysql_num_fields($rs);
		elseif(strtoupper($this->type)=="MYSQLI") return mysqli_num_fields($rs);
		elseif(strtoupper($this->type)=="SQL") return mssql_num_fields($rs); 
		}
		
	function FieldType($rs, $i) { 
		if(strtoupper($this->type)=="MYSQL") return mysql_field_type($rs, $i);	
		elseif(strtoupper($this->type)=="SQL") return mssql_field_type($rs, $i);
		}

	function FieldName($rs, $i) { 
		if(strtoupper($this->type)=="MYSQL") return mysql_field_name($rs, $i);	
		elseif(strtoupper($this->type)=="MYSQL") {
			 $finfo = mysqli_fetch_field_direct($rs, $i);
			 return $finfo->name;
			}
		elseif(strtoupper($this->type)=="SQL") return mssql_field_name($rs, $i);
		}
			
	function FieldLength($rs, $i) {
		if(strtoupper($this->type)=="MYSQL") return mysql_field_len($rs, $i);	
		elseif(strtoupper($this->type)=="SQL") return mssql_field_length($rs, $i);			
		}
		
	function LiberaMemoria($rs) { 
		if(strtoupper($this->type)=="MYSQL") return mysql_free_result($rs);
		elseif(strtoupper($this->type)=="MYSQLI") return mysqli_free_result($rs);
		elseif(strtoupper($this->type)=="SQL") return mssql_free_result($rs); 
		}
		
	function ErrorConsulta() {
		$tabla = "<table id=\"TableError\" ";
		$tabla.= "style=\"padding:0; margin-top:0px;border-collapse:collapse;\" "; 
		$tabla.= "width=350 align=center  cellpadding=0 cellspacing=0>";
		$tabla.= "<tr>";
		$tabla.= "<td height=19 colspan=2 align=center valign=middle class=\"FormTitulo\">";
		$tabla.= "ERROR AL REALIZAR CONSULTA...!!!!</th>";
		$tabla.= "</tr>";
		$tabla.= "<tr>";
		$tabla.= "<td height=35 colspan=2 valign=middle align=center class=interior>";
		$tabla.= "<b><BR>  LOS PARAMAETROS DE BUSQUEDA QUE INGRESO<BR>";
		$tabla.= "NO DEVOLVIERON DATOS<BR>";
		$tabla.= "SELECCIONE OTROS PARAMETROS Y VUELVA A INTENTARLO";
		$tabla.= "<br>O CONTACTESE CON EL ADMINISTRADOR DEL SISTEMA<BR>";
		$tabla.= "<br></b>";
		$tabla.= "</td>";
		$tabla.= "</tr>";
		$tabla.= "</table>";
		return $tabla;
		}
  }
      
?>