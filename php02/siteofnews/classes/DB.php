<?php

class DB
{
  private $dbh;
  private $className = 'stdClass';

  public function __construct()
  {
    $this->dbh = new PDO('mysql:dbname=homeworks;host=localhost', 'root', '');
  }

  public function setClassName($className)
  {
    $this->className = $className;
  }

  public function query($sql, $params = [])
  {
    $sth = $this->dbh->prepare($sql);
    $sth->execute($params);
    return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
  }

  public function execute($sql, $params = [])
  {
    $sth = $this->dbh->prepare($sql);
    $sth->execute($params);
    $insert_id = $this->dbh->lastInsertId();
    return $insert_id ? $insert_id : true;
  }

  private static function connect()
  {
    $mysqli = new mysqli('localhost', 'root', '', 'homeworks');
    return $mysqli;
  }

  public static function exec($sql)
  {
    if (!$mysqli = self::connect()) {
      return false;
    }
    if (!$mysqli->query($sql)) {
      return false;
    }
    $latest_id = $mysqli->insert_id;
    $mysqli->close();

    return $latest_id ? $latest_id : true;
  }

}