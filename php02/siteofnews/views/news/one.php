<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="/styles/current.css">
</head>
<body>

<div class="article">
    <p><a href="/">На главную</a></p>
    <h2><?php echo $this->data->title; ?></h2>
    <p class="content"><?php echo $this->data->content; ?></p>
    <p class="view">Количество просмотров: <?php echo $this->data->viewcounter; ?></p>
</div>

</body>
</html>