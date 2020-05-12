<?php


abstract class AbstractModel
  implements IModel
{

  protected static $table;

  protected $data = [];

  public function __set($name, $value)
  {
    $this->data[$name] = $value;
  }

  public function __get($name)
  {
    return $this->data[$name];
  }

  public static function findAll()
  {
    $class = get_called_class();
    $sql = 'SELECT * FROM ' . static::$table;
    $db = new DB();
    $db->setClassName($class);
    return $db->query($sql);
  }

  public static function findOneById($id)
  {
    $class = get_called_class();
    $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
    $db = new DB();
    $db->setClassName($class);
    return $db->query($sql, [':id' => $id])[0];
  }

  public function fill($data = [])
  {
    // написать метод, который установит нужные свойства из массива $data данному объекту
  }

  public function insert()
  {
    $cols = array_keys($this->data);
    $data = [];
    foreach ($cols as $col) {
      $data[':' . $col] = $this->data[$col];
    }
    $sql =
      'INSERT INTO ' . static::$table . '
       (' . implode(', ', $cols) . ') 
       VALUES 
       (' . implode(', ', array_keys($data)) . ')
       ';
    $db = new DB();
    $res = $db->execute($sql, $data);
    if (true == $res){
      $this->id = $db->lastInsertId();
    }
    return $res;
  }

  public function update()
  {
    $db = new DB();

    $data = [];
    $dataExec = [];

    foreach ($this->data as $key => $value){
      $data[] = $key . '=:' . $key;
      $dataExec[':' . $key] = $value;
    }

    $dataExec[':id'] = $this->id;

    $sql = 'UPDATE ' . static::$table . ' 
    SET ' . implode(', ', $data) . ' WHERE id=:id';

    return $db->execute($sql, $dataExec);
  }

  public static function findByColumn($column, $value)
  {
    $class = get_called_class();
    $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . '=:value';
    $db = new DB();
    $db->setClassName($class);
    return $db->query($sql, [':value' => $value]);
  }

  public function delete()
  {
    $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';
    $db = new DB();
    echo $sql;
    return $db->execute($sql, [':id' => $this->id]);
  }

}