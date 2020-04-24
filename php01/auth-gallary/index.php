<?php
session_start();
require __DIR__ . DIRECTORY_SEPARATOR . 'functions.php';

$connect = bdConnect();
$bdQuery = 'SELECT * FROM images ORDER BY viewcounter DESC ';
$res = mysqli_query($connect, $bdQuery);

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
    echo '<form class="upload" action="upload_img.php" method="post" enctype="multipart/form-data">
   <h3>Загрузить изображение:</h3>
   <input type="file" name="picture">
   <input type="submit" value="Загрузить">
   <input type="text" name="title" placeholder="Пару слов о картинке, плиз )">
 </form>';
}
// $dir = 'img/';
// echo search_img($dir);
echo galleryBD($res);
?>
</body>
</html>