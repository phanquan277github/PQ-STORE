<?php
class Controller
{
  public $db;
  public function model($modelName)
  {
    if (file_exists(ROOT_PATH . 'app/models/' . $modelName . '.php')) {
      require_once ROOT_PATH . 'app/models/' . $modelName . '.php';
      if (class_exists($modelName)) {
        $model = new $modelName();
        return $model;
      }
    }
    return false;
  }

  public function render($viewName, $data = [])
  {
    if (!empty($data))
      extract($data); // đổi các key của array thành variables

    if (file_exists(ROOT_PATH . 'app/views/' . $viewName . '.php')) {
      require_once ROOT_PATH . 'app/views/' . $viewName . '.php';
    }
  }
}