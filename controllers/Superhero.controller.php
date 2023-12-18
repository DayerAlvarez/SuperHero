<?php
require_once '../models/Superhero.php';

if (isset($_POST['operacion'])){

    $superhero = new Superhero();
  
  if ($_POST['operacion'] == 'search'){
    $respuesta = $superhero->search(["publisher" => $_POST['publisher']]);
    sleep(2);
    echo json_encode($respuesta);
  }

  if($_POST['operacion'] == 'add'){
    $datosRecibidos = [
      "id"              => $_POST["id"],
      "superhero_name"  => $_POST["superhero_name"],
      "full_name"       => $_POST["full_name"],
      "gender_id"       => $_POST["gender_id"],
      "race_id"         => $_POST["race_id"]
    ];

    $idobtenido = $superhero->add($datosRecibidos);
    echo json_encode($idobtenido);
  }
}
?>