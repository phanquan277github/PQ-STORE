<?php if (!empty($slideshows)): ?>
  <div class="slideshow mt-4 container-fluid">
    <div id="slideshow" class="carousel slide" data-bs-ride="carousel">
      <div class=" carousel-indicators slideshow--carousel-indicators">
        <?php foreach ($slideshows as $index => $slide): ?>
          <button type="button" data-bs-target="#slideshow" data-bs-slide-to="<?php echo $index ?>"
            class="<?php echo $index == 0 ? 'active' : '' ?>"></button>
        <?php endforeach; ?>
      </div>
      <div class="carousel-inner">
        <?php foreach ($slideshows as $index => $slide): ?>
          <div class="obj-fit-contain carousel-item <?php echo $index == 0 ? 'active' : '' ?>">
            <img src="<?php echo $slide['image_path']; ?>" alt="error" class="d-block w-100">
          </div>
        <?php endforeach; ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#slideshow" data-bs-slide="prev">
        <span class="slideshow__pre-btn carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#slideshow" data-bs-slide="next">
        <span class="slideshow__next-btn carousel-control-next-icon"></span>
      </button>

      <!-- gợi ý của sildershow -->
      <div class="suggest row g-3 d-none d-md-flex">
        <div class="col-0 col-lg-4 d-none d-lg-block">
          <div class="bg-white rounded-4 p-3 box-shadow-4side" style="height: 100%;">
            <h2 class="auto-hidden-text-1line text-center">Xin chào</h2>
            <p class="fs-5 auto-hidden-text-4line">Chào mừng đến với <span class="text-primary-color">PQ Store</span>! Hy
              vọng bạn thích
              mua sắm ở đây ngày hôm nay. Nếu bạn có bất kỳ nhận xét hoặc đề xuất nào, vui lòng để lại
              <a href="#">phản hồi</a> cho chúng tôi
            </p>
          </div>
        </div>

        <div class="col-6 col-lg-4">
          <div class="bg-white rounded-4 p-3 box-shadow-4side" style="height: 100%;">
            <h2 class="auto-hidden-text-1line text-center">Danh mục nổi bật</h2>
            <div class="row g-3 align-items-stretch">
              <?php if (!empty($suggestCategories)): ?>
                <?php foreach ($suggestCategories as $item): ?>
                  <div class="col-4">
                    <a class="fs-5 text-dark text-center text-decoration-none"
                      href="<?php echo 'danh-muc?cate=' . $item['id']; ?>">
                      <img class="category-img" src="<?php echo $item['image_path']; ?>" alt="">
                      <div class="">
                        <?php echo $item['name'] ?>
                      </div>
                    </a>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>

        <div class="col-6 col-lg-4">
          <div class="bg-white rounded-4 p-3 box-shadow-4side" style="height: 100%;">
            <h2 class="auto-hidden-text-1line text-center">Sản phẩm nổi bật</h2>
            <div class="row g-3">
              <?php if (!empty($suggestProducts)): ?>
                <?php foreach ($suggestProducts as $product): ?>
                  <div class="suggest-product col-4 position-relative">
                    <img class="" src="<?php echo $product['thumbnail_path']; ?>" alt="">
                    <a class="popup" href="<?php echo _WEB_ROOT . '/san-pham?id=' . $product['id']; ?>">
                      <img src="<?php echo $product['thumbnail_path']; ?>" alt=""
                        class="slideshow__suggest--img products-item__avata">
                      <span class="auto-hidden-text-2line">
                        <?php echo $product['name']; ?>
                      </span>
                      <span class="text-primary-color">
                        <?php echo Helper::formatCurrency($product['discount']); ?>
                      </span>
                      <span class="text-decoration-line-through">
                        <?php echo Helper::formatCurrency($product['price']); ?>
                      </span>
                    </a>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  </div>
<?php endif; ?>