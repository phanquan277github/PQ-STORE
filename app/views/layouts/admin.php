<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="<?php echo _WEB_ROOT . '/assets/img/favicon.ico' ?>" />
  <title>Admin</title>
  <!-- reset css cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
  <!-- font roboto cdn -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
    rel="stylesheet" />
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <!-- bootstrap Popper library
  <link rel="stylesheet" href="https://unpkg.com/@popperjs/core@2"> -->
  <!-- css -->
  <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/assets/css/base.css">
  <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/assets/css/main.css">
  <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/assets/css/admin.css">
  <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/assets/css/responsive.css">
</head>

<body>

  <main class="admin">
    <div class="container-fluid">
      <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-gray-800 ">
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
              <button class="btn text-light fs-4" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseProduct" aria-expanded="false" aria-controls="collapseProduct">
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
          </ul>
        </div>
        <div class="col py-3 content">
          <?php $this->render($component, $content); ?>
        </div>
      </div>
    </div>
  </main>

  <!-- jquery -> ajax -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Bootstrap popper -->
  <script src="https://unpkg.com/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <!-- JS -->
  <script src="<?php echo _WEB_ROOT; ?>/assets/js/admin.js"></script>
  <script src="<?php echo _WEB_ROOT; ?>/assets/js/ad.editProd.js"></script>

</body>

</html>