<?php

namespace app\Models;

include 'Config/DatabaseConfig.php';

use app\Config\DatabaseConfig;
use mysqli;

class Product extends DatabaseConfig
{
  public $conn;

  public function __construct()
  {
    $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database_name, $this->port);
    if ($this->conn->connect_error)
      die("Connection failed: " . $this->conn->connect_error);
  }

  public function findAll()
  {
    $sql = "SELECT * FROM products";
    $result = $this->conn->query($sql);
    $this->conn->close();
    $data = [];
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }

    return $data;
  }

  public function findById($id)
  {
    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $this->conn->close();
    $data = [];
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }

    return $data;
  }

  public function create($data)
  {
    $productName = $data['product_name'];
    $query = "INSERT INTO products (product_name) VALUES (?)";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("s", $productName);
    $stmt->execute();
    $this->conn->close();
  }

  public function update($data, $id)
  {
    $productName = $data['product_name'];

    $query = "UPDATE products SET product_name = ? WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("si", $productName, $id);
    $stmt->execute();
    $this->conn->close();
  }

  public function destroy($id)
  {
    $query = "DELETE FROM products WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $this->conn->close();
  }
}
