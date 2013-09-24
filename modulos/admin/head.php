<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Panel de Administrador</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<link rel="stylesheet" href="../../css/estilos_admin.css" type="text/css" />

<!-- <script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.flot.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.slimscroll.js"></script>
<script type="text/javascript" src="js/custom/general.js"></script>
<script type="text/javascript" src="js/custom/tables.js"></script>
<script type="text/javascript" src="js/custom/dashboard.js"></script> -->


<script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.flot.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.slimscroll.js"></script>
<script type="text/javascript" src="js/plugins/charCount.js"></script>
<script type="text/javascript" src="js/plugins/ui.spinner.min.js"></script>
<script type="text/javascript" src="js/plugins/chosen.jquery.min.js"></script>
<script type="text/javascript" src="js/custom/general.js"></script>
<script type="text/javascript" src="js/custom/forms.js"></script>
<script type="text/javascript" src="js/custom/tables.js"></script>
<script type="text/javascript" src="js/custom/dashboard.js"></script>

<script language="JavaScript" src="funciones/validaciones.js"></script>

<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/plugins/excanvas.min.js"></script><![endif]-->
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="css/style.ie9.css"/>
<![endif]-->
<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="css/style.ie8.css"/>
<![endif]-->
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<script type="text/javascript">
	function carga_form (num) {
		
		if (num==1){
			var content = jQuery("#conte");
			content.fadeIn('slow').load("inc_productos.php");
		}
		if (num==2){
			var content = jQuery("#conte");
			content.fadeIn('slow').load("inc_subcat.php");
		}
		if (num==3){
			var content = jQuery("#conte");
			content.fadeIn('slow').load("inc_cat.php");
		}
		if (num==4){
			var content = jQuery("#conte");
			content.fadeIn('slow').load("inc_pedidos.php");
		}
		
	}


	function cargare(UR) {
		var content = jQuery("#conte");
		content.fadeIn('slow').load(UR);
	}

	function G(UR) {
		// alert(UR);
		var content = jQuery("#conte");
		content.fadeIn('slow').load(UR);
	}

	function CA(isOn){
		for (var i=0;i<frmList.elements.length;i++){
			var e = frmList.elements[i];
			if ((e.name != 'allbox') && (e.type=='checkbox')){
				if (isOn != 1){
					e.checked = frmList.allbox.checked;
					if (frmList.allbox.checked){
						hL(e);
					}else{
						dL(e);
					}
				}else{
					e.tabIndex = i;
					if (e.checked){
						hL(e);
					}else{
						dL(e);
					}
				}
			}
		}
	}

	function hL(E){
		while (E.tagName!="TR"){
			E=E.parentNode;
		}
		E.className = "H";
	}

	function dL(E){
		while (E.tagName!="TR"){
			E=E.parentNode;
		}
		E.className = "";
	}

	function CCA(CB){

			if (CB.checked)
				hL(CB);
			else
				dL(CB);
				
		var TB=TO=0;
		for (var i=0;i<frmList.elements.length;i++){
			var e = frmList.elements[i];
			if ((e.name != 'allbox') && (e.type=='checkbox')){
				TB++;
				if (e.checked) TO++;
			}
		}
		if (TO==TB)
			frmList.allbox.checked=true;
		else
			frmList.allbox.checked=false;
	}

	function vChk(frm){ 
		var sw=0;
		for(var i=0;i<frm.length;i++){
			if(frm.elements[i].checked){
				sw=1;
			}		
		}
		if(sw!=1){
			alert("No hay ningun registro seleccionado.");
			return(false);
		}
		rpta=confirm("Esta seguro de Eliminar estos Registros?");
		if (rpta==false){
			return(false);
		}
	}

	function Subm(act,first,dosub,e){
		if (act=='delete'){
			if (!e)	var e=window.event;
			e.cancelBubble=true;
		}
		if (act=='notbulkmail'){
			frm.action="/cgi-bin/notbulk";
		}else if (act=='report'){
			frm.action="/cgi-bin/kill";
			frm.ReportLevel.value="1";
		}
		//num=((first) ? slct1st(frm) : numChecked(frm));
		num=vChk(frmList);
	//	alert (num);
		if (num!=false){
		//if (num>0){
			//frm._HMaction.value=act;
			//if (dosub)
			frmList.submit();
		//}else{
			//Err("150995652");
		}
	}

	// function G(UR){
	// if (!e)
	// var e=window.event;
	// if (e)
	// 	e.cancelBubble=true;
	// if(UR)
	// 	//location.href=UR+"&"+_UM;
	// 	location.href=UR;
	// }

</script>
</head>