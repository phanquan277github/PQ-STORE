<?php if (!empty($product)): ?>
  <div class="row g-3">
    <div class="col-12 col-md-5">
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
                <img src="<?php echo $picture['image_path']; ?>" alt="" class="d-block w-100">
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
    <div class="col-12 col-md-7">
      <div class="product-info">
        <h2 class="">
          <?php echo $product['name'] ?>
        </h2>
        <div class="price-container">
          <h2 class="discount">
            <?php echo Helper::formatCurrency($product['discount']); ?>
          </h2>
          <h3 class="price text-decoration-line-through">
            <?php echo Helper::formatCurrency($product['price']); ?>
          </h3>
        </div>
        <ul class="main-specification">
          <?php if (!empty($mainSpecifications)): ?>
            <?php foreach ($mainSpecifications as $value): ?>
              <li class="fs-5">
                <?php echo $value['title'] . ": " ?>
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
            <a class="btn rounded w-100 fs-4 fw-bold p-3 border-primary"
              href="<?php echo _WEB_ROOT . '/gio-hang/add/' . Session::data('user')['id'] . '/' . $product['id']; ?>">
              THÊM VÀO GIỎ
            </a>
          </div>
          <div class=" col col-6">
            <button class="btn rounded w-100 fs-4 p-2 border-primary">Trả góp 0%</button>
          </div>
          <div class="col col-6">
            <button class="btn rounded w-100 fs-4 p-2 border-primary">
              Trả góp qua thẻ
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>