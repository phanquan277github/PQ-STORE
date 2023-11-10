<?php
class Category extends Controller
{
  public function index(...$params)
  {
    $model = $this->model('CategoryModel');
    $id = Helper::input_value('cate', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);

    if (!empty($id) && is_numeric($id)) {
      $data['content']['title'] = $model->table('categories')->select('name')->where('id', '=', $id)->first();
      $products = $model->getProductsInCate($id);
      $data['content']['products'] = $products;
    }
    $data['component'] = 'category/index';
    $this->render('layouts/category', $data);
  }
}