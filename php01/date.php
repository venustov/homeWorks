<?php
function rusDate($day, $month){
  switch ($month){
    case 1: $rusMonth = 'января';
      break;
          case 2: $rusMonth = 'февраля';
      break;
          case 3: $rusMonth = 'марта';
      break;
          case 4: $rusMonth = 'апреля';
      break;
          case 5: $rusMonth = 'мая';
      break;
          case 6: $rusMonth = 'июня';
      break;
          case 7: $rusMonth = 'июля';
      break;
          case 8: $rusMonth = 'августа';
      break;
          case 9: $rusMonth = 'сентября';
      break;
          case 10: $rusMonth = 'октября';
      break;
          case 11: $rusMonth = 'ноября';
      break;
          case 12: $rusMonth = 'декабря';
      break;
  }
  return $day . ' ' . $rusMonth;
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
  echo rusDate(date('d'), date('m'));
  echo '<br /><br />' . date('d.m.Y');
    ?>
</body>

</html>
