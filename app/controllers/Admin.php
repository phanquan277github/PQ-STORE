<?php
class Admin extends Controller
{
  public function index()
  {
    if (empty(Session::data('admin'))) {
      $data['content'][] = '';
      $data['component'] = 'admin/login';
      $this->render('layouts/admin', $data);
    } else {
      $data['content'][] = '';
      $data['component'] = 'admin/index';
      $this->render('layouts/admin', $data);
    }
  }

  // đăng nhập với ajax
  public function login()
  {
    $username = Helper::input_value('username');
    $password = Helper::input_value('password');

    $model = $this->model('AdminModel');
    $usernameCheck = $model->table('admin')->where('username', '=', $username)->first();

    if ($usernameCheck) {
      $fullCheck = $model->table('admin')->where('username', '=', $username)->where('password', '=', $password)->first();
      if ($fullCheck) {
        Session::data('admin', $fullCheck);
        $response['status'] = 2;
      } else {
        $response['status'] = 1;
      }
    } else {
      $response['status'] = 0;
    }

    echo json_encode($response);
  }

  public function logout()
  {
    Session::delete('admin');
    header('Location: ' . _WEB_ROOT . '/admin/');
  }

  // trang quản trị các dữ liệu hệ thống như slideshow, banner...
  public function system()
  {
    if (empty(Session::data('admin'))) {
      // echo "<script>alert('Bạn chưa đăng nhập')</script>";
      header('Location: ' . _WEB_ROOT . '/admin/');
    } else {
      $model = $this->model('AdminModel');

      $data['content']['slideshows'] = $model->table('slideshows')->get();
      $data['content']['banners'] = $model->table('banners')->get();
      $data['content']['categories'] = SharedModel::getCategories();
      $data['component'] = 'admin/system';

      $this->render('layouts/admin', $data);
    }
  }

  public function update()
  {
    $id = Helper::input_value('id');
    $name = Helper::input_value('name');
    $imagePath = Helper::input_value('image_path');
    $link = Helper::input_value('link');
    $display = Helper::input_value('display');
    $table = Helper::input_value('table');
    $parentId = Helper::input_value('parent_id');

    $dataUpdate = [];

    if ($table == 'slideshows' || $table == 'banners' || $table == 'categories') {
      $dataUpdate['name'] = $name;
    }
    if ($table == 'slideshows' || $table == 'banners' || $table == 'categories') {
      $dataUpdate['image_path'] = $imagePath;
    }
    if ($table == 'slideshows' || $table == 'banners') {
      $dataUpdate['link'] = $link;
    }
    if ($table == 'slideshows' || $table == 'banners') {
      $dataUpdate['display'] = $display == 'on' ? 1 : 0;
    }
    if ($table == 'categories') {
      $dataUpdate['parent_id'] = $parentId;
    }

    $model = $this->model('AdminModel');
    $model->table($table)->where('id', '=', $id)->update($dataUpdate);
    header("Location: " . $_SERVER['HTTP_REFERER']);
  }

  public function add()
  {
    $id = Helper::input_value('id');
    $name = Helper::input_value('name');
    $imagePath = Helper::input_value('image_path');
    $link = Helper::input_value('link');
    $display = Helper::input_value('display');
    $parentId = Helper::input_value('parent_id');
    $table = Helper::input_value('table');

    $data = [];

    if ($table == 'slideshows' || $table == 'banners' || $table == 'categories') {
      $data['name'] = $name;
    }
    if ($table == 'slideshows' || $table == 'banners' || $table == 'categories') {
      $data['image_path'] = $imagePath;
    }
    if ($table == 'slideshows' || $table == 'banners') {
      $data['link'] = $link;
    }
    if ($table == 'slideshows' || $table == 'banners') {
      $data['display'] = $display == 'on' ? 1 : 0;
    }
    if ($table == 'categories') {
      $data['parent_id'] = $parentId;
    }

    $model = $this->model('AdminModel');
    $model->table($table)->insert($data);
    header("Location: " . $_SERVER['HTTP_REFERER']);
  }

  public function remove()
  {
    $id = Helper::input_value('id');
    $table = Helper::input_value('table');

    $model = $this->model('AdminModel');
    $model->table($table)->where('id', '=', $id)->delete();
    header("Location: " . $_SERVER['HTTP_REFERER']);
  }

  public function list_product()
  {
    $productModel = $this->model('ProductModel');
    $sharedModel = $this->model('SharedModel');
    $cateId = Helper::input_value('cate');

    if (empty($page = Helper::input_value('page', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT))) {
      $page = 1;
    }

    if (!empty($cateId)) {
      $title = $productModel->table('categories')->select('name')->where('id', '=', $cateId)->first();

      $data['content']['title'] = $title ? $title['name'] : '';
      $data['content']['totalPages'] = $productModel->getTotalPages($cateId);
      $data['content']['products'] = $productModel->getProductsInCate($cateId, $page);
    } else {
      $data['content']['totalPages'] = $productModel->getTotalPages(1);
      $data['content']['products'] = $productModel->getProducts($page);
    }

    $data['content']['categories'] = $sharedModel->getCategories();
    $data['component'] = 'admin/list.product';
    $this->render('layouts/admin', $data);
  }

  public function edit_product()
  {
    $productId = Helper::input_value('id');
    $model = $this->model('ProductModel');
    $model->setId($productId);

    $product = $model->getProduct();
    $pictures = $model->getPictures();
    $describes = $model->getDescribes();
    $specifications = $model->getSpecifications();

    Session::flashData('product', $product);
    Session::flashData('pictures', $pictures);
    Session::flashData('describes', $describes);
    Session::flashData('specifications', $specifications);

    $data['content']['product'] = $product;
    $data['content']['pictures'] = $pictures;
    $data['content']['describes'] = $describes;
    $data['content']['specifications'] = $specifications;
    $data['component'] = 'admin/edit.product';
    $this->render('layouts/admin', $data);
  }

  public function add_product()
  {
    $data['content'][] = '';
    $data['component'] = 'admin/add.product';
    $this->render('layouts/admin', $data);
  }

  public function addProduct()
  {
    $dataProduct = [
      'name' => Helper::input_value('name'),
      'thumbnail_path' => Helper::input_value('thumbnail_path'),
      'discount' => !empty(Helper::input_value('discount')) ? Helper::input_value('discount') : 0,
      'price' => !empty(Helper::input_value('price')) ? Helper::input_value('price') : 0,
      'brand' => Helper::input_value('brand'),
      'stock_quantity' => !empty(Helper::input_value('stock_quantity')) ? Helper::input_value('stock_quantity') : 0,
    ];

    $model = $this->model('ProductModel');
    $model->table('products')->insert($dataProduct);
    $productId = $model->lastInsertId();

    // insert ảnh
    if (isset($_POST['images'])) {
      foreach ($_POST['images'] as $image) {
        $imageValues[] = "($productId, '$image')";
      }
      $imageValuesString = implode(', ', $imageValues);
      $sql = "INSERT INTO pictures (product_id, image_path) VALUES $imageValuesString";
      $model->query($sql);
    }

    // insert thông số kỹ thuật
    if (isset($_POST['specifications'])) {
      foreach ($_POST['specifications'] as $specification) {
        $isTitle = isset($specification['isTitle']) ? 1 : 0;
        $isMain = isset($specification['isMain']) ? 1 : 0;
        $specificationValues[] = "($productId, '" . $specification['title'] . "', '" . $specification['content'] . "', $isTitle, $isMain)";
      }
      $specificationValuesString = implode(', ', $specificationValues);
      $sql = "INSERT INTO specifications (product_id, title, content, isTitle, isMain) VALUES $specificationValuesString";
      $model->query($sql);
    }

    // insert mô tả chi tiết
    if (isset($_POST['describes'])) {
      foreach ($_POST['describes'] as $describe) {
        $describeValues[] = "($productId, '" . $describe['title'] . "', '" . $describe['content'] . "', '" . $describe['image_path'] . "')";
      }
      $describeValuesString = implode(', ', $describeValues);
      $sql = "INSERT INTO describes (product_id, title, content, image_path) VALUES $describeValuesString";
      $model->query($sql);
    }

    header("Location: " . $_SERVER['HTTP_REFERER']);
  }

  public function editProduct()
  {
    // data cũ
    $dataProductOld = Session::flashData('product');
    $picturesOld = Session::flashData('pictures');
    $describesOld = Session::flashData('describes');
    $specificationsOld = Session::flashData('specifications');
    // data mới
    $dataProductNew = [
      'name' => Helper::input_value('name'),
      'thumbnail_path' => Helper::input_value('thumbnail_path'),
      'discount' => !empty(Helper::input_value('discount')) ? Helper::input_value('discount') : 0,
      'price' => !empty(Helper::input_value('price')) ? Helper::input_value('price') : 0,
      'brand' => Helper::input_value('brand'),
      'stock_quantity' => !empty(Helper::input_value('stock_quantity')) ? Helper::input_value('stock_quantity') : 0,
    ];
    $picturesNew = $_POST['pictures'];
    $specificationsNew = $_POST['specifications'];
    $describesNew = $_POST['describes'];

    $productModel = $this->model('ProductModel');
    $productModel->setId($dataProductOld['id']);

    $keysCheckInfo = array("name", "thumbnail_path", "discount", "price", "brand", "stock_quantity");
    $changedKeysInfo = array();
    // Tìm những key có giá trị thay đổi
    foreach ($keysCheckInfo as $key) {
      if (array_key_exists($key, $dataProductOld) && array_key_exists($key, $dataProductNew) && $dataProductOld[$key] != $dataProductNew[$key]) {
        $changedKeysInfo[$key] = $dataProductNew[$key];
      }
    }
    // Nếu có key nào đó thay đổi giá trị, thực hiện cập nhật
    if (!empty($changedKeysInfo)) {
      echo "update info";
      $productModel->updateProduct($changedKeysInfo);
    }

    $keyCheckImage = "image_path";
    $changedKeysImage = array();
    foreach ($picturesOld as $oldImage) {
      foreach ($picturesNew as $newImage) {
        if (array_key_exists("id", $oldImage) && array_key_exists("id", $newImage) && $oldImage['id'] == $newImage['id'] && $oldImage[$keyCheckImage] != $newImage[$keyCheckImage]) {
          $changedKeysImage[] = [
            'id' => $newImage['id'],
            'image_path' => $newImage['image_path'],
          ];
        }
      }
    }
    if (!empty($changedKeysImage)) {
      $productModel->updatePictures($changedKeysImage);
    }
    // insert nếu có ảnh mới
    if (!empty($newPicture = array_diff_key($picturesNew, $picturesOld))) {
      $productModel->insertPictures($newPicture);
    }
    // Xóa các ảnh đã mất
    if (!empty($deltePicture = array_diff_key($picturesOld, $picturesNew))) {
      $productModel->deletePictures($deltePicture);
    }

    foreach ($specificationsNew as $key => $item) {
      $specificationsNew[$key]['isTitle'] = isset($item['isTitle']) ? 1 : 0;
      $specificationsNew[$key]['isMain'] = isset($item['isMain']) ? 1 : 0;
    }
    $changedKeysSpecifications = array();
    // So sánh và lưu vào mảng tạm
    foreach ($specificationsOld as $key => $item) {
      // Kiểm tra xem có phần tử có cùng id trong mảng sau không
      if (isset($specificationsNew[$key]) && $specificationsNew[$key]['id'] == $item['id']) {
        // So sánh từng thuộc tính và kiểm tra sự khác biệt
        if (
          $item['title'] != $specificationsNew[$key]['title'] ||
          $item['content'] != $specificationsNew[$key]['content'] ||
          $item['isTitle'] != $specificationsNew[$key]['isTitle'] ||
          $item['isMain'] != $specificationsNew[$key]['isMain']
        ) {
          // Nếu có sự khác biệt, thêm vào mảng tạm
          $changedKeysSpecifications[] = $specificationsNew[$key];
        }
      }
    }
    if (!empty($changedKeysSpecifications)) {
      $productModel->updateSpecifications($changedKeysSpecifications);
    }
    // insert specifications
    if (!empty($newSpecifications = array_diff_key($specificationsNew, $specificationsOld))) {
      $productModel->insertSpecifications($newSpecifications);
    }
    // Delete specifications
    if (!empty($deleteSpecifications = array_diff_key($specificationsOld, $specificationsNew))) {
      $productModel->deleteSpecifications($deleteSpecifications);
    }

    in($describesOld);
    in($describesNew);

    $changedKeysDescribes = array();
    // So sánh và lưu vào mảng tạm
    foreach ($describesOld as $key => $item) {
      // Kiểm tra xem có phần tử có cùng id trong mảng sau không
      if (isset($describesNew[$key]) && $describesNew[$key]['id'] == $item['id']) {
        // So sánh từng thuộc tính và kiểm tra sự khác biệt
        if (
          $item['title'] != $describesNew[$key]['title'] ||
          $item['content'] != $describesNew[$key]['content'] ||
          $item['image_path'] != $describesNew[$key]['image_path']
        ) {
          // Nếu có sự khác biệt, thêm vào mảng tạm
          $changedKeysDescribes[] = $describesNew[$key];
        }
      }
    }
    if (!empty($changedKeysDescribes)) {
      $productModel->updateDescribes($changedKeysDescribes);
    }
    // insert specifications
    if (!empty($newDescribes = array_diff_key($describesNew, $describesOld))) {
      in("insert describes");
      $productModel->insertDescribes($newDescribes);
    }
    // Delete specifications
    if (!empty($deleteDescribes = array_diff_key($describesOld, $describesNew))) {
      in("delete describes");
      $productModel->deleteDescribes($deleteDescribes);
    }

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
  }

  public function deleteProduct()
  {
    $productId = Helper::input_value('id');

    $productModel = $this->model('ProductModel');
    $productModel->setId($productId);
    $productModel->deleteProduct();

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
  }


}