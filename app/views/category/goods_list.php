<?php if (!empty($products)): ?>
  <?php foreach ($products as $product): ?>
    <div class="col">
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
          <a href="<?php echo 'san-pham?sku=' . $product['sku'] ?>" class="goods-name goods-name--popup">
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
<?php endif; ?>