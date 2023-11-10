<?php if (!empty($banners)): ?>
  <div class="banner-container page-section">
    <div class="container">
      <div class="row g-3">
        <?php foreach ($banners as $banner): ?>
          <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
            <img class="banner__img" src="<?php echo !empty($banner['image_path']) ? $banner['image_path'] : false; ?>"
              alt="Banner_Image">
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
<?php endif; ?>