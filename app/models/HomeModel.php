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


  public function getSuggestProducts() {
    $sql = "SELECT p.*, SUM(oi.quantity) AS total_quantity
            FROM products p INNER JOIN order_items oi ON oi.product_id = p.id 
            GROUP BY p.id, p.name, p.price, p.thumbnail_path
            ORDER BY total_quantity DESC LIMIT 3;";
    return $this->query($sql);  
  }

  public function getBestDiscountProducts() {
    $sql = "SELECT *, ((price-discount) / price) * 100 AS discount_percentage
            FROM products
            ORDER BY discount_percentage DESC LIMIT 6";
    return $this->query($sql);  
  }


}