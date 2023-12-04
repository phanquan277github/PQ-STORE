<header class="header">

  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light py-3">
      <!-- nút chuyển đổi khi small -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navigationCollapse"
        aria-controls="navigationCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-brand mx-2" href="<?php echo _WEB_ROOT . '/' ?>">
        <img src="<?php echo _WEB_ROOT . '/assets/img/logo2.png' ?>" alt="Logo" width="30" height="24"
          class="logo d-inline-block">
      </a>

      <form class="search dropdown d-flex mx-3" action="<?php echo _WEB_ROOT . '/danh-muc/' ?>" method="GET">
        <input class="form-control dropdown-toggle" id="searchDropdown" data-bs-toggle="dropdown" aria-expanded="false"
          type="search" placeholder="Nhập từ khóa để tìm kiếm" name="keySearch" onkeyup="showResultSearch(this)"
          autocomplete="off">
        <button class="btn btn-light" type="submit">Search</button>

        <div class="popup dropdown-menu p-3 bg-white" aria-labelledby="searchDropdown">
          <div class="d-flex justify-content-between">
            <span class="fs-6">Lịch sử tìm kiếm</span>
            <button class="btn text-danger">Xóa lịch sử</button>
          </div>
          <ul class="content list-group list-group-flush">
            <!-- <li class="list-group-item"><a href="<?php echo _WEB_ROOT . '/san-pham?id='; ?>"></a></li> -->
          </ul>
        </div>
      </form>

      <!-- Nội dung sẽ hiển thị khi bấm toggler -->
      <div class="collapse navbar-collapse" id="navigationCollapse">
        <ul class="navbar-nav flex-row justify-content-between  ms-auto mt-3 mt-lg-0 mb-lg-0">
          <li class="nav-item mx-1">
            <a class="nav-link fs-4" aria-current="page" href="#">
              <i class="me-1 bi bi-bell"></i>Thông báo
            </a>
          </li>
          <li class="nav-item mx-1">
            <a class="nav-link fs-4" href="#">
              <i class="me-1 bi bi-question-circle"></i>Hỗ trợ
            </a>
          </li>
          <li class="nav-item mx-1 cart">
            <a class="nav-link fs-4" href="<?php echo _WEB_ROOT . '/gio-hang/'; ?>" tabindex="-1" aria-disabled="true">
              <i class="me-1 bi bi-cart-dash">
                <span class="quantity">
                  <?php echo Session::data('cart') ? sizeof(Session::data('cart')) : '0'; ?>
                </span>
              </i>Giỏ hàng
            </a>
          </li>
          <li class="nav-item mx-1">
            <a class="nav-link fs-4" href="<?php echo _WEB_ROOT . '/tai-khoan/' ?>">
              <?php if ($userData = Session::data('user')): ?>
                <i class="me-1 bi bi-person"></i>
                <span>
                  <?php echo $userData['last_name']; ?>
                </span>
              <?php else: ?>
                <i class="me-1 bi bi-person"></i>Tài khoản
              <?php endif; ?>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </div>

  <nav class="category">
    <div class="container">
      <div class="row px-5">
        <?php if (!empty($headerCategories)): ?>
          <?php foreach ($headerCategories as $level1): ?>
            <div class="col col-4 col-sm-4 col-md-2 py-2 d-flex justify-content-center align-items-center">
              <a class="label fs-5 fs-md-4" href="<?php echo _WEB_ROOT . '/danh-muc?cate=' . $level1['id']; ?>">
                <?php echo (!empty($level1['name'])) ? $level1['name'] : ''; ?>
              </a>
              <div class="popup">
                <?php foreach ($level1['sub-cate'] as $level2): ?>
                  <a href="<?php echo _WEB_ROOT . '/danh-muc?cate=' . $level2['id']; ?>">
                    <?php echo (!empty($level2['name'])) ? $level2['name'] : ''; ?>
                  </a>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </nav>

</header>