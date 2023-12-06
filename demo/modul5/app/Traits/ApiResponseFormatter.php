<?php

namespace app\Traits;

trait ApiResponseFormatter
{
  public function apiResponse($code = 200, $message = "Success", $data = [])
  {
    http_response_code($code);
    header('Content-Type: application/json');

    return json_encode([
      "code" => $code,
      "message" => $message,
      "data" => $data
    ]);
  }
}
