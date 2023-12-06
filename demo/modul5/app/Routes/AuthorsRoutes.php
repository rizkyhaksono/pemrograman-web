<?php

namespace app\Routes;

include 'Controller/AuthorsController.php';

use app\Controller\AuthorsController;

class AuthorsRoutes
{
  public function handle($method, $path)
  {
    if ($method == 'GET' && $path == '/api/author') {
      $controller = new AuthorsController();
      echo $controller->index();
    } else {
      
    }
  }
}
