<?php

// use relative path
include "/2-workstation/3-kuliah/semester-5/pemrograman-web/codelab/modul4/Controllers/ProductController.php";

use Controller\ProductController;

$productController = new ProductController;

echo $productController->getAllProduct();

// run this
// php -S localhost:8888 index.php
