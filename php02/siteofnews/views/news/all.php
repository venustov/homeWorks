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
<p><a href="/add.php">Добавить статью</a></p>
<?php
// include __DIR__ . '/form.php';
foreach($items as $item){
  $str = '<div class="article prev"><a href="one?id=' . $item->id . '"><img class="prev" src="/img/' . $item->preview . '" alt=""></a></div><a href="one?id=' . $item->id . '">' . $item->title . '</a>';
  echo $str;
}
?>
</body>
</html>