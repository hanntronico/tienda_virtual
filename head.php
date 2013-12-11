<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="es" class="no-js"> <!--<![endif]-->
    <head>
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>MERCADO VIRTUAL</title>
        <meta name="description" content="Sitio web de compras online">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <!-- <link rel="stylesheet" href="css/normalize.css"> -->
<!--    <link rel="stylesheet" href="css/main.css"> -->
        <link rel="stylesheet" href="css/estilos.css">

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.8.2.min.js">\x3C/script>')</script>
        <script src="js/jquery.noconflict.js" type="text/javascript"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.1/modernizr.min.js" type="text/javascript"></script>         
        
        <script src="jsB/vendor/modernizr-2.6.2.min.js"></script>
        <script type="text/javascript">

            function carga_registro() {
                var element = document.getElementById("reg");
                if (element) element.click();
            }

            function carga_forgot() {
                var element = document.getElementById("forgot");
                if (element) element.click();
                // alert("hann");
            }

            function carga_msn() {
                var element = document.getElementById("msn");
                if (element) element.click();
            }

            function validasolonumeros() {
             if ((event.keyCode < 48) || (event.keyCode > 57)) 
              event.returnValue = false;
            }

            function valida_cambiopass() {
                var passact = document.frm_cambiopass.txtpassact.value; 
                if (passact==""){
                  alert ("Por favor ingresar contraseña actual");
                  document.frm_cambiopass.txtpassact.focus();
                  return false;        
                }

                var newpass = document.frm_cambiopass.txtnuevapass.value;    
                if (newpass==""){
                  alert ("Por favor ingresar nueva contraseña");
                  document.frm_cambiopass.txtnuevapass.focus();
                  return false;        
                }

                var confpass = document.frm_cambiopass.txtconfpass.value;    
                if (confpass==""){
                  alert ("Por favor confirme contraseña");
                  document.frm_cambiopass.txtconfpass.focus();
                  return false;        
                }
                
                if (newpass!=confpass){
                    alert ("Contraseñas no coinciden");
                    return false;
                }

                return true;
            }  

            function validaform() {

                var nom = document.register_form[1].txtnombres.value; 
                if (nom==""){
                  alert ("Por favor ingresar nombre");
                  document.register_form[1].txtnombres.focus();
                  return false;        
                }
           
                var ape = document.register_form[1].txtapellidos.value; 
                if (ape==""){
                  alert ("Por favor ingresar apellidos");
                  document.register_form[1].txtapellidos.focus();
                  return false;        
                }

                var em = document.register_form[1].txtemail.value; 
                if (em==""){
                  alert ("Por favor ingresar email");
                  document.register_form[1].txtemail.focus();
                  return false;        
                }

                var atpos=em.indexOf("@");
                var dotpos=em.lastIndexOf(".");
                if (atpos<1 || dotpos<atpos+2 || dotpos+2>=em.length)
                  {
                  alert("Ingrese una dirección de correo válida");
                  document.register_form[1].txtemail.focus();
                  return false;
                  }

                var dni = document.register_form[1].txtdni.value; 
                if (dni==""){
                  alert ("Por favor ingresar DNI");
                  document.register_form[1].txtdni.focus();
                  return false;        
                }

                var tel = document.register_form[1].txttelf.value; 
                if (tel==""){
                  alert ("Por favor ingresar teléfono");
                  document.register_form[1].txttelf.focus();
                  return false;        
                }

                return true;

            }

            function cerrar(){
              // var div = document.getElementById('msn_box_ok');
              // div.style.display='none';
              var content = jQuery("#msn_box_ok");
              content.fadeOut('slow');
              // setTimeout("document.location.href='cuenta.php'",500);
            }

            function accion(){
              setTimeout("cerrar()",3000);
            }

            function valida_suger () {
              var nomape = document.frm_suger.txtnomape.value; 
              if (nomape==""){
                  alert ("Por favor ingresar nombres y apellidos");
                  document.frm_suger.txtnomape.focus();
                  return false;        
              }

              var email = document.frm_suger.txtemail.value; 
              if (email==""){
                  alert ("Por favor ingresar su correo");
                  document.frm_suger.txtemail.focus();
                  return false;        
              }

              var atpos=email.indexOf("@");
              var dotpos=email.lastIndexOf(".");
                if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
                  {
                  alert("Ingrese una dirección de correo válida");
                  document.frm_suger.txtemail.focus();
                  return false;
                  }

              var msn = document.frm_suger.txtmensaje.value.length
              if (msn==0) {
                alert ("Por favor ingresar su correo");
                document.frm_suger.txtmensaje.focus();
                return false;
              }

              return true
            }

        </script>
    </head>