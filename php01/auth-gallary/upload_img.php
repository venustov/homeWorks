<?php
require __DIR__ . DIRECTORY_SEPARATOR . 'functions.php';

// Пути загрузки файлов
$path = 'img/';
// $tmp_path = 'tmp/';

// Массив допустимых значений типа файла
$types = array('image/gif', 'image/png', 'image/jpeg');
// Максимальный размер файла
$size = 1024000;

// Загрузка изображения в папку. Обработка запроса
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Проверяем тип файла
  if (!in_array($_FILES['picture']['type'], $types)) {
    die('Запрещённый тип файла. <a href="?">Попробовать другой файл?</a>');
  }
  // Проверяем размер файла
  if ($_FILES['picture']['size'] > $size) {
    die('Слишком большой размер файла. <a href="?">Попробовать другой файл?</a>');
  }

  $filePath = $_FILES['picture']['tmp_name'];
  $name = substr(md5_file($filePath), 0, 10);
  $image = getimagesize($filePath);
// Сгенерируем расширение файла на основе типа картинки
  $extension = image_type_to_extension($image[2]);
// Сократим .jpeg до .jpg
  $format = str_replace('jpeg', 'jpg', $extension);
  $name .= $format;

  $sqlQuery = 'INSERT INTO images(name';
  if (isset($_POST['title'])) {
    $sqlQuery .= ', title';
  }
  $sqlQuery .= ') VALUES (\'';
  $sqlQuery .= $name;
  $sqlQuery .= '\'';
  if (isset($_POST['title'])) {
    $sqlQuery .= ',\'';
    $sqlQuery .= $_POST['title'];
    $sqlQuery .= '\'';
  }
  $sqlQuery .= ')';
  $connect = bdConnect();

  // Загрузка файла и вывод сообщения
  if (!@copy($filePath, $path . $name) || !@mysqli_query($connect, $sqlQuery)) {
    echo 'Что-то пошло не так';
  } else {
    echo 'Загрузка удачна <a href="' . $path . $name . '">Посмотреть</a> ';
  }
}

?>