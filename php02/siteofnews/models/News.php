<?php

class News extends AbstractModel
{
  public $id;
  public $title;
  public $content;
  public $timeofadd;
  public $viewcounter;
  public $preview;

  protected static $table = 'articles';
  protected static $class = 'News';

  public static function insert($data)
  {
    $sql = 'INSERT INTO articles
(title, content, preview)
VALUES (\'' . $data['title'] . '\', \'' . $data['content'] . '\', \'' . $data['preview'] . '\')';

    $insert_id = DB::exec($sql);
    return $insert_id ? $insert_id : false;
  }

  public static function upViewCounter($id, $viewcounter)
  {
    $sql = 'UPDATE articles SET viewcounter = ' . ++$viewcounter . ' WHERE id = ' . $id;

    DB::exec($sql);
    return $viewcounter;
  }
}