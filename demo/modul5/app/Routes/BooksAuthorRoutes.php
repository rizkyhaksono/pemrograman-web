<?php

namespace app\Routes;

require_once 'Controller/BooksAuthorController.php';

use app\Controller\BooksAuthorController;

class BooksAuthorRoutes
{
  public function handle($method, $path)
  {
    $controller = new BooksAuthorController();

    if ($method == 'GET' && $path == '/api/booksauthor') {
      echo $controller->index();
    } elseif ($method == 'GET' && preg_match('/^\/api\/booksauthor\/\d+$/', $path)) {
      $pathParts = explode('/', $path);
      $id = end($pathParts);
      echo $controller->getById($id);
    } elseif ($method == 'POST' && $path == '/api/booksauthor') {
      echo $controller->insert();
    } elseif ($method == 'PUT' && preg_match('/^\/api\/booksauthor\/\d+$/', $path)) {
      $pathParts = explode('/', $path);
      $id = end($pathParts);
      echo $controller->update($id);
    } elseif ($method == 'DELETE' && preg_match('/^\/api\/booksauthor\/\d+$/', $path)) {
      $pathParts = explode('/', $path);
      $id = end($pathParts);
      echo $controller->delete($id);
    }
  }
}
