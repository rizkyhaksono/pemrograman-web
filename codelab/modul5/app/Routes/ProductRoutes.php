<?php

namespace app\Routes;

include 'Controller/ProductController.php';

use app\Controller\ProductController;

class ProductRoutes
{
  public function handle($method, $path)
  {
    if ($method == 'GET' && $path == '/api/product') {
      $controller = new ProductController();
      echo $controller->index();
    }

    if ($method == 'GET' && strpos($path, '/api/product/') == 0) {
      $pathParts = explode('/', $path);
      $id = $pathParts[count($pathParts) - 1];

      $controller = new ProductController();
      echo $controller->getById($id);
    }

    if ($method == 'POST' && $path == '/api/product') {
      $controller = new ProductController();
      echo $controller->insert();
    }

    if ($method == 'PUT' && strpos($path, '/api/product/') == 0) {
      $pathParts = explode('/', $path);
      $id = $pathParts[count($pathParts) - 1];
      $controller = new ProductController();
      echo $controller->update($id);
    }

    if ($method == 'DELETE' && strpos($path, '/api/product/') == 0) {
      $pathParts = explode('/', $path);
      $id = $pathParts[count($pathParts) - 1];

      $controller = new ProductController();
      echo $controller->delete($id);
    }
  }
}
