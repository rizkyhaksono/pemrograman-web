<?php

namespace Controller;

// use relative path
include "/2-workstation/3-kuliah/semester-5/pemrograman-web/codelab/modul4/Traits/ResponsiveFormatter.php";
include "/2-workstation/3-kuliah/semester-5/pemrograman-web/codelab/modul4/Controllers/Controller.php";

use Traits\ResponseFormatter;

// controller product
class ProductController extends Controller
{
  use ResponseFormatter;

  public function __construct()
  {
    $this->controllerName = 'Get All Product';
    $this->controllerMethod = 'GET';
  }

  public function getAllProduct()
  {
    $dummyData = [
      "Air Mineral",
      "Kebab",
      "Spaghetti",
      "Jus Bambu",
    ];

    $response = [
      "controller_attribute" => $this->getControllerAttribute(),
      "product" => $dummyData
    ];

    return $this->responseFormatter(200, "Success", $response);
  }
};
