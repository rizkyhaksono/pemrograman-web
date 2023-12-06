<?php

namespace app\Routes;

include 'Controller/BooksController.php';

use app\Controller\BooksController;

class BooksRoutes
{
  public function handle($method, $path)
  {
    if ($method == 'GET' && $path == '/api/book') {
      $controller = new BooksController();
      echo $controller->index();
    } elseif ($method == 'GET' && preg_match('/^\/api\/book\/\d+$/', $path)) {
      $pathParts = explode('/', $path);
      $id = end($pathParts);
      $controller = new BooksController();
      echo $controller->getById($id);
    } elseif ($method == 'POST' && $path == '/api/book') {
      $controller = new BooksController();
      echo $controller->insert();
    } elseif ($method == 'PUT' && preg_match('/^\/api\/book\/\d+$/', $path)) {
      $pathParts = explode('/', $path);
      $id = end($pathParts);
      $controller = new BooksController();
      echo $controller->update($id);
    } elseif ($method == 'DELETE' && preg_match('/^\/api\/book\/\d+$/', $path)) {
      $pathParts = explode('/', $path);
      $id = end($pathParts);
      $controller = new BooksController();
      echo $controller->delete($id);
    }
  }
}
