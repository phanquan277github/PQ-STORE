<div class="row g-2 mb-4">
  <div class="col-6 col-lg-12 justify-content-start d-flex">
    <div class="fs-4 me-3 d-none d-lg-flex">Xếp theo</div>
    <div class="dropend sort">
      <div class="cate__sort-btn d-flex" id="dropdown-cate__sort" data-bs-toggle="dropdown" aria-expanded="false">
        <span>Xếp theo</span><i class="bi bi-caret-right-fill"></i>
      </div>

      <div class="sort__container dropdown-menu" aria-labelledby="dropdown-cate__sort">
        <button class="sort__item btn btn-light mx-1 fs-5" data-order="0">Bán chạy</button>
        <button class="sort__item btn btn-light mx-1 fs-5" data-order="1">Khuyến mãi tốt
          nhất</button>
        <button class="sort__item btn btn-light mx-1 fs-5" data-order="2">Giá thấp</button>
        <button class="sort__item btn btn-light mx-1 fs-5" data-order="3">Giá cao</button>
        <button class="sort__item btn btn-danger mx-1 fs-5" data-order="-1"><i class="bi bi-x-circle"></i></button>
      </div>
    </div>
  </div>
  <!-- responsive bộ lọc -->
  <div class="col-6 col-lg-0 justify-content-end d-flex d-lg-none">
    <button class="btn cate__filter-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
      aria-controls="offcanvasExample">
      Bộ lọc<i class="bi bi-caret-left-fill"></i>
    </button>
  </div>
</div>