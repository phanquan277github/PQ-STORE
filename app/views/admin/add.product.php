<div class="p-3 m-3 rounded-3 bg-light">
  <form action="<?php echo _WEB_ROOT . '/admin/add_product/' ?>" method="post">

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
              <label for="" class="form-label">Danh mục</label>
              <select class="form-select" id="inputGroupSelect01">
                <option selected>Choose...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
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



<!-- Thông số kỹ thuật -->
<!-- <div class="col-5">
        <div class="bg-white p-4 fs-5 fw-medium d-flex flex-column">
          <h4 class="mb-3">Thông số kỹ thuật</h4>
          <div id="add-specification-container" class="">

            <div class="input-group mb-3">
              <input name="specifications[][title]" type="text" class="form-control" placeholder="Tên">
              <span class="input-group-text"><i class="bi bi-arrow-right"></i></span>
              <input name="specifications[][content]" type="text" class="form-control" placeholder="Nội dung">
              <div class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-title="L à tiêu đề">
                <input type="checkbox">
              </div>
              <button class="btn btn-danger remove" onclick="removeParentElement(this)"><i class="bi bi-x"></i></button>
            </div>

          </div>
          <button type="button" class="btn btn-primary ms-auto" onclick="createSpecificationInput()">Thêm một
            hàng</button>
        </div>
      </div> -->