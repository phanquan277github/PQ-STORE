<?php if ($userData = Session::data('user')): ?>
  <!-- After login -->
  <main class="container mt-4">
    <h2>Thông tin tài khoản</h2>
    <form>
      <div class="mb-3">
        <label for="" class="form-label">Họ tên</label>
        <input type="" class="form-control" id="" readonly
          value="<?php echo $userData['first_name'] . ' ' . $userData['last_name']; ?>">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <input type="" class="form-control" id="" readonly value="<?php echo $userData['email']; ?>">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Số điện thoại</label>
        <input type="" class="form-control" id="" readonly value="<?php echo "Chưa làm :))"; ?>">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Địa chỉ mặc định</label>
        <input type="" class="form-control" id="" readonly value="<?php echo "Chưa làm :))"; ?>">
      </div>
      <a class="btn btn-primary" href="<?php echo _WEB_ROOT . '/tai-khoan/logout/'; ?>">Đăng xuất!</a>
    </form>
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