<?php

  $n = $_POST['textoClaro'];
  $clave = $_POST['clave'];

  // $n = strtoupper($n);
  // $n = str_replace(' ','', $n);

  echo puroConClave($clave, 1, $n);
  
  function puroConClave($clv, $des, $msj){
    $alfabeto = ['A', 'B', 'C', 'D', 'E', 'F ', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'Ñ', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
    $clave = strtoupper($clv);
    $clave = str_replace(' ', '', $clave);
    $desplazamiento = $des;
    $mensaje = strtoupper($msj);

    $newalfabeto = [];
    $late = [];
    $c = 0;
    $k = 0;
    for ($i=0; $i < count($alfabeto); $i++) {
        if ($k < $desplazamiento) {
            $newalfabeto[$i] = 1;
            $k++;
        } else {
            $letra = substr($clave, $c, 1);
            if (!in_array($letra, $late)) {
                $newalfabeto[$k] = $letra;
                array_push($late, $letra);
                $k++;
            }
            $c++;
        }

        if ($k > $desplazamiento + strlen($clave)) {
            $newalfabeto[$i] = 1;
            $k++;
        }
    }

    $c = $desplazamiento + strlen($clave) - 2;
    for ($i=0; $i < count($alfabeto); $i++) { 
        if (!in_array($alfabeto[$i], $late) && $c < count($alfabeto)) {
            $newalfabeto[$c] = $alfabeto[$i];
            $c++;
        }
    }

    $c = 0;
    for ($j=0; $j < count($alfabeto); $j++) { 
        if (!in_array($alfabeto[$j], $late) && $c < $desplazamiento) {
            $newalfabeto[$c] = $alfabeto[$j];
            $c++;
        }
    }

    $resultado = "";
    for ($i=0; $i < strlen($mensaje); $i++) { 
        $letra = substr($mensaje, $i, 1);
        if ($letra == " ") {
            $resultado = $resultado . " ";
        }
        $clave = array_search($letra, $alfabeto);
        $resultado = $resultado . $newalfabeto[$clave];
    }

    return $resultado;
  }

?>