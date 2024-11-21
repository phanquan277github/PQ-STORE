<?php
// tự động load tất cả các class
require_once 'autoload.php';
session_start();
// khởi tạo ứng dụng
new App();

ini_set('display_errors', 1);
error_reporting(E_ALL);

// func to debug
function in($data)
{
  echo '<pre>';
  print_r($data);
  echo '</pre>';
}
