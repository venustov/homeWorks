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
        $article->title = $_POST['title'];
      } else {
        $data['error'][] = 'Не заполнено обязательное поле "Заголовок статьи"';
      }

      if (!empty($_POST['content'])) {
        $article->content = $_POST['content'];
      } else {
        $data['error'][] = 'Не заполнено обязательное поле "Контент статьи"';
      }

      if (!empty($_FILES['preview']['name'])) {
        $data['file'] = $_FILES['preview']['name'];
      } else {
        $data['error'][] = 'Не выбран файл картинки-превью';
      }

      if (isset($article->title) && isset($article->content) && isset($data['file'])) {
        if (($article->preview = File::uploadImg('preview')) && $article->save()) {
          $data['success'] = 'Статья размещена успешно.';
        } else {
// Здесь надо проверять, а нету ли в сессии записи об ошибке, и, если есть, то присваивать её значение, а не то, что ниже
          $data['error'][] = 'Произошла неизвестная ошибка при размещении статьи. Попробуйте позже или обратитесь в службу поддержки';
        }
      }
      $data['article'] = $article;
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

  public static function actionErrLog()
  {

    $path = __DIR__ . '/../error/log.txt';
    if (!file_exists($path)){
      throw new E404Exception('Журнал ошибок не найден', '404');
    }

    $view = new View();
    $view->logArray = file($path);
    $view->display('admin/errorLog.php');

  }

  public function actionDeleteArticle($id)
  {
    // Написать метод удаления записи из БД и файла картинки из папки
  }
}