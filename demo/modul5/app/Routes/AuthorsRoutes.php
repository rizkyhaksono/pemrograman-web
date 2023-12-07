<?php

namespace app\Routes;

require_once 'Controller/AuthorsController.php';

use app\Controller\AuthorsController;

class AuthorsRoutes
{
  public function handle($method, $path)
  {
    $controller = new AuthorsController();

    if ($method == 'GET' && $path == '/api/author') {
      echo $controller->index();
    } elseif ($method == 'GET' && preg_match('/^\/api\/author\/\d+$/', $path)) {
      $pathParts = explode('/', $path);
      $id = end($pathParts);
      echo $controller->getById($id);
    } elseif ($method == 'POST' && $path == '/api/author') {
      echo $controller->insert();
    } elseif ($method == 'PUT' && preg_match('/^\/api\/author\/\d+$/', $path)) {
      $pathParts = explode('/', $path);
      $id = end($pathParts);
      echo $controller->update($id);
    } elseif ($method == 'DELETE' && preg_match('/^\/api\/author\/\d+$/', $path)) {
      $pathParts = explode('/', $path);
      $id = end($pathParts);
      echo $controller->delete($id);
    }
  }
}
