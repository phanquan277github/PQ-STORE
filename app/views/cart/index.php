<main class="container my-4">

  <?php if ($cart = Session::data('cart')): ?>
    <!-- giỏ hàng đã có sản phẩm -->
    <div class="row have-cart">
      <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9">
        <div class="d-flex p-1">
          <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
          <label for="" class="ms-1 fs-4">Chọn tất cả</label>
          <button class="btn border-0 fs-4 ms-auto">
            <a class="text-reset text-decoration-none" href="<?php echo _WEB_ROOT . '/gio-hang/removeAll/' ?>"><i
                class="bi bi-trash me-1"></i>Xóa tất cả</a>
          </button>
        </div>
        <div class="list-group">
          <?php foreach ($cart as $item): ?>
            <div class="list-group-item cart-item border border-warning m-2 p-2">
              <div class="row g-1 align-items-center">
                <div class="col-1 d-flex justify-content-center align-items-center">
                  <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                </div>
                <div class="col-1">
                  <a href="<?php echo _WEB_ROOT . '/san-pham?id=' . $item['id'] ?>" class="">
                    <img src="<?php echo !empty($item['thumbnail_path']) ? $item['thumbnail_path'] : ""; ?>" alt="" />
                  </a>
                </div>
                <div class="col-4">
                  <span class="fs-5 auto-hidden-text-3line">
                    <?php echo $item['name']; ?>
                  </span>
                </div>
                <div class="col-2 d-flex flex-column align-items-center">
                  <div class="fs-4 text-primary-color" data-discount="<?php echo $item['discount']; ?>">
                    <?php echo Helper::formatCurrency($item['discount']); ?>
                  </div>
                  <div class="fs-5 text-decoration-line-through" data-price="<?php echo $item['price']; ?>">
                    <?php echo Helper::formatCurrency($item['price']); ?>
                  </div>
                </div>
                <div class="col-2 d-flex flex-column align-items-center">
                  <div class="btn-group">
                    <button data-action="decrease" class="btn btn-decrease border-dark fs-4 fw-bold">-</button>
                    <div class="quantity-num px-3 text-center align-self-center"
                      data-quantity="<?php echo $item['quantity']; ?>" data-product-id="<?php echo $item['id']; ?>">
                      <?php echo $item['quantity']; ?>
                    </div>
                    <button data-action="increase" class="btn btn-increase border-dark fs-4 fw-bold">+</button>
                  </div>
                  <a href="<?php echo _WEB_ROOT . '/gio-hang/remove/' . $item['id']; ?>"
                    class="quantity__remove btn border-0 p-2 fs-5 text-error">Xóa</a>
                </div>
                <div class="total-price col-2 d-flex justify-content-center">
                  <?php echo Helper::formatCurrency($item['discount'] * $item['quantity']); ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3  fs-5">
        <form id="addressForm" action="<?php echo _WEB_ROOT . '/tai-khoan/create_order/' ?>" method="post">
          <h1 class="text-center fs-2">Đơn hàng</h1>
          <div class="list-group border-0">
            <div class="list-group-item d-flex">
              <div>Tổng tiền:</div>
              <div class="ms-auto" id="totalPrice">0.00đ</div>
            </div>
            <div class="list-group-item d-flex">
              <div>Giảm:</div>
              <div class="ms-auto" id="totalDiscount">0.00đ</div>
            </div>
            <div class="list-group-item d-flex">
              <h4>Cần thanh toán:</h4>
              <h4 class="ms-auto text-primary-color" id="finalPrice">0.00đ</h4>
              <input type="hidden" name="total" id="total">
            </div>
          </div>
          <div class="mb-3">
            <label for="addressId" class="form-label">Địa chỉ nhận hàng</label>
            <select class="form-select" id="addressId" name="addressId">
              <?php if (!empty($address)): ?>
                <?php foreach ($address as $item): ?>
                  <option value="<?php echo $item['id'] ?>">
                    <p class="fs-6 fw-bolder mb-2"></p>
                    <?php echo $item['full_name'] . ' - Địa chỉ: ' . $item['street_address'] . ', ' . $item['address'] . ' - Điện thoại: ' . $item['phone_number'] ?>
                  </option>
                <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="paymentMethod" class="form-label">Phương thức thanh toán</label>
            <select class="form-select" id="paymentMethod" name="paymentMethod">
              <option value="CashOnDelivery">Thanh toán khi nhận hàng</option>
              <option value="CreditCard">Thanh toán qua thẻ tín dụng/visa</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="paymentMethod" class="form-label">Ghi chú</label>
            <input class="w-100" type="text" name="note" id="note">
          </div>
          <button type="submit" class="pay__button w-100 mt-2 btn border-0 bg-primary-gradient fs-3 fw-normal">Đặt
            hàng</button>
        </form>

      </div>
    </div>
  <?php else: ?>
    <!-- giỏ hàng chưa có sản phẩm -->
    <div class="non-cart m-auto text-center">
      <img class="" src="../assets/img/no-cart.png" alt="" />
      <h2 class="mt-2">Giỏ hàng chưa có sản phẩm nào</h2>
    </div>
  <?php endif; ?>

</main>

<script>

  function updateQuantity(action, parentNode) {
    let quantiyNode = parentNode.find(".quantity-num");
    let productId = quantiyNode.attr("data-product-id");
    let currentQuantity = quantiyNode.attr("data-quantity");

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = () => {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        let newQuantity = xmlhttp.responseText;
        quantiyNode.html(newQuantity);
        quantiyNode.attr("data-quantity", newQuantity);
        let discount = parentNode.find("[data-discount]").attr("data-discount");
        parentNode
          .find(".total-price")
          .html(
            formatCurrency(parseInt(discount) * parseInt(newQuantity))
          );
        updateTotalPrice();
      }
    };

    xmlhttp.open(
      "GET",
      WEB_ROOT +
      `gio-hang/updateQuantity/${productId}/${currentQuantity}/${action}`,
      true
    );
    xmlhttp.send();
  }

  function updateTotalPrice() {
    let totalPrice = 0;
    let totalDiscount = 0;

    $(".cart-item").each(function () {
      let quantity = $(this).find(".quantity-num").attr("data-quantity");
      let discount = $(this).find("[data-discount]").attr("data-discount");
      let price = $(this).find("[data-price]").attr("data-price");
      totalPrice += parseInt(price) * parseInt(quantity);
      totalDiscount += parseInt(discount) * parseInt(quantity);
    });
    $("#totalPrice").html(formatCurrency(totalPrice));
    $("#totalDiscount").html(formatCurrency(totalPrice - totalDiscount));
    $("#finalPrice").html(formatCurrency(totalDiscount));
    $("#total").val(totalDiscount);
  }
  $(document).ready(function () {
    updateTotalPrice();
  });

  $(".btn-decrease").click(function () {
    let currentQuantity = $(this)
      .parent()
      .find(".quantity-num")
      .attr("data-quantity");
    if (parseInt(currentQuantity) != 1)
      updateQuantity("decrease", $(this).closest(".list-group-item"));
  });

  $(".btn-increase").click(function () {
    let currentQuantity = $(this)
      .parent()
      .find(".quantity-num")
      .attr("data-quantity");
    if (parseInt(currentQuantity) != 20)
      updateQuantity("increase", $(this).closest(".list-group-item"));
  });

</script>
