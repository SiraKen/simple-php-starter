<?php

namespace App\Console\Functions;

use Exception;

class Make
{
  /**
   * controller
   */
  public function controller(String $name)
  {
    $name = ucfirst($name);
    $filename = __DIR__ . "/../../Controller/" . $name . "Controller.php";
    $content = <<< FILE
    <?php
    namespace App\Controller;

    class {$name}Controller
    {
      public function __construct()
      {
        
      }
    }

    FILE;

    try {
      file_put_contents($filename, $content);
      echo $name . "Controller created!!";
    } catch (Exception $e) {
      echo $e->getMessage();
    }
    
  }

  /**
   * model
   */
  public function model(String $name)
  {
    $name = ucfirst($name);
    $filename = __DIR__ . "/../../Model/" . $name . ".php";
    $content = <<< FILE
    <?php
    namespace App\Model;

    class {$name}
    {
      public function __construct()
      {
        
      }
    }

    FILE;

    try {
      file_put_contents($filename, $content);
      echo "Model: " . $name . " created!!";
    } catch (Exception $e) {
      echo $e->getMessage();
    }
    
  }

  /**
   * view
   */
  public function view(String $name)
  {
    $name = ucfirst($name);
    $filename = __DIR__ . "/../../../" . strtolower($name) . ".php";
    $content = <<< FILE
    <?php

    require_once('./vendor/autoload.php');

    use App\Controller\{$name}Controller;

    echo "{$name} page";

    FILE;

    try {
      file_put_contents($filename, $content);
      echo "View: " . $name . " created!!";
    } catch (Exception $e) {
      echo $e->getMessage();
    }
    
  }

}
