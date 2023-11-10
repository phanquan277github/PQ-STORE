<?php
class Home extends Controller
{
  public function index(...$params)
  {
    $model = $this->model('HomeModel');
    $slideshows = $model->table('slideshows')->where('display', '=', true)->get();
    $banners = $model->table('banners')->where('display', '=', true)->get();
    $bestdeals = $model->table('products')->orderBy('rand() LIMIT 6', '')->get();

    $suggestCategories = $model->getSuggestCategories();
    $suggestProducts = $model->table('products')->orderBy('rand() LIMIT 3', '')->get();

    $featured_categories = $model->getFeaturedCategories();
    $spotlights = $model->getSpotlightProduct();

    $data['content']['slideshows'] = $slideshows;
    $data['content']['suggestCategories'] = $suggestCategories;
    $data['content']['suggestProducts'] = $suggestProducts;
    $data['content']['featured_categories'] = $featured_categories;
    $data['content']['bestdeals'] = $bestdeals;
    $data['content']['banners'] = $banners;
    $data['content']['spotlights'] = $spotlights;
    $data['component'] = 'home/index';
    $this->render('layouts/main', $data);
  }

  public function search($keySearch)
  {
    echo $keySearch;
  }
}