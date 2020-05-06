<?php

class NewsController
{

  public function actionAll()
  {
    $items = News::getAll();

    $view = new View();
    $view->data('news', $items);
    $view->display('all.php');
//    include __DIR__ . '/../views/news/all.php';
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
    $item->viewcounter = News::upViewCounter($_GET['id'], $item->viewcounter);

    $view = new View();
    $view->data('news', $item);
    $view->display('one.php');
//    include __DIR__ . '/../views/news/one.php';
  }

}