<?php

if (($_POST['firstNumber'] != '') && ($_POST['secondNumber'] != '')) {
  $firstNumber = (int)$_POST['firstNumber'];
  $secondNumber = (int)$_POST['secondNumber'];
  $action = $_POST['action'];

  $resolt = ('/' == $action) && (0 == $secondNumber) ? 'Деление на "0" недопустимо!' : $firstNumber . ' ' . $action . ' ' . $secondNumber . ' = ' . calc ($firstNumber, $secondNumber, $action);
  
}
else {
  $resolt = 'Введите корректные исходные данные';
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
</head>
<body>
  <form action="" method="post">
    <input name="firstNumber" type="text">
    <select name="action" id="">
      <option value="+">+</option>
      <option value="-">-</option>
      <option value="*">*</option>
      <option value="/">/</option>
    </select>
    <input name="secondNumber" type="text">
    <input type="submit" value="=">
  </form>
  <h1><?php echo $resolt; ?></h1>
</body>
</html>