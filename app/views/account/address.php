<h3>Địa chỉ</h3>

<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-secondary w-100 p-3 mb-3" data-bs-toggle="modal"
  data-bs-target="#exampleModal">
  Thêm địa chỉ mới
</button>

<div class="list-group">
  <?php if (!empty($address)): ?>
    <?php foreach ($address as $item): ?>
      <div class="list-group-item border border-secondary m-2 p-2 d-flex justify-content-between align-items-center">
        <div>
          <p class="fs-6 fw-bolder mb-2"><?php echo $item['full_name'] ?></p>
          <p class="fs-6 mb-2">Địa chỉ: <?php echo $item['street_address'] . ', ' . $item['address'] ?></p>
          <p class="fs-6 mb-2">Điện thoại: <?php echo $item['phone_number'] ?></p>
        </div>

        <div class="d-flex flex-column">
          <button type="button" class="btn btn-outline-secondary edit-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"
            data-id="<?php echo $item['id'] ?>" data-name="<?php echo $item['full_name'] ?>"
            data-phone="<?php echo $item['phone_number'] ?>" data-street="<?php echo $item['street_address'] ?>">
            Chỉnh sửa
          </button>
          <a href="<?php echo _WEB_ROOT . '/tai-khoan/ /?id=' . $item['id'] ?>" type="button" class="btn btn-outline-danger edit-btn mt-2">Xóa</a>
        </div>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm địa chỉ mới</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="addressForm" action="<?php echo _WEB_ROOT . '/tai-khoan/add_address/' ?>" method="post">
        <div class="modal-body">
          <div class="mb-3">
            <input type="hidden" name="id" id="id">
            <label for="recipientName" class="form-label">Tên Người Nhận</label>
            <input type="text" id="recipientName" class="form-control" name="name" placeholder="Nhập tên người nhận">
          </div>
          <div class="mb-3">
            <label for="phoneNumber" class="form-label">Số Điện Thoại</label>
            <input type="tel" id="phoneNumber" class="form-control" name="phone" placeholder="Nhập số điện thoại">
          </div>
          <div class="mb-3">
            <label for="city" class="form-label">Tỉnh/Thành Phố</label>
            <select class="form-select" id="city" name="city">
              <option selected>Chọn tỉnh/thành phố</option>
              <option value="0">Tỉnh Thành</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="district" class="form-label">Quận/Huyện</label>
            <select class="form-select" id="district" name="district">
              <option selected>Chọn quận/huyện</option>
              <option value="0">Quận Huyện</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="ward" class="form-label">Xã/Phường</label>
            <select class="form-select" id="ward" name="ward">
              <option selected>Chọn xã/phường</option>
              <option value="0">Phường Xã</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">Số Nhà và Đường</label>
            <input type="text" class="form-control" id="address" name="street_address"
              placeholder="Nhập số nhà và tên đường">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
          <button type="submit" class="btn btn-primary">Xác nhận</button>
        </div>
      </form>

    </div>
  </div>
</div>

<script>



  $(document).ready(function () {
    //Lấy tỉnh thành
    $.getJSON('https://esgoo.net/api-tinhthanh/1/0.htm', function (data_tinh) {
      if (data_tinh.error == 0) {
        $.each(data_tinh.data, function (key_tinh, val_tinh) {
          $("#city").append('<option value="' + val_tinh.full_name + '" data-id="' + val_tinh.id + '">' + val_tinh.full_name + '</option>');
        });
        $("#city").change(function (e) {
          var idtinh = $(this).find('option:selected').data('id');
          //Lấy quận huyện
          $.getJSON('https://esgoo.net/api-tinhthanh/2/' + idtinh + '.htm', function (data_quan) {
            if (data_quan.error == 0) {
              $("#district").html('<option value="0">Quận Huyện</option>');
              $("#ward").html('<option value="0">Phường Xã</option>');
              $.each(data_quan.data, function (key_quan, val_quan) {
                $("#district").append('<option value="' + val_quan.full_name + '" data-id="' + val_quan.id + '">' + val_quan.full_name + '</option>');
              });
              //Lấy phường xã  
              $("#district").change(function (e) {
                var idquan = $(this).find('option:selected').data('id');
                $.getJSON('https://esgoo.net/api-tinhthanh/3/' + idquan + '.htm', function (data_phuong) {
                  if (data_phuong.error == 0) {
                    $("#ward").html('<option value="0">Phường Xã</option>');
                    $.each(data_phuong.data, function (key_phuong, val_phuong) {
                      $("#ward").append('<option value="' + val_phuong.full_name + '" data-id="' + val_phuong.id + '">' + val_phuong.full_name + '</option>');
                    });
                  }
                });
              });

            }
          });
        });

      }
    });
  });

  $('.edit-btn').click(function () {
    var id = $(this).data('id');
    var name = $(this).data('name');
    var phone = $(this).data('phone');
    var street = $(this).data('street');
    // var address = $(this).data('address');

    $('#id').val(id);
    $('#recipientName').val(name);
    $('#phoneNumber').val(phone);
    $('#address').val(street);

    // Thay đổi action của form
    $('#addressForm').attr('action', '<?php echo _WEB_ROOT . "/tai-khoan/update_address/"; ?>');
    // Mở modal
    $('#exampleModal').modal('show');
  });
</script>