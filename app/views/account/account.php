<?php if ($userData = Session::data('user')): ?>
  <!-- After login -->
  <main class="container mt-4">
   <div class="row">
      <div class="col-4">
        <ul class="navbar-nav navbar-light" style="background-color: #f8f9fa;">
          <li class="nav-item m-2 fs-4 fw-bolder">
            <a class="nav-link" aria-current="page"><i class="bi bi-person-circle me-2"></i>Tài Khoản Của Tôi</a>
          </li>
          <li class="nav-item m-2 fs-5">
            <a class="nav-link" aria-current="page" href="<?php echo _WEB_ROOT . '/tai-khoan/profile/'; ?>"><i class="bi bi-person-circle me-2"></i>Thông tin tài khoản</a>
          </li>
          <li class="nav-item m-2 fs-5">
            <a class="nav-link" aria-current="page" href="<?php echo _WEB_ROOT . '/tai-khoan/order/'; ?>"><i class="bi bi-cart-check-fill me-2"></i>Đơn hàng</a>
          </li>
          <li class="nav-item m-2 fs-5">
            <a class="nav-link" aria-current="page" href="<?php echo _WEB_ROOT . '/tai-khoan/address/'; ?>"><i class="bi bi-geo-alt me-2"></i>Địa chỉ</a>
          </li>
          <li class="nav-item m-2 fs-5">
            <a class="btn btn-primary w-100 h-100" href="<?php echo _WEB_ROOT . '/tai-khoan/logout/'; ?>">Đăng xuất!</a>
          </li>
          </ul>
      </div>
      <div class="col-8">
        <?php 
        switch ($type) {
          case 'profile': $data['userData'] = $userData; $this->render('account/profile', $data); break;
          case 'order': $this->render('account/order', $data); break;
          case 'address': $this->render('account/address', $data); break;
        }
        ?>
      </div>
    </div>
  </main>
<?php else: ?>
  <!-- Before login -->
  <main id="login" class="container">
    <div class="content">
      <h3 class="title">Chào mừng bạn đến với PQ STORE <br> Laptop, PC, Màn hình, linh kiện và phụ kiện
        Chính Hãng!</h3>
      <a class="sign-iu-form__btn--bg-fb" href="<?php echo _WEB_ROOT . '/tai-khoan/login_facebook/'; ?>">
        <i class="bi bi-facebook"></i>
        <span>Tiếp tục với Facebook</span>
      </a>

      <a class="sign-iu-form__btn--bg-gg" href="<?php echo _WEB_ROOT . '/tai-khoan/login_google/'; ?>">
        <i class="bi bi-google"></i>
        <span>Tiếp tục với Google</span>
      </a>

      <div class="text-center">Hoặc</div>

      <a class="sign-iu-form__btn--bg-phone">
        <i class="bi bi-telephone"></i>
        <span>Tiếp tục với số điện thoại</span>
      </a>
    </div>
  </main>
<?php endif ?>