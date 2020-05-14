<?php


class ErrorLog
{

  public function __construct($record)
  {
    @file_put_contents(__DIR__ . '/../error/log.txt', $record . '<br>', FILE_APPEND|LOCK_EX);
  }

}