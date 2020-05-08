<?php


class AdminController
{
  public static function actionAddArticle()
  {
    if (!empty($_POST)) {

      $data = [];

      if (!empty($_POST['title'])) {
        $data['title'] = $_POST['title'];
      }

      if (!empty($_POST['content'])) {
        $data['content'] = $_POST['content'];
      }
      /* Старый вариант, при котором можно было загрузить картинку, а в базу ничего не записать
            if (!empty($_FILES)){
              $res = File::uploadImg('preview');
              if (false !== $res){
                $data['preview'] = $res;
              }
            }

            if (isset($data['title']) && isset($data['content']) && isset($data['preview'])){
              News::insert($data);
              header('Location: /');
              die();
            }
      */
      if (isset($data['title']) && isset($data['content'])) {
        if (!empty($_FILES) && ($data['preview'] = File::uploadImg('preview')) && ($data['id'] = News::insert($data))) {
          $data['success'] = 'Статья размещена успешно. Посмотреть: ';
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