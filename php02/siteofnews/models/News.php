<?php

class News
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
    return DB::queryAll($sql, 'News');

  }

  public static function insert($data)
  {
    $sql = 'INSERT INTO articles
(title, content, preview)
VALUES (\'' . $data['title'] . '\', \'' . $data['content'] . '\', \'' . $data['picture'] . '\')';

    DB::exec($sql);
  }

  public static function getOne($id)
  {
    $sql = 'SELECT * from articles WHERE id = ' . $id;
    return DB::queryOne($sql, 'News');
  }

  public static function upViewCounter($id, $viewcounter)
  {
    $sql = 'UPDATE articles SET viewcounter = ' . ++$viewcounter . ' WHERE id = ' . $id;
    DB::exec($sql);
    return $viewcounter;
  }
}