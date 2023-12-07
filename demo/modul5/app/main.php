<?php

header("Content-Type: application/json; charset=UTF-8");

require_once 'Routes/BooksRoutes.php';
require_once 'Routes/AuthorsRoutes.php';
require_once 'Routes/GenresRoutes.php';
require_once 'Routes/BooksAuthorRoutes.php';

require_once '../vendor/autoload.php';
require_once '../app/Config/DatabaseConfig.php';

use app\Routes\BooksRoutes;
use app\Routes\AuthorsRoutes;
use app\Routes\GenresRoutes;
use app\Routes\BooksAuthorRoutes;

$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$booksRoute = new BooksRoutes();
$booksRoute->handle($method, $path);

$authorRoute = new AuthorsRoutes();
$authorRoute->handle($method, $path);

$genreRoute = new GenresRoutes();
$genreRoute->handle($method, $path);

$booksAuthor = new BooksAuthorRoutes();
$booksAuthor->handle($method, $path);
