<div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7 col-xxl-7">
  <h2 class="mb-3">Đánh giá chi tiết</h2>
  <div class="product-describe-detail">
    <?php foreach ($describes as $value): ?>
      <h3>
        <?php echo $value['title']; ?>
      </h3>
      <p>
        <?php echo $value['content'] ?>
      </p>
      <?php if (!empty($value['image_path'])): ?>
        <img src="<?php echo $value['image_path']; ?>" alt="">
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
</div>