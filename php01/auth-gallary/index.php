<?php
session_start();

require __DIR__ . '/functions.php';

// пользователь авторизован:
/*
$url = isset($_SESSION['url']) ? $_SESSION['url'] : isset($_COOKIE['url']) ? $_COOKIE['url'] : 'session.php';
header('Location: ' . $url);
exit;
*/
$stylesFile = isset($_SESSION['style']) ? $_SESSION['style'] : isset($_COOKIE['style']) ? $_COOKIE['style'] : 'styles';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="<?php echo $stylesFile; ?>.css">
</head>
<body><?php
if (isUser()) {
  echo '<h1>Загрузить изображение:</h1>
 <form action="upload_img.php" method="post" enctype="multipart/form-data">
   <input type="file" name="picture">
   <input type="submit" value="Загрузить">
 </form>';
}
$dir = 'img/';
echo search_img($dir);
?>
</body>
</html>