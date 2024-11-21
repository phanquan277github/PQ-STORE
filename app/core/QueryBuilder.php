<?php
trait QueryBuilder
{
  public $tableName = '';
  public $where = '';
  public $operator = '';
  public $selectField = '*';
  public $limit = '';
  public $orderBy = '';
  public $innerJoin = '';

  public function table($tableName)
  {
    $this->tableName = $tableName;
    return $this;
  }

  public function where($field, $compare, $value)
  {
    if (empty($this->where)) {
      $this->operator = ' WHERE';
    } else {
      $this->operator = ' AND';
    }

    $this->where .= "$this->operator $field $compare '$value'";
    return $this;
  }

  public function whereOr($field, $compare, $value)
  {
    if (empty($this->where)) {
      $this->operator = ' WHERE';
    } else {
      $this->operator = ' OR';
    }

    $this->where .= "$this->operator $field $compare '$value'";
    return $this;
  }
  public function whereLike($field, $value)
  {
    if (empty($this->where)) {
      $this->operator = ' WHERE';
    } else {
      $this->operator = ' AND';
    }

    $this->where .= "$this->operator $field LIKE '$value'";
    return $this;
  }

  public function limit($number, $offset = '0')
  {
    $this->limit = "LIMIT $number OFFSET $offset";
    return $this;
  }
  public function orderBy($field, $type = 'ASC')
  {
    $fieldArr = array_filter(explode(',', $field));
    if (!empty($fieldArr) && count($fieldArr) >= 2) {
      // multi order by
      $this->orderBy = "ORDER BY " . implode(',', $fieldArr);
    } else {
      $this->orderBy = "ORDER BY $field  $type";
    }
    return $this;
  }
  // inner join
  public function join($table, $relationship)
  {
    $this->innerJoin .= "INNER JOIN $table ON $relationship ";
    return $this;
  }

  public function insert($data)
  {
    $tableName = $this->tableName;
    $insertStatus = $this->insertData($tableName, $data);
    return $insertStatus;
  }

  public function update($data)
  {
    $tableName = $this->tableName;
    $whereUpdate = trim(str_replace("WHERE", '', $this->where));
    $updateStatus = $this->updateData($tableName, $data, $whereUpdate);
    return $updateStatus;
  }
  public function delete()
  {
    $tableName = $this->tableName;
    $whereDelete = trim(str_replace("WHERE", '', $this->where));
    $deleteStatus = $this->deleteData($tableName, $whereDelete);
    return $deleteStatus;
  }
  public function select($field = '*')
  {
    $this->selectField = $field;
    return $this;
  }
  public function get()
  {
    $sql = "SELECT $this->selectField FROM $this->tableName $this->innerJoin $this->where $this->orderBy $this->limit";
    $query = $this->query($sql);
    $this->resetField();
    if (!empty($query)) {
      return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    return false;
  }

  public function first()
  {
    $sql = "SELECT $this->selectField FROM $this->tableName $this->innerJoin $this->where";
    $query = $this->query($sql);

    $this->resetField();
    if (!empty($query)) {
      return $query->fetch(PDO::FETCH_ASSOC);
    }
    return false;
  }

  public function resetField()
  {
    $this->tableName = '';
    $this->where = '';
    $this->operator = '';
    $this->selectField = '*';
    $this->limit = '';
    $this->orderBy = '';
    $this->innerJoin = '';
  }

}