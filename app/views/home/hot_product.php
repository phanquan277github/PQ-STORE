<div class="spotlight-container container">
  <div id="spotlight" class="container__list page-section">
    <div class="container__title-content">
      <h1 class="container__title">Có thể bạn quan tâm</h1>
      <div class="container__title__see-all-products">
        <a href="./category.html">Xem tất cả</a>
      </div>
    </div>
    <div class="row g-3">
      <?php foreach ($spotlights as $product): ?>
        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
          <div class="goods-container">
            <a class="goods-img" href=""><img src="<?php echo $product['thumbnail_path']; ?>" alt=""></a>
            <div class="goods-info">
              <div class="goods-name">
                <?php echo $product['name'] ?>
              </div>
              <div class="goods-price">
                <div class="goods-price__discount">
                  <?php echo number_format($product['discount'], 2, '.', ',') ?>
                </div>
                <div class="goods-price__price">
                  <?php echo number_format($product['price'], 2, '.', ',') ?>
                </div>
              </div>
              <div class="tag-list">
                <div class="tag-item tag-is-skeweb tag-deal-color">
                  <?php if ($product['price'] != 0): ?>
                    <?php echo 'Giảm ' . number_format((($product['price'] - $product['discount']) / $product['price']) * 100, 2, '.', ',') . '%' ?>
                  <?php else:
                    echo 'Giảm 0%' ?>
                  <?php endif; ?>
                </div>
                <div class="tag-free-ship">
                  <?php echo 'Free'; ?>
                </div>
              </div>
            </div>
            <div class="goods-describe-popup">
              <a href="<?php echo _WEB_ROOT . '/san-pham?sku=' . $product['sku']; ?>"
                class="goods-name goods-name--popup">
                <?php echo $product['name'] ?>
              </a>
              <ul>
                <?Php if (!empty($product['content'])): ?>
                  <?php foreach ($product['content'] as $item): ?>
                    <?php echo "<li>$item</li>"; ?>
                  <?php endforeach; ?>
                <?php else: ?>
                  <li>Chưa có dữ liệu!</li>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>