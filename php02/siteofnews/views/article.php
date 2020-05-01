<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $stylesFile; ?>.css">
</head>
<body>

<div class="article">
    <p><a href="/">На главную</a></p>
    <h2><?php echo $item['title']; ?></h2>
    <p class="content"><?php echo $item['content']; ?></p>
    <p class="view">Количество просмотров: <?php echo $viewcounter; ?></p>
</div>

</body>
</html>