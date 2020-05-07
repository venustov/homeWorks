<?php


class View
{
  const PATH = __DIR__ . '/../views/';

  protected $data = [];

  public function assign($name, $value)
  {
    $this->data[$name] = $value;
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