<?php
session_start();
// функция проверки логина-пароля
function CheckLoginPassword($log, $pass) {
  $users = ['unatoly'=>'password', 'georgy'=>'pass', 'snezhana'=>'malina'];
  return (isset($users[$log]) && $users[$log] == $pass);
}
// устанавливаем сессию и куки авторизованному пользователю
function login($login) {
  $_SESSION['auth'] = $login;
  if ('yes' == $_POST['memory']){
    setcookie('auth', $login, time() + 3600 * 24 * 7);
    setcookie('url', isset($_COOKIE['url']) ? $_COOKIE['url'] : 'session.php', time() + 3600 * 24 * 7);
  }
}

/*
 *---
 */

// проверяем не пустые ли поля в форме авторизации:
if (empty($_POST['login']) || empty($_POST['password'])) {
  $_SESSION['error'] = 'Пустой логин или пароль!';
  header('Location: auth.php');
  exit;
}

$login = $_POST['login'];
$password = $_POST['password'];

// проверка логина-пароля
if (!CheckLoginPassword($login, $password)) {
  $_SESSION['error'] = 'Неверная пара логин-пароль!';
  header('Location: auth.php');
  exit;
}
// пользователь гарантировано авторизован, поэтому:
login($login);
header('Location: index.php');
exit;
?>