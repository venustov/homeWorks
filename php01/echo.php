<?php
$a = 7;
$b = 5.1;
$c = true;
$d = 'Строка';
define('DAYSINWEEK', 7);

$str1 = "<br /><br />«Славная осень! Здоровый, ядреный";
$str2 = "<br />Воздух усталые силы бодрит";
$str3 = "<br />Лед неокрепший на речке студеной";
$str4 = "<br />Словно как тающий сахар лежит.»";
$str5 = "<br /><br /><span class=\"sign\">Н. А. Некрасов</span>";

$x = 10;
$y = 15;
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
  <?php
echo '$a' . '; ' . '$b' . '; ' . '$c' . '; ' .'$d' . '; ' . 'DAYSINWEEK' . '; ';
  
  echo "<br /><br />" . "$a" . "; " . "$b" . "; " . "$c" . "; " ."$d" . "; " . "DAYSINWEEK" . "; ";
  
    echo "<br /><br />" . $a . "; " . $b . "; " . $c . "; " . $d . "; " . DAYSINWEEK . "; ";
  
  //Переменные и экранирующие последовательности для специальных символов, встречающихся в строках, заключенных в одинарные кавычки - не обрабатываются
  
  echo $str1;
  echo $str2;
  echo $str3;
  echo $str4;
  echo $str5;
  
  echo $str1 . $str2 . $str3 . $str4 . $str5 ;
  
  $number = 25;
  $str = '20 приветов';
  
  $summ = $number + $str;
  
  echo '<br /><br />' . $summ;
    
  echo '<br /><br />';
  echo var_dump(true xor false) . '- true, false<br />';
  echo var_dump(false xor true) . '- false, true<br />';
  echo var_dump(false xor false) . '- false, false<br />';
  echo var_dump(true xor true) . '- true, true<br />';
  
  echo '<br /><br />';

  echo 'x = ' . $x;
  echo '<br />y = ' . $y;
  
  $x += $y;
  $y = $x - $y;
  $x = $x - $y;
  
  echo '<br /><br />';

  echo 'x = ' . $x;
  echo '<br />y = ' . $y;
  
    ?>
</body>

</html>
