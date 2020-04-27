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
  return $ret;
}

function Sql_exec($sql)
{
  $connect = Sql_connect();
  mysqli_query($connect, $sql);
}