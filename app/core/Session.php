<?php
class Session
{
  /*  
    data(key, value) => set session
    data(key) => get session
    data() => get all session
   */
  static public function data($key = '', $value = '')
  {
    if (!empty($value)) {
      // set session
      $_SESSION[$key] = $value;
      return true;
    } else {
      if (empty($key)) {
        // get all session
        if (isset($_SESSION)) {
          return $_SESSION;
        }
      } else {
        // get session
        if (isset($_SESSION[$key])) {
          return $_SESSION[$key];
        }
      }
    }
  }

  /*
    delete(key) => xóa session_key tương ứng
    delete() => Xóa tất cả session hiện tại
  */
  static public function delete($key = '')
  {
    if (!empty($key)) {
      // xóa session_key tương ứng
      if (isset($_SESSION[$key])) {
        unset($_SESSION[$key]);
        return true;
      }
      return false;
    } else {
      // Xóa tất cả session hiện tại
      session_destroy();
      return true;
    }
    return false;
  }

  /* Flash data 
    - Set flash data => giống set session
    - get flash data => giống get session nhưng sẽ xóa luôn sau khi get xong
  */
  static public function flashData($key = '', $value = '')
  {
    $flashData = self::data($key, $value);
    if (empty($value)) {
      self::delete($key);
    }
    return $flashData;
  }
}