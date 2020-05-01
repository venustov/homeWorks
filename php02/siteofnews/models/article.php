<?php
require_once __DIR__ . '/../functions/sql.php';

function Article_getAll()
{

  $sql = 'SELECT * from articles';
  return Sql_query($sql);

}

function Article_insert($data)
{
  $sqlQuery = 'INSERT INTO articles
(title, content, preview)
VALUES (\'' . $data['title'] . '\', \'' . $data['content'] . '\', \'' . $data['picture'] . '\')';

  Sql_exec($sqlQuery);
}

function Article_getOne($id){
  $sql = 'SELECT * from articles WHERE id = ' . $id;
  return Sql_queryOnce($sql);
}