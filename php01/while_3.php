<?php
$a = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
<?php
while ($a <= 100){
  if (0 == $a % 3){
    echo $a . ' ';
  }
  $a++;
}
?>
</body>
</html>