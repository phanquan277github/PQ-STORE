<!-- container -->
<main class="container my-4">
  <h2 class="text-uppercase cate__name my-3">
    <?php echo !empty($title) ? $title : ''; ?>
  </h2>
  <?php if (!isset($notFound)): ?>
    <div class="row g-0 g-sm-0 g-md-0 g-lg-3 g-xl-3 g-xxl-3">
      <?php require_once 'filters.php'; ?>

      <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-10 col-xxl-10">
        <?php require_once 'sort.php' ?>

        <!-- Danh sách sản phẩm -->
        <div class="row mt-3 mb-5 g-3 row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-6">
          <?php require_once 'goods_list.php'; ?>
        </div>

        <!-- phân trang -->
        <div class="row">
          <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
              <li class="page-item">
                <button class="page-link pre fs-3" data-page="1">
                  <span aria-hidden="true">&laquo;</span>
                </button>
              </li>
              <?php if (!empty($totalPages)): ?>
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                  <li class="page-item">
                    <button class="page-link number fs-3" data-page="<?php echo $i ?>">
                      <?php echo $i ?>
                    </button>
                  <?php endfor; ?>
                <?php endif ?>;
              <li class="page-item">
                <button class="page-link next fs-3" data-page="<?php echo $totalPages ?>">
                  <span aria-hidden="true">&raquo;</span>
                </button>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  <?php else: ?>
    <div class="text-center">
      <img
        src="data:image/png;base64,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"
        alt="" style="width: 30%;">
    </div>
  <?php endif; ?>
</main>