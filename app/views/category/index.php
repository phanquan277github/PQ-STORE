<!-- container -->
<main class="container mgt-header">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
      <div class="cate__name">
        <?php echo !empty($title) ? $title['name'] : ''; ?>
      </div>
    </div>
  </div>
  <div class="row g-0 g-sm-0 g-md-0 g-lg-3 g-xl-3 g-xxl-3">
    <?php require_once 'filter_box.php'; ?>

    <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-10 col-xxl-10">
      <?php require_once 'sort.php' ?>

      <!-- Danh sách sản phẩm -->
      <div class="row g-3 row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-6">
        <?php require_once 'goods_list.php'; ?>
      </div>
    </div>
  </div>
</main>