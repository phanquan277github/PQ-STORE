<?php
class CategoryModel extends Model
{
  public function getProductsInCate($cateId, $page, $sortType)
  {
    // Số sản phẩm mỗi trang
    $itemsPerPage = 30;
    $offset = ($page - 1) * $itemsPerPage;

    $sql = "SELECT p.*
            FROM products p
            LEFT JOIN product_categories pc ON p.id = pc.product_id
            WHERE pc.category_id IN (SELECT id FROM categories WHERE id = $cateId or parent_id = $cateId)
            ORDER BY $sortType
            LIMIT $offset, $itemsPerPage";
    $rs = $this->queryCustom($sql);

    foreach ($rs as $key => $value) {
      $sql = "SELECT content FROM main_specifications WHERE product_id = " . $value['id'];
      $rs[$key]['content'] = $this->queryCustom($sql, PDO::FETCH_COLUMN);
    }
    return $rs;
  }

  public function getTotalPages($cateId)
  {
    $sql = "SELECT count(*) AS count
            FROM products p
            LEFT JOIN product_categories pc ON p.id = pc.product_id
            WHERE pc.category_id IN (SELECT id FROM categories WHERE id = $cateId or parent_id = $cateId)";
    $totalItems = $this->queryCustom($sql, PDO::FETCH_COLUMN);
    $itemsPerPage = 30;
    $totalPages = ceil($totalItems[0] / $itemsPerPage);
    return $totalPages;
  }

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
