<?php

namespace Controller;

class Controller
{
  // attributes
  var $controllerName;
  var $controllerMethod;

  public function getControllerAttribute()
  {
    return [
      "ControllerName" => $this->controllerName,
      "Method" => $this->controllerMethod,
    ];
  }
}
