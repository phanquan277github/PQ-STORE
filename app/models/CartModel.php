<?php
class CartModel extends Model
{

  public function addProduct($userId, $productId)
  {
    if (!empty($userId)) {
      $checkQuery = "SELECT * FROM carts WHERE user_id = ?";
      $checkResult = $this->getRow($checkQuery, [$userId]);

      if ($checkResult) {
        // người dùng đã có giỏ hàng 
        // => kiểm tra nếu giỏ đã có sản phẩm thì tăng số lượng
        $sql = "SELECT quantity FROM cart_items WHERE cart_id = :cart_id AND product_id = :product_id;";
        $quantity = $this->getRow($sql, [
          ':cart_id' => $checkResult['id'],
          ':product_id' => $productId
        ]);
        if ($quantity) {
          $condition = "cart_id = " . $checkResult['id'] . " AND product_id = $productId";
          $this->updateData('cart_items', ['quantity' => $quantity['quantity'] + 1], $condition);
        } else {
          $this->insertData('cart_items', [
            'cart_id' => $checkResult['id'],
            'product_id' => $productId,
            'quantity' => 1
          ]);
        }
      } else {
        // người dùng chưa có giỏ hàng => tạo giỏ hàng mới và insert sản phẩm vào cart_items
        $this->insertData('carts', ['user_id' => $userId]);
        $dataInsert = [
          'cart_id' => $this->lastInsertId(),
          'product_id' => $productId,
          'quantity' => 1,
        ];
        $this->insertData('cart_items', $dataInsert);
      }
      return false;
    }
  }

  public function removeProduct($userId, $productId)
  {
    if (!empty($userId) && !empty($productId)) {
      $checkQuery = "SELECT id FROM carts WHERE user_id = ?";
      $cartId = $this->getRow($checkQuery, [$userId]);
      $condition = "product_id = $productId AND cart_id = " . $cartId['id'];
      $this->deleteData('cart_items', $condition);
    }
  }
  public function removeAll($userId)
  {
    if (!empty($userId)) {
      $checkQuery = "SELECT id FROM carts WHERE user_id = ?";
      $cartId = $this->getRow($checkQuery, [$userId]);
      $condition = "cart_id = " . $cartId['id'];
      $this->deleteData('cart_items', $condition);
    }
  }

  public function getCartItems($userId)
  {
    $sql = "SELECT p.*, ci.quantity FROM products p
      LEFT JOIN (carts c RIGHT JOIN cart_items ci ON c.id = ci.cart_id)
      ON p.id = ci.product_id WHERE c.user_id = ? ;";
    return $this->getListCondition($sql, [$userId]);
  }

}