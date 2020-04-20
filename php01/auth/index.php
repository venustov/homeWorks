<?php
session_start();

// проверяем, авторизован ли пользователь
function isUser() {
  return isset($_SESSION['auth']) || isset($_COOKIE['auth']);
}
// получает логин пользователя (авторизованного). Нужна на случай, если index.php будет полнофункциональной страницей с контентом
function getUser() {
  return $_SESSION['auth'] || $_COOKIE['auth'];
}

/*
 * ---
 */

// если пользователь не авторизован, то перекидываем на страницу авторизации:
if (!isUser()) {
  header('Location: auth.php');
  exit;
}
// пользователь авторизован:
$url = isset($_SESSION['url']) ? $_SESSION['url'] : isset($_COOKIE['url']) ? $_COOKIE['url'] : 'session.php';
header('Location: ' . $url);
exit;
?>