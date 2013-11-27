<script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>

<script type="text/javascript" src="js/plugins/colorpicker.js"></script>

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
<script type="text/javascript" src="js/plugins/jquery.alerts.js"></script>

<script type="text/javascript" src="js/custom/elements.js"></script>

<script type="text/javascript" src="js/custom/forms.js"></script>
<script type="text/javascript" src="js/custom/tables.js"></script>
<script type="text/javascript" src="js/custom/dashboard.js"></script>

<script type="text/javascript">
  jQuery('.notibar .close').click(function(){
    jQuery(this).parent().fadeOut(function(){
      jQuery(this).remove();
    });
  });

  function cerrar() {
    document.getElementById('equis').click();
  }

  jQuery( "#fec_ini" ).datepicker();
  jQuery( "#fec_fin" ).datepicker();

  function envia_rpt() {
  	var fini= document.frmrpt01.fec_ini.value;
  	var ffin= document.frmrpt01.fec_fin.value;
  	var parabus = document.frmrpt01.txtparabus.value;
  	// var opc01 = document.frmrpt01.opt1.value;

  	var opc01 = document.getElementsByName("opt1");
		var res = parabus.split(" ");
  	
  	if (opc01[0].checked) {

	  	if (parabus=="") {
	  		alert("Por favor ingrese cliente");
	  		document.frmrpt01.txtparabus.focus();
	  		return false;
  		};

		// alert(opc01[1].value);	
		var param="";
		// alert(res.length);	
		for (var i = 0; i < res.length; i++) {
			param = param + res[i] + '20%';
		};

		// alert(param.substring(0,((param.length)-3)));
		var content = jQuery("#view_rpt");
			content.fadeIn('slow').load("proc_rpt01.php?pr1="+param.substring(0,(param.length-3)));
  	};	

  	if (opc01[1].checked) {
	  	
	  	if (fini=="") {
	  		alert("Por favor ingrese fecha inicial");
	  		document.frmrpt01.fec_ini.focus();
	  		return false;
	  	};

	  	if (ffin=="") {
	  		alert("Por favor ingrese fecha final");
	  		document.frmrpt01.fec_fin.focus();
	  		return false;
	  	};

	  	var str=document.frmrpt01.fec_ini.value;
   		var n=str.split("/",3);
			var fec_in = n[2]+"-"+n[1]+"-"+n[0];

			var str=document.frmrpt01.fec_fin.value;
   		var m=str.split("/",3);
			var fec_fn = m[2]+"-"+m[1]+"-"+m[0];

			var f_ini = Date.parse(fec_in.toString());
			var f_fin = Date.parse(fec_fn.toString());

	 		// alert(fec_in+": "+Number(f_ini)+ "\n" +fec_fn+": "+Number(f_fin));
			// alert(f_ini-f_fin);
		if(Number(f_ini)>Number(f_fin)){
	 		alert("Por favor ingrese periodo de días válido");
			document.frmrpt01.fec_ini.focus();
			return false;
		}

	  	var content = jQuery("#view_rpt");
			content.fadeIn('slow').load("proc_rpt01.php?fci="+fini+"&fcf="+ffin);
  		// alert(opc01[1].value);
  	};

  }

 	function verprint(url) {
		var fini= document.frmrpt01.fec_ini.value;
  		var ffin= document.frmrpt01.fec_fin.value;
  		var parabus = document.frmrpt01.txtparabus.value;
		// alert(parabus);
	  	var opc01 = document.getElementsByName("opt1");
		
	  	if (opc01[0].checked) {
			printview('print_rpt01.php?pr1='+parabus);
	  	};	

	  	if (opc01[1].checked) {
	  		printview('print_rpt01.php?fci='+fini+'&fcf='+ffin);
	  	};
	}	
  
</script>

<?php include 'funciones.php'; ?>

<body>

<?php
  include("conectar.php");
  $link=Conectarse();
  $pag = "REPORTE DE VENTAS";

  $pag_org = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
  //verificamos si en la ruta nos han indicado el directorio en el que se encuentra
  if ( strpos($pag_org, '/') !== FALSE )
      //de ser asi, lo eliminamos, y solamente nos quedamos con el nombre y su extension
  $pag_org = array_pop(explode('/', $pag_org));

 
  $pag_sext=preg_replace('/\.php$/', '' ,$pag_org);

  

  if($_GET["sw"]==1){     // NUEVO
    // $id=autogenerado("pedidos","cod_pedido",6); 
    // // $ing = 0;
    // // $ing2 = 0;

  }elseif($_GET["sw"]==2){  // EDITAR


  }else{ //   LISTA
  
  ?>

    <div id="fra_crud">
      <?php // if ($_GET["msn"]=='et1') { ?>
            <!-- // <script type="text/javascript">setTimeout("cerrar()",6000);</script> -->
<!--             <div class="notibar msgsuccess">
              <a class="close" id="equis"></a>
              <p>El comprobante se emitió con exito!!!</p>;
            </div> -->
      <?php //}  ?>

      <?php //if ($_GET["msn"]=='an1') { ?>
            <!-- // <script type="text/javascript">setTimeout("cerrar()",6000);</script> -->
<!--             <div class="notibar msgsuccess">
              <a class="close" id="equis"></a>
              <p>El comprobante se anuló con exito!!!</p>;
            </div> -->
      <?php //}  ?>
        
        <div class="contenttitle2">
          <h3><?php echo strtoupper($pag); ?></h3>
        </div><!--contenttitle-->
        <br>

  <form action="emitir.php" method="post" enctype="multipart/form-data" name="frmrpt01" onSubmit="return validar(this)">
    <table class="form_crud">
		  <thead>
		    <tr>
		      <th colspan="3">
		        DATOS DEL REPORTE         
		      </th>
		    </tr>
		  </thead>
      <tbody>
      	<tr>
			<td>
			      <table cellpadding="0" cellspacing="0" border="0" class="stdtable">
			        <tbody>
	<!-- 			    <tr>
				            <td width="8%"><label>IGV : </label></td>
				            <td>
				                <span class="field">
				                <input type="text" name="igv" id="igv" value="<?=sprintf("%01.2f", $igv)?>" class="smallinput" style="width:10%; text-align:right;" readonly>
				                </span>&nbsp;Nuevos soles.
				            </td>
				        </tr> -->
			          <tr>
			            <td colspan="2">
			            	<input type="radio" name="opt1" value="1">Por Clientes
			            	&nbsp;&nbsp;&nbsp;
			            	<input type="radio" name="opt1" value="2">Por Fechas
			            	&nbsp;&nbsp;&nbsp;
			            </td>
			          </tr>    	

			          <tr>
			              <td colspan="2">
			              	<label>Ingrese cliente : </label>&nbsp;&nbsp;&nbsp;
				            	<span class="field">
				              	<input type="text" id="txtparabus" name="txtparabus" class="smallinput" style="width:30%;" />
				              </span>	
				              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			              	<label>Fecha Inicio : </label>&nbsp;&nbsp;&nbsp;
			                <span class="field">
			                  <input type="text" id="fec_ini" name="fec_ini" class="width100" />
			                </span>
			                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			               	<label>Fecha Inicio : </label>&nbsp;&nbsp;&nbsp;
			                <span class="field">
			                  <input type="text" id="fec_fin" name="fec_fin" class="width100" />
			                </span>
			              </td>
			          </tr> 

			          <tr>
			            <td colspan="2">
				            <p class="stdformbutton">
				                <?php 

				                  // $cod=$_GET["id"];                     
				                  // $sql="SELECT estado 
				                  //       FROM comprobante 
				                  //       WHERE cod_pedido ='".$_GET["id"]."'"; 
				                  // $res=@mysql_query($sql,$link);
				                  // $row1=@mysql_fetch_array($res);
				                      
				                  // if ($row1[0]==NULL) {
				                ?> 
<!-- 				                  <input name="grabar" type="submit" value="   Emitir comprobante   " class="boton">
				                  &nbsp;&nbsp;&nbsp; -->
				                
				                <?php  //}  
				                  //elseif ($row1[0]==1) {
				                ?>     
				                        
<!-- 				                  <input type="button" name="anular"  value="   Anular comprobante   " class="stdbtn btn_orange" onclick="anula(<?=$_GET["id"]?>);">
				                  &nbsp;&nbsp;&nbsp; -->

<!-- 				                  <input type="button" name="imprimir" value="  Imprimir  " class="stdbtn btn_orange" onclick="printview('print_comprob.php?id=<?php echo $cod; ?>'); return false;">
				                  &nbsp;&nbsp;&nbsp; -->

				                <?php
				                  //} 
				                ?>
				                	<input type="button" name="aceptar"  value="   Aceptar   " class="stdbtn btn_orange" onclick="envia_rpt();">
				                  &nbsp;&nbsp;&nbsp;

				                  <input type="button" name="imprimir" value="  Imprimir  " class="stdbtn btn_orange" onclick="verprint('print_rpt01.php'); return false;">
				                  &nbsp;&nbsp;&nbsp;	


<!-- 				                  <input type="button" name="salir" value="  Salir  " class="stdbtn btn_orange" onclick="G('<?=$pag_org?>');"> -->

				                  <input type="hidden" value="<?php echo $_GET["id"]; ?>" name="id">
				            </p>
			            </td>
			          </tr>   
			        </tbody>
			      </table>
		    	</td>  
      	</tr>
      </tbody>
    </table>
  </form>



            
    </div>
    <div id="fra_crud">
	    <div id="view_rpt"></div>
    </div>

<?php  
    echo "</body>\n";
    echo "</html>";
    exit();
   } 
 ?>

<div id="fra_crud">
  <br>
  <form action="emitir.php" method="post" enctype="multipart/form-data" name="form1" onSubmit="return validar(this)">
    <table class="form_crud">
		  <thead>
		    <tr>
		      <th colspan="3">
		        COMPROBANTE DE PEDIDO: <?php echo $_GET["id"]; ?>         
		      </th>
		    </tr>
		  </thead>
      <tbody>
      	<tr>
					<td>
			      <table cellpadding="0" cellspacing="0" border="0" class="stdtable">
			        <tbody>
			          <tr>
			            <td colspan="2"><b>CODIGO:</b>
			              
			                <b><?=$id?></b> 
			                <input type='hidden' name='id' id="id" class='Text' value='<?=$id?>'>
			                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			                <b>Fecha Emisión: &nbsp;&nbsp;<?=$fec_em?></b>
			            </td>
			          </tr>

			          <tr>
			              <td width="8%"><label>Ticket : </label></td>
			              <td>
			                <span class="field">
			                      <input type="text" name="ticket" id="ticket" value="<?=$ticket?>" class="smallinput" readonly>
			                    </span>
			              </td>
			          </tr> 

			          <tr>
			              <td width="8%"><label>Tipo : </label></td>
			              <td>
			                <span class="field">
			                    <input type="text" name="tipoc" id="tipoc" value="<?=$tipo?>" class="smallinput" style="width:10%; text-align:center;" readonly>
			                    </span>
			              </td>
			          </tr> 

			          <tr>
			              <td width="8%"><label>Subtotal : </label></td>
			              <td><span class="field">
			                <input type="text" name="subtotal" id="subtotal" value="<?=sprintf("%01.2f", $subtot)?>" class="smallinput" style="width:10%; text-align:right;" readonly>
			                    </span>&nbsp;Nuevos soles.
			              </td>
			          </tr> 
			    
			          <tr>
			            <td width="8%"><label>IGV : </label></td>
			            <td>
			                <span class="field">
			                <input type="text" name="igv" id="igv" value="<?=sprintf("%01.2f", $igv)?>" class="smallinput" style="width:10%; text-align:right;" readonly>
			                </span>&nbsp;Nuevos soles.
			            </td>
			          </tr>

			          <tr>
			            <td width="8%"><label>Total : </label></td>
			            <td>
			              <span class="field">
			              <input type="text" name="total" id="total" value="<?=sprintf("%01.2f", $total)?>" class="smallinput" style="width:10%; text-align:right;" readonly>
			              </span>&nbsp;Nuevos soles.
			            </td>
			          </tr>             
			            
			          <tr>
			            <td colspan="2">
				            <p class="stdformbutton">
				                <?php 

				                  $cod=$_GET["id"];                     
				                  $sql="SELECT estado 
				                        FROM comprobante 
				                        WHERE cod_pedido ='".$_GET["id"]."'"; 
				                  $res=@mysql_query($sql,$link);
				                  $row1=@mysql_fetch_array($res);
				                      
				                  if ($row1[0]==NULL) {
				                ?> 
				                  <input name="grabar" type="submit" value="   Emitir comprobante   " class="boton">
				                  &nbsp;&nbsp;&nbsp;
				                <?php  }  
				                  elseif ($row1[0]==1) {
				                ?>     
				                        
				                  <input type="button" name="anular"  value="   Anular comprobante   " class="stdbtn btn_orange" onclick="anula(<?=$_GET["id"]?>);">
				                  &nbsp;&nbsp;&nbsp;
				                  <input type="button" name="imprimir" value="  Imprimir  " class="stdbtn btn_orange" onclick="printview('print_comprob.php?id=<?php echo $cod; ?>'); return false;">
				                  &nbsp;&nbsp;&nbsp;

				                <?php
				                  } 
				                ?>
				                    
				                    <input type="button" name="salir" value="  Salir  " class="stdbtn btn_orange" onclick="G('<?=$pag_org?>');">
				                    <input type="hidden" value="<?php echo $_GET["id"]; ?>" name="id">
				            </p>
			            </td>
			          </tr>   
			        </tbody>
			      </table>
		    	</td>  
      	</tr>
      </tbody>
    </table>
  </form>

</div>

</body>
</html>