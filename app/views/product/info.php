<?php if (!empty($product)): ?>
  <div class="row g-3">
    <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5">
      <div id="product-left__slideshow" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <?php if (!empty($pictures)): ?>
            <?php foreach ($pictures as $key => $picture): ?>
              <button type="button" data-bs-target="#product-left__slideshow" data-bs-slide-to="<?php echo $key ?>"
                class="<?php echo ($key == 0) ? 'active' : ''; ?>"></button>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
        <div class="carousel-inner">
          <?php if (!empty($pictures)): ?>
            <?php foreach ($pictures as $key => $picture): ?>
              <div class="carousel-item <?php echo ($key == 0) ? 'active' : ''; ?>">
                <img src="<?php echo $picture['image_path']; ?>" alt="Los Angeles" class="d-block w-100">
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#product-left__slideshow"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#product-left__slideshow"
          data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
    </div>
    <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 col-xxl-7">
      <div class="product-info">
        <h2 class="">
          <?php echo $product['name'] ?>
        </h2>
        <div class="price-container">
          <h2 class="discount">
            <?php echo number_format($product['discount'], 2, '.', ',') ?>
          </h2>
          <h3 class="price text-decoration-line-through">
            <?php echo number_format($product['price'], 2, '.', ',') ?>
          </h3>
        </div>
        <ul class="main-specification">
          <?php if (!empty($mainSpecifications)): ?>
            <?php foreach ($mainSpecifications as $value): ?>
              <li>
                <?php echo $value['content'] ?>
              </li>
            <?php endforeach; ?>
          <?php endif; ?>
        </ul>
        <div class="row g-1 m-3">
          <div class="col col-6">
            <span class="policy"><i class="bi bi-truck me-1"></i>Giao hàng miễn phí</span>
          </div>
          <div class="col col-6">
            <span class="policy"><i class="bi bi-award me-1"></i>Hàng chính hãng</span>
          </div>
          <div class="col col-6">
            <span class="policy"><i class="bi bi-shield-plus me-1"></i>Bảo hành nhanh
              chóng</span>
          </div>
          <div class="col col-6">
            <span class="policy"><i class="bi bi-gear me-1"></i>Hỗ trợ lắp ráp - cài đặt miễn
              phí</span>
          </div>
        </div>
        <div class="row g-3">
          <div class="col col-12">
            <?php if ($userData = Session::data('user')): ?>
              <a class="btn text-center fw-bold p-4 border-0"
                href="<?php echo _WEB_ROOT . '/gio-hang/add/' . $userData['id'] . '/' . $product['id']; ?>">
                THÊM VÀO GIỎ
              </a>
            <?php else: ?>
              <button type="button" class="btn border-0 text-center fw-bold p-4" data-bs-container="body"
                data-bs-placement="top" data-bs-toggle="popover"
                data-bs-content="Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng">THÊM VÀO GIỎ</button>
            <?php endif; ?>
          </div>
          <div class=" col col-6">
            <div class="btn border-0">Trả góp 0%</div>
          </div>
          <div class="col col-6">
            <div class="btn border-0">
              Trả góp qua thẻ
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>