<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
    <link rel="stylesheet" type="text/css" href="/styles/current.css">
</head>
<body>
<?php
include __DIR__ . '/form.php';
foreach($items as $item){
  $str = '<a href="photo.php?id=' . $item['id'] . '" target ="_blank"><img class="pimg" src="/img/' . $item['name'] . '" alt="' . $item['title'] . '"></a>';
  echo $str;
}
?>
</body>
</html>