<?php

namespace app\Controller;

require_once 'Traits/ApiResponseFormatter.php';
require_once 'Models/BooksAuthor.php';

use app\Models\BooksAuthor;
use app\Traits\ApiResponseFormatter;

class BooksAuthorController
{
  use ApiResponseFormatter;

  private $bookAuthorModel;

  public function __construct()
  {
    $this->bookAuthorModel = new BooksAuthor();
  }

  public function index()
  {
    try {
      $response = $this->bookAuthorModel->findAll();
      return $this->apiResponse(200, "success", $response);
    } catch (\Exception $e) {
      return $this->apiResponse(500, "error", null, $e->getMessage());
    }
  }

  public function getById($id)
  {
    try {
      $response = $this->bookAuthorModel->findById($id);

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

    $bookAuthorModel = new BooksAuthor();
    $createAuthorId = $bookAuthorModel->create([
      "book_id" => $inputData['book_id'],
      "author_id" => $inputData['author_id'],
      "is_main_author" => $inputData['is_main_author']
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

    $bookAuthorModel = new BooksAuthor();
    $response = $bookAuthorModel->update([
      "book_id" => $inputData['book_id'],
      "author_id" => $inputData['author_id'],
      "is_main_author" => $inputData['is_main_author']
    ], $id);

    return $this->apiResponse(200, "success", $response);
  }

  public function delete($id)
  {
    $bookAuthorModel = new BooksAuthor();
    $deletedData = $bookAuthorModel->destroy($id);

    if ($deletedData  !== null) {
      return $this->apiResponse(200, "success", ["deleted_books_author" => $deletedData]);
    } else {
      return $this->apiResponse(404, "not found", null);
    }
  }
}
