<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $stylesFile; ?>.css">
</head>
<body>

<div class="photo">
    <img class="photo" src="/img/<?php echo $item['name']; ?>">
    <p class="view">Количество просмотров: <?php echo $viewcounter; ?></p>
    <p class="title"><?php echo $item['title']; ?></p>
</div>

</body>
</html>