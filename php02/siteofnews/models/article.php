<?php
//require_once __DIR__ . '/../functions/sql.php';
require_once __DIR__ . '/../classes/sql.php';

class Article
{
  public $id;
  public $title;
  public $content;
  public $timeofadd;
  public $viewcounter;
  public $preview;

  public static function getAll()
  {

    $sql = 'SELECT * from articles';
    return Sql::query($sql, 'Article');

  }

  public static function insert($data)
  {
    $sql = 'INSERT INTO articles
(title, content, preview)
VALUES (\'' . $data['title'] . '\', \'' . $data['content'] . '\', \'' . $data['picture'] . '\')';

    Sql::exec($sql);
  }

  public static function getOne($id)
  {
    $sql = 'SELECT * from articles WHERE id = ' . $id;
    return Sql::queryOnce($sql, 'Article');
  }

  public static function upViewCounter($id, $viewcounter)
  {
    $sql = 'UPDATE articles SET viewcounter = ' . ++$viewcounter . ' WHERE id = ' . $id;
    Sql::exec($sql);
    return $viewcounter;
  }
}