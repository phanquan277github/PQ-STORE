<?php
class ProductModel extends Model
{
  public function getProduct($sku)
  {
    $sql = "SELECT * FROM products WHERE sku = '$sku'";
    return $this->query($sql);
  }
  public function getPictures($id)
  {
    $sql = "SELECT * FROM pictures WHERE product_id = $id";
    return $this->query($sql);
  }
  public function getMainSpeci($id)
  {
    $sql = "SELECT * FROM Main_Specifications WHERE product_id = $id";
    return $this->query($sql);
  }
  public function getDescr($id)
  {
    $sql = "SELECT * FROM describes WHERE product_id = $id";
    return $this->query($sql);
  }
  public function getSpecifications($id)
  {
    $sql = "SELECT * FROM specifications WHERE product_id = $id";
    return $this->query($sql);
  }
}
