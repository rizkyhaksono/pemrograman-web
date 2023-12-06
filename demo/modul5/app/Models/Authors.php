<?php

namespace app\Models;

include 'Config/DatabaseConfig.php';

use app\Config\DatabaseConfig;
use mysqli;

class Author extends DatabaseConfig
{
  public $conn;

  public function __construct()
  {
    $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database_name, $this->port);
    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }
  }
}
