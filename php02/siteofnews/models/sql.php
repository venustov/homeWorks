<?php

class Sql
{
  private static function connect()
  {
    $mysqli = new mysqli('localhost', 'root', '', 'homeworks');
    return $mysqli;
  }

  public static function query($sql)
  {
    $mysqli = self::connect();
    $res = $mysqli->query($sql);

    $ret = [];
    while (false != $row = $res->fetch_assoc()) {
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

  public static function queryOnce($sql)
  {
    $mysqli = self::connect();
    $res = $mysqli->query($sql);
    $row = $res->fetch_assoc();
    $mysqli->close();
    return $row;
  }
}