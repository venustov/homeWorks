<?php


class AdminController
{
  public static function actionAddArticle()
  {
    if (!empty($_POST)) {
      $article = new NewsModel();
      $data = [];

      $data['error'] = [];

      if (!empty($_POST['title'])) {
        $data['title'] = $_POST['title'];
        $article->title = $data['title'];
      } else {
        $data['error'][] = 'Не заполнено обязательное поле "Заголовок статьи"';
      }

      if (!empty($_POST['content'])) {
        $data['content'] = $_POST['content'];
        $article->content = $data['content'];
      } else {
        $data['error'][] = 'Не заполнено обязательное поле "Контент статьи"';
      }

      if (!empty($_FILES['preview']['name'])) {
        $data['file'] = $_FILES['preview']['name'];
      } else {
        $data['error'][] = 'Не выбран файл картинки-превью';
      }
      /* Старый вариант, при котором можно было загрузить картинку, а в базу ничего не записать
            if (!empty($_FILES)){
              $res = File::uploadImg('preview');
              if (false !== $res){
                $data['preview'] = $res;
              }
            }

            if (isset($data['title']) && isset($data['content']) && isset($data['preview'])){
              NewsModel::insert($data);
              header('Location: /');
              die();
            }
      */
      if (isset($data['title']) && isset($data['content']) && isset($data['file'])) {
        if (($article->preview = File::uploadImg('preview')) && ($data['id'] = $article->insert())) {
          $data['success'] = 'Статья размещена успешно.';
        } else {
// Здесь надо проверять, а нету ли в сессии записи об ошибке, и, если есть, то присваивать её значение, а не то, что ниже
          $data['error'][] = 'Произошла неизвестная ошибка при размещении статьи. Попробуйте позже или обратитесь в службу поддержки';
        }
      }
      self::actionAddArticleForm($data);
    }
  }

  public static function actionAddArticleForm($data = [])
  {
    $view = new View();
    if (!empty($data)) {
      $view->data = $data;
    }

    $view->display('add.php');
  }
}