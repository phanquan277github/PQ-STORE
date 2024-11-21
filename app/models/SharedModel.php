<?php
class SharedModel extends Model
{
  public static function getCategories($parent_id = 1)
  {
    $__conn = Connection::getInstance();
    $categories = [];
    $sql = "select id, name, parent_id, image_path, icon_path from categories where parent_id = ?";
    $stmt = $__conn->prepare($sql);
    $stmt->execute([$parent_id]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $item) {
      $category = [];
      $category['id'] = $item['id'];
      $category['name'] = $item['name'];
      $category['parent_id'] = $item['parent_id'];
      $category['image_path'] = $item['image_path'];
      $category['icon_path'] = $item['icon_path'];
      $category['sub-cate'] = static::getCategories($category['id']);
      $categories[$item['id']] = $category;
    }
    return $categories;
  }

}