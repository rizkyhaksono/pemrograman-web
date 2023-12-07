<?php

namespace app\Routes;

require_once 'Controller/GenresController.php';

use app\Controller\GenresController;

class GenresRoutes
{
  public function handle($method, $path)
  {
    $controller = new GenresController();

    if ($method == 'GET' && $path == '/api/genre') {
      echo $controller->index();
    } elseif ($method == 'GET' && preg_match('/^\/api\/genre\/\d+$/', $path)) {
      $pathParts = explode('/', $path);
      $id = end($pathParts);
      echo $controller->getById($id);
    } elseif ($method == 'POST' && $path == '/api/genre') {
      echo $controller->insert();
    } elseif ($method == 'PUT' && preg_match('/^\/api\/genre\/\d+$/', $path)) {
      $pathParts = explode('/', $path);
      $id = end($pathParts);
      echo $controller->update($id);
    } elseif ($method == 'DELETE' && preg_match('/^\/api\/genre\/\d+$/', $path)) {
      $pathParts = explode('/', $path);
      $id = end($pathParts);
      echo $controller->delete($id);
    }
  }
}
