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
    $this->render('layouts/cart', $data);
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
    header('Location: ' . _WEB_ROOT . '/gio-hang/');
  }

  public function remove(...$params)
  {
    $productId = $params[0];
    if ($userId = Session::data('user')['id']) {
      $model = $this->model('CartModel');
      $model->removeProduct($userId, $productId);
    }
    header('Location: ' . _WEB_ROOT . '/gio-hang/');
  }

  public function updateQuantity($action)
  {
    if ($action == 'increase') {
      $model = $this->model('CartModel');
      $model->table('cart_items')->where('cart_id', '=', 1)->where('product_id', '=', 1)->update([
        'quantity' => 4
      ]);
    } else if ($action == 'decrease') {

    }

  }

}