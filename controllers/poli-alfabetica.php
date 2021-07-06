<?php

  $n = $_POST['textoClaro'];
  $rotacion = $_POST['rotacion'];

  echo sustitucion_polialfabetica($n, $rotacion);
  
  function sustitucion_polialfabetica($mensaje, $clave){

    $mensaje = strtoupper($mensaje);
    $mensaje = str_replace(' ','', $mensaje);
  
    $clave = strtoupper($clave);
    $clave = str_replace(' ','', $clave);
  
    $cantidad = strlen($mensaje);
  
    $alfabeto = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");

    $texto_nuevo = "";
  
    for ($i=0;$i<$cantidad;$i++){
  
        $index1 = find_index($mensaje[$i], $alfabeto);
        $index2 = find_index($clave[$i % 3], $alfabeto);
  
        $index = ($index1 + $index2 > 25)? ($index1 + $index2) - 26: $index1 + $index2;
  
        $texto_nuevo = $texto_nuevo . $alfabeto[$index];
  
    }
  
    return $texto_nuevo;
  
  
  }


  function find_index($value, $alfabeto){

    for ($i=0;$i<count($alfabeto);$i++){
  
      if ($value == $alfabeto[$i]) return $i;
  
    }
  
    return -1;
  }
  

?>