<?php
session_start();
// функция выхода
function logout() {
  unset($_SESSION['auth']);
  session_destroy();
  setcookie('auth', '', time() - 3600);
  setcookie('style', '', time() - 3600);
}

if ('Выход' == $_POST['submit']) {
  logout();
}
else if ('Удалить куки' == $_POST['submit']) {
  setcookie('url', '', time() - 3600);
  setcookie('style', '', time() - 3600);
}
else if ('Войти' == $_POST['submit']) {
  header('Location: auth.php');
  exit;
}

$url = isset($_COOKIE['url']) ? $_COOKIE['url'] : 'session.php';
header('Location: ' . $url);
exit;
?>