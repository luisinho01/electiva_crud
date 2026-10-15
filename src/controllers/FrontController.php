<?php
  namespace Electiva\Crud\controllers;

  class FrontController{
    public function __construct(){
      require_once "./src/controllers/usersController.php";
    }
  }

?>