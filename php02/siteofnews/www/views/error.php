<?php
switch ($code){
  case '404':
    header("HTTP/1.0 404 Not Found");
    break;
  case 'HY000':
      $error = 'Служба поддержки уже в курсе данной проблемы и работает над её устранением. Приносим свои извинения.';
      $code = 'подключения к Базе Данных.';
    header("HTTP/1.0 403 Forbidden");
    break;
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
<h1>Ошибка <?php echo $code; ?></h1>
<div><?php echo $error; ?></div>
</body>
</html>