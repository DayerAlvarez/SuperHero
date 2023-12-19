<?php 
require_once 'Conexion.php';

class publisher extends Conexion{
  private $pdo;

  public function __CONSTRUCT()
  {
    $this->pdo = parent::getConexion();
  }

  //Devuelve la lista completa de marcas 
  public function searchPublisher($data=[]){
    try{
      $consulta = $this->pdo->prepare("CALL spu_publisher_buscar(?)");
      $consulta->execute(
        array($data['publishername'])
      );
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function getAll(){
    try{
      $consulta = $this->pdo->prepare("CALL spu_publisher_listar()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function graficarBandos(){
    try{
      $consulta = $this->pdo->prepare("CALL spu_bando_contar()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function graficarBandosPublisher($data=[]){
    try{
      $consulta = $this->pdo->prepare("CALL spu_publisher_contarAlign(?)");
      $consulta->execute(
        array($data['publishname'])
      );
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (Exception $e){
      die($e->getMessage());
    }
  }

  public function getAllSuperHeroes($data = []){
    try {
      $consulta = $this->pdo->prepare("CALL spu_contar_superheroes_por_publishers(?)");
      $consulta->execute(
        array(
          $data['publisher_id']
        )
      );
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}