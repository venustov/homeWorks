<?php

require_once __DIR__ . '/functions/file.php';
require_once __DIR__ . '/models/article.php';

if (!empty($_POST)){

  $data = [];

  if (!empty($_POST['title'])){
    $data['title'] = $_POST['title'];
  }

  if (!empty($_FILES)){
    $res = File_upload('picture');
    if (false !== $res){
      $data['picture'] = $res;
      Photo_insert($data);
      header('Location: /');
      die();
    }
  }

}

include __DIR__ . '/views/add.php';