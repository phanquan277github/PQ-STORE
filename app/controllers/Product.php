<?php
class Product extends Controller
{
  public function index()
  {
    $model = $this->model('ProductModel');

    $sku = Helper::input_value('sku', FILTER_DEFAULT, FILTER_SANITIZE_SPECIAL_CHARS);
    if (!empty($sku)) {
      $product = $model->table('products')->where('sku', '=', $sku)->first();
      $pictures = $model->table('pictures')->where('product_id', '=', $product['id'])->get();
      $mainSpecifications = $model->table('main_specifications')->where('product_id', '=', $product['id'])->get();
      $describes = $model->table('describes')->where('product_id', '=', $product['id'])->get();
      $specifications = $model->table('specifications')->where('product_id', '=', $product['id'])->get();

      $data['content']['product'] = $product;
      $data['content']['pictures'] = $pictures;
      $data['content']['mainSpecifications'] = $mainSpecifications;
      $data['content']['describes'] = $describes;
      $data['content']['specifications'] = $specifications;
    }

    $data['component'] = 'product/index';
    $this->render('layouts/product', $data);
  }
}