<?php

namespace Controller;

// include "./Controllers/AbstractController.php";
include "/2-workstation/3-kuliah/semester-5/pemrograman-web/demo/modul4/tugas2-api/Controllers/AbstractController.php";

class Controller extends AbstractController
{
  var $ControllerName;
  var $FunctionName;
  var $HTTPMethod;

  public function getControllerAttribute($function, $method)
  {
    return [
      "Controller Name" => $this->ControllerName,
      "Function Name" => $function,
      "HTTP Method" => $method
    ];
  }
}
