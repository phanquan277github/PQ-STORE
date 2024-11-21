<h3>Đơn hàng</h3>

<?php if (!empty($orders)): ?>
  <?php foreach ($orders as $order): ?>
    <div class="row border border-secondary mb-2 mt-2">
      <div class="col-8">
        <div class="list-group">
          <?php foreach ($order['order_items'] as $item): ?>
            <div class="list-group-item border border-light bg-light m-2 p-2">
              <div class="row g-1 align-items-center">
                <div class="col-2">
                  <a href="<?php echo _WEB_ROOT . '/san-pham?id=' . $item['product_id'] ?>" class="">
                    <img src="<?php echo !empty($item['thumbnail_path']) ? $item['thumbnail_path'] : ""; ?>" alt=""
                      style="width: 100%; height: 100%; mix-blend-mode: darken; object-fit: contain; max-width: 50px " />
                  </a>
                </div>
                <div class="col-5">
                  <span class="fs-5 auto-hidden-text-3line">
                    <?php echo $item['name']; ?>
                  </span>
                </div>
                <div class="col-2 d-flex flex-column align-items-center">
                  <div class="fs-5" data-discount="<?php echo $item['discount']; ?>">Giá:
                    <?php echo Helper::formatCurrency($item['discount']); ?>
                  </div>
                  <div class="fs-5">Số lượng: <?php echo $item['quantity'] ?></div>
                </div>
                <div class="total-price col-3 d-flex justify-content-center fs-5">
                  Tổng
                  <?php echo Helper::formatCurrency($item['discount'] * $item['quantity']); ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

      </div>
      <div class="col-4 fs-5">
        <div class="mt-2">Tên người nhận: <?php echo $order['full_name'] ?></div>
        <div class="mt-2">Số điện thoại: <?php echo $order['phone_number'] ?></div>
        <div class="mt-2">Địa chỉ nhận hàng: <?php echo $order['address'] ?></div>
        <div class="mt-2">Tình trạng đơn hàng: <span class="text-primary-color fw-bolder"><?php switch ($order['order_status']) {
          case 'ordering':
            echo 'chờ xác nhận';
            break;
          case 'delivering':
            echo 'đang giao';
            break;
          case 'delivered':
            echo 'đã giao';
            break;
        } ?></span>
        </div>
        <div class="mt-2">Tổng tiền cần thanh toán: <span
            class="text-primary-color "><?php echo Helper::formatCurrency($order['total']) ?></span></div>
        <div class="mt-2">Phương thức thanh toán: <?php switch ($order['payment_methods']) {
          case 'CashOnDelivery':
            echo 'thanh toán khi nhận hàng';
            break;
          case 'CreditCard':
            echo 'thanh toán qua thẻ tín dụng/visa';
            break;
        } ?>
        </div>
        <div class="mt-2">Ghi chú: <?php echo $order['note'] ?></div>
      </div>
    </div>

  <?php endforeach; ?>
<?php endif; ?>