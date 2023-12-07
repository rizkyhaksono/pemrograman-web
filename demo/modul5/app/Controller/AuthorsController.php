<?php

namespace app\Controller;

require_once 'Traits/ApiResponseFormatter.php';
require_once 'Models/Authors.php';

use app\Models\Authors;
use app\Traits\ApiResponseFormatter;

class AuthorsController
{
  use ApiResponseFormatter;

  private $authorModel;

  public function __construct()
  {
    $this->authorModel = new Authors();
  }

  public function index()
  {
    try {
      $response = $this->authorModel->findAll();
      return $this->apiResponse(200, "success", $response);
    } catch (\Exception $e) {
      return $this->apiResponse(500, "error", null, $e->getMessage());
    }
  }

  public function getById($id)
  {
    try {
      $response = $this->authorModel->findById($id);

      if (!$response) {
        return $this->apiResponse(404, "not found", $response);
      }

      return $this->apiResponse(200, "success", $response);
    } catch (\Exception $e) {
      return $this->apiResponse(500, "error", null, $e->getMessage());
    }
  }

  public function insert()
  {
    $jsonInput = file_get_contents('php://input');
    $inputData = json_decode($jsonInput, true);

    if (json_last_error()) {
      return $this->apiResponse(400, "error invalid input", null);
    }

    $authorModel = new Authors();
    $createAuthorId = $authorModel->create([
      "name" => $inputData['name'],
      "bio" => $inputData['bio']
    ]);

    return $this->apiResponse(201, "success", $createAuthorId);
  }

  public function update($id)
  {
    $jsonInput = file_get_contents('php://input');
    $inputData = json_decode($jsonInput, true);

    if (json_last_error()) {
      return $this->apiResponse(400, "error invalid input", null);
    }

    $authorModel = new Authors();
    $response = $authorModel->update([
      "name" => $inputData['name'],
      "bio" => $inputData['bio']
    ], $id);

    return $this->apiResponse(200, "success", $response);
  }

  public function delete($id)
  {
    $authorModel = new Authors();
    $deletedData = $authorModel->destroy($id);

    if ($deletedData  !== null) {
      return $this->apiResponse(200, "success", ["deleted_author" => $deletedData]);
    } else {
      return $this->apiResponse(404, "not found", null);
    }
  }
}
