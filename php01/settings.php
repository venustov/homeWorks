<?php
session_start();
if (isset($_POST['submit']) && isset($_POST['style'])) {
  setcookie('style', $_POST['style'], time() + 3600 * 24 * 7);
  $_SESSION['auth']['style'] = $_POST['style'];
  $save = ' сохранены';
  $stylesFile = $_POST['style'];
}
$stylesFile = isset($_SESSION['auth']['style']) ? $_SESSION['auth']['style'] : isset($_COOKIE['style']) ? $_COOKIE['style'] : 'styles';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <?php if (!isset($_SESSION['auth'])) : ?>
  <meta http-equiv="Refresh" content="2; URL=auth.php">
  <?php endif; ?>
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="<?php echo $stylesFile; ?>.css">
</head>
<body>
 <div class="header">
  <div class="link"><a href="session.php">Сессии</a></div>
  <div class="link"><a href="cookie.php">Печеньки</a></div>
<!--  <div class="link"><a href="settings.php">Настройки</a></div>-->
 </div>
  <form action="session.php" class="auth" method="post">
    <p><?php echo $_SESSION['auth']['login']; ?></p>
    <p><input type="submit" name="submit" value="Выход"></p>
    <?php if (isset($_COOKIE['url'])) : ?>
    <p><input type="submit" name="submit" value="Удалить куки"></p>
    <?php endif; ?>
  </form>
   <h3>Настройки<?php echo $save; ?></h3>
  <form action="settings.php" class="auth" method="post">
    <p><input name="style" type="radio" value="red"<?php if ('red' == $_SESSION['auth']['style']) : ?> checked<?php endif; ?>> Красный</p>
    <p><input name="style" type="radio" value="blue"<?php if ('blue' == $_SESSION['auth']['style']) : ?> checked<?php endif; ?>> Синий</p>
    <p><input name="style" type="radio" value="green"<?php if ('green' == $_SESSION['auth']['style']) : ?> checked<?php endif; ?>> Зелёный</p>
    <p><input type="submit" name="submit" value="Сохранить"></p>
  </form>  
</body>
</html>