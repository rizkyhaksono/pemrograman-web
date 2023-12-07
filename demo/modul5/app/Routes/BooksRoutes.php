<?php

namespace app\Routes;

require_once 'Controller/BooksController.php';

use app\Controller\BooksController;

class BooksRoutes
{
  public function handle($method, $path)
  {
    $controller = new BooksController();

    if ($method == 'GET' && $path == '/api/book') {
      echo $controller->index();
    } elseif ($method == 'GET' && preg_match('/^\/api\/book\/\d+$/', $path)) {
      $pathParts = explode('/', $path);
      $id = end($pathParts);
      echo $controller->getById($id);
    } elseif ($method == 'POST' && $path == '/api/book') {
      echo $controller->insert();
    } elseif ($method == 'PUT' && preg_match('/^\/api\/book\/\d+$/', $path)) {
      $pathParts = explode('/', $path);
      $id = end($pathParts);
      echo $controller->update($id);
    } elseif ($method == 'DELETE' && preg_match('/^\/api\/book\/\d+$/', $path)) {
      $pathParts = explode('/', $path);
      $id = end($pathParts);
      echo $controller->delete($id);
    }
  }
}
