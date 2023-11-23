<?php

namespace Controller;

abstract class AbstractController
{
  protected $ControllerName;
  protected $FunctionName;
  protected $HTTPMethod;
  abstract public function getControllerAttribute($function, $method);
}
