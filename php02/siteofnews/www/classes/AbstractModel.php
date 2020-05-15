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

  public function __isset($name)
  {
    return isset($this->data[$name]);
  }

  public static function findAll()
  {
    $class = get_called_class();
    $sql = 'SELECT * FROM ' . static::$table;
    $db = new DB();
    $db->setClassName($class);
    return $db->query($sql);
  }

  /**
   * @return NewsModel|boolean
   */

  public static function findOneById($id)
  {
    $class = get_called_class();
    $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
    $db = new DB();
    $db->setClassName($class);
    $res = $db->query($sql, [':id' => $id]);

    if (empty($res)) {
      throw new E404Exception('Ничего не найдено...', '404');
    }

    return $res[0];
  }

  public function fill($data = [])
  {
    // написать метод, который установит нужные свойства из массива $data данному объекту
  }

  protected function insert()
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
    if (true == $res) {
      $this->id = $db->lastInsertId();
    }
    return $res;
  }

  protected function update()
  {
    $db = new DB();

    $cols = [];
    $data = [];

    foreach ($this->data as $key => $value) {
      $data[':' . $key] = $value;
      if ('id' == $key) {
        continue;
      }
      $cols[] = $key . '=:' . $key;
    }

    $sql = 'UPDATE ' . static::$table . ' 
    SET ' . implode(', ', $cols) . ' WHERE id=:id';

    return $db->execute($sql, $data);
  }

  public static function findByColumn($column, $value)
  {
    $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . '=:value';
    $db = new DB();
    $db->setClassName(get_called_class());
    $res = $db->query($sql, [':value' => $value]);

    if (empty($res)) {
      throw new E404Exception('Ничего не найдено...');
    }

    return $res[0];
  }

  public function delete()
    // этот метод не удаляет картинку, связанную с объектом, а только запись в БД
  {
    $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';
    $db = new DB();
    return $db->execute($sql, [':id' => $this->id]);
  }

  public function save()
  {
    if (!isset($this->id)) {
      return $this->insert();
    } else {
      return $this->update();
    }
  }

}