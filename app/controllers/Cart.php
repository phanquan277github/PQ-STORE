<?php
class Cart extends Controller
{
  public function index()
  {
    $model = $this->model('CartModel');
    if ($user = Session::data('user')) {
      if ($carts = $model->getCartItems($user['id'])) {
        Session::data('cart', $carts);
      } else {
        Session::delete('cart');
      }
    }

    $data['content'] = '';
    $data['component'] = 'cart/index';
    $this->render('layouts/main', $data);
  }

  public function add(...$params)
  {
    $userId = $params[0];
    $productId = $params[1];

    // người dùng đã đăng nhập
    if (Session::data('user')) {
      $model = $this->model('CartModel');

      // kiểm tra nếu user đã có cart thì thêm sản phẩm ngược lại nếu chưa thì tạo cart 
      $checkCartRs = $model->addProduct($userId, $productId);
      Session::data('cart', $model->getCartItems($userId));
    }
    // echo "<scrip>alert('Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng);</scrip>";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }

  public function remove(...$params)
  {
    $productId = $params[0];
    if ($userId = Session::data('user')['id']) {
      $model = $this->model('CartModel');
      $model->removeProduct($userId, $productId);
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
  public function removeAll()
  {
    if ($userId = Session::data('user')['id']) {
      $model = $this->model('CartModel');
      $model->removeAll($userId);
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }

  public function updateQuantity($productId, $currentQuantity, $action)
  {
    $model = $this->model('CartModel');
    $cartId = $model->table('carts')->select('id')->where('user_id', '=', Session::data('user')['id'])->first();

    if ($action == 'increase') {
      $model->table('cart_items')->where('cart_id', '=', $cartId['id'])->where('product_id', '=', $productId)->update([
        'quantity' => intval($currentQuantity) + 1
      ]);
      echo intval($currentQuantity) + 1;
    } else if ($action == 'decrease') {
      $model->table('cart_items')->where('cart_id', '=', $cartId['id'])->where('product_id', '=', $productId)->update([
        'quantity' => intval($currentQuantity) - 1
      ]);
      echo intval($currentQuantity) - 1;
    }
  }
}