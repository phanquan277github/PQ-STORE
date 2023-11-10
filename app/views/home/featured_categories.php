<?php if (!empty($featured_categories)): ?>
  <div class="category-container page-section">
    <div class="container">
      <div class="category__list">
        <?php foreach ($featured_categories as $cate): ?>
          <a class="category__item" href="<?php echo _WEB_ROOT . '/danh-muc?cate=' . $cate['id']; ?>">
            <img src="<?php echo !empty($cate['image_path']) ? $cate['image_path'] : false; ?>" alt="category img">
            <h5>
              <?php echo !empty($cate['name']) ? $cate['name'] : false; ?>
            </h5>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
<?php endif; ?>