<?php


class ErrorLog
{
  const PATH = __DIR__ . '/../error/log.txt';

  public function __construct($record)
  {
    @file_put_contents(self::PATH, $record . PHP_EOL, FILE_APPEND|LOCK_EX);
  }

}