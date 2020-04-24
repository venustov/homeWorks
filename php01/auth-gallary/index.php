<?php
session_start();
require __DIR__ . DIRECTORY_SEPARATOR . 'functions.php';

$connect = bdConnect();
$bdQuery = 'SELECT * FROM images';
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
    echo '<h1>Загрузить изображение (оно тебе нада?):</h1>
 <form action="upload_img.php" method="post" enctype="multipart/form-data">
   <input type="file" name="picture">
   <input type="submit" value="Загрузить">
 </form>';
}
// $dir = 'img/';
// echo search_img($dir);
echo galleryBD($res);
?>
</body>
</html>