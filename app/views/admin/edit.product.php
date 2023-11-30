<div class="p-3 m-3 rounded-3 bg-light">
  <form action="<?php echo _WEB_ROOT . '/admin/editProduct/' ?>" method="post">

    <div class="d-flex justify-content-between mb-4 p-2">
      <h2>Chỉnh sửa sản phẩm</h2>
      <button type="submit" class="btn btn-warning fs-5 px-5">Save</button>
    </div>
    <div class="row g-4 fs-4 bg-primary-subtle pb-4">
      <!-- Các thông tin cơ bản của sản phẩm -->
      <div class="col-6">
        <div class="fs-5 fw-medium">
          <div class="mb-3">
            <label for="" class="form-label">Tên sản phẩm</label>
            <input name="name" type="text" class="form-control" value="<?php echo $product['name']; ?>">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Ảnh dại diện (link)</label>
            <input name="thumbnail_path" type="text" class="form-control"
              value="<?php echo $product['thumbnail_path']; ?>">
          </div>
          <div class="row mb-3">
            <div class="col">
              <label for="" class="form-label">Hãng</label>
              <input name="brand" type="text" class="form-control" value="<?php echo $product['brand']; ?>">
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
              <input name="price" type="number" class="form-control" value="<?php echo $product['price']; ?>">
            </div>
            <div class="col">
              <label for="" class="form-label">Giá giảm</label>
              <input name="discount" type="number" class="form-control" value="<?php echo $product['discount']; ?>">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label for="" class="form-label">Tình trạng</label>
              <select class="form-select" id="">
                <option selected>Choose...</option>
                <option value="1">Hết hàng</option>
                <option value="2">Ẩn</option>
                <option value="3">Còn hàng</option>
              </select>
            </div>
            <div class="col">
              <label for="" class="form-label">Số lượng trong kho</label>
              <input name="stock_quantity" type="number" class="form-control"
                value="<?php echo $product['stock_quantity']; ?>">
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

            <?php foreach ($pictures as $key => $picture): ?>
              <div class="input-group group_content mb-3">
                <input type="hidden" input name="pictures[<?php echo $key; ?>][id]" value="<?php echo $picture['id']; ?>">
                <input name="pictures[<?php echo $key; ?>][image_path]" type="text" class="form-control"
                  placeholder="Nhập đường dẫn của ảnh" value="<?php echo $picture['image_path']; ?>">
                <button type="button" class="btn btn-danger remove" onclick="removeParent(this)"><i
                    class="bi bi-x"></i></button>
              </div>
            <?php endforeach; ?>

          </div>
          <button type="button" class="btn btn-primary ms-auto" onclick="createImageInput()">Thêm một hàng</button>
        </div>
      </div>

      <!-- Thông số kỹ thuật -->
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

              <?php foreach ($specifications as $key => $specifi): ?>
                <tr class="group_content <?php echo $specifi['isTitle'] ? 'table-info' : ''; ?>">
                  <input type="hidden" input name="specifications[<?php echo $key; ?>][id]"
                    value="<?php echo $specifi['id']; ?>">
                  <td><input name="specifications[<?php echo $key; ?>][title]" type="text" class="form-control"
                      placeholder="Tên" value="<?php echo $specifi['title']; ?>"></td>
                  <td><input name="specifications[<?php echo $key; ?>][content]" type="text" class="form-control"
                      placeholder="Nội dung" value="<?php echo htmlspecialchars($specifi['content']); ?>">
                  </td>
                  <td>
                    <div class="form-check form-switch">
                      <input name="specifications[<?php echo $key; ?>][isTitle]" class="form-check-input" type="checkbox"
                        role="switch" <?php echo $specifi['isTitle'] ? 'checked' : '' ?>>
                    </div>
                  </td>
                  <td>
                    <div class="form-check form-switch">
                      <input name="specifications[<?php echo $key; ?>][isMain]" class="form-check-input" type="checkbox"
                        role="switch" <?php echo $specifi['isMain'] ? 'checked' : '' ?>>
                    </div>
                  </td>
                  <td class="text-end"><button type="button" class="btn btn-danger remove"
                      onclick="removeParent(this)">Xóa hàng
                      này</button></td>
                </tr>
              <?php endforeach; ?>

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
            <?php foreach ($describes as $key => $describe): ?>
              <div class="group_content mb-3">
                <div class="input-group mb-2">
                  <input type="hidden" input name="describes[<?php echo $key; ?>][id]"
                    value="<?php echo $describe['id']; ?>">
                  <input type="text" class="form-control" placeholder="Tiêu đề"
                    name="describes[<?php echo $key; ?>][title]" value="<?php echo $describe['title']; ?>">
                  <input type="text" class="form-control" placeholder="Đường dẫn ảnh"
                    name="describes[<?php echo $key; ?>][image_path]" value="<?php echo $describe['image_path']; ?>">
                  <button type="button" class="btn btn-danger remove" onclick="removeParent(this)"><i
                      class="bi bi-x"></i></button>
                </div>
                <textarea name="describes[<?php echo $key; ?>][content]"
                  style="width: 100%; height: auto"><?php echo $describe['content']; ?></textarea>
              </div>
            <?php endforeach; ?>
          </div>
          <button type="button" class="btn btn-primary ms-auto" onclick="createDescribeInput()">Thêm một hàng</button>
        </div>
      </div>
  </form>
</div>