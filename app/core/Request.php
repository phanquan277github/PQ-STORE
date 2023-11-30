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

  public static function input_value($inputname, $filter = FILTER_DEFAULT, $option = FILTER_SANITIZE_NUMBER_INT)
  {
    $value = filter_input(INPUT_POST, $inputname, $filter, $option);
    if ($value === null) {
      $value = filter_input(INPUT_GET, $inputname, $filter, $option);
    }
    return $value;
  }

  public static function currentUrl()
  {
    return $_SERVER['HTTP_REFERER'];
  }

}