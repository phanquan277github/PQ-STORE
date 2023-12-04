<?php
class Shared extends Controller
{
  public function searchProduct(...$params)
  {
    $keySearch = Request::input_value('keySearch');

    $model = $this->model('SharedModel');
    $result = $model->table('products')->whereLike('name', '%' . $keySearch . '%')->get();

    if ($result) {
      $title = $model->table('categories ct')->join('product_categories pc', 'ct.id = pc.category_id')
        ->where('pc.product_id', '=', $result[0]['id'])->select('name')->first();

      $data['title'] = $title;
      $data['products'] = $result;
      $rs = '';
      foreach ($data['products'] as $item) {
        $rs .= '<li class="list-group-item"><a class="text-reset text-decoration-none auto-hidden-text-1line" href="' . _WEB_ROOT . '/san-pham?id=' . $item['id'] . '">' . $item['name'] . '</a></li>';
      }
    } else {
      $data['notFound'] = '';
      $data['title'] = ['name' => 'Không tìm thấy sản phẩm nào'];
    }
    // trả dữ liệu về client dưới dạng json
    echo !empty($rs) ? $rs : "Không có sản phẩm tương ứng";
  }

  public function searchList(...$params)
  {
    $keySearch = Request::input_value('keySearch');

    $model = $this->model('SharedModel');
    $result = $model->table('products')->whereLike('name', '%' . $keySearch . '%')->get();

    if ($result) {
      $title = $model->table('categories ct')->join('product_categories pc', 'ct.id = pc.category_id')
        ->where('pc.product_id', '=', $result[0]['id'])->select('name')->first();

      $data['content']['title'] = $title;
      $data['content']['products'] = $result;
    } else {
      $data['content']['notFound'] = '';
      $data['content']['title'] = ['name' => 'Không tìm thấy sản phẩm nào'];
    }

    $data['component'] = 'category/index';
    $this->render('layouts/main', $data);
  }
}