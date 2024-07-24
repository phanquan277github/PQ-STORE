<?php
class OrderModel extends Model
{
  public function getOrder($userId) {
    if (!empty($userId)) {
      $result = $this->queryCustom("SELECT * FROM orders WHERE user_id = '$userId'");

      foreach ($result as $index => $order) { 
        $sql = "SELECT p.name, p.price, p.discount, p.thumbnail_path, ci.id as id, p.id as product_id, ci.quantity FROM products p
        LEFT JOIN order_items ci ON p.id = ci.product_id WHERE ci.order_id = " . $order['id'];
        $result[$index]['order_items'] = $this->queryCustom($sql);
      }
      return $result;
    } 
    return false;
  }
  
  public function create($data)
  {
    if (!empty($data)) {
      $address = $this->getRow("SELECT * FROM addresses WHERE id = " . $data['address_id']);
      $cartItems = $this->queryCustom("SELECT product_id, quantity FROM cart_items
                                       WHERE cart_id = (SELECT id FROM carts WHERE user_id = " . $data['user_id'] . ")");
      $data["full_name"] = $address['full_name'];
      $data["phone_number"] = $address['phone_number'];
      $data["address"] = $address['street_address'] . ", " . $address['address'];
      unset($data["address_id"]);
      $this->insertData("orders", $data);

      $orderId = $this->lastInsertId();
      foreach ($cartItems as $item) {
        $item['order_id'] = $orderId;
        $this->insertData("order_items", $item);
        $this->deleteData('cart_items');
      }
      return true;
    }
    return false;
  }
}