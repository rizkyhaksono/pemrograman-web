<?php

namespace app\Controller;

require_once 'Traits/ApiResponseFormatter.php';
require_once 'Models/Genres.php';

use app\Models\Genres;
use app\Traits\ApiResponseFormatter;

class GenresController
{
  use ApiResponseFormatter;

  private $genresModel;

  public function __construct()
  {
    $this->genresModel = new Genres();
  }


  public function index()
  {
    try {
      $response = $this->genresModel->findAll();
      return $this->apiResponse(200, "success", $response);
    } catch (\Exception $e) {
      return $this->apiResponse(500, "error", null, $e->getMessage());
    }
  }

  public function getById($id)
  {
    try {
      $response = $this->genresModel->findById($id);

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

    $genresModel = new Genres();
    $createGenreId = $genresModel->create([
      "name" => $inputData['name'],
      "description" => $inputData['description'],
    ]);

    return $this->apiResponse(201, "success", $createGenreId);
  }

  public function update($id)
  {
    $jsonInput = file_get_contents('php://input');
    $inputData = json_decode($jsonInput, true);

    if (json_last_error()) {
      return $this->apiResponse(400, "error invalid input", null);
    }

    $genreModel = new Genres();
    $response = $genreModel->update([
      "name" => $inputData['name'],
      "description" => $inputData['description']
    ], $id);

    return $this->apiResponse(200, "success", $response);
  }

  public function delete($id)
  {
    $genreModel = new Genres();
    $deletedData = $genreModel->destroy($id);

    if ($deletedData  !== null) {
      return $this->apiResponse(200, "success", ["deleted_genre" => $deletedData]);
    } else {
      return $this->apiResponse(404, "not found", null);
    }
  }
}
