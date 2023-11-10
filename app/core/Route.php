<?php
class Route
{
  protected $routes = [];

  public function define($routes)
  {
    $this->routes = $routes;
  }

  public function getRoute($uri)
  {
    if (array_key_exists($uri, $this->routes)) {
      return $this->routes[$uri];
    }
  }

}
?>