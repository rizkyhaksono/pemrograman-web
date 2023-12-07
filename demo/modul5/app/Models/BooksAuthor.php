<?php

namespace app\Models;

require_once 'Config/DatabaseConfig.php';

use app\Config\DatabaseConfig;
use mysqli;

class BooksAuthor extends DatabaseConfig
{
  public $conn;

  public function __construct()
  {
    $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database_name, $this->port);
    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }
  }

  public function findAll()
  {
    $sql = "SELECT books_authors.*
            FROM books_authors";

    $result = $this->conn->query($sql);

    $data = [];
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }

    return $data;
  }

  public function findById($id)
  {
    $sql = "SELECT books_authors.*
            FROM books_authors
            WHERE books_authors.book_id = ?";

    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = [];
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }

    return $data;
  }

  public function create($data)
  {
    $book_id = $data['book_id'];
    $author_id = $data['author_id'];
    $is_main_author = $data['is_main_author'];

    $query = "INSERT INTO books_authors (book_id, author_id, is_main_author) VALUES (?, ?, ?)";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("iii", $book_id, $author_id, $is_main_author);
    $stmt->execute();
    $this->conn->close();
    return $stmt->insert_id;
  }

  public function update($data, $id)
  {
    $book_id = $data['book_id'];
    $author_id = $data['author_id'];
    $is_main_author = $data['is_main_author'];

    $query = "UPDATE books_authors SET book_id = ?, author_id = ?, is_main_author = ? WHERE book_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("iiii", $book_id, $author_id, $is_main_author, $id);
    $stmt->execute();
    $stmt->close();

    $updatedData = $this->findById($id);
    return $updatedData;
  }

  public function destroy($id)
  {
    $dataToDelete = $this->findById($id);
    if (!$dataToDelete) {
      return null;
    }

    $query = "DELETE FROM books_authors WHERE book_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $isDeleted = $stmt->execute();
    $this->conn->close();

    if ($isDeleted) {
      return $dataToDelete;
    } else {
      return null;
    }
  }
}
