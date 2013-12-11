<?php 

  function llenarcombo($tabla,$campos,$condicion,$seleccionado,$parametroselect,$name){
      Global $link;
      $rs=@mysql_query("set names utf8",$link);
      $fila=@mysql_fetch_array($res);

      $rs = mysql_query("select $campos from $tabla".$condicion,$link);
      echo "<select name=".$name." ".$parametroselect." data-placeholder='Seleccione ".$tabla."...' class='chzn-select' style='width:350px;' tabindex='2'>";
        echo "<option value=''></option>";
        while($cur = mysql_fetch_array($rs)){
          $seleccionar="";
          if($cur[0]==$seleccionado) $seleccionar="selected";
          echo "<option value=".$cur[0]." ".$seleccionar.">".$cur[1]."</option>";
        }
      echo "</select>";
      mysql_free_result($rs);
  }


  function autogenerado($tabla,$campocodigo,$numcaracteres){
    Global $link;
    //para extraer de la derecha se multiplica por -1
    $numcaracteres=$numcaracteres*(-1);
    $rsTabla=mysql_query("select count($campocodigo) from $tabla",$link);
    $ATabla=mysql_fetch_array($rsTabla);
    $nreg=$ATabla[0];
    if($nreg>0) {
      $rsTabla=mysql_query("select $campocodigo from $tabla",$link);
      mysql_data_seek($rsTabla,$nreg-1);
      $ATabla=mysql_fetch_array($rsTabla);
    }
    
    $cod=$ATabla[0]+1;
    $cod="0000000000".$cod;
    $generado=substr($cod,$numcaracteres);
    mysql_free_result($rsTabla);
    
    return $generado;
  }


function autogenerado2($tabla,$campocodigo,$numcaracteres){
    Global $link;
    //para extraer de la derecha se multiplica por -1
    $numcaracteres=$numcaracteres*(-1);
    $rsTabla=mysql_query("select count($campocodigo) from $tabla",$link);
    $ATabla=mysql_fetch_array($rsTabla);
    $nreg=$ATabla[0];
    if($nreg>0) {
      $rsTabla=mysql_query("select $campocodigo from $tabla",$link);
      mysql_data_seek($rsTabla,$nreg-1);
      $ATabla=mysql_fetch_array($rsTabla);
    }

    $cod=substr($ATabla[0],1)+1;
    $cod="0000000000".$cod;
    $generado="T".substr($cod,$numcaracteres);
    mysql_free_result($rsTabla);
    
    return $generado;
  }

function autogenerado3($tabla,$campocodigo,$numcaracteres){
    Global $link;

    $numcaracteres=$numcaracteres*(-1);
    $rsTabla=mysql_query("select MAX($campocodigo) from $tabla",$link);
    $ATabla=mysql_fetch_array($rsTabla);
    $nreg=$ATabla[0];

    $cod=substr($ATabla[0],1)+1;
    $cod="0000000000".$cod;
    $generado="T".substr($cod,$numcaracteres);
    mysql_free_result($rsTabla);
    
    return $generado;
  }

  function dma_shora($fec)
    {
      list($fecha,$hora)=explode(" ",$fec);
      list($anio,$mes,$dia)=explode("-",$fecha); 
      $fecresult = $dia."/".$mes."/".$anio;
      return $fecresult;
    }



/* a esta funcion se le pasa el nombre de la tabla a buscar y
 * el nombre del campo con los id
 */
//  public function buscarId($tabla, $campo) {
 
//  $val = 1; //valor inicial para el id
 
// $bucle = true; //variable que mantendra el bucle en funcionamiento hasta encontrar el espacio
 
// /* la magia viene aqui: buscamos el campo id que cumpla con la condicion (en primer caso su
//  valor sea 1, en la segunda vuelta el id sea 2, y sucesivamente)
//  hasta encotrar el espacio disponible, IMPORTARTE
//  SUBSTITUIR CONECTAR() POR SU FUNCIÓN DE CONEXIÓN A BASE DE DATOS
//  */
 
// while ($bucle) {
 
// $result = pg_query($this->conectar(), "SELECT $campo FROM $tabla WHERE $campo=$val");
//  // $result = $this->consulta("SELECT $campo FROM $tabla WHERE $campo=$val");
//  //almacena en $n el numero de filas encontradas en la consulta
//  $n = pg_num_rows($result);
 
// if ($n > 0) {
//  $val++; //se incrementa el valor una unidad
//  } else {
//  $bucle = false; // es porque encontró un espacio , se bucle lo pasa a falso para salir del ciclo
//  echo 'id disponible = ' . $val; //imprime el id disponible
//  }
//  }
//  }






 ?>