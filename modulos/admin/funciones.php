<?php 

  function llenarcombo($tabla,$campos,$condicion,$seleccionado,$parametroselect,$name){
      Global $link;
      $rs=@mysql_query("set names utf8",$link);
      $fila=@mysql_fetch_array($res);

      $rs = mysql_query("select $campos from $tabla".$condicion,$link);
      echo "<select name=".$name." ".$parametroselect." data-placeholder='Seleccione subcategoría...' class='chzn-select' style='width:350px;' tabindex='2'>";
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


 ?>