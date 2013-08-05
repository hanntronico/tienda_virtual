<html>
<head>
<title>Ejemplo js</title>
<script>
// function borracampo(){
// if(document.frm.txtfield.value == "Introduce tu nombre")
//    document.frm.txtfield.value = ""} 

// function restauracampo(){
//   if(document.frm.txtfield.value=="")
//    document.frm.txtfield.value="Introduce tu nombre"
//    }

	function validaform () {
              
		// var nom;
    	// var eml;
    	// var asnt;
    	// var msn;

    	var nom=document.frm.txtfield.value;
    	alert(nom);
    	return false;	

	    // if (nom==""){
	    //   alert ("Por favor ingresar nombre");
	    //   document.frm.txtfield.focus();
	    //   return false;        
	    // }
   }

</script>
</head>
<body>
<form name="frm" onsubmit="return validaform();" method="post" action="grab.php">
	<input type="text" name="txtfield" />
	<input type="text" name="txtfield2" />
	<input type="submit" name="grabar">
<form>
</body>
</html>