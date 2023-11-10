<?php
class App
{
  private $controller = 'Home', $action = 'index', $params = [], $route;
  public static $app;
  function __construct()
  {
    self::$app = $this; // global app để dùng loadError chỗ khác
    global $routes;
    $this->route = new Route();
    $this->route->define($routes);

    $this->handle();
  }

  private function handle()
  {
    $uri = Request::uri();

    if (!empty($uri)) {
      $uriArr = explode('/', $uri);
      $this->controller = $this->route->getRoute($uriArr[0]);
    } else {
      $uriArr[0] = '';
    }

    // xử lí controller
    if (file_exists('../app/controllers/' . $this->controller . '.php')) {
      $this->controller = new $this->controller();
      unset($uriArr[0]);
    } else {
      $this->loadError('404');
    }

    // xử lí action
    if (!empty($uriArr[1])) {
      $this->action = $uriArr[1];
      unset($uriArr[1]);
    }

    // xử lí params
    $this->params = array_values($uriArr);

    // gọi action của controller và truyền params
    if (method_exists($this->controller, $this->action)) {
      call_user_func_array([$this->controller, $this->action], $this->params);
    }
  }
  public function loadError($nameErr = '404', $data = [])
  {
    extract($data);
    require_once '../app/views/errors/' . $nameErr . '.php';
    die();
  }
}