<?php

class DB
{
  private static function connect()
  {
    $mysqli = new mysqli('localhost', 'root', '', 'homeworks');
    return $mysqli;
  }

  public static function queryAll($sql, $class = 'stdClass')
  {
    $mysqli = self::connect();
    $res = $mysqli->query($sql);

    $ret = [];
    while (false != $row = $res->fetch_object($class)) {
      $ret[] = $row;
    }
    $mysqli->close();
    return $ret;
  }

  public static function exec($sql)
  {
    $mysqli = self::connect();
    $mysqli->query($sql);
    $mysqli->close();
  }

  public static function queryOne($sql, $class = 'stdClass')
  {
    return self::queryAll($sql, $class)[0];
  }
}