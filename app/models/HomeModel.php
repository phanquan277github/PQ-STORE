<?php
class HomeModel extends Model
{
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