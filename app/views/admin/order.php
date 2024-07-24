<div class="container-fluid">
  <h1 class="h3 mb-3 text-gray-800">Đơn hàng</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="example" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Tên người nhận</th>
              <th scope="col">SĐT</th>
              <th scope="col">Địa chỉ</th>
              <th scope="col">Ngày đặt</th>
              <th scope="col">Phương thức TT</th>
              <th scope="col">Tổng tiền</th>
              <th scope="col">Trạng thái</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($orders)): ?>
              <?php foreach ($orders as $r): ?>
                <tr>
                  <th scope="row"><?php echo $r['id'] ?></th>
                  <th scope="row"><?php echo $r['full_name'] ?></th>
                  <th scope="row"><?php echo $r['phone_number'] ?></th>
                  <th scope="row"><?php echo $r['address'] ?></th>
                  <th scope="row"><?php echo $r['order_date'] ?></th>
                  <th scope="row">
                    <?php if ($r['payment_methods'] == 'CashOnDelivery') {
                      echo "TT khi nhận";
                    } else {
                      echo "Thẻ tín dụng";
                    } ?>
                  </th>
                  <th scope="row"><?php echo Helper::formatCurrency($r['total']) ?></th>
                  

                  <th scope="row">
                    <?php  switch($r['order_status']) {
                      case 'ordering': echo "chưa duyệt"; break;
                      case 'delivering': echo "đang giao hàng"; break;
                      case 'delivered': echo "đã giao hàng"; break;
                    } ?>
                  </th>
                  <td><button data-order-id="<?php echo $r['id'] ?>" class="btn btn-primary order-details-btn">Chi
                  tiết đơn hàng</button></td></td>
                  <td>
                    <?php if ($r['order_status'] != 'delivered'): ?>
                      <a href="<?php echo _WEB_ROOT . '/admin/orderApproval/?id=' . $r['id'] ?>"
                        onclick="return confirm('Xác nhận duyệt!');" type="button"
                        class="btn btn-primary"><?php echo $r['order_status'] == 'ordering' ? 'Duyệt đơn' : 'Đã giao' ?></a>
                        <a href="<?php echo _WEB_ROOT . '/admin/orderRemove/?id=' . $r['id'] ?>"
                      onclick="return confirm('Xác nhận xóa!');" type="button" class="btn btn-danger">Xóa</a>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div id="order-details-container" class="row"></div>

<script>
  $(document).ready(function () {
    // Sự kiện nhấn vào nút "Chi tiết đơn hàng"
    $('body').on('click', '.order-details-btn', function () {
      var orderId = $(this).data('order-id');

      const WEB_ROOT = window.location.origin + "/mvc_php/public/";
      $.ajax({
        url: `${WEB_ROOT}admin/order_detail/`,
        type: 'GET',
        data: { orderId: orderId },
        dataType: 'json',
        success: function (response) {
          console.log(response);
          var detailsTable = `
            <div class="d-flex justify-content-between align-items-center mt-2">
              <h3>Chi tiết đơn hàng ID: ${orderId}</h3>
              <button class="btn btn-danger" id="close-details-btn">Đóng</button>
            </div>
          <div class="card-body m-4">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Tên sản phẩm</th>
                  <th>Giá</th>
                  <th>Số lượng</th>
                </tr>
              </thead>
              <tbody>`;

          response.forEach(function (item) {
            detailsTable += '<tr><td>' + item.id + '</td><td>' + item.name + '</td><td>' + formatCurrency(item.price) + '</td><td>' + item.quantity + '</td></tr>';
          });

          detailsTable += '</tbody></table></div>';

          $('#order-details-container').html(detailsTable);
        },
        error: function (xhr, status, error) {
          console.error(error);
        }
      });
    });

    // Sự kiện nhấn vào nút "Đóng"
    $('body').on('click', '#close-details-btn', function () {
      $('#order-details-container').html('');
    });
  });

  function formatCurrency(value) {
    return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value);
  }
</script>