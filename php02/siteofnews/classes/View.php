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

  public function current()
  {
    return $this->data[$this->position];
  }

  public function next()
  {
    ++$this->position;
  }

  public function key()
  {
    return $this->position;
  }

  public function valid()
  {
    return isset($this->data[$this->position]);
  }

  public function rewind()
  {
    $this->position = 0;
  }
}