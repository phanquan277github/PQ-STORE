<h3>Thông tin tài khoản</h3>
<form>
  <div class="mb-3">
    <label for="" class="form-label">Họ tên</label>
    <input type="" class="form-control" id="" readonly
      value="<?php echo $userData['first_name'] . ' ' . $userData['last_name']; ?>">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Email</label>
    <input type="" class="form-control" id="" readonly value="<?php echo $userData['email']; ?>">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Số điện thoại</label>
    <input type="" class="form-control" id="" readonly value="<?php echo ""; ?>">
  </div>
</form>