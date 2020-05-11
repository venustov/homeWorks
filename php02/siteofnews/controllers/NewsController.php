<?php

class NewsController
{

  public function actionAll()
  {
    $items = NewsModel::findAll();

    $view = new View();
    $view->items = $items;

    $view->display('news/all.php');

/* Эта шляпа не работает
    foreach($view as $key => $value) {
      var_dump($key, $value);
      echo '\n';
    } die();*/

  }

  public function actionOne()
  {
    if (!$_GET['id']) {
      header('Location: /index.php');
      die();
    }
    $item = NewsModel::findOneById($_GET['id']);
    if (empty($item)){
      exit('Запрашиваемой статьи нету в Базе Данных');
    }

    NewsModel::updateOne($_GET['id'], 'viewcounter', ++$item->viewcounter);

    $view = new View();
    $view->item = $item;

    $view->display('news/one.php');

/* Эта шляпа не работает
    foreach($view as $key => $value) {
      var_dump($key, $value);
      echo '\n';
    } die();*/

  }

}