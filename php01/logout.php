<?php
// функция выхода
function logout() {
  setcookie('auth', '', time() - 3600);
}

logout();
header('Location: index.php');
exit;
?>