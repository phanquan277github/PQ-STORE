<?php
class CategoryModel extends Model
{
  public function getProductsInCate($cateId)
  {
    $sql = "SELECT p.*
            FROM products p
            LEFT JOIN product_categories pc ON p.id = pc.product_id
            WHERE pc.category_id IN (SELECT id FROM categories WHERE id = $cateId or parent_id = $cateId) LIMIT 40";
    $rs = $this->queryCustom($sql);

    foreach ($rs as $key => $value) {
      $sql = "SELECT content FROM main_specifications WHERE product_id = " . $value['id'];
      $rs[$key]['content'] = $this->queryCustom($sql, PDO::FETCH_COLUMN);
    }
    return $rs;
  }
}
