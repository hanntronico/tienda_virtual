<?php 

function paginar($sql,$tabla,$mantenimiento) {
Global $ordenarpor;
Global $ordenactual;
Global $sentido;
Global $pagina;
	$limite=10;
	$rs=mysql_query($sql) or die("Error en la consulta");
	$totalfilas = mysql_num_rows($rs); 
	if(empty($_GET["pagina"]))$_GET["pagina"]= 1; 
	$filainicial =  $_GET["pagina"]*$limite-($limite);

if(empty($ordenarpor))$ordenarpor = "1"; //por defecto el primer campo
//Sentido de ordenamiento Ascendente o Descendente
if($ordenactual==$ordenarpor){
	if($sentido=="Desc")		{
		$sentido="Asc";
	}else{
		$sentido="Desc";
	}
}else{
		$sentido="Asc";
}
$ordenactual=$ordenarpor; 
//empezando de $limite mostrar $limitevalor registros
	$rs_lim=mysql_query("$sql Order By $ordenarpor $sentido Limit $filainicial, $limite") or die ("Error en el ordenamiento...");
	MostrarTabla($rs_lim,$tabla,$pagina,$ordenactual,$sentido);	
	
	if($pagina != 1) { 
		$paginaprevia= $pagina - 1; 
	} 
	echo "<table border=1 cellpadding=0 cellspacing=0 width=100%><tr align=center><td>";
	echo "<font size=2><b>P&aacute;ginas:&nbsp;</b></font>";
	$numpaginas = ceil($totalfilas/$limite); 
	for($i=1; $i <= $numpaginas; $i++) {
		if($i!=$pagina){
			echo "&nbsp;<font size=2><b><A HREF=".$PHP_SELF."?pagina=".$i."&ordenarpor=".$ordenarpor."&ordenacual=".$ordenactual."&sentido=".$sentido.">".$i."</A></b></font>&nbsp;";  
		}else{
			echo "&nbsp;<font size=2 color=ff0000><b>$i</b></font>&nbsp;";  
		}
	} 
	echo "</td></tr></table>";
	if(($totalfilas-($limite*$pagina)) > 0){ 
		$paginasgte = $pagina + 1; 
	}
mysql_free_result($rs);
}
//-----------------------------------------------------------------------
//-------------MUESTRA LA LISTA DE REGISTROS-----------------------------
function MostrarTabla($rs,$tabla,$pagina,$ordenactual,$sentido){	
	$campos=mysql_num_fields($rs);
	$numfilas=mysql_num_rows($rs);
	$ancho='95%';if($campos<=3)$ancho='80%';
	echo "<form name=frmList action='grabar.php' method=post>";
	echo "<center>";
	echo "<table cellPadding=2 cellSpacing=0 width=$ancho>";
	echo "<tr><td width=60%><input type='hidden' name='pag' value='$tabla'>";
	// include('mante.php');
	echo "<br></td><td width=40% align=right><font color='#000000'>Registros:<b> ".$numfilas."</b>&nbsp;</font></td>";
	echo "</tr></table>";
	echo "<table cellPadding=2 cellSpacing=0 class=Mtabletd width=$ancho>";
	echo "<tr class=Mtr2>";
		echo "<td>&nbsp;<input name='allbox' type='checkbox' onClick='CA();' title='Seleccionar o anular la selección de todos los registros'></td>";
		for($i=0;$i<$campos;$i++){
			$campo=mysql_field_name($rs,$i);
			echo "<td><a class=MA href=".$PHP_SELF."?pagina=".$pagina."&ordenarpor=".($i+1)."&ordenactual=".$ordenactual."&sentido=".$sentido." title='Ordenar por ".$campo."'>".$campo."</a></td>";
		} 
		echo "<td>OPCION</td>";
	echo "</tr>";
	while($filas=mysql_fetch_array($rs)){
		echo "<tr>";
			echo "<td width=30>&nbsp;<input type='checkbox' name='check[]' value=".$filas[0]." onClick='CCA(this);'></td>";
			for($i=0;$i<$campos;$i++){
				if($i==0){
					echo "<td><a href=".strtolower($tabla).".php?id=".$filas[0]."&sw=2>$filas[$i]</a></td>";
				}else{
					echo "<td>".$filas[$i]."</td>";
				}
			}
			echo "<td><a href=".strtolower($tabla).".php?id=".$filas[0]."&sw=2>Editar</a></td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "</center>";
	echo "</form>";
}
    include("../conectar.php");
    $link=Conectarse();
    $res=@mysql_query("set names utf8",$link);
    $row=@mysql_fetch_array($res);
	paginar("select * from producto","producto",1);


?>