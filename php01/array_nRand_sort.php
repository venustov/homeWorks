<?php
function createArrRandSort ($n) {
  $a = [];
  for ($i = 0; $i < $n; $i++) {
    $a[] = rand(100, 999);
  }
  arsort($a);
  return $a;
}
echo var_dump(createArrRandSort(20));
?>

<!--
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  
</body>
</html>
-->