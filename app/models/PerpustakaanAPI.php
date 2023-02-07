<?php

/**
 * TODO: improve password hash & unique-ness of an account
 */

namespace models\Perpustakaan;

use Exception;
use PDO;
use PDOException;
use Perpustakaan\lib\Dotenv;

class PerpustakaanAPI {
  const FETCH_OBJECT = 1;
  const FETCH_ARRAY_ASSOC = 2;

  private string $DB_HOST;
  private string $DB_PORT;
  private string $DB_USERNAME;
  private string $DB_PASSWORD;
  private string $DB_NAME;
  private PDO | null $connection;

  public function __construct()
  {
    /** FOR TESTING
     * require_once '../global/aliases.php';
     * require_once '../lib/Dotenv.php';
     * $dotenv = new Dotenv('../../.env');
     */

    require_once '../app/global/aliases.php';
    require_once LIB . 'Dotenv.php';

    $dotenv = new Dotenv;
    $dotenv->load();

    $this->DB_HOST = $dotenv->getenv('DB_HOST');
    $this->DB_PORT = $dotenv->getenv('DB_PORT');
    $this->DB_USERNAME = $dotenv->getenv('DB_USERNAME');
    $this->DB_PASSWORD = $dotenv->getenv('DB_PASSWORD');
    $this->DB_NAME = $dotenv->getenv('DB_NAME');
  }

  public function getPrepareQuery(string $preparedQuerys, ?Array $values = [], ?int $flag = 0): object | bool | array
  {
    $this->connect();

    $statement = $this->connection->prepare($preparedQuerys);

    if (is_null($values)) $values = [];

    foreach ($values as $param => $argument) {
      $type = null;

      switch (gettype($argument)) {
        case 'integer':
          $type = PDO::PARAM_INT;
          break;
        case 'string':
          $type = PDO::PARAM_STR;
          break;
        case 'boolean':
          $type = PDO::PARAM_BOOL;
          break;
        default:
          $type = PDO::PARAM_NULL;
      }

      $statement->bindValue($param, $argument, $type);
    }

    a:

    $statement->execute();

    switch ($flag) {
      case 1:
        $data = $statement->fetchAll(PDO::FETCH_OBJ);
        break;
      case 2:
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        break;
      default: $statement->fetchObject();
    }

    $this->connection = null;

    return $data;
  }

  private function connect(): void
  {
    $dns = sprintf('mysql:host=%s;dbname=%s;charset=UTF8', $this->DB_HOST . ':' . $this->DB_PORT, $this->DB_NAME);

    try {
      $this->connection = new PDO($dns, $this->DB_USERNAME, $this->DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (PDOException $e) {
      throw new Exception($e->getMessage());
    }
  }
}
