<?php if (!empty(Session::flashData('success'))): ?>
  <script>alert('Thêm thành công')</script>
<?php endif; ?>

<div class="p-3 m-3 rounded-3 bg-light">
  <form action="<?php echo _WEB_ROOT . '/admin/addProduct/' ?>" method="post">
    <div class="d-flex justify-content-between mb-4 p-2">
      <h2>Thêm sản phẩm</h2>
      <button type="submit" class="btn btn-warning fs-5 px-5">Save</button>
    </div>
    <div class="row g-4 fs-4 bg-primary-subtle pb-4">
      <!-- Các thông tin cơ bản của sản phẩm -->
      <div class="col-6">
        <div class="fs-5 fw-medium">
          <div class="mb-3">
            <label for="" class="form-label">Tên sản phẩm</label>
            <input name="name" type="text" class="form-control" id="" placeholder="">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Ảnh dại diện (link)</label>
            <input name="thumbnail_path" type="text" class="form-control" id="" placeholder="">
          </div>
          <div class="row mb-3">
            <div class="col">
              <label for="" class="form-label">Hãng</label>
              <input name="brand" type="text" class="form-control" id="" placeholder="">
            </div>
            <div class="col">
              <div class="row">
                <div class="col-md-6">
                  <label for="select-category-1" class="form-label">Danh mục cấp 1</label>
                  <select id="select-category-1" class="form-select">
                    <option>Chọn danh mục cấp 1</option>
                  </select>
                </div>
                <div class="col-md-6 hidden" id="subcategory-container">
                  <label for="select-category-2" class="form-label">Danh mục cấp 2</label>
                  <select id="select-category-2" class="form-select" name="cate_id">
                    <option disabled>Chọn danh mục cấp 2</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label for="" class="form-label">Giá gốc</label>
              <input name="price" type="number" class="form-control" id="" placeholder="">
            </div>
            <div class="col">
              <label for="" class="form-label">Giá giảm</label>
              <input name="discount" type="number" class="form-control" id="" placeholder="">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label for="" class="form-label">Tình trạng</label>
              <select class="form-select" id="inputGroupSelect01">
                <option selected>Choose...</option>
                <option value="1">Hết hàng</option>
                <option value="2">Ẩn</option>
                <option value="3">Còn hàng</option>
              </select>
            </div>
            <div class="col">
              <label for="" class="form-label">Số lượng trong kho</label>
              <input name="stock_quantity" type="number" class="form-control" id="" placeholder="">
            </div>
          </div>

        </div>
      </div>

      <!-- Ảnh sản phẩm -->
      <div class="col-6">
        <div class="bg-white rounded p-4 fs-5 fw-medium d-flex flex-column">
          <h4 class="mb-3" data-bs-toggle="tooltip" data-bs-placement="top"
            data-bs-title="Thứ tự của ảnh từ trên xuống">
            Ảnh sản phẩm</h4>
          <div id="add-image-container" class="">

            <!-- <div class="input-group mb-3">
              <input name="images[]" type="text" class="form-control" placeholder="Nhập đường dẫn của ảnh">
              <button class="btn btn-danger remove" onclick="removeParentElement(this)"><i class="bi bi-x"></i></button>
            </div> -->

          </div>
          <button type="button" class="btn btn-primary ms-auto" onclick="createImageInput()">Thêm một hàng</button>
        </div>
      </div>

      <div class="col-12">
        <div class="bg-white rounded p-4 fs-5 fw-medium d-flex flex-column">
          <h4 class="mb-3">Thông số kỹ thuật</h4>
          <table class="table table-hover">
            <thead>
              <tr class="table-secondary">
                <th scope="col">Tên</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Là tiêu đề</th>
                <th scope="col">Là thông số chính</th>
                <th scope="col" class="text-danger">Xóa</th>
              </tr>
            </thead>
            <tbody id="add-specification-container">

              <!-- <tr class="group_content">
                <td><input name="specifications[][title]" type="text" class="form-control" placeholder="Tên"></td>
                <td><input name="specifications[][content]" type="text" class="form-control" placeholder="Nội dung">
                </td>
                <td>
                  <div class="form-check form-switch">
                    <input name="isTitle" class="form-check-input" type="checkbox" role="switch">
                  </div>
                </td>
                <td>
                  <div class="form-check form-switch">
                    <input name="isMain" class="form-check-input" type="checkbox" role="switch">
                  </div>
                </td>
                <td><button class="btn btn-danger remove" onclick="removeParentElement(this)">Xóa hàng này</button></td>
              </tr> -->

            </tbody>
          </table>
          <button type="button" class="btn btn-primary ms-auto" onclick="createSpecificationInput()">Thêm một
            hàng</button>
        </div>
      </div>

      <!-- Mô tả chi tiết sản phẩm -->
      <div class="col-12">
        <div class="bg-white rounded p-4 fs-5 fw-medium d-flex flex-column">
          <h4 class="mb-3">Mô tả chi tiết</h4>
          <div id="add-describe-container" class="">

            <!-- <div class="content">
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Tiêu đề">
                <input type="text" class="form-control" placeholder="Đường dẫn ảnh">
                <button class="btn btn-danger remove" onclick="removeParentElement(this)"><i
                    class="bi bi-x"></i></button>
              </div>
              <textarea name="" id="" style="width: 100%"></textarea>
            </div> -->

          </div>
          <button type="button" class="btn btn-primary ms-auto" onclick="createDescribeInput()">Thêm một hàng</button>
        </div>
      </div>
  </form>
</div>


<script>
  const categories = <?php echo json_encode($categories) ?>;
  const selectCategory1 = document.getElementById("select-category-1");
  const selectCategory2 = document.getElementById("select-category-2");
  const subcategoryContainer = document.getElementById("subcategory-container");

  // Populate the first select
  for (const key in categories) {
    const option = document.createElement("option");
    option.value = key;
    option.textContent = categories[key].name;
    selectCategory1.appendChild(option);
  }

  // Handle selection change
  selectCategory1.addEventListener("change", (event) => {
    const selectedValue = event.target.value;
    // Clear previous options
    selectCategory2.innerHTML = '';
    // Populate the second select based on the first select value
    const subcategories = categories[selectedValue]['sub-cate'];
    for (const key in subcategories) {
      const option = document.createElement("option");
      option.value = subcategories[key]['id'];
      option.textContent = subcategories[key]['name'];
      selectCategory2.appendChild(option);
    }
  });
</script>