<div class="p-3 m-3 rounded-3 bg-light">
  <h4>Slideshow management</h4>
  <table class="table table-hover">
    <thead>
      <tr class="table-secondary">
        <th scope="col">Id</th>
        <th scope="col">Tên slide</th>
        <th scope="col">Đường dẫn ảnh</th>
        <th scope="col">Đường dẫn tương tác</th>
        <th scope="col">Hiển thị</th>
        <th scope="col" class="text-danger">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($slideshows as $item): ?>
        <form action="<?php echo _WEB_ROOT . '/admin/update' ?>">
          <tr>
            <td>
              <span>
                <?php echo $item['id'] ?>
                <input name="id" value="<?php echo $item['id'] ?>" hidden>
              </span>
            </td>
            <td>
              <input name="name" type="text" class="form-control" placeholder="Tên slide"
                value="<?php echo $item['name'] ?>">
            </td>
            <td>
              <input name="image_path" type="text" class="form-control" placeholder="Đường dẫn ảnh"
                value="<?php echo $item['image_path'] ?>">
            </td>
            <td>
              <input name="link" type="text" class="form-control" placeholder="Đường dẫn tương tác"
                value="<?php echo $item['link'] ?>">

            </td>
            <td>
              <div class="form-check form-switch">
                <input name="display" class="form-check-input" type="checkbox" role="switch" id="" <?php echo $item['display'] ? 'checked' : '' ?>>
              </div>
            </td>
            <td>
              <input name="table" hidden value="slideshows">
              <button type="submit" class="btn btn-secondary">Cập nhật</button>
              <a type="button" class="btn btn-danger"
                href="<?php echo _WEB_ROOT . '/admin/remove?table=slideshows&id=' . $item['id']; ?>">Xóa</a>
            </td>
          </tr>
        </form>
      <?php endforeach; ?>
      <form action="<?php echo _WEB_ROOT . '/admin/add' ?>">
        <tr class="table-warning">
          <td>
            <div>Auto</div>
          </td>
          <td>
            <input name="name" type="text" class="form-control" placeholder="Tên slide">
          </td>
          <td>
            <input name="image_path" type="text" class="form-control" placeholder="Đường dẫn ảnh">
          </td>
          <td>
            <input name="link" type="text" class="form-control" placeholder="Link ảnh tương tác">
          </td>
          <td>
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" name="display">
            </div>
          </td>
          <td>
            <input name="table" hidden value="slideshows">
            <button type="submit" class="btn btn-secondary">Thêm mới</button>
          </td>
        </tr>
      </form>
    </tbody>
  </table>
</div>

<div class="p-3 m-3 rounded-3 bg-light">
  <h4>Banner management</h4>
  <table class="table table-hover">
    <thead>
      <tr class="table-secondary">
        <th scope="col">Id</th>
        <th scope="col">Tên banner</th>
        <th scope="col">Đường dẫn ảnh</th>
        <th scope="col">Đường dẫn tương tác</th>
        <th scope="col">Hiển thị</th>
        <th scope="col" class="text-danger">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($banners as $item): ?>
        <form action="<?php echo _WEB_ROOT . '/admin/update' ?>">
          <tr>
            <td>
              <span>
                <?php echo $item['id'] ?>
                <input name="id" value="<?php echo $item['id'] ?>" hidden>
              </span>
            </td>
            <td>
              <input name="name" type="text" class="form-control" placeholder="Tên banner"
                value="<?php echo $item['name'] ?>">
            </td>
            <td>
              <input name="image_path" type="text" class="form-control" placeholder="Đường dẫn ảnh"
                value="<?php echo $item['image_path'] ?>">
            </td>
            <td>
              <input name="link" type="text" class="form-control" placeholder="Đường dẫn tương tác"
                value="<?php echo $item['link'] ?>">

            </td>
            <td>
              <div class="form-check form-switch">
                <input name="display" class="form-check-input" type="checkbox" role="switch" id="" <?php echo $item['display'] ? 'checked' : '' ?>>
              </div>
            </td>
            <td>
              <input name="table" hidden value="banners">
              <button type="submit" class="btn btn-secondary">Cập nhật</button>
              <a type="button" class="btn btn-danger"
                href="<?php echo _WEB_ROOT . '/admin/remove?table=banners&id=' . $item['id']; ?>">Xóa</a>
            </td>
          </tr>
        </form>
      <?php endforeach; ?>
      <form action="<?php echo _WEB_ROOT . '/admin/add' ?>">
        <tr class="table-warning">
          <td>
            <div>Auto</div>
          </td>
          <td>
            <input name="name" type="text" class="form-control" placeholder="Tên banner">
          </td>
          <td>
            <input name="image_path" type="text" class="form-control" placeholder="Đường dẫn ảnh">
          </td>
          <td>
            <input name="link" type="text" class="form-control" placeholder="Link ảnh tương tác">
          </td>
          <td>
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" name="display">
            </div>
          </td>
          <td>
            <input name="table" hidden value="banners">
            <button type="submit" class="btn btn-secondary">Thêm mới</button>
          </td>
        </tr>
      </form>
    </tbody>
  </table>
</div>

<div class="p-3 m-3 rounded-3 bg-light">
  <h4>Danh mục</h4>
  <table class="table table-hover">
    <thead>
      <tr class="table-secondary">
        <th scope="col">Danh mục con</th>
        <th scope="col">Id</th>
        <th scope="col">Tên danh mục</th>
        <th scope="col">Đường dẫn ảnh</th>
        <th scope="col">Id danh mục cha</th>
        <th scope="col" class="text-danger">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($categories as $item): ?>
        <form action="<?php echo _WEB_ROOT . '/admin/update' ?>">
          <tr>
            <td>
              <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                data-bs-target="#<?php echo 'collapseNumber' . $item['id']; ?>" aria-expanded="false">
                Danh mục con
              </button>
            </td>
            <td>
              <span>
                <?php echo $item['id'] ?>
                <input name="id" value="<?php echo $item['id'] ?>" hidden>
              </span>
            </td>
            <td>
              <input name="name" type="text" class="form-control" placeholder="Tên banner"
                value="<?php echo $item['name'] ?>">
            </td>
            <td>
              <input name="image_path" type="text" class="form-control" placeholder="Đường dẫn ảnh"
                value="<?php echo $item['image_path'] ?>">
            </td>
            <td>
              <input name="parent_id" type="number" class="form-control" placeholder="Id danh mục cha"
                value="<?php echo $item['parent_id'] ?>">
            </td>
            <td>
              <input name="table" hidden value="categories">
              <button type="submit" class="btn btn-secondary">Cập nhật</button>
              <a type="button" class="btn btn-danger"
                href="<?php echo _WEB_ROOT . '/admin/remove?table=categories&id=' . $item['id']; ?>">Xóa</a>
            </td>
          </tr>
          <div class="collapse" id="<?php echo 'collapseNumber' . $item['id']; ?>">
            <div class="input-group mb-3 bg-info text-dark fw-bold">
              <div class="col p-2">
                <?php echo 'Danh mục con của: ' . $item['name'] ?>
              </div>
            </div>
            <?php foreach ($item['sub-cate'] as $subCate): ?>
              <form action="<?php echo _WEB_ROOT . '/admin/update' ?>">
                <div class="input-group mb-3">
                  <span class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Id">
                    <?php echo $subCate['id'] ?>
                    <input name="id" value="<?php echo $subCate['id'] ?>" hidden>
                  </span>
                  <input type="text" class="form-control" placeholder="" name="name" value="<?php echo $subCate['name'] ?>"
                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tên danh mục">
                  <input type="text" class="form-control" placeholder="" name="image_path"
                    value="<?php echo $subCate['image_path'] ?>" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-title="Đường dẫn ảnh">
                  <input type="number" class="form-control" placeholder="" name="parent_id"
                    value="<?php echo $subCate['parent_id'] ?>" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-title="Id danh mục cha">

                  <input name="table" hidden value="categories">
                  <button type="submit" class="btn btn-secondary">Cập nhật</button>
                  <a type="button" class="btn btn-danger"
                    href="<?php echo _WEB_ROOT . '/admin/remove?table=categories&id=' . $subCate['id']; ?>">Xóa</a>
                </div>
              </form>
            <?php endforeach; ?>
          </div>
        </form>
      <?php endforeach; ?>
      <form action="<?php echo _WEB_ROOT . '/admin/add' ?>">
        <tr class="table-warning">
          <td>

          </td>
          <td>
            <div>Auto</div>
          </td>
          <td>
            <input name="name" type="text" class="form-control" placeholder="Tên danh mục">
          </td>
          <td>
            <input name="image_path" type="text" class="form-control" placeholder="Đường dẫn ảnh">
          </td>
          <td>
            <input name="parent_id" type="text" class="form-control" placeholder="Id danh mục cha">
          </td>
          <td>
            <input name="table" hidden value="categories">
            <button type="submit" class="btn btn-secondary">Thêm mới</button>
          </td>
        </tr>
    </tbody>
  </table>
</div>