<?php

  $n = $_POST['textoClaro'];
  $d = $_POST['desplazamiento'];

  $n = strtoupper($n);
  $n = str_replace(' ','', $n);

  $desplazamiento = (int)$d;
  
  echo cifrado_puro($n, $desplazamiento);
  
  function cifrado_puro($texto_claro, $desplazamiento){
    // $texto_claro = "UNACOSAESSABERYOTRASABERENSENAR";
    $texto_cifrado = "";
    $alfabeto = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","Ñ","O","P","Q","R","S","T","U","V","W","X","Y","Z");
    $tamano_alfabeto = 27;
 
    for($i = 0; $i < strlen($texto_claro) ; $i++){
        $posicion = array_search($texto_claro[$i], $alfabeto);
        $posicion_caracter_cifrado = ($posicion + $desplazamiento) % $tamano_alfabeto;
        $texto_cifrado = $texto_cifrado . $alfabeto[$posicion_caracter_cifrado]; 
        
    }

    return $texto_cifrado;
  }

?>