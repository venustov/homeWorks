<?php
//require_once __DIR__ . '/../functions/sql.php';
require_once __DIR__ . '/../models/sql.php';

function Article_getAll()
{

  $sql = 'SELECT * from articles';
  return Sql::Sql_query($sql);

}

function Article_insert($data)
{
  $sqlQuery = 'INSERT INTO articles
(title, content, preview)
VALUES (\'' . $data['title'] . '\', \'' . $data['content'] . '\', \'' . $data['picture'] . '\')';

  Sql::Sql_exec($sqlQuery);
}

function Article_getOne($id){
  $sql = 'SELECT * from articles WHERE id = ' . $id;
  return Sql::Sql_queryOnce($sql);
}