<?php
class HomeModel extends Model
{

  public function getCategories_head($parent_id = 1)
  {
    $categories = [];
    $sql = "select id, name, parent_id, image_path, icon_path from categories where parent_id = ?";
    $stmt = $this->__conn->prepare($sql);
    $stmt->execute([$parent_id]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
  }

  public function getFeaturedCategories()
  {
    $sql = "SELECT * FROM categories WHERE image_path IS NOT NULL AND image_path != ''";
    return $this->query($sql);
  }
  public function getSpotlightProduct()
  {
    $sql = 'SELECT pd.sku, pd.name, pd.price, pd.discount, pd.thumbnail_path, ms.content 
            FROM products as pd LEFT JOIN main_specifications as ms ON pd.id = ms.product_id 
            LIMIT 30';
    $stmt = $this->__conn->query($sql);
    $result = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $sku = $row['sku'];
      if (!isset($result[$sku])) {
        $result[$sku] = [
          'sku' => $row['sku'],
          'name' => $row['name'],
          'price' => $row['price'],
          'discount' => $row['discount'],
          'thumbnail_path' => $row['thumbnail_path'],
          'content' => array($row['content'])
        ];
      } else {
        $result[$sku]['content'][] = $row['content'];
      }
    }
    return $result;
  }

  public function getSuggestCategories()
  {
    $sql = "SELECT * FROM categories WHERE image_path IS NOT NULL AND image_path != '' ORDER BY rand() LIMIT 3";
    return $this->query($sql);
  }

}