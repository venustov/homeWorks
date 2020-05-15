<?php


class View
  implements Iterator
{
  const PATH = __DIR__ . '/../views/';
  protected $data = [];

  private $position = 0;

  public function __set($name, $value)
  {
    $this->data[$name] = $value;
  }

  public function __get($name)
  {
    return $this->data[$name];
  }

  public function render($template)
  {
    // $this->data['items'] --> $items
    foreach ($this->data as $key => $val) {
      $$key = $val;
    }
    ob_start();
    include self::PATH . $template;
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
  }

  public function display($template){
    echo $this->render($template);
  }

//Всё, что ниже - не работает
  public function __construct() {
    $this->position = 0;
  }

  public function rewind()
  {
    var_dump(__METHOD__);
    $this->position = 0;
  }

  public function current()
  {
    var_dump(__METHOD__);
    return $this->data[$this->position];
  }

  public function key()
  {
    var_dump(__METHOD__);
    return $this->position;
  }

  public function next()
  {
    var_dump(__METHOD__);
    ++$this->position;
  }

  public function valid()
  {
    var_dump(__METHOD__);
    var_dump($this->data[$this->position]);
    return isset($this->data[$this->position]);
  }

}