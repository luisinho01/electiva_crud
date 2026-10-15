<?php
namespace Electiva\Crud\config\database;

	use PDO;
	use PDOException; 
  
  class connectDB {
    protected $conex;

    public function __construct(){
      $this->conex = $this->activarDB();
    }

    protected function activarDB(){
      try{
        $this->conex = new PDO("mysql:host=localhost;port=3306;dbname=electiva_user", "root", "");
        $this->conex->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $this->conex;
      } catch(PDOException $e){
        die('ERROR DE CONEXIÓN: No se ha podido conectar con la base de datos. '. $e->getMessage());
      }
    }
}