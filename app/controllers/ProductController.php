<?php
class ProductController extends Controller
{
  public function index()
  {
    $productModel = $this->model('ProductModel');

    $id = Helper::input_value('id', FILTER_DEFAULT, FILTER_SANITIZE_SPECIAL_CHARS);

    if (!empty($id)) {
      $productModel->setId($id);

      $data['content']['product'] = $productModel->getProduct();
      $data['content']['pictures'] = $productModel->getPictures();
      $data['content']['mainSpecifications'] = $productModel->getMainSpecifications();
      $data['content']['describes'] = $productModel->getDescribes();
      $data['content']['specifications'] = $productModel->getSpecifications();
    }

    $data['component'] = 'product/index';
    $this->render('layouts/main', $data);
  }
}