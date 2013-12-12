  <?php //echo " ".$_SESSION["s_cod"]; 
    $rs=@mysql_query("set names utf8",$link);
    $fila=@mysql_fetch_array($res);
    $sql="SELECT login, nombre, correo, cod_nivel 
          FROM usuario 
          WHERE cod_usuario=".$_SESSION["s_cod"]; 
    $res=@mysql_query($sql,$link);
    $row1=@mysql_fetch_array($res);
    // echo $row1[0];     
  ?>
  <div class="vernav2 iconmenu">
  	<ul>
      <li><a href="#formsub" class="editor">Mantenimiento</a> <span class="arrow"></span>
        <ul id="formsub">
          <!-- <li><a href="#" onclick="carga_form(1); return false;">Productos</a></li> -->
          <li><a href="#" onclick="cargare('productos.php'); return false;">Productos</a></li>
          <li>
            <a href="#" onclick="cargare('proveedores.php'); return false;">Proveedores</a>
          </li>                        
          <!-- <li><a href="#" onclick="carga_form(2); return false;">Subcategorías</a></li> -->
          <li>
            <a href="#" onclick="cargare('subcategorias.php'); return false;">Subcategorias</a>
          </li>
          <!-- <li><a href="#" onclick="carga_form(3); return false;">Subcategorías</a></li> -->
          <li><a href="#" onclick="cargare('categoria.php'); return false;">Categorías</a></li>
          <!-- <li><a href="#" onclick="carga_form(4); return false;">Marcas</a></li> -->
          <li><a href="#" onclick="cargare('marca.php'); return false;">Marcas</a></li>
        </ul>
      </li>
      
      <!-- <li><a href="filemanager.html" class="gallery">Operaciones</a></li> -->
      <li><a href="#suboper" class="addons">Operaciones</a> <span class="arrow"></span>
        <ul id="suboper">
          <?php if ($_SESSION["s_cod"]==1 || $row1["login"]=="Vendedor") { ?>
          <li><a href="#" onclick="cargare('pedidos.php'); return false;">Pedidos</a></li>
          <?php } ?>
          <?php if ($_SESSION["s_cod"]==1 || $row1["login"]=="Despachador") { ?>
          <li><a href="#" onclick="cargare('despacho.php'); return false;">Despacho</a></li>
          <?php } ?>
          <?php if ($_SESSION["s_cod"]==1 || $row1["login"]=="Repartidor") { ?>
          <li><a href="#" onclick="cargare('facturacion.php'); return false;">Entrega</a></li>
          <li><a href="#" onclick="cargare('liquidacion.php'); return false;">Liquidación</a></li>
          <?php } ?>
        </ul>
      </li>

      <?php if ($row1["cod_nivel"]==1) { ?>
      <li><a href="#control" class="elements">Control</a> <span class="arrow"></span>
        <ul id="control">
          <li>
            <a href="#" onclick="cargare('reg_compras.php'); return false;">Registro de Compras</a>
          </li>
          <li>
            <a href="#" onclick="cargare('usuarios.php'); return false;">Gestión de Usuarios</a>
          </li>
          <li>
            <a href="#" onclick="cargare('product2.php'); return false;">Gestión de Promociones</a>
          </li>
          <li>
            <a href="#" onclick="cargare('productigv.php'); return false;">Gestión de IGV</a>
          </li>
        </ul>    
      </li>

      <li><a href="#reportes" class="tables">Reportes</a> <span class="arrow"></span>
        <ul id="reportes">
          <li>
            <a href="#" onclick="cargare('rpt_ventas.php'); return false;">Reporte de Ventas</a>
          </li>
          <li>
            <a href="#" onclick="cargare('rpt_clientes.php'); return false;">Reporte de Clientes</a>
          </li>
          <li><a href="#" onclick="cargare('rpt_productos.php'); return false;">Reporte Productos</a></li>
        </ul>
      </li>
      <?php } ?>

<!--  <li><a href="elements.html" class="elements">Elements</a></li>
      <li><a href="widgets.html" class="widgets">Widgets</a></li> -->
    </ul>
    <a class="togglemenu"></a>
    <br /><br />
  </div>