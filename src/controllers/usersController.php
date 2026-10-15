<?php
  use Electiva\Crud\models\UsersModels;
  $usersModels = new UsersModels();

  if(!empty($_POST) && $_POST['accion'] == "consultar"){
    $users = $usersModels->consultarUsuarios();

    echo json_encode($users);
    exit();
  }

  if(!empty($_POST) && $_POST['accion'] == "registrar"){
    $usersModels->nombre = $_POST['nombre'];
    $usersModels->seccion = $_POST['seccion'];
    $usersModels->correo = $_POST['correo'];
    $usersModels->telefono = $_POST['telefono'];

    $response = $usersModels->registrarUsuario();

    echo json_encode($response);
    exit();
  }

  if(!empty($_POST) && $_POST['accion'] == "eliminar"){
    $usersModels->id = $_POST['id'];

    $response = $usersModels->eliminarUsuario();

    echo json_encode($response);
    exit();
  }

  if(!empty($_POST) && $_POST['accion'] == "editar"){
    $usersModels->id = $_POST['id'];
    $usersModels->nombre = $_POST['nombre'];
    $usersModels->seccion = $_POST['seccion'];
    $usersModels->correo = $_POST['correo'];
    $usersModels->telefono = $_POST['telefono'];

    $response = $usersModels->editarUsuario();

    echo json_encode($response);
    exit();
  }

  require_once "./views/users.php";
?>