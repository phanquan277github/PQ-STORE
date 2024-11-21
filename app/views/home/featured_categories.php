<?php if (!empty($featured_categories)): ?>
  <div class="category container-fluid my-4">
    <div class="d-flex justify-content-evenly flex-wrap">
      <?php foreach ($featured_categories as $cate): ?>
        <a class="item" href="<?php echo _WEB_ROOT . '/danh-muc?cate=' . $cate['id']; ?>">
          <img src="<?php echo !empty($cate['image_path']) ? $cate['image_path'] : false; ?>" alt="category img">
          <h5>
            <?php echo !empty($cate['name']) ? $cate['name'] : false; ?>
          </h5>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
<?php endif; ?>