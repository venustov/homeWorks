<?php

namespace Application\Controllers;

use Application\Models\News as NewsModel;

class News
{

  public function actionAll()
  {

    $items = NewsModel::findAll();

    $view = new \View();
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
      throw new \E404Exception('Некорректный адрес страницы', '404');
    }

    $item = NewsModel::findOneById($_GET['id']);

    if (empty($item)) {
      throw new \E404Exception('Запрашиваемой статьи нету в Базе Данных', '404');
    }

    ++$item->viewcounter;
    $item->save();

    $view = new \View();
    $view->item = $item;

    $view->display('news/one.php');

    /* Эта шляпа не работает
        foreach($view as $key => $value) {
          var_dump($key, $value);
          echo '\n';
        } die();*/

  }

}