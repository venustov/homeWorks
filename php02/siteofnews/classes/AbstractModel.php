<?php


abstract class AbstractModel
  implements IModel
{
  protected static $table;
  protected static $class;

  public static function getAll()
  {

    $sql = 'SELECT * FROM ' . static::$table;
    return DB::queryAll($sql, static::$class);

  }

  public static function getOne($id)
  {
    $sql = 'SELECT * FROM ' . static::$table . ' WHERE id = ' . $id;
    return DB::queryOne($sql, static::$class);
  }
}