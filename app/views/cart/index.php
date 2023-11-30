<main class="container my-4">

  <?php if ($data = Session::data('cart')): ?>
    <!-- giỏ hàng đã có sản phẩm -->
    <div class="row have-cart">
      <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9">
        <div class="d-flex p-1">
          <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
          <label for="" class="ms-1 fs-4">Chọn tất cả</label>
          <button class="btn border-0 fs-4 ms-auto">
            <i class="bi bi-trash me-1"></i>Xóa tất cả
          </button>
        </div>
        <div class="list-group">

          <?php foreach ($data as $item): ?>
            <div class="list-group-item border border-warning m-2 p-2">
              <div class="row g-1 align-items-center">
                <div class="col-1 d-flex justify-content-center align-items-center">
                  <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                </div>
                <div class="col-1">
                  <a href="<?php echo _WEB_ROOT . '/san-pham?sku=' . $item['sku'] ?>" class="">
                    <img src="<?php echo !empty($item['thumbnail_path']) ? $item['thumbnail_path'] : ""; ?>" alt="" />
                  </a>
                </div>
                <div class="col-4">
                  <span class="fs-5 auto-hidden-text-3line">
                    <?php echo $item['name']; ?>
                  </span>
                </div>
                <div class="col-2 d-flex flex-column align-items-center">
                  <div class="fs-4 text-primary-color" data-discount="<?php echo $item['discount']; ?>">
                    <?php echo Helper::formatCurrency($item['discount']); ?>
                  </div>
                  <div class="fs-5 text-decoration-line-through" data-price="<?php echo $item['price']; ?>">
                    <?php echo Helper::formatCurrency($item['price']); ?>
                  </div>
                </div>
                <div class="col-2 d-flex flex-column align-items-center">
                  <div class="btn-group">
                    <button data-action="decrease" class="btn btn-decrease border-dark fs-4 fw-bold">-</button>
                    <div class="quantity-num px-3 text-center align-self-center"
                      data-quantity="<?php echo $item['quantity']; ?>" data-product-id="<?php echo $item['id']; ?>">
                      <?php echo $item['quantity']; ?>
                    </div>
                    <button data-action="increase" class="btn btn-increase border-dark fs-4 fw-bold">+</button>
                  </div>
                  <a href="<?php echo _WEB_ROOT . '/gio-hang/remove/' . $item['id']; ?>"
                    class="quantity__remove btn border-0 p-2 fs-5">Xóa</a>
                </div>
                <div class="total-price col-2 d-flex justify-content-center">
                  <?php echo Helper::formatCurrency($item['discount'] * $item['quantity']); ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>

        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
        <h1 class="text-center fs-1">Thanh toán</h1>
        <div class="list-group border-0">
          <div class="list-group-item d-flex">
            <div>Tổng tiền:</div>
            <div class="ms-auto">0.00đ</div>
          </div>
          <div class="list-group-item d-flex">
            <div>Giảm:</div>
            <div class="ms-auto">0.00đ</div>
          </div>
          <div class="list-group-item d-flex">
            <h3>Cần thanh toán:</h3>
            <h3 class="ms-auto">0.00đ</h3>
          </div>
        </div>
        <button class="pay__button btn border-0 bg-primary-gradient fs-3">Thanh toán</button>
      </div>
    </div>
  <?php else: ?>
    <!-- giỏ hàng chưa có sản phẩm -->
    <div class="non-cart m-auto text-center">
      <img class="" src="../assets/img/no-cart.png" alt="" />
      <h2 class="mt-2">Giỏ hàng chưa có sản phẩm nào</h2>
    </div>
  <?php endif; ?>

</main>