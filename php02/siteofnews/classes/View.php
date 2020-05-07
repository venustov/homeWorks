<?php


class View
{
  const PATH = __DIR__ . '/../views/';
  protected $data = [];

  public function __set($name, $value)
  {
    // TODO: Implement __set() method.
    $this->data[$name] = $value;
  }

  public function __get($name)
  {
    // TODO: Implement __get() method.
    return $this->data[$name];
  }

  public function display($template)
  {
    // $this->data['items'] --> $items
    foreach ($this->data as $key => $val) {
      $$key = $val;
    }
    include self::PATH . $template;
  }
}