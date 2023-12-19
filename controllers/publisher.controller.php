<?php
require_once '../models/publisher.php';

if(isset($_POST['operacion'])){
    $publisher = new Publisher();
  
    if($_POST['operacion'] == 'searchPublisher'){
      $respuesta = $publisher->searchPublisher(["publishername"=>$_POST['publishername']]);
      sleep(1);
      echo json_encode($respuesta);
    }
  
    if($_POST['operacion'] == 'graficarBandosPublisher'){
      $respuesta = $publisher->graficarBandosPublisher(["publishname"=>$_POST['publishname']]);
      sleep(1);
      echo json_encode($respuesta);
    }
}


if(isset($_GET['operacion'])){
  $publisher = new Publisher();

  if($_GET['operacion'] == 'listar'){
    $resultado = $publisher->getAll();
    echo json_encode($resultado);
  }

  if($_GET['operacion'] == 'graficarBandos'){
    echo json_encode($publisher->graficarBandos());
  }
}

?>