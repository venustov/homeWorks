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
    $id = $_GET['id'];
    $item = News::getOne($id);
    $viewcounter = News::upViewCounter($_GET['id'], $item->viewcounter);
    include __DIR__ . '/../views/news/one.php';
  }

}