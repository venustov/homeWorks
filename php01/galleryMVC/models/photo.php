<?php
require_once __DIR__ . '/../functions/sql.php';

function Photo_getAll()
{

  $sql = 'SELECT * from images';
  return Sql_query($sql);

}

function Photo_insert($data)
{
  $sqlQuery = 'INSERT INTO images
(name, title)
VALUES (\'' . $data['picture'] . '\', \'' . $data['title'] . '\')';

  Sql_exec($sqlQuery);
}