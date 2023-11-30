<?php
class ProductModel extends Model
{
  private $id;
  private $sku;
  private $name;
  private $price;
  private $discount;
  private $thumbnail_path;

  public function insertProduct($data)
  {
    $this->table('products')->insert($data);
  }
  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getSpotlightProducts()
  {
    $productSql = 'SELECT * FROM products LIMIT 30';
    $result = $this->queryCustom($productSql);

    foreach ($result as $key => $item) {
      $result[$key]['main_specification'] = $this->table('specifications')->where('product_id', '=', $item['id'])->where('isMain', '=', 1)->get();
    }
    return $result;
  }

  public function getProduct()
  {
    return $this->table('products')->where('id', '=', $this->id)->first();
  }
  public function getPictures()
  {
    return $this->table('pictures')->where('product_id', '=', $this->id)->get();
  }
  public function getMainSpecifications()
  {
    return $this->table('specifications')->where('product_id', '=', $this->id)->where('isMain', '=', 1)->get();
  }
  public function getDescribes()
  {
    return $this->table('describes')->where('product_id', '=', $this->id)->get();
  }
  public function getSpecifications()
  {
    return $this->table('specifications')->where('product_id', '=', $this->id)->get();
  }

  public function getAllProducts()
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

  public function getProductsInCate($cateId, $page, $sortType = "id ASC")
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
      $rs[$key]['main_specification'] = $this->table('specifications')->where('product_id', '=', $value['id'])->where('isMain', '=', 1)->get();
    }
    return $rs;
  }

  public function getProducts($page)
  {
    // Số sản phẩm mỗi trang
    $itemsPerPage = 30;
    $offset = ($page - 1) * $itemsPerPage;

    $sql = "SELECT * FROM products p LIMIT $offset, $itemsPerPage";
    return $this->queryCustom($sql);
  }


  public function getTotalPages($cateId)
  {
    $itemsPerPage = 30;
    if ($cateId == 1) {
      $totalItems = $this->table('products')->select('count(*) as count')->first();
      $totalPages = ceil($totalItems['count'] / $itemsPerPage);
      return $totalPages;
    }
    $sql = "SELECT count(*) AS count
            FROM products p
            LEFT JOIN product_categories pc ON p.id = pc.product_id
            WHERE pc.category_id IN (SELECT id FROM categories WHERE id = $cateId or parent_id = $cateId)";
    $totalItems = $this->queryCustom($sql, PDO::FETCH_COLUMN);
    $totalPages = ceil($totalItems[0] / $itemsPerPage);
    return $totalPages;
  }

  // xóa sản phẩm hiện tại
  public function deleteProduct()
  {
    return $this->table('products')->where('id', '=', $this->id)->delete();
  }

  public function updateProduct($data)
  {
    return $this->table('products')->where('id', '=', $this->id)->update($data);
  }

  public function updatePictures($data)
  {
    foreach ($data as $d) {
      $this->table('pictures')->where('product_id', '=', $this->id)->where('id', '=', $d['id'])->update($d);
    }
    return;
  }
  public function insertPictures($data)
  {
    foreach ($data as $d) {
      $d['product_id'] = $this->id;
      $this->table('pictures')->insert($d);
    }
    return;
  }
  public function deletePictures($data)
  {
    foreach ($data as $d) {
      $this->table('pictures')->where('id', '=', $d['id'])->where('product_id', '=', $this->id)->delete();
      $this->resetField();
    }
    return;
  }

  public function updateSpecifications($data)
  {
    foreach ($data as $d) {
      $this->table('specifications')->where('product_id', '=', $this->id)->where('id', '=', $d['id'])->update($d);
    }
    return;
  }
  public function insertSpecifications($data)
  {
    foreach ($data as $d) {
      $d['product_id'] = $this->id;
      $this->table('specifications')->insert($d);
    }
    return;
  }
  public function deleteSpecifications($data)
  {
    foreach ($data as $d) {
      $this->table('specifications')->where('id', '=', $d['id'])->where('product_id', '=', $this->id)->delete();
      $this->resetField();
    }
    return;
  }

  public function updateDescribes($data)
  {
    foreach ($data as $d) {
      $this->table('describes')->where('product_id', '=', $this->id)->where('id', '=', $d['id'])->update($d);
    }
    return;
  }
  public function insertDescribes($data)
  {
    foreach ($data as $d) {
      $d['product_id'] = $this->id;
      $this->table('describes')->insert($d);
    }
    return;
  }
  public function deleteDescribes($data)
  {
    foreach ($data as $d) {
      $this->table('describes')->where('id', '=', $d['id'])->where('product_id', '=', $this->id)->delete();
      $this->resetField();
    }
    return;
  }


}