<?php

header("Content-Type: application/json; charset=UTF-8");

// include '/2-workstation/3-kuliah/semester-5/pemrograman-web/codelab/modul5/app/Routes/ProductRoutes.php';
include 'Routes/ProductRoutes.php';

use app\Routes\ProductRoutes;

// get request method
$method = $_SERVER['REQUEST_METHOD'];
// get request path
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// call routes
$productRoute = new ProductRoutes();
$productRoute->handle($method, $path);
