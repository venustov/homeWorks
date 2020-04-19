<?php
// функция проверки логина-пароля
function CheckLoginPassword($log, $pass) {
  $users = ['unatoly'=>'password', 'georgy'=>'pass', 'snezhana'=>'malina'];
  return (isset($users[$log]) && $users[$log] == $pass);
}
// устанавливаем куки авторизованному пользователю
function login($login) {
  setcookie('auth', $login, time() + 3600 * 24 * 7);
}

/*
 *---
 */

// проверяем не пустые ли поля в форме авторизации:
if (empty($_POST['login']) || empty($_POST['password'])) {
  $
  header('Location: auth.php');
  exit;
}

$login = $_POST['login'];
$password = $_POST['password'];

// проверка логина-пароля
if (!CheckLoginPassword($login, $password)) {
  header('Location: auth.php');
  exit;
}
// пользователь гарантировано авторизован, поэтому:
login($login);
header('Location: index.php');
exit;
?>