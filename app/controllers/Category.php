<?php
class Category extends Controller
{
  public function index()
  {
    $model = $this->model('CategoryModel');
    $cateId = Helper::input_value('cate', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
    if (empty($page = Helper::input_value('page', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT))) {
      $page = 1;
    }
    $sort = Helper::input_value('sort', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
    if (empty($sort)) {
      $sort = 'id';
    } else if ($sort == 0) {
      $sort = 'id';
    } else if ($sort == 1) {
      $sort = 'p.price / p.discount DESC';
    } else if ($sort == 2) {
      $sort = 'p.discount ASC';
    } else if ($sort == 3) {
      $sort = 'p.discount DESC';
    }

    if (!empty($cateId)) {
      $title = $model->table('categories')->select('name')->where('id', '=', $cateId)->first();
      $productModel = $this->model("ProductModel");
      $data['content']['title'] = $title ? $title['name'] : '';
      $data['content']['totalPages'] = $productModel->getTotalPages($cateId);
      $data['content']['filters'] = $model->getFilters($cateId);
      $data['content']['products'] = $productModel->getProductsInCate($cateId, $page, $sort);
    }

    if (!empty($keySearch = Helper::input_value('keySearch'))) {
      $result = $model->table('products')->whereLike('name', '%' . $keySearch . '%')->get();
      if ($result) {
        $data['content']['title'] = $keySearch . ' (' . count($result) . ' sản phẩm)';
        $data['content']['products'] = $result;
      } else {
        $data['content']['notFound'] = '';
        $data['content']['title'] = 'Không tìm thấy sản phẩm nào';
      }
    }

    $data['component'] = 'category/index';
    $this->render('layouts/main', $data);
  }

  public function getProducts()
  {
    $model = $this->model('CategoryModel');
    $cateId = Helper::input_value('cate', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
    if (empty($page = Helper::input_value('page', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT))) {
      $page = 1;
    }
    if (empty($sort = Helper::input_value('sort', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT))) {
      $sort = 'id';
    }

    if (!empty($cateId)) {
      $title = $model->table('categories')->select('name')->where('id', '=', $cateId)->first();
      $productModel = $this->model('ProductModel');
      $data['title'] = $title ? $title['name'] : '';
      $data['totalPages'] = $productModel->getTotalPages($cateId);
      $data['filters'] = $model->getFilters($cateId);
      $data['products'] = $productModel->getProductsInCate($cateId, $page, $sort);
    }
    header('Content-Type: application/json');
    echo json_encode($data);
  }

}