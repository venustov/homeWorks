<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <form action="login.php" class="auth" method="post">
   <p>Авторизация:</p>
    <p><input type="text" name="login" placeholder="логин или и-мэйл"></p>
    <p><input type="password" name="password"></p>
    <p><input type="checkbox" name="memory" value="yes">запомнить</p>
    <p><input type="submit" value="Вход"></p>
  </form>
</body>
</html>