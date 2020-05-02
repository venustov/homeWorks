<?php

class Sql
{
  private function __construct()
  {
    $connect = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($connect, 'homeworks');
    return $connect;
  }

  public function Sql_query($sql)
  {
    $res = mysqli_query($this, $sql);

    $ret = [];
    while (false != $row = mysqli_fetch_assoc($res)) {
      $ret[] = $row;
    }
    mysqli_close($this);
    return $ret;
  }

  public function Sql_exec($sql)
  {
    mysqli_query($this, $sql);
    mysqli_close($this);
  }

  public function Sql_queryOnce($sql)
  {
    $res = mysqli_query($this, $sql);
    $row = mysqli_fetch_assoc($res);
    mysqli_close($this);
    return $row;
  }
}