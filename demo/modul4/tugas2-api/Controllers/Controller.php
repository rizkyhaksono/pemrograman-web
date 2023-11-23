<?php

namespace Controller;

include "/2-workstation/3-kuliah/semester-5/pemrograman-web/demo/modul4/tugas2-api/Controllers/AbstractController.php";

class Controller extends AbstractController
{
  public function getControllerAttribute($function, $method)
  {
    return [
      "Controller Name" => $this->ControllerName,
      "Function Name" => $function,
      "HTTP Method" => $method
    ];
  }
}
