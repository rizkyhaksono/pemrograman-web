<?php

namespace app\Models;

include 'Config/DatabaseConfig.php';

use app\Config\DatabaseConfig;
use mysqli;

class Authors extends DatabaseConfig
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
    $sql = "SELECT *
            FROM authors";

    $result = $this->conn->query($sql);

    $data = [];
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }

    return $data;
  }

  public function findById($id)
  {
    $sql = "SELECT authors.*
            FROM authors
            WHERE authors.id = ?";

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
    $name = $data['name'];
    $bio = $data['bio'];

    $query = "INSERT INTO authors (name, bio) VALUES (?, ?)";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("ss", $name, $bio);
    $stmt->execute();
    $this->conn->close();
    return $stmt->insert_id;
  }

  public function update($data, $id)
  {
    $name = $data['name'];
    $bio = $data['bio'];

    $query = "UPDATE authors SET name = ?, bio = ?, WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("ss", $name, $bio);
    $stmt->execute();
    $stmt->close();
  }

  public function destroy($id)
  {
    $query = "DELETE FROM authors WHERE id = ?";
    $stmt =  $this->conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $this->conn->close();
  }
}
