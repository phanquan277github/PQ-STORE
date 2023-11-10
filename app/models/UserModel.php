<?php
class UserModel extends Model
{

  public function checkUser($data)
  {
    if (!empty($data)) {
      // Check whether the user already exists in the database 
      // $checkQuery = "SELECT * FROM users WHERE oauth_provider = " . $data['oauth_provider'] . " AND oauth_uid = " . $data['oauth_uid'];
      $checkQuery = "SELECT * FROM users WHERE oauth_provider = ? AND oauth_uid = ?";
      $checkResult = $this->getRow($checkQuery, [$data['oauth_provider'], $data['oauth_uid']]);

      if ($checkResult) {
        // Update user data in the database 
        $whereConditions = "oauth_provider = '" . $data['oauth_provider'] . "' AND oauth_uid = '" . $data['oauth_uid'] . "'";
        $update = $this->updateData('users', $data, $whereConditions);
      } else {
        // Add created time to the data array 
        $insert = $this->insertData('users', $data);
      }

      // Get user data from the database 
      $userData = $this->getRow($checkQuery, [$data['oauth_provider'], $data['oauth_uid']]);
    }

    // Return user data 
    return !empty($userData) ? $userData : false;
  }
}