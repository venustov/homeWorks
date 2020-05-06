<?php


class View
{
  public $folder;
  public $data;

  public function data($folder, $data)
  {
    $this->folder = $folder;
    $this->data = $data;
  }

  public function display($url)
  {
    include __DIR__ . '/../views/' . $this->folder . '/' . $url;
  }
}