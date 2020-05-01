<?php
/*
session_start();
*/

require __DIR__ . '/models/article.php';
require_once __DIR__ . '/functions/sql.php';

if (!isset($_GET['id'])){
    header('Location: /index.php');
}
$item = Article_getOne($_GET['id']);
$sql = 'UPDATE articles SET viewcounter = viewcounter + 1 WHERE id = ' . $_GET['id'];
Sql_exec($sql);
$viewcounter = $item['viewcounter'] + 1;

include  __DIR__ . '/views/article.php';

// пользователь авторизован:
/*
$url = isset($_SESSION['url']) ? $_SESSION['url'] : isset($_COOKIE['url']) ? $_COOKIE['url'] : 'session.php';
header('Location: ' . $url);
exit;
*/

//$stylesFile = isset($_SESSION['style']) ? $_SESSION['style'] : isset($_COOKIE['style']) ? $_COOKIE['style'] : 'styles';

?>