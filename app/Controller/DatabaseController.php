<?php
namespace App\Controller;

use PDO;
use FFI\Exception;
use Dotenv\Dotenv;

class DatabaseController
{
  public $pdo;

  public function __construct()
  {
    $dotenv = Dotenv::createImmutable(__DIR__.'/../../');
    $dotenv->load();
    $db_name  = $_ENV['DB_NAME'];
    $hostname = $_ENV['DB_HOST'];
    $port     = $_ENV['DB_PORT'];
    $username = $_ENV['DB_USER'];
    $password = $_ENV['DB_PASS'];
    $driver_options = [];
    $dsn = 'mysql:dbname=' . $db_name . ';host=' . $hostname . ';port=' . $port . ';charset=utf8mb4';

    try
    {
      $this->pdo = new PDO($dsn, $username, $password, $driver_options);
    }
    catch (Exception $e)
    {
      echo $e->getMessage();
    }
  }

  public function __destruct()
  {
    $this->pdo = null;
  }

  /**
   * Return pdo
   */
  public function db()
  {
    return $this->pdo;
  }

}
