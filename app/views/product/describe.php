<div class="col-12 col-lg-7">
  <h2 class="mb-3">Đánh giá chi tiết</h2>
  <div class="describe-detail">
    <?php foreach ($describes as $value): ?>
      <h3 class="fs-4 my-2">
        <?php echo $value['title']; ?>
      </h3>
      <p class="fs-4 my-1">
        <?php echo $value['content'] ?>
      </p>
      <?php if (!empty($value['image_path'])): ?>
        <img src="<?php echo $value['image_path']; ?>" alt="">
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
</div>