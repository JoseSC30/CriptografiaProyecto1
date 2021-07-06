<?php

  $n = $_POST['textoClaro'];
  $clave = $_POST['clave'];

  $n = strtoupper($n);
  $n = str_replace(' ','', $n);

  echo cifrado_transposcion_por_columnas($n,1 , $clave);
  
  function cifrado_transposcion_por_columnas($texto_en_claro, $cantidad_de_columnas, $caracter_para_rellenar){
    $texto_en_claro = formatear_texto($texto_en_claro, $cantidad_de_columnas, $caracter_para_rellenar);
    $texto_cifrado = "";    
    $matriz =  str_split($texto_en_claro, $cantidad_de_columnas);
    for($i = 0 ; $i < $cantidad_de_columnas; $i++){
        for($j = 0 ; $j < sizeof($matriz) ; $j++){
            $bloque = $matriz[$j];
            $texto_cifrado = $texto_cifrado . $bloque[$i];                                 
        }

    }
 
    return $texto_cifrado;
}

function formatear_texto($texto_en_claro, $cantidad_de_columnas, $caracter_para_rellenar){
  $texto_en_claro = strtoupper($texto_en_claro);
  $texto_en_claro = quitar_espacios_en_blanco($texto_en_claro);
  $relleno = strlen($texto_en_claro) % $cantidad_de_columnas;
  if($relleno > 0){
      $texto_en_claro = rellenar_texto($texto_en_claro,$cantidad_de_columnas-$relleno,$caracter_para_rellenar);
  }

  return $texto_en_claro;
}


?>