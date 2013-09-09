<?php 
    include ("inc_seguridad.php");
    // $_SESSION["s_cod"]='Usuario actual'; 
    $usr=$_SESSION["s_cod"];  
    $solonom=$_SESSION["s_solonom"];
    $nomusu=$_SESSION["s_nombreC"];
 ?>

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
        <link rel="stylesheet" href="../../css/estilos.css">

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
         <script>window.jQuery || document.write('<script src="../../js/jquery-1.8.2.min.js">\x3C/script>')</script> 
        <script src="../../js/jquery.noconflict.js" type="text/javascript"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.1/modernizr.min.js" type="text/javascript"></script> 

        <script src="boxes/jquery.js" type="text/javascript"></script>
        <script src="boxes/jquery.alerts.js" type="text/javascript"></script>
        <link href="boxes/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />

        <script type="text/javascript">

            function enviar(producto)
            {
                if (confirm("Desea agregar el producto seleccionado a su canasta de compras?" ))
                {
                    location.href="addcarrito.php?id="+producto+"&sw=2";
                }
                return false;
            }

            function ver()
            {
                var posicion=document.getElementById('cbocateg').options.selectedIndex; //posicion
                var cod =document.getElementById('cbocateg').options[posicion].value;
                
                var content = jQuery("#productos");
                content.fadeIn('slow').load("list_prod.php?cod="+cod);
            }

            function ver_prod (scat) {
                var content = jQuery("#productos");
                content.fadeIn('slow').load("list_prod.php?cod="+scat);
            }
            
            function ver_cat()
            {
                var posicion=document.getElementById('cbocateg').options.selectedIndex; //posicion
                var cod =document.getElementById('cbocateg').options[posicion].value;
                
                if (cod==0){
                    var content = jQuery("#productos");
                    content.fadeIn('slow').load("list_cat.php?cod="+cod);
                }else {
                    var content = jQuery("#productos");
                    content.fadeIn('slow').load("list_subcat.php?cod="+cod);
                }

            }

            function verlist_bus () {
                var dat=document.getElementById('txtbusqueda').value;
                var content = jQuery("#productos");
                content.fadeIn('slow').load("list_prod_bus.php?dat="+dat);
            }    

            function ver_scat (id) {
                var content = jQuery("#productos");
                content.fadeIn('slow').load("list_subcat.php?cod="+id);
            }

            function vertodascat(id)
            {
                // var content = jQuery("#productos");
                // content.fadeIn('slow').load("list_subcat.php?cod="+id);
                var content = jQuery("#productos");
                content.fadeIn('slow').load("list_cat.php?cod="+id);
            }

            function verpag(id,pag)
            {
                var content = jQuery("#productos");
                content.fadeIn('slow').load("list_subcat.php?cod="+id+"&pag="+pag);
            }

            function verpag2(id,pag)
            {
                var content = jQuery("#productos");
                content.fadeIn('slow').load("list_cat.php?cod="+id+"&pag="+pag);
            }

            function verpag3(dat, pag)
            {
                // alert(dat+' '+pag);
                // var dat = 'prod'
                var content = jQuery("#productos");
                content.fadeIn('slow').load("list_prod_bus.php?dat="+dat+"&pag="+pag);
            }

            function verdatos()
            {
                var content = jQuery("#content");
                content.fadeIn('slow').load("dat_per.php");
            }

            function salir()
            {
                if (confirm("Desea cerrar sesión?" ))
                {
                    location.href="salir.php";
                }
                return false;
            }

            function vercarrito() {
                var content = jQuery("#land");
                content.fadeIn('slow').load("vercarrito.php");
            }

            function verform(opc) {
                var content = jQuery("#content");
                if (opc==1) {content.fadeIn('slow').load("dat_per.php");}
                if (opc==2) {content.fadeIn('slow').load("miscompras.php");}
                if (opc==3) {content.fadeIn('slow').load("ped_pend.php");}
                if (opc==4) {content.fadeIn('slow').load("cambiapass.php");}
            }

            function verdetalle (cod) {
                var dat=document.getElementsByName("det").length;
                for (var i = 0; i < dat; i++) {
                    var content = jQuery(document.getElementsByName("det")[i]);
                    content.fadeOut(200);
                };

                var content = jQuery("#detalle"+cod);
                content.fadeIn('slow').load("inc_detalleped.php?cod="+cod);
            }


            // jquery(document).ready(function(){
            //     //div donde se mostrará calendario debe estar oculto                       
            //     jquery('#calendario').hide();
            // });

            function update_calendar(){
                var month = jQuery('#calendar_mes').attr('value');
                var year = jQuery('#calendar_anio').attr('value');

                var valores='month='+month+'&year='+year;

                jQuery.ajax({
                    url: 'setvalue.php',
                    type: "GET",
                    data: valores,
                    success: function(datos){
                        jQuery("#calendario_dias").html(datos);
                    }
                });
            }
                
            function set_date(date){
                //input text donde debe aparecer la fecha
                jQuery('#fecha').attr('value',date);
                show_calendar();
            }

            function show_calendar(){
                //div donde se mostrará calendario
                jQuery("#calendario").toggle(); 
                // alert("Hola mundo");
            }

            function validar() {
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
                var nom = document.frm_datper.txtnom.value;    
                if (nom==""){
                  alert ("Por favor ingrese nombre");
                  // document.frm_datper.txtnom.focus();
                  location.href = "cuenta.php";
                  return false;        
                } 

                var ape = document.frm_datper.txtape.value;    
                if (ape==""){
                  alert ("Por favor ingrese apellido");
                  // document.frm_datper.txtape.focus();
                  location.href = "cuenta.php";
                  return false;        
                } 

                var dni = document.frm_datper.txtdni.value;    
                if (dni==""){
                  alert ("Por favor ingrese dni");
                  // document.frm_datper.txtdni.focus();
                  location.href = "cuenta.php";
                  return false;        
                } 

                var dir = document.frm_datper.txtdirec.value;    
                if (dir==""){
                  alert ("Por favor ingrese dirección");
                  // document.frm_datper.txtdirec.focus();
                  location.href = "cuenta.php";
                  return false;        
                } 

                var telf = document.frm_datper.txttelf.value;    
                if (telf==""){
                  alert ("Por favor ingrese teléfono");
                  // document.frm_datper.txttelf.focus();
                  location.href = "cuenta.php";
                  return false;        
                } 

                var email = document.frm_datper.txtemail.value;    
                if (email==""){
                  alert ("Por favor ingrese email");
                  // document.frm_datper.txtemail.focus();
                  location.href = "cuenta.php";
                  return false;        
                } 

                return true;
            }

            function verlista() {
                document.getElementById('list').style.display = "block" ;
                var content = jQuery("#list");
                content.fadeIn('slow').load("vercarritoside.php");
            }
             
            function hidelista() {
                document.getElementById('list').style.display = "none" ;
            }   
            
            function checkKey (key, id) {
                var unicode;
                if (key.charCode)
                {unicode=key.charCode;}
                else
                {unicode=key.keyCode;}
                //alert(unicode); // Para saber que codigo de tecla presiono , descomentar
             
                if (unicode == 13){
                    var dat=document.getElementById('txtbuscar').value;
                    // alert(dat);
                    var content = jQuery("#productos");
                    content.fadeIn('slow').load("list_prod_bus.php?dat="+dat);
                }
            }           

        </script>       
        
   <script src="../../js/vendor/modernizr-2.6.2.min.js"></script>

   <script type="text/javascript">
            
            $(document).ready( function() {
                
                $("#alert_button").click( function() {
                    jAlert('This is a custom alert box', 'Alert Dialog');
                });
                
                $("#confirm_button").click( function() {
                    jConfirm('Can you confirm this?', 'Confirmation Dialog', function(r) {
                        jAlert('Confirmed: ' + r, 'Confirmation Results');
                    });
                });
                
                $("#prompt_button").click( function() {
                    jPrompt('Type something:', 'Prefilled value', 'Prompt Dialog', function(r) {
                        if( r ) alert('You entered ' + r);
                    });
                });
                
                $("#alert_button_with_html").click( function() {
                    jAlert('You can use HTML, such as <strong>bold</strong>, <em>italics</em>, and <u>underline</u>!');
                });
                
                $(".alert_style_example").click( function() {
                    jQuery.alerts.dialogClass = jQuery(this).attr('id'); // set custom style class
                    jAlert('This is the custom class called &ldquo;style_1&rdquo;', 'Custom Styles', function() {
                        jQuery.alerts.dialogClass = null; // reset to default
                    });
                });
            });
            
         </script>
    </head>