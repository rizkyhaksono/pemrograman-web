<?php

namespace app\Controller;

include '/2-workstation/3-kuliah/semester-5/pemrograman-web/codelab/modul5/app/Traits/ApiResponseFormatter.php';
include '/2-workstation/3-kuliah/semester-5/pemrograman-web/codelab/modul5/app/Models/Product.php';

use app\Models\Product;
use app\Traits\ApiResponseFormatter;

class ProductController
{
  // use trait
  use ApiResponseFormatter;

  public function index()
  {
  }
}
