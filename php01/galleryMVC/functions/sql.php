<?php
function Sql_connect()
{
  $connect = mysqli_connect('localhost', 'root', '');
  mysqli_select_db($connect, 'homeworks');
  return $connect;
}

function Sql_query($sql)
{
  $connect = Sql_connect();

  $res = mysqli_query($connect, $sql);

  $ret = [];
  while (false != $row = mysqli_fetch_assoc($res)) {
    $ret[] = $row;
  }
  mysqli_close($connect);
  return $ret;
}

function Sql_exec($sql)
{
  $connect = Sql_connect();
  mysqli_query($connect, $sql);
  mysqli_close($connect);
}

function Sql_queryOnce($sql)
{
  $connect = Sql_connect();
  $res = mysqli_query($connect, $sql);
  $row = mysqli_fetch_assoc($res);
  mysqli_close($connect);
  return $row;
}