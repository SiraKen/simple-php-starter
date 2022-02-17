<?php
require_once('./vendor/autoload.php');
session_start();

// AltoRouter
// http://altorouter.com/
$router = new AltoRouter();

$router->setBasePath("");

// ------------------------------

$router->map('GET', '/', function() {
  include(__DIR__.'/index.php');
});

// $router->map('GET', '/example', 'App\Controller\ExampleController::index');

// ------------------------------

$match = $router->match();

if ($match !== false) {
  if (is_callable($match['target'])) {
    $match['target']();
  } else {
    $params = explode("::", $match['target']);
    $action = new $params[0]();
    call_user_func_array(array($action, $params[1]), $match['params']);
  }
} else {
  http_response_code(404);
  include(__DIR__.'/404.php');
  die();
}
