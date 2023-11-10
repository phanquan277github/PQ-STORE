<?php
class Request
{
  public static function uri()
  {
    if (!empty($_SERVER['PATH_INFO'])) {
      $uri = trim($_SERVER['PATH_INFO'], '/');
    } else {
      $uri = '';
    }
    return $uri;
  }

  public static function method()
  {
    return $_SERVER['REQUEST_METHOD'];
  }
}