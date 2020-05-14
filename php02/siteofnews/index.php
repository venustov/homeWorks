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