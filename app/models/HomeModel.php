<?php
class HomeModel extends Model
{

  // public function getCategories_head($parent_id = 1)
  // {
  //   $categories = [];
  //   $sql = "select id, name, parent_id, image_path, icon_path from categories where parent_id = ?";
  //   $stmt = $this->__conn->prepare($sql);
  //   $stmt->execute([$parent_id]);
  //   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  //   return $result;
  // }

  public function getFeaturedCategories()
  {
    $sql = "SELECT * FROM categories WHERE image_path IS NOT NULL AND image_path != ''";
    return $this->query($sql);
  }

  public function getSuggestCategories()
  {
    $sql = "SELECT * FROM categories WHERE image_path IS NOT NULL AND image_path != '' ORDER BY rand() LIMIT 3";
    return $this->query($sql);
  }

}