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

// Отправка админу письма об ошибке:

  $mail = new \PHPMailer\PHPMailer\PHPMailer();
  $mail->setFrom('onotole@venustov.org', 'Онотоле');
  $mail->addAddress('venustov@gmail.com', 'Тоже Онотоле');
  $mail->Subject = 'Тест';                         // тема письма
// html текст письма
  $mail->msgHTML("<html><body>
                <h1>Здравствуйте!</h1>
                <p>Это тестовое письмо.</p>
                </html></body>");
// Отправляем
  if ($mail->send()) {
    echo 'Письмо отправлено!';
  } else {
    echo 'Ошибка: ' . $mail->ErrorInfo;
  }

}