<?php

namespace app\Controller;

include 'Traits/ApiResponseFormatter.php';
include 'Models/Books.php';

use app\Models\Books;
use app\Traits\ApiResponseFormatter;

class BooksController
{
  use ApiResponseFormatter;

  private $booksModel;

  public function __construct()
  {
    $this->booksModel = new Books();
  }

  public function index()
  {
    try {
      $response = $this->booksModel->findAll();
      return $this->apiResponse(200, "success", $response);
    } catch (\Exception $e) {
      return $this->apiResponse(500, "error", null, $e->getMessage());
    }
  }

  public function getById($id)
  {
    try {
      $response = $this->booksModel->findById($id);

      if (!$response) {
        return $this->apiResponse(404, "not found", null);
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

    $booksModel = new Books();
    $createdBookId = $booksModel->create([
      "title" => $inputData['title'],
      "description" => $inputData['description'],
      "ISBN" => $inputData['ISBN'],
      "genre_id" => $inputData['genre_id']
    ]);

    return $this->apiResponse(201, "success", $createdBookId);
  }

  public function update($id)
  {
    $jsonInput = file_get_contents('php://input');
    $inputData = json_decode($jsonInput, true);

    if (json_last_error()) {
      return $this->apiResponse(400, "error invalid input", null);
    }

    $booksModel = new Books();
    $response = $booksModel->update([
      "title" => $inputData['title'],
      "description" => $inputData['description'],
      "ISBN" => $inputData['ISBN'],
      "genre_id" => $inputData['genre_id'],
    ], $id);

    return $this->apiResponse(200, "success", $response);
  }


  public function delete($id)
  {
    $bookModel = new Books();
    $isDeleted = $bookModel->destroy($id);

    if ($isDeleted) {
      return $this->apiResponse(200, "success", ["deleted_book_id" => $id]);
    } else {
      return $this->apiResponse(404, "not found", null);
    }
  }
}
