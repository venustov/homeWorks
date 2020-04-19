<?php
session_start();

// проверяем, авторизован ли пользователь
function isUser() {
  return isset($_COOKIE['auth']);
}
// получает логин пользователя (авторизованного)
function getUser() {
  return $_COOKIE['auth'];
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
header('Location: session.php');
exit;
?>