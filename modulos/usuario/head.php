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
        
        <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.1/modernizr.min.js" type="text/javascript"></script> 
        
        <script type="text/javascript" src="http://www.google.com/jsapi"></script> 
        
        <link rel="stylesheet" href="boxes2/thickbox.css" type="text/css" media="screen" />

        <script src="boxes2/jquery.js" type="text/javascript"></script>
        <script type="text/javascript" src="boxes2/thickbox.js"></script>

        <script src="boxes/jquery.alerts.js" type="text/javascript"></script>
        <link href="boxes/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />

        <script src="../../js/jquery.noconflict.js" type="text/javascript"></script>

        <script type="text/javascript">

            function enviar(producto)
            {
                // if (confirm("Desea agregar el producto seleccionado a su canasta de compras?" ))
                // {
                //     location.href="addcarrito.php?id="+producto+"&sw=2";
                // }
                // return false;
            tb_show("CONFIRMAR","boxes2/add_res.php?id="+producto+"&sw=2&placeValuesBeforeTB_=savedValues&TB_iframe=true&height=120&width=300&modal=false");

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
                var dat2=document.getElementById('txtbusqueda').value;
                var matriz = dat2.split(" ");
                var d = "";

                for(i = 0; i < matriz.length; i++) {
                    if(i==matriz.length-1) d = d + matriz[i];
                    else d = d + matriz[i]+'%20';
                }

                var content = jQuery("#productos");
                content.fadeIn('slow').load("list_prod_bus.php?dat="+d);
            }

            function verlist_bus2(prd) {
                var matriz = prd.split(" ");
                var d = "";

                for(i = 0; i < matriz.length; i++) {
                    if(i==matriz.length-1) d = d + matriz[i];
                    else d = d + matriz[i]+'%20';
                }

                var content = jQuery("#productos");
                content.fadeIn('slow').load("list_prod_bus.php?dat="+d);
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
                // if (confirm("Desea cerrar sesión?" ))
                // {
                //     location.href="salir.php";
                // }
                // return false;
                tb_show("SALIR","boxes2/psalir.php?&placeValuesBeforeTB_=savedValues&TB_iframe=true&height=100&width=250&modal=false");        
            }

            function show_msn()
            {
                tb_show("SALIR","boxes2/psalir.php?&placeValuesBeforeTB_=savedValues&TB_iframe=true&height=100&width=250&modal=false");     
            }            


            function vercarrito() {
                var content = jQuery("#land");
                content.fadeIn('slow').load("vercarrito.php");
            }

            function carga_compra() {
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
                  // jAlert('Por favor ingrese nombre', 'Alert Dialog');
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
                document.getElementById('list').style.display = "block";
                var content = jQuery("#list");
                content.fadeIn('slow').load("vercarritoside.php");
            }
             
            function hidelista() {
                document.getElementById('list').style.display = "none" ;
            }   
            
            function srch () {
                var dat=document.getElementById('txtbuscar').value;
                document.location.href="principal.php?p="+dat;
            }

            function checkKey (key, id) {
                var unicode;
                if (key.charCode)
                {unicode=key.charCode;}
                else
                {unicode=key.keyCode;}
                //alert(unicode); // Para saber que codigo de tecla presiono , descomentar
                
                if (unicode == 13) {
                    var dat=document.getElementById('txtbuscar').value;
                    // alert(dat);
                    document.location.href="principal.php?p="+dat;
                };

                if (unicode >= 48 && unicode <= 90){
                    var dat=document.getElementById('txtbuscar').value;
                    // alert(dat);                    
                    // var content = jQuery("#productos");
                    // content.fadeIn('slow').load("list_prod_bus.php?dat="+dat);

                    document.getElementById('bus_cont').style.display = "block";
                    var content = jQuery("#bus_cont");
                    content.fadeIn('slow').load("list_prod_bus2.php?dat="+dat);
                    
                    // document.getElementById('bus_cont').style.visibility = visible;
                }

                if (unicode == 8 || unicode == 46){                
                    var dat=document.getElementById('txtbuscar').value.length;
                    if (dat==1){
                        document.getElementById('bus_cont').style.display = "none";
                    }
                }
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
        
   <!--<script src="../../js/vendor/modernizr-2.6.2.min.js"></script>-->

   <script type="text/javascript">
            
            jQuery(document).ready( function() {
                
                jQuery("#alert_button").click( function() {
                    jAlert('This is a custom alert box', 'Alert Dialog');
                });
                
                jQuery("#confirm_button").click( function() {
                    jConfirm('Can you confirm this?', 'Confirmation Dialog', function(r) {
                        jAlert('Confirmed: ' + r, 'Confirmation Results');
                    });
                });
                
                jQuery("#prompt_button").click( function() {
                    jPrompt('Type something:', 'Prefilled value', 'Prompt Dialog', function(r) {
                        if( r ) alert('You entered ' + r);
                    });
                });
                
                jQuery("#alert_button_with_html").click( function() {
                    jAlert('You can use HTML, such as <strong>bold</strong>, <em>italics</em>, and <u>underline</u>!');
                });
                
                jQuery(".alert_style_example").click( function() {
                    jQuery.alerts.dialogClass = jQuery(this).attr('id'); // set custom style class
                    jAlert('This is the custom class called &ldquo;style_1&rdquo;', 'Custom Styles', function() {
                        jQuery.alerts.dialogClass = null; // reset to default
                    });
                });
            });
            
         </script>
    </head>