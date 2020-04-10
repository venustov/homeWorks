<?php
function fibo($n){
  if ( $n <= 2 ) {
    return 1;
  } else {
    return fibo($n - 1) + fibo($n - 2);
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
  <?php
  echo fibo(8);
    ?>
</body>

</html>
