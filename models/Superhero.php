<?php
require 'Conexion.php';
class Superhero extends Conexion{

  private $pdo;

  public function __CONSTRUCT()
  {
    $this->pdo = parent::getConexion();
  }

  public function getAll(){
    try{
      $consulta = $this->pdo->prepare("CALL spu_superhero_listar()");
      $consulta->execute(
        array(
          $data['id'],
          $data['superhero_name'],
          $array['full_name'],
          $array['gender_id'],
          $array['race_id']
        )
      );
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function search($data = []){
    try{
      $consulta = $this->pdo->prepare("CALL spu_superhero_buscar(?)");
      $consulta->execute(
        array($data['publisher'])
      );

      return $consulta->fetch(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage);
    }
  }
}