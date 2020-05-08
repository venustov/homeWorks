<?php

class NewsController
{

  public function actionAll()
  {
    $items = News::getAll();

    $view = new View();
    $view->items = $items;

    $view->display('news/all.php');

//    Эта шляпа не работает
    foreach($view as $key => $value) {
      var_dump($key, $value);
      echo '\n';
    } die();

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
    $view->item = $item;

    $view->display('news/one.php');

    //    Эта шляпа не работает
    foreach($view as $key => $value) {
      var_dump($key, $value);
      echo '\n';
    } die();

  }

}