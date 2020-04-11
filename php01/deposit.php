<?php
function depo($sum, $time, $percent){
  return $sum + (( ($sum * $percent) / (12 * 100) ) * $time);
}
function depoCapital($sum, $time, $percent){
  $capital = ( ($sum * $percent) / (12 * 100) );
  return $time == 1 ? $sum + $capital : depoCapital($sum + $capital, $time - 1, $percent);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>

<body>
  <?php
  echo depo(8000, 36, 10);
  echo '<br /><br />' . depoCapital(8000, 36, 10);
    ?>
</body>

</html>
