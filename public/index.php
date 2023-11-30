<?php
// tự động load tất cả các class
require_once 'autoload.php';
session_start();
// khởi tạo ứng dụng
new App();

// func to debug
function in($data)
{
  echo '<pre>';
  print_r($data);
  echo '</pre>';
}