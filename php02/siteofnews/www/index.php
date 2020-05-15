<?php

require_once __DIR__ . '/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = explode('/', $path);

$ctrl = !empty($pathParts[1]) ? ucfirst($pathParts[1]) : 'News';
$act = !empty($pathParts[2]) ? ucfirst($pathParts[2]) : 'All';

$controllerClassName = 'Application\\Controllers\\' . $ctrl;

$controller = new $controllerClassName;
$method = 'action' . $act;

try {

  $controller->$method();

} catch (Exception $a) {

  $record =
    date('H:i:s d-m-Y') . ' ' .
    $a->getMessage() . ' ' .
    $a->getCode() . ' ' .
    $a->getFile() . ' ' .
    $a->getLine();
  $errorLog = new ErrorLog($record);

  $view = new View();
  $view->error = $a->getMessage();
  $view->code = $a->getCode();
  $view->display('error.php');

}