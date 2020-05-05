<?php

class NewsController
{

  public function actionAll()
  {
    $items = News::getAll();
    include __DIR__ . '/../views/news/all.php';
  }

  public function actionOne()
  {
    if (!$_GET['id']) {
      header('Location: /index.php');
      die();
    }
    $item = News::getOne($_GET['id']);
    if (empty($item)){
      exit('Запрашиваемой статьи нету в Базе Данных');
    }
    $viewcounter = News::upViewCounter($_GET['id'], $item->viewcounter);
    include __DIR__ . '/../views/news/one.php';
  }

}