<?php

namespace app\Routes;

// include "/2-workstation/3-kuliah/semester-5/pemrograman-web/codelab/modul5/app/Controller/ProductController.php";
include 'Controller/ProductController.php';

use app\Controller\ProductController;

class ProductRoutes
{
  public function handle($method, $path)
  {
    // if request is GET and path '/api/product'
    if ($method == 'GET' && $path == '/api/product') {
      $controller = new ProductController();
      echo $controller->index();
    }

    // if request is GET and path have a value on '/api/product'
    if ($method == 'GET' && strpos($path, '/api/product/') == 0) {
      // extract id from path
      $pathParts = explode('/', $path);
      $id = $pathParts[count($pathParts) - 1];

      $controller = new ProductController();
      echo $controller->getById($id);
    }

    // if request is POST and path '/api/product'
    if ($method == 'POST' && $path == '/api/product') {
      $controller = new ProductController();
      echo $controller->insert();
    }

    // if request is PUT and have a value on '/api/product'
    if ($method == 'PUT' && strpos($path, '/api/product/') == 0) {
      // extract id from path
      $pathParts = explode('/', $path);
      $id = $pathParts[count($pathParts) - 1];

      $controller = new ProductController();
      echo $controller->update($id);
    }

    // if request id DELETE and path have value on '/api/product'
    if ($method == 'DELETE' && strpos($path, '/api/product/') == 0) {
      // extract id from path
      $pathParts = explode('/', $path);
      $id = $pathParts[count($pathParts) - 1];

      $controller = new ProductController();
      echo $controller->delete($id);
    }
  }
}
