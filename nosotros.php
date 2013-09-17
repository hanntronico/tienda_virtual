<?php 
session_start();
if (isset($_SESSION["s_cod"]))
{
  if (isset($_SESSION["s_tipo"]))  
    { 
     if($_SESSION["s_tipo"]==1) 
      {  
        header("location: modulos/admin/");
        exit;
      }elseif ($_SESSION["s_tipo"]==2) {
        header("location: modulos/usuario/principal.php");
        exit;
      }
    }
}

include("modulos/conectar.php");
$link=Conectarse();
?>

<?php include ("head.php"); ?>
    
    <body <?php 
      if ($_GET["deny"]==1 || $_GET["deny"]==2 || $_GET["deny"]==3 || $_GET["deny"]==4) 
          {echo "onload='carga_registro();'";} ?> >
        
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

          <?php include ("paneles.php"); ?>
          <?php include ("header.php"); ?>
          <?php include ("nav.php"); ?>

        <section id="contenedor">
          <?php //include ("contenedor.php"); ?>
          <?php //include ("nuevosprod.php"); ?>
          <section id="msn_block">
            <div id="cont_text" style="padding:10px;">
            <fieldset>
            
              
              <table border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td colspan="3">&nbsp;&nbsp;<b style='text-decoration:underline;'>Información de la Empresa</b></td>
                  </tr>
                  <tr>
                    <td width="40%"><?php include 'slider02/slider_nos.php'; ?></td>
                    <td width="2%">&nbsp;</td>
                    <td><p>Cuando se pregunta acerca de cómo medir la competitividad en una empresa, la respuesta más simple es la de medir su participación en el mercado. Uno de los medios para mejorar continuamente la competitividad de una empresa es la de producir a bajos costos y con alta calidad. Esta afirmación implica que el sistema de producción debe ser abastecido de insumos que cumplan con las condiciones de los productos/servicios de los que formarán parte (por ejemplo: para producir prendas de vestir para fiestas, las telas a adquirir deben responder a requerimientos de delicadeza, buen gusto, finura y calidad) en las condiciones lo más ventajosas posibles. De ahí se desprende la importancia de la función de compras.  Se reconocen como condiciones ventajosas para la compra: </p></td>

                  </tr>
              </table>
                       
            <div style="padding:0px 40px;">
              <ul>
                <li>El precio de compra</li>
                <li>El plazo de pago</li>
                <li>El plazo de entrega</li>
                <li>El servicio de posventa que realiza el proveedor al comprador (reposición rápida de piezas defectuosas, servicio técnico garantizado, asesoramiento)</li>
                <li>El servicio de posventa que realiza el proveedor al comprador (reposición rápida de piezas defectuosas, servicio técnico garantizado, asesoramiento)</li>
                <li>La calidad obtenida en lo que se compra</li>
                <li>La estabilidad de ese proveedor como tal (ya que sirve de muy poco aprovisionar una empresa con proveedores de los cuales no se sabe si van a estar funcionando normalmente en el momento de una próxima compra, o de solicitarles servicio de posventa).</li>
            </ul>
            </div>

            <br>

<!--             <p><b>Relaciones con otras áreas de la empresa</b></p> 
            <p>Como todas las áreas, Compras no es un compartimiento estanco en la empresa, sino que se relaciona intensamente con numerosos sectores importantes para el negocio.  En las empresas, el sector de Compras se relaciona con:  La Dirección General, a través de la fijación de políticas generales, procedimientos y análisis de las tendencias y cambios en el entorno; en lo que involucra a las compras de la empresa.  Producción, a través de información sobre plazos de entrega, costo de materias primas, calidad disponible, fuentes de aprovisionamiento, para el  cumplimiento de los programas productivos del sector.  Finanzas, en la fijación de las políticas financieras con las compras, requerimientos de fondos y presupuesto del área-  Recepción y almacenes, en la administración de la logística de movimientos y coordinación de necesidades de espacio, según la planificación de entregas y embarques de mercaderías.  Contabilidad, para el control de inventarios, costeo de materiales y valorizaciones y provisiones de las compras de bienes y/o servicios ingresados en un período a la empresa.</p>  -->
  
            <br>

            <!-- <p>Por favor, chekear su correo e ingresar a comprar en nuestra Tienda Online</p> <br>
            <p style="text-decoration: underline;">La Gerencia de Ventas</p> -->
            </fieldset>
            </div>
          </section>
        </section>
        
          <!-- <aside> esto es el aside </aside> -->
          <?php include ("footer.php"); ?>
          <br><br>
          <?php include ("config_final.php"); ?>

    </body>
</html>
