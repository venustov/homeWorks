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
    return $db->execute($sql, $data);
  }

  public static function updateOne($id, $key, $value)
  {
    $sql = 'UPDATE ' . static::$table . ' 
    SET ' . $key . '=' . $value . '
    WHERE id=' . $id;
    $db = new DB();
    return $db->execute($sql);
  }

  public static function findByColumn($column, $value)
  {
    $class = get_called_class();
    $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . '=:value';
    $db = new DB();
    $db->setClassName($class);
    return $db->query($sql, [':value' => $value]);
  }

  public function delete($column, $value)
  {
    $sql = 'DELETE * FROM ' . static::$table . ' WHERE ' . $column . '=:value';
    $db = new DB();
    return $db->execute($sql, [':value' => $value]);
  }

}