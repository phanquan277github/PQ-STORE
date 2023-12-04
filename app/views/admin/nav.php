<div class="position-fixed col-3 col-lg-2 px-sm-2 bg-gray-800">
  <ul class="d-flex flex-column align-items-center text-white min-vh-100 nav p-4 align-items-sm-start ">
    <li class="nav-item d-flex align-items-center mb-3">
      <a class="nav-link" href="<?php echo _WEB_ROOT . '/admin/'; ?>">
        <img src="<?php echo _WEB_ROOT . '/assets/img/logo2.png' ?>" alt="" width="30" height="24">
        <span class="ms-2 fs-4 fw-semibold text-light">PQ-Store</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-light fs-4" href="#"><i class="bi bi-bar-chart-line-fill me-2"></i>Thống kê</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-light fs-4" href="#"><i class="bi bi-bag-plus-fill me-2"></i>Đơn đặt</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-light fs-4" href="#"><i class="bi bi-person-fill-gear me-2"></i>Khách hàng</a>
    </li>
    <li class="nav-item">
      <button class="btn text-light fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseProduct"
        aria-expanded="false" aria-controls="collapseProduct">
        <i class="bi bi-database-fill me-2"></i>Sản phẩm
      </button>
      <div class="collapse" id="collapseProduct">
        <a class="nav-link text-light fs-5 ms-5" href="<?php echo _WEB_ROOT . '/admin/add_product/' ?>">Thêm</a>
        <a class="nav-link text-light fs-5 ms-5" href="<?php echo _WEB_ROOT . '/admin/list_product/' ?>">Danh
          sách</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link text-light fs-4" href="<?php echo _WEB_ROOT . '/admin/system/' ?>"><i
          class="bi bi-gear-wide-connected me-2"></i>Hệ thống</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-light fs-4" href="<?php echo _WEB_ROOT . '/admin/logout/' ?>"><i
          class="bi bi-box-arrow-right me-2"></i>Đăng xuất</a>
    </li>
  </ul>
</div>