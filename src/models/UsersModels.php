<?php
  namespace Electiva\Crud\models;

  use PDO;
  use PDOException;
  use Electiva\Crud\config\database\ConnectDB;

  class UsersModels extends ConnectDB{
    public $id;
    public $nombre;
    public $seccion;
    public $correo;
    public $telefono;

    public function consultarUsuarios(){
      try {
        $sql = "SELECT u.id, u.nombre, u.correo, u.seccion, u.telefono FROM users as u;";
    
        $consulta = $this->conex->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

        return ($resultado) ? $resultado : [];
      }catch(PDOException $e){
        error_log("Error en consultar: " . $e->getMessage());
        return [];
      };
    }
    public function registrarUsuario(){
      try{
        $sql = "INSERT INTO users (nombre, seccion, correo, telefono)
                VALUES (:nombre, :seccion, :correo, :telefono)";

        $consulta = $this->conex->prepare($sql);

        $consulta->bindParam(":nombre", $this->nombre, PDO::PARAM_STR);
        $consulta->bindParam(":seccion", $this->seccion, PDO::PARAM_STR);
        $consulta->bindParam(":correo", $this->correo, PDO::PARAM_STR);
        $consulta->bindParam(":telefono", $this->telefono, PDO::PARAM_STR);

        $consulta->execute();
        
        return ["status" => "Registrado con exito"];
      }catch(PDOException $e){
        error_log("Error en registrar: " . $e->getMessage());
        return ['status' => 'ERROR_DATABASE'];
      }
    }
    public function editarUsuario(){
      try{
        $sql = "UPDATE users SET nombre = :nombre, seccion = :seccion, correo = :correo, telefono = :telefono
                WHERE id = :id;";

        $consulta = $this->conex->prepare($sql);

        $consulta->bindParam(":nombre", $this->nombre, PDO::PARAM_INT);
        $consulta->bindParam(":seccion", $this->seccion, PDO::PARAM_INT);
        $consulta->bindParam(":correo", $this->correo, PDO::PARAM_INT);
        $consulta->bindParam(":telefono", $this->telefono, PDO::PARAM_INT);
        $consulta->bindParam(":id", $this->id, PDO::PARAM_INT);

        $consulta->execute();

        return ["status" => "Editado con exito"];
      }catch(PDOException $e){
        error_log("Error en editar: " . $e->getMessage());
        return ['status' => 'ERROR_DATABASE'];
      }
    }
    public function eliminarUsuario(){
      try{
        $sql = "DELETE FROM users WHERE id = :id;";

        $consulta = $this->conex->prepare($sql);
        $consulta->bindParam(":id", $this->id, PDO::PARAM_INT);

        $consulta->execute();

        return ["status" => "Eliminado con exito"];
      }catch(PDOException $e){
        error_log("Error en eliminar: " . $e->getMessage());
        return ['status' => 'ERROR_DATABASE'];
      }
    }
  }

?>