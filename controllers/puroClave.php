<?php

$texto = $_POST['textoClaro'];
$clave = $_POST['clave'];
$posicion = $_POST['posicion'];

$desplazamiento = intval($posicion);

echo puroConClave($texto,$clave,$desplazamiento);

function cifra_puro($texto,$clave,$desplazamiento){
    $abc = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","Ñ","O","P","Q","R","S","T","U","V","W","X","Y","Z");
        $texto = strtoupper($texto);
        $clave = strtoupper($clave);
        
        $n_abc[0] = $clave[0];
        $num = 1;
        //Ingresa la palabra a n_abc
        for($j =0; $j < strlen($clave);$j++){
            if($clave[$j] != " "){
                $bool = false;
                for($k = 0; $k < $num;$k++){
                    if ($n_abc[$k]==$clave[$j]){
                        $bool = true;
                    }
                }
                if($bool == false){
                 $n_abc[$num]=$clave[$j];
                    $num = $num + 1;
                }
            }
        }
        //Ingresa letras restantes a n_abc
        for($j =0; $j < 27;$j++){
            $bool = false;
            for($k = 0; $k < $num;$k++){
                if ($n_abc[$k] == $abc[$j]){
                    $bool = true;
                }
            }
            if($bool == false){
                $n_abc[$num]=$abc[$j];
                $num = $num + 1;
            }
        }
        //Cifrado del texto
        for($i = 0; $i < strlen($texto) ;$i++){
          if($texto[$i] != " "){
             $esta = false;
                for($e = 0; $esta == false ; $e++){
                    if($texto[$i] == $abc[$e]){
                      $e = $e - $desplazamiento;

                        if($e > 26){
                            $e = $e - 27;
                        }else{
                            if($e < 0){
                          $e = $e + 27;
                            } 
                        }
                        $esta = true;
                        $texto[$i] = $n_abc[$e];
                    }
                }
            }    
        }
    return $texto;
}
?>
