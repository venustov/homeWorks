<?php

if (($_POST['firstNumber'] != '') && ($_POST['secondNumber'] != '')) {
  $firstNumber = (int)$_POST['firstNumber'];
  $secondNumber = (int)$_POST['secondNumber'];
  $action = $_POST['action'];

  $resolt = ('/' == $action) && (0 == $secondNumber) ? 'Деление на "0" недопустимо!' : $firstNumber . ' ' . $action . ' ' . $secondNumber . ' = ' . calc ($firstNumber, $secondNumber, $action);
  
}
elseif (isset($_POST['firstNumber']) && isset($_POST['secondNumber'])) {
  echo 'Введите корректные исходные данные';
}

function calc ($first, $second, $act) {
  switch ($act) {
    case '/':
      return $first / $second;
      break;
    case '*':
      return $first * $second;
      break;
    case '+':
      return $first + $second;
      break;
    case '-':
      return $first - $second;
      break;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <form action="calcSimple.php" method="post">
    <input name="firstNumber" type="number">
    <select name="action" id="">
      <option value="+">+</option>
      <option value="-">-</option>
      <option value="*">*</option>
      <option value="/">/</option>
    </select>
    <input name="secondNumber" type="number">
    <input type="submit" value="=">
  </form>
  <h1><?php echo $resolt; ?></h1>
</body>
</html>