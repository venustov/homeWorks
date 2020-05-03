<?php
//require_once __DIR__ . '/../functions/sql.php';
require_once __DIR__ . '/../models/sql.php';

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
    $sqlQuery = 'INSERT INTO articles
(title, content, preview)
VALUES (\'' . $data['title'] . '\', \'' . $data['content'] . '\', \'' . $data['picture'] . '\')';

    Sql::exec($sqlQuery);
  }

  public static function getOne($id)
  {
    $sql = 'SELECT * from articles WHERE id = ' . $id;
    return Sql::queryOnce($sql, 'Article');
  }
}

/* Старая версия в процедурном стиле:
function Article_getAll()
{

  $sql = 'SELECT * from articles';
  return Sql::Sql_query($sql);

}

function Article_insert($data)
{
  $sqlQuery = 'INSERT INTO articles
(title, content, preview)
VALUES (\'' . $data['title'] . '\', \'' . $data['content'] . '\', \'' . $data['picture'] . '\')';

  Sql::Sql_exec($sqlQuery);
}

function Article_getOne($id)
{
  $sql = 'SELECT * from articles WHERE id = ' . $id;
  return Sql::Sql_queryOnce($sql);
}
*/