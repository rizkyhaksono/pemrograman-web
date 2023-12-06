<?php

namespace app\Models;

include 'Config/DatabaseConfig.php';

use app\Config\DatabaseConfig;
use mysqli;

class Genres extends DatabaseConfig
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
    // with relations
    $sql = "SELECT books.*, authors.name as author_name, genres.name as genre_name
            FROM books
            LEFT JOIN books_authors ON books.id = books_authors.book_id
            LEFT JOIN authors ON books_authors.author_id = authors.id
            LEFT JOIN genres ON books.genre_id = genres.id";

    // no relation
    // $sql = "SELECT * FROM books";

    $result = $this->conn->query($sql);

    $data = [];
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }

    return $data;
  }

  public function findById($id)
  {
    $sql = "SELECT books.*, authors.name as author_name, genres.name as genre_name
            FROM books
            LEFT JOIN books_authors ON books.id = books_authors.book_id
            LEFT JOIN authors ON books_authors.author_id = authors.id
            LEFT JOIN genres ON books.genre_id = genres.id
            WHERE books.id = ?";

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
    $title = $data['title'];
    $description = $data['description'];
    $ISBN = $data['ISBN'];
    $genreId = $data['genre_id'];

    $query = "INSERT INTO books (title, description, ISBN, genre_id) VALUES (?, ?, ?, ?)";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("sssi", $title, $description, $ISBN, $genreId);
    $stmt->execute();
    $this->conn->close();
    return $stmt->insert_id;
  }

  public function update($data, $id)
  {
    $title = $data['title'];
    $description = $data['description'];
    $ISBN = $data['ISBN'];
    $genreId = $data['genre_id'];

    $query = "UPDATE books SET title = ?, description = ?, ISBN = ?, genre_id = ? WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("ssssi", $title, $description, $ISBN, $genreId, $id);
    $stmt->execute();
    $stmt->close();
  }

  public function destroy($id)
  {
    $query = "DELETE FROM books WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $this->conn->close();
  }
}
