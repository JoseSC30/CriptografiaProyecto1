<?php

  $n = $_POST['textoClaro'];
  $clave = $_POST['clave'];

  $n = strtoupper($n);
  $n = str_replace(' ','', $n);

  echo cifrado_transposcion_por_filas($n, 1, $clave);
  
  function cifrado_transposcion_por_filas($texto_en_claro, $cantidad_de_columnas, $caracter_para_rellenar){
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

//PASAR TEXTO A MAYUSCULAS, QUITAR ESPACIOS, Y RELLENAR LOS CARACTERES FALTANTES
function formatear_texto($texto_en_claro, $cantidad_de_columnas, $caracter_para_rellenar){
  $texto_en_claro = strtoupper($texto_en_claro);
  $texto_en_claro = quitar_espacios_en_blanco($texto_en_claro);
  $relleno = strlen($texto_en_claro) % $cantidad_de_columnas;
  if($relleno > 0){
      $texto_en_claro = rellenar_texto($texto_en_claro,$cantidad_de_columnas-$relleno,$caracter_para_rellenar);
  }

  return $texto_en_claro;
}

function quitar_espacios_en_blanco($texto){
  $longitud_del_texto = strlen($texto);
  $nuevo_texto = "";

  for($i = 0 ; $i < $longitud_del_texto ; $i++){
      if($texto[$i] != " "){
          $nuevo_texto = $nuevo_texto . $texto[$i];
      }
  }

  return $nuevo_texto;
}


?>