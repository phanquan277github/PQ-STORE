<h3 class="mb-3">Danh sách sản phẩm
  <?php echo '(' . (!empty($title) ? $title : 'Tất cả') . ')' ?>
</h3>
<div class="p-3 m-3 rounded-3 bg-light">

  <div class="list-group list-group-flush list-group-horizontal mb-3">
    <h4 class="me-4">Danh mục: </h4>
    <?php foreach ($categories as $category): ?>
      <div class="list-group-item dropdown me-3">
        <button class="btn btn-outline-secondary dropdown-toggle fs-5" type="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          <?php echo $category['name']; ?>
        </button>
        <ul class="dropdown-menu">
          <?php foreach ($category['sub-cate'] as $subCate): ?>
            <li><a class="dropdown-item fs-5" href="<?php echo _WEB_ROOT . '/admin/list_product?cate=' . $subCate['id'] ?>">
                <?php echo $subCate['name']; ?>
              </a></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endforeach; ?>
  </div>

  <table class="table table-hover">
    <thead>
      <tr class="table-secondary fs-4">
        <th scope="col" class="p-3">
          <div class="form-check">
            <input class="form-check-input input-sz-16" type="checkbox" value="" id="">
          </div>
        </th>
        <th scope="col" class="p-3">Sản phẩm</th>
        <th scope="col" class="p-3">Danh mục</th>
        <th scope="col" class="p-3">Giá</th>
        <th scope="col" class="p-3"></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($products as $product): ?>
        <tr>
          <td class="p-3">
            <div class="form-check">
              <input class="form-check-input input-sz-16" type="checkbox" value="" id="">
            </div>
          </td>
          <td class="p-3">
            <div class="d-flex align-items-center"><a href="" class="me-4">
                <div class=""><img src="<?php echo $product['thumbnail_path']; ?>" width="40" height="40" alt=""></div>
              </a>
              <div><a href="" class="text-reset text-decoration-none fs-4">
                  <?php echo $product['name']; ?>
                </a>
                <div class="d-flex">
                  <div class="fw-medium">ID: <span class="fw-normal">
                      <?php echo $product['id']; ?>
                    </span></div>
                  <i class="mx-2 bi bi-grip-vertical"></i>
                  <div class="fw-medium">SKU: <span class="fw-normal">
                      <?php echo $product['sku']; ?>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td class="p-3 fs-4">
            Laptop
          </td>
          <td class="p-3">
            <?php echo Helper::formatCurrency($product['discount']); ?>
          </td>
          <td class="p-3">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="bi bi-three-dots-vertical"></i>
              </button>
              <ul class="dropdown-menu">
                <li>
                  <h6 class="dropdown-header">Action</h6>
                </li>
                <li><a class="dropdown-item"
                    href="<?php echo _WEB_ROOT . '/admin/edit_product?id=' . $product['id']; ?>">Chỉnh sửa</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item text-danger"
                    href="<?php echo _WEB_ROOT . '/admin/deleteProduct?id=' . $product['id']; ?>">Xóa</a></li>
              </ul>
            </div>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <!-- phân trang -->
  <div class="d-flex justify-content-center mt-4">
    <nav aria-label="Page navigation">
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <button class="page-link pre fs-3" data-page="1">
            <span aria-hidden="true">&laquo;</span>
          </button>
        </li>
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
          <li class="page-item">
            <button class="page-link number fs-3" data-page="<?php echo $i ?>">
              <?php echo $i ?>
            </button>
          <?php endfor; ?>
        <li class="page-item">
          <button class="page-link next fs-3" data-page="<?php echo $totalPages ?>">
            <span aria-hidden="true">&raquo;</span>
          </button>
        </li>
      </ul>
    </nav>
  </div>

</div>