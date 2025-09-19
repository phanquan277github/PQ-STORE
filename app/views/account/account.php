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
  <main id="login" class="container mt-5">
  <div class="row">
    <!-- Cột trái: Form đăng ký -->
    <div class="col-md-4 p-4 border-end">
      <h4 class="mb-3">Đăng ký tài khoản PQ STORE</h4>
      <form method="POST" action="<?php echo _WEB_ROOT . '/tai-khoan/register_local/'; ?>">
        <div class="mb-3">
          <label for="fullname" class="form-label">Họ và tên</label>
          <input type="text" class="form-control" id="fullname" name="fullname" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Mật khẩu</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
          <label for="confirm_password" class="form-label">Xác nhận mật khẩu</label>
          <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>
        <button type="submit" class="btn btn-success w-100">Đăng ký ngay</button>
      </form>
    </div>

    <!-- Cột giữa: Form đăng nhập -->
    <div class="col-md-4 p-4 border-end">
      <h4 class="mb-3">Đăng nhập</h4>
      <form method="POST" action="<?php echo _WEB_ROOT . '/tai-khoan/login_local/'; ?>">
        <div class="mb-3">
          <label for="username" class="form-label">Tên đăng nhập</label>
          <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
          <label for="login_password" class="form-label">Mật khẩu</label>
          <input type="password" class="form-control" id="login_password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
      </form>
    </div>

    <!-- Cột phải: Login MXH -->
    <div class="col-md-4 p-4">
      <h3 class="title">Chào mừng bạn đến với PQ STORE <br>
        Laptop, PC, Màn hình, linh kiện và phụ kiện Chính Hãng!
      </h3>

      <a class="sign-iu-form__btn--bg-fb mb-3 d-block text-center" href="<?php echo _WEB_ROOT . '/tai-khoan/login_facebook/'; ?>">
        <i class="bi bi-facebook"></i>
        <span>Tiếp tục với Facebook</span>
      </a>

      <a class="sign-iu-form__btn--bg-gg mb-3 d-block text-center" href="<?php echo _WEB_ROOT . '/tai-khoan/login_google/'; ?>">
        <i class="bi bi-google"></i>
        <span>Tiếp tục với Google</span>
      </a>

      <div class="text-center">Hoặc</div>

      <a class="sign-iu-form__btn--bg-phone d-block text-center mt-3">
        <i class="bi bi-telephone"></i>
        <span>Tiếp tục với số điện thoại</span>
      </a>
    </div>
  </div>
</main>
<?php endif ?>
