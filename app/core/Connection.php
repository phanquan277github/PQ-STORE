<?php
class Connection
{
  private static $instance = null, $conn = null;

  private function __construct()
  {
    global $config;
    $db_config = $config['database'];
    try {
      // cấu hình dsn
      $dsn = 'mysql:dbname=' . $db_config['dbname'] . ';host=' . $db_config['host'] . ';port=' . $db_config['port'];
      // cấu hình $options
      $options = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      ];
      // câu lệnh kết nối
      $con = new PDO($dsn, $db_config['user'], $db_config['pass'], $options);
      self::$conn = $con;
    } catch (Exception $e) {
      App::$app->loadError('database', ['message' => $e->getMessage()]);
      die();
    }
  }

  public static function getInstance()
  {
    if (self::$instance == null) {
      $connection = new Connection();
      self::$instance = self::$conn;
    }
    return self::$instance;
  }
}