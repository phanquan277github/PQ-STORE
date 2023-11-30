<div class="spotlight container my-4">
  <h2 class="my-3">Có thể bạn quan tâm</h2>
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
                <?php echo Helper::formatCurrency($product['discount']); ?>
              </div>
              <div class="goods-price__price">
                <?php echo Helper::formatCurrency($product['price']); ?>
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
            <a href="<?php echo _WEB_ROOT . '/san-pham?id=' . $product['id']; ?>" class="goods-name goods-name--popup">
              <?php echo $product['name'] ?>
            </a>
            <ul>
              <?Php if (!empty($product['main_specification'])): ?>
                <?php foreach ($product['main_specification'] as $item): ?>
                  <li class="fs-5">
                    <?php echo $item['title'] . ": " ?>
                    <?php echo $item['content'] ?>
                  </li>
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