<?php

namespace Controller;

abstract class AbstractController
{
  var $ControllerName;
  var $FunctionName;
  var $HTTPMethod;
  abstract public function getControllerAttribute($function, $method);
}
