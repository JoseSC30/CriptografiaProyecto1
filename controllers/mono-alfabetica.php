<?php

  $n = $_POST['textoClaro'];

  $n = strtoupper($n);
  $n = str_replace(' ','', $n);

  echo sustitucion_modo_alfabetica($n);
  

  function sustitucion_modo_alfabetica($mensaje){
    
    $alfabeto = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
    $cantidad = strlen($mensaje);
    $cantidadAlfabeto = count($alfabeto);

    $nuevoTexto = "";

    for ($i=0;$i<$cantidad;$i++){

      $index = find_index($mensaje[$i],$alfabeto);

      $nuevoTexto = $nuevoTexto . $alfabeto[($cantidadAlfabeto - 1) - $index];

    }

    return $nuevoTexto;

  }

  function find_index($value, $alfabeto){

    for ($i=0;$i<count($alfabeto);$i++){
  
      if ($value == $alfabeto[$i]) return $i;
  
    }
  
    return -1;
  }


?>