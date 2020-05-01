<?php

require_once __DIR__ . '/functions/file.php';
require_once __DIR__ . '/models/article.php';

if (!empty($_POST)){

  $data = [];

  if (!empty($_POST['title'])){
    $data['title'] = $_POST['title'];
  }

  if (!empty($_POST['content'])){
    $data['content'] = $_POST['content'];
  }

  if (!empty($_FILES)){
    $res = File_upload('picture');
    if (false !== $res){
      $data['picture'] = $res;
    }
  }

  if (isset($data['title']) && isset($data['content']) && isset($data['picture'])){
    Article_insert($data);
    header('Location: /');
    die();
  }

}

include __DIR__ . '/views/add.php';