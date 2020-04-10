<?php
function fibo($n){
  if ( $n <= 2 ) {
    return 1;
  } else {
    return fibo($n - 1) + fibo($n - 2);
  }
}
function fiboBetter($n){
  return $n <= 2 ? 1 : fiboBetter($n - 1) + fiboBetter($n - 2);  
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
  echo '<br /><br />' . fiboBetter(6);
    ?>
</body>

</html>
