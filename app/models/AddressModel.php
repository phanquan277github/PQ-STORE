<?php
class AddressModel extends Model
{
  public function getAddress($user_id) {
    $sql = "SELECT * FROM addresses
            WHERE user_id = '$user_id'";
    return $this->queryCustom($sql);;
  }


}