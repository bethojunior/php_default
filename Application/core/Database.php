<?php

namespace Application\core;

use PDO;

class Database extends PDO
{
  private $DB_NAME = 'testeuno';
  private $DB_USER = 'fleck';
  private $DB_PASSWORD = '3001';
  private $DB_HOST = 'localhost';
  private $DB_PORT = 3306;

  private $conn;

  public function __construct()
  {
      $this->conn = new PDO("mysql:host={$this->DB_HOST};port={$this->DB_PORT};dbname={$this->DB_NAME}", $this->DB_USER, $this->DB_PASSWORD);
  }  

  private function setParameters($stmt, $key, $value)
  {
    $stmt->bindParam($key, $value);
  }
  
  private function mountQuery($stmt, $parameters)
  {
    foreach( $parameters as $key => $value ) {
      $this->setParameters($stmt, $key, $value);
    }
  }

  public function executeQuery(string $query, array $parameters = [])
  {
    $stmt = $this->conn->prepare($query);
    $this->mountQuery($stmt, $parameters);
    $stmt->execute();
    return $stmt;
  }

}
