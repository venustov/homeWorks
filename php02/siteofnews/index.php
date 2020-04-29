<?php

require __DIR__ . '/models/article.php';

$items = Photo_getAll();

include  __DIR__ . '/views/index.php';