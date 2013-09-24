function abrir(codigo)
{
 open("calendario.php?codigo="+ codigo +"","Calendario","width=280, height=230, top=250, left=300" );
}

function letras(e)
{ // 1

tecla = (document.all) ? e.keyCode : e.which; // 2
if (tecla==8) return true; // 3
patron =/[A-Za-z\s\Ñ\ñ\Á\É\Í\Ó\Ú\á\é\í\ó\ú\.\,]/; // 4
te = String.fromCharCode(tecla); // 5
return patron.test(te); // 6
} 

function numeros(n)
{ // 

tecla = (document.all) ? n.keyCode : n.which; // 2
if (tecla==8) return true; // 3
patron =/[0\1-9\-]/; // 4
te = String.fromCharCode(tecla); // 5
return patron.test(te); // 6
} 


function validaFormProducto(frm){
	var campo = frm.des.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese descripcion.");
		frm.des.focus(); 
		return (false);
	}
	
	var campo = frm.codcat.value;
	if(campo=="")
	{
        alert("Por Favor, Ingrese Subcategoria.");
		frm.codcat.focus(); 
		return (false);
	}
	
	var campo = frm.pre.value;
	if(campo=="")
	{
        alert("Por Favor, Ingrese precio");
		frm.pre.focus(); 
		return (false);
	}
	
	var campo = frm.stock.value;
	if(campo=="")
	{
        alert("Por Favor, Ingrese Stock");
		frm.stock.focus(); 
		return (false);
	}


	var campo = frm.codmarca.value;
	if(campo=="")
	{
        alert("Por Favor, Ingrese Marca.");
		frm.codmarca.focus(); 
		return (false);
	}

} 



function validaFormUsuario(frm){
	var campo = frm.nom.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese Nombre de Usuario.");
		frm.nom.focus(); 
		return (false);
	}
	
	var campo = frm.ape.value;
	if(campo=="")
	{
        alert("Por Favor, Ingrese Apellidos de Usuario.");
		frm.ape.focus(); 
		return (false);
	}

	var campo = frm.dni.value;
	if(campo=="")
	{
        alert("Por Favor, Ingrese DNI.");
		frm.dni.focus(); 
		return (false);
	}

	var campo = frm.dir.value;
	if(campo=="")
	{
        alert("Por Favor, Ingrese Dirección.");
		frm.dir.focus(); 
		return (false);
	}
	
	var campo = frm.tel.value;
	if(campo=="")
	{
        alert("Por Favor, Ingrese Tel\xe9fono.");
		frm.tel.focus(); 
		return (false);
	}

	var campo = frm.email.value;
	if(campo=="")
	{
        alert("Por Favor, Ingrese E-mail.");
		frm.email.focus(); 
		return (false);
	}

   // if (form['email'].value.indexOf('@', 0) == -1 || form['email'].value.indexOf('.', 0) == -1)
	 if(frm.email.value.indexOf('@', 0) == -1 || frm.email.value.indexOf('.', 0) == -1)
	    { 
			alert("Direcci\xf3n de correo electr\xf3nico inv\xe1lida");
			frm.email.focus(); 
		    return (false);
		}

    var campo = frm.login.value;
	if(campo=="")
	{
        alert("Por Favor, Ingrese Login.");
		frm.login.focus(); 
		return (false);
	}

	var campo = frm.pwd.value;
	if(campo=="")
	{
        alert("Por Favor, Ingrese password.");
		frm.pwd.focus(); 
		return (false);
	}

	var campo = frm.codnivel.value;
	if(campo=="")
	{
        alert("Por Favor, Ingrese Nivel.");
		frm.codnivel.focus(); 
		return (false);
	}

} 

function validaFormMarca(frm){
	var campo = frm.marc.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese Nombre de Marca.");
		frm.marc.focus(); 
		return (false);
	}
} 

function validaFormNivel(frm){
	var campo = frm.nivel.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese Nombre de Nivel.");
		frm.nivel.focus(); 
		return (false);
	}
} 

function validaFormCateg(frm){
	var campo = frm.categ.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese Nombre de Categor\xeda.");
		frm.categ.focus(); 
		return (false);
	}

	var campo = frm.obs.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese Observaci\xf3n.");
		frm.obs.focus(); 
		return (false);
	}
	
} 

function validaFormSubCateg(frm){
	var campo = frm.subcat.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese Nombre de Subcategor\xeda.");
		frm.subcat.focus(); 
		return (false);
	}

	var campo = frm.des.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese Descripci\xf3n.");
		frm.des.focus(); 
		return (false);
	}
	
	var campo = frm.codcat.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese Categor\xeda.");
		frm.codcat.focus(); 
		return (false);
	}

} 

function validaFormProvee(frm){
	var campo = frm.raz.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese Raz\xf3n Social.");
		frm.raz.focus(); 
		return (false);
	}

	var campo = frm.ruc.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese RUC.");
		frm.ruc.focus(); 
		return (false);
	}
	
	var campo = frm.nom_con.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese Nombre de Contacto.");
		frm.nom_con.focus(); 
		return (false);
	}
	
	var campo = frm.dir.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese Direcci\xf3n.");
		frm.dir.focus(); 
		return (false);
	}

	var campo = frm.tel.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese Tel\xe9fono.");
		frm.tel.focus(); 
		return (false);
	}

	var campo = frm.email.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese E-mail.");
		frm.email.focus(); 
		return (false);
	}

	 if(frm.email.value.indexOf('@', 0) == -1 || frm.email.value.indexOf('.', 0) == -1)
	    { 
			alert("Direcci\xf3n de correo electr\xf3nico inv\xe1lida");
			frm.email.focus(); 
		    return (false);
		}

} 
