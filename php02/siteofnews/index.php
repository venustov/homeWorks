<?php

require __DIR__ . '/models/article.php';

$items = Article::getAll();

include  __DIR__ . '/views/index.php';