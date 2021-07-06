<?php

  $n = $_POST['textoClaro'];

  $n = strtoupper($n);
  $n = str_replace(' ','', $n);

  echo cifrado_transposicion_por_series($n);
  
  function cifrado_transposicion_por_series($texto_en_claro){
    $texto_en_claro = strtoupper($texto_en_claro);
    $texto_en_claro = quitar_espacios_en_blanco($texto_en_claro);

    $submensaje_1 = "";
    $submensaje_2 = "";
    $submensaje_3 = "";
    for($i = 0 ; $i < strlen($texto_en_claro) ; $i++){
        if(es_primo($i+1)){
            $submensaje_1 = $submensaje_1 . $texto_en_claro[$i];
        }else if(es_par($i+1)){
            $submensaje_2 = $submensaje_2 . $texto_en_claro[$i];
        }else{
            $submensaje_3 = $submensaje_3 . $texto_en_claro[$i];
        }
    }

    return $submensaje_1 . $submensaje_2 . $submensaje_3;;
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


function es_primo($valor){
  if ($valor == 1)  return false;
  for($i = 2; $i <= intdiv($valor, 2); $i++){
      if($valor % $i == 0) return false;
  }
  return true;
}

function es_par($valor){
  if($valor % 2 == 0) return true;
  return false;
}


?>