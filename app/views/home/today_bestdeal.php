<?php if (!empty($bestdeals)): ?>
  <div class="best-deal container mt-3">
    <h2 class="">Ưu đãi tốt nhất hôm nay</h2>
    <div class="row g-3">
      <?php foreach ($bestdeals as $key => $product): ?>
        <div class="col-12 col-lg-6 col-xl-4">
          <div class=" goods-container <?php echo $key != 0 ? 'goods-container--horizontal' : '' ?>">
            <div class="goods-info">
              <a href="<?php echo _WEB_ROOT . '/san-pham?id=' . $product['id']; ?>"
                class="goods-name goods-name--popup auto-hidden-text-2line">
                <?php echo $product['name'] ?>
              </a>
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
                  <?php echo 'Free ship'; ?>
                </div>
              </div>
            </div>
            <a class="goods-img" href="<?php echo _WEB_ROOT . '/san-pham?sku' . $product['sku']; ?>"><img
                src="<?php echo $product['thumbnail_path'] ?>" alt=""></a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php endif; ?>