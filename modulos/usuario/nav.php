        <nav>
            <!-- aquí va el nav -->
            <ul>
              <li><a href="index.php">INICIO</a></li>
              <li><a href="nosotros.php">NOSOTROS</a></li>
              <li><a href="demo.php">DEMO</a></li>
              <li><a href="sugerencias.php">SUGERENCIAS</a></li>
              <li class="overshow"><a href="principal.php">CATALOGO</a></li>
            </ul>

            <div id="buscar">
              <!-- <form action="index_submit" method="get" accept-charset="utf-8"> -->
              <!-- <form name="frmbus" accept-charset="utf-8"> -->
                <input type="text" name="txtbuscar" id="txtbuscar" value="" placeholder="Ingrese lo que desea buscar" onkeydown="checkKey(event,'txtbuscar');" autocomplete="off" >

                
              <!-- <input type="text" name="txtbusqueda" id="txtbusqueda">  -->
              <!-- <input type="button" value="Aceptar" onclick="verlist_bus();"> -->
              <!-- </form> -->
              <div id="bus_cont"></div> 
            </div>
        </nav>