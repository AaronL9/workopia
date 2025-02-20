<?php

namespace Framework;

use PDO;
use PDOException;
use Exception;

class Database
{
  public $conection;

  /**
   * Constructor for Database class
   *
   * @param array $config
   */
  public function __construct($config)
  {

    $host = $config['host'];
    $port = $config['port'];
    $dbName = $config['dbname'];

    $dsn = "mysql:host={$host};port={$port};dbname={$dbName}";

    $options = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ];

    try {
      $this->conection = new PDO($dsn, $config['username'], $config['password'], $options);
    } catch (PDOException $e) {
      throw new Exception("Database connection failed: {$e->getMessage()}");
    }
  }

  /**
   * Query the datbase
   *
   * @param string $query
   *
   * @return PDOStatement
   * @throws PDOException
   */
  public function query($query, $params = [])
  {
    try {
      $statement = $this->conection->prepare($query);

      // Bind name params
      foreach ($params as $param => $value) {
        $statement->bindValue(':' . $param, $value);
      }

      $statement->execute();
      return $statement;
    } catch (PDOException $e) {
      throw new Exception("Query failed to execute: {$e->getMessage()}");
    }
  }
}
