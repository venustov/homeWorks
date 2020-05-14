<?php

require_once __DIR__ . '/autoload.php';

$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';

$controllerClassName = $ctrl . 'Controller';

$controller = new $controllerClassName;
$method = 'action' . $act;

try {

  $controller->$method();

} catch (Exception $a) {
  $view = new View();
  $view->error = $a->getMessage();
  header("HTTP/1.0 404 Not Found");
  $view->display('404.php');
}