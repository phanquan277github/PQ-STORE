<?php
class AdminModel extends Model
{

  public function totalWeekRevenue()
  {
    $sql = "SELECT YEAR(order_date) AS year, WEEK(order_date) AS week, SUM(total) AS total
            FROM orders 
            WHERE order_status = 'delivered' AND YEAR(order_date) = YEAR(CURDATE()) AND WEEK(order_date) = WEEK(CURDATE())
            GROUP BY YEAR(order_date), WEEK(order_date);";
    return $this->queryCustom($sql)[0];
  }
  public function totalMonthRevenue()
  {
    $sql = "SELECT MONTH(order_date) AS month, SUM(total) AS total
            FROM orders 
            WHERE order_status = 'delivered' AND YEAR(order_date) = YEAR(CURDATE()) AND MONTH(order_date) = MONTH(CURDATE())
            GROUP BY YEAR(order_date), MONTH(order_date);";
    return $this->queryCustom($sql)[0];
  }
  public function totalYearRevenue()
  {
    $sql = "SELECT YEAR(order_date) AS year, SUM(total) AS total
            FROM orders 
            WHERE order_status = 'delivered' AND YEAR(order_date) = YEAR(CURDATE())
            GROUP BY YEAR(order_date)";
    return $this->queryCustom($sql)[0];
  }

  public function monthlyRevenue()
  {
    $sql = "WITH months AS (
            SELECT 1 AS month UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL
            SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL
            SELECT 9 UNION ALL SELECT 10 UNION ALL SELECT 11 UNION ALL SELECT 12)
        SELECT 
            m.month, 
            COALESCE(SUM(o.total), 0) AS total_revenue
        FROM months m
        LEFT JOIN orders o ON m.month = MONTH(o.order_date) 
                           AND YEAR(o.order_date) = YEAR(CURDATE())
                           AND o.order_status = 'delivered'
        GROUP BY m.month
        ORDER BY m.month;";
    return $this->queryCustom($sql);
  }

  public function orderApproval($orderId)
  {
    $sql = "UPDATE orders SET order_status = CASE 
              WHEN order_status = 'ordering' THEN 'delivering' 
              WHEN order_status = 'delivering' THEN 'delivered' 
              END WHERE id = $orderId";
    $this->queryCustom($sql);
  }


}