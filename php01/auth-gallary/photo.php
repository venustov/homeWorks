<?php
session_start();
require __DIR__ . DIRECTORY_SEPARATOR . 'functions.php';

if (!isset($_GET['id'])){
    header('Location: /index.php');
}
$idOfPhoto = $_GET['id'];
$connect = bdConnect();
$bdQuery = 'SELECT * FROM images WHERE id = ' . $idOfPhoto;
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
echo viewPhoto($res);
?>
</body>
</html>