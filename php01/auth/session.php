<?php

session_start();

if ($_COOKIE['url']) {
  setcookie('url', $_SERVER['REQUEST_URI'], time() + 3600 * 24 * 7);
}

if (isset($_SESSION['auth'])) {
  $_SESSION['url'] = $_SERVER['REQUEST_URI'];
}

$stylesFile = isset($_SESSION['style']) ? $_SESSION['style'] : isset($_COOKIE['style']) ? $_COOKIE['style'] : 'styles';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <?php if ('Войти' == $_POST['submit']) : ?>
  <meta http-equiv="Refresh" content="2; URL=auth.php">
  <?php endif; ?>
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="<?php echo $stylesFile; ?>.css">
</head>
<body>
 <div class="header">
  <div class="nolink">Сессии</div>
  <div class="link"><a href="cookie.php">Печеньки</a></div>
 </div>
  <form action="logout.php" class="auth" method="post">
  <?php if (isset($_SESSION['auth'])) : ?>
   <p><?php echo $_SESSION['auth']; ?> (<a href="settings.php">настройки</a>)</p>
    <p><input type="submit" name="submit" value="Выход"></p>
    <?php if (isset($_COOKIE['url'])) : ?>
    <p><input type="submit" name="submit" value="Удалить куки"></p>
    <?php endif; ?>
    <?php endif; ?>
    <?php if (!isset($_SESSION['auth'])) : ?>
    <p><input type="submit" name="submit" class="bottom" value="Войти"></p>
    <?php endif; ?>
  </form>
</body>
</html>