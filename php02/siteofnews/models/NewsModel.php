<?php

/**
 * Class NewsModel
 * @property $id
 * @property $title
 * @property $content
 * @property $timeofadd
 * @property $viewcounter
 * @property $preview
 */

class NewsModel extends AbstractModel
{

  protected static $table = 'articles';

  public static function upViewCounter($id, $viewcounter)
  {
    $sql = 'UPDATE articles SET viewcounter = ' . ++$viewcounter . ' WHERE id = ' . $id;

    DB::exec($sql);
    return $viewcounter;
  }
}