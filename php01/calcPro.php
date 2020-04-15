<?php

if (($_POST['firstNumber'] != '') && ($_POST['secondNumber'] != '')) {
  $firstNumber = (int)$_POST['firstNumber'];
  $secondNumber = (int)$_POST['secondNumber'];
  $action = $_POST['submit'];

  $resolt = ('/' == $action) && (0 == $secondNumber) ? 'Деление на "0" недопустимо!' : '= ' . calc ($firstNumber, $secondNumber, $action);
  
}
elseif (isset($_POST['firstNumber']) && isset($_POST['secondNumber'])) {
  echo 'Введите корректные исходные данные';
}

function calc ($first, $second, $act) {
  if ('/' == $act){
    return $first / $second;
  } elseif ('+' == $act) {
    return $first + $second;
  } elseif ('-' == $act) {
    return $first - $second;
  } elseif ('*' == $act) {
    return $first * $second;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <form action="" method="post">
    <input name="firstNumber" class="span" type="number" value='<?php echo $firstNumber; ?>'>
    <h3 class="act"><?php echo $action; ?></h3>
    <input name="secondNumber" class="span" type="number" value='<?php echo $secondNumber; ?>'>
    <h3 class="resolt"><?php echo $resolt; ?></h3>
    <div class="bottoms">
    <input type="submit" name="submit" class="bottom" value="*">
    <input type="submit" name="submit" class="bottom" value="/">
    <input type="submit" name="submit" class="bottom" value="+">
    <input type="submit" name="submit" class="bottom" value="-">
    <input type="reset" value="Очистить">
    </div>
  </form>
</body>
</html>