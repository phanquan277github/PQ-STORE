<?php
class Home extends Controller
{
  public function index(...$params)
  {
    $homeModel = $this->model('HomeModel');
    $productModel = $this->model('ProductModel');

    $data['content']['slideshows'] = $homeModel->table('slideshows')->where('display', '=', true)->get();
    $data['content']['suggestProducts'] = $homeModel->getSuggestProducts();
    $data['content']['suggestCategories'] = $homeModel->getSuggestCategories();

    $data['content']['banners'] = $homeModel->table('banners')->where('display', '=', true)->get();
    $data['content']['bestdeals'] = $homeModel->getBestDiscountProducts();

    $data['content']['featured_categories'] = $homeModel->getFeaturedCategories();
    $data['content']['spotlights'] = $productModel->getSpotlightProducts();

    $data['component'] = 'home/index';
    $this->render('layouts/main', $data);
  }

}