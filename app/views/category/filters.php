<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h3 class="offcanvas-title" id="offcanvasExampleLabel">Bộ lọc</h3>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div class="filter">
      <div class="cate__filter__box pb-2 mb-2 js-cate__filter__box--price-range">
        <div class="title fs-4 d-flex justify-content-between">
          Mức giá<i class="bi bi-caret-down-fill"></i></i>
        </div>
        <div class="content">
          <div class="input-group my-2">
            <input type="text" class="form-control" placeholder="Từ" aria-label="">
            <span class="input-group-text">đến</span>
            <input type="text" class="form-control" placeholder="..." aria-label="">
          </div>
          <div class="cate__filter__box__apply d-flex justify-content-end">
            <button class="btn">Apply</button>
          </div>
        </div>
      </div>

      <?php if (!empty($filters)): ?>
        <?php foreach ($filters as $filter): ?>
          <div class="cate__filter__box pb-2 mb-2 js-cate__filter__box">
            <div class="title fs-4 d-flex justify-content-between">
              <?php echo $filter['filter_type']; ?><i class="bi bi-caret-down-fill"></i>
            </div>
            <div class="content">
              <?php foreach ($filter['filter_content'] as $item): ?>
                <div class="fs-4 d-flex align-items-center p-1">
                  <input class="form-check-input mt-0" type="checkbox" value="" aria-label="">
                  <label for="" class="ps-3 fs-5">
                    <?php echo $item['content']; ?>
                  </label>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</div>

<!-- lg -->
<div class="col-12 col-lg-3 col-xl-2 d-none d-lg-block">
  <div class="accordion " id="accordionPanelsStayOpenExample">
    <div class="accordion-item">
      <div class="accordion-header">
        <button class="accordion-button fs-4 p-2 bg-white" type="button" data-bs-toggle="collapse"
          data-bs-target="#filter-price-range" aria-expanded="true" aria-controls="filter-price-range">
          Mức giá
        </button>
      </div>
      <div class="accordion-collapse collapse show" id="filter-price-range">
        <div class="accordion-body">
          <div class="input-group my-2">
            <input type="text" class="form-control" placeholder="Từ" aria-label="">
            <span class="input-group-text">đến</span>
            <input type="text" class="form-control" placeholder="..." aria-label="">
          </div>
          <div class="apply-btn d-flex justify-content-end">
            <button type="button" class="btn btn-outline-dark">Apply</button>
          </div>
        </div>
      </div>
    </div>

    <?php if (!empty($filters)): ?>
      <?php foreach ($filters as $filter): ?>
        <div class="accordion-item">
          <div class="accordion-header">
            <button class="accordion-button fs-4 p-2 bg-white" type="button" data-bs-toggle="collapse"
              data-bs-target="#<?php echo 'filter-box-' . $filter['id'] ?>" aria-expanded="true"
              aria-controls="<?php echo 'filter-box-' . $filter['id'] ?>">
              <?php echo $filter['filter_type']; ?>
            </button>
          </div>
          <div id="<?php echo 'filter-box-' . $filter['id'] ?>" class="accordion-collapse collapse show">
            <div class="accordion-body">
              <?php foreach ($filter['filter_content'] as $item): ?>
                <div class="fs-4 d-flex align-items-center p-1">
                  <input class="form-check-input mt-0" type="checkbox" value="<?php $item['content'] ?>"
                    aria-label="Checkbox for following text input">
                  <label for="" class="ps-3 fs-5">
                    <?php echo $item['content']; ?>
                  </label>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>