<?php
class CategoryModel extends Model
{
  public function getFilters($cateId)
  {
    $sql = "SELECT id FROM categories WHERE id = (SELECT parent_id FROM categories WHERE id = ?)";
    $rs = $this->getRow($sql, [$cateId]);
    if ($rs['id'] != 1) {
      $cateId = $rs['id'];
    }
    $filters = $this->table('filters')->where('category_id', '=', $cateId)->get();
    foreach ($filters as $key => $value) {
      $filters[$key]['filter_content'] = $this->table('filter_content')->where('filter_id', '=', $value['id'])->get();
    }
    return $filters;
  }
}
