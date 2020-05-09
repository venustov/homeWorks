<?php

class NewsModel extends AbstractModel
{
/*  public $id;
  public $title;
  public $content;
  public $timeofadd;
  public $viewcounter;
  public $preview;*/

  protected static $table = 'articles';

  public static function upViewCounter($id, $viewcounter)
  {
    $sql = 'UPDATE articles SET viewcounter = ' . ++$viewcounter . ' WHERE id = ' . $id;

    DB::exec($sql);
    return $viewcounter;
  }
}