<?php
session_start();
require __DIR__ . '/functions.php';

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