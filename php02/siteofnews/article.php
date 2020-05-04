<?php
/*
session_start();
*/

require_once __DIR__ . '/models/News.php';

if (!isset($_GET['id'])){
    header('Location: /index.php');
}

$item = News::getOne($_GET['id']);
$viewcounter = News::upViewCounter($_GET['id'], $item->viewcounter);

include __DIR__ . '/views/article.php';

// пользователь авторизован:
/*
$url = isset($_SESSION['url']) ? $_SESSION['url'] : isset($_COOKIE['url']) ? $_COOKIE['url'] : 'session.php';
header('Location: ' . $url);
exit;
*/

//$stylesFile = isset($_SESSION['style']) ? $_SESSION['style'] : isset($_COOKIE['style']) ? $_COOKIE['style'] : 'styles';

?>