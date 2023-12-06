<?php

header("Content-Type: application/json; charset=UTF-8");

include 'Routes/BooksRoutes.php';

use app\Routes\BooksRoutes;

$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$booksRoute = new BooksRoutes();
$booksRoute->handle($method, $path);
