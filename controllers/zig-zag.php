<?php

  $n = $_POST['textoClaro'];
  $c = $_POST['constante'];

  $n = strtoupper($n);
  $n = str_replace(' ','', $n);

  echo cifrado_zig_zag($c, $n);
  
  function cifrado_zig_zag($constante, $mensaje){
    
    $mensaje = strtoupper($mensaje);
    $mensaje = str_replace(' ','', $mensaje);
    $cantidad = strlen($mensaje);
    
    if ($constante==1){
      return $mensaje;
    }

    $data = array();
  
    for($i=0;$i<$constante;$i++){
      array_push($data, array());
    }
  
    $iterable = 0;
    $status=True;
  
    for($i=0;$i<$cantidad;$i++){
      array_push($data[$iterable], $mensaje[$i]);
      if ($iterable==$constante-1){
        $status = False;
      }else if($iterable==0){
        $status = True;
      }
      if ($status){
        $iterable = $iterable + 1;
      }else{
        $iterable = $iterable - 1;
      }
    }
  
    // print_r($data);
    $texto_nuevo = "";
  
    for ($i=0;$i<$constante;$i++){
      $cont = count($data[$i]);
      for ($j=0;$j<$cont;$j++){
        $texto_nuevo = $texto_nuevo . $data[$i][$j];
      }
    }
  
    return $texto_nuevo;
  
  
  }

?>