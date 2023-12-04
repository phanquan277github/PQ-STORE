// xử lí search -> ngăn submit khi input rỗng
document
  .querySelector(".header .search")
  .addEventListener("submit", function (event) {
    var searchInput = document.querySelector(
      ".header .search input[name='keySearch']"
    ).value;
    // Kiểm tra nếu trường input trống
    if (searchInput.trim() === "") {
      // Không cho submit
      event.preventDefault();
    }
  });

function formatCurrency(amount) {
  return amount.toFixed(0).replace(/\d(?=(\d{3})+$)/g, "$&,") + " ₫";
}
const WEB_ROOT = window.location.origin + "/mvc_php/public/";

function showResultSearch(input) {
  if (input.value.length == 0) {
    input.parentNode.querySelector(".popup .content").innerHTML = "";
    return;
  }

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = () => {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      input.parentNode.querySelector(".popup .content").innerHTML =
        xmlhttp.responseText;
    }
  };
  xmlhttp.open(
    "GET",
    WEB_ROOT + "shared/searchProduct?keySearch=" + input.value,
    true
  );
  xmlhttp.send();
}

categoryPage();
function categoryPage() {
  // sự kiện thêm màu cho nút sort
  const urlParams = new URLSearchParams(window.location.search);
  const sort = urlParams.get("sort");
  if (sort != "")
    if (sort == 0 || sort == 1 || sort == 2 || sort == 3) {
      var sortItem = document.querySelector(
        `.sort__container .sort__item[data-order="${sort}"]`
      );
      sortItem.classList.add("bg-primary-ct");
      sortItem.classList.remove("btn-light");
    }

  // Xử lí phân trang và sắp xếp
  function loadProducts(orderBy, page) {
    var urlParams = new URLSearchParams(window.location.search);
    var cateId = urlParams.get("cate");

    if (page != null && orderBy == -1) {
      window.location.href = WEB_ROOT + `danh-muc?cate=${cateId}&page=${page}`;
    } else {
      window.location.href = WEB_ROOT + `danh-muc?cate=${cateId}`;
    }
    if (orderBy != -1 && page == null) {
      window.location.href =
        WEB_ROOT + `danh-muc?cate=${cateId}&sort=${orderBy}`;
    }
    if (orderBy != -1 && page != null) {
      window.location.href =
        WEB_ROOT + `danh-muc?cate=${cateId}&sort=${orderBy}&page=${page}`;
    }
  }

  // Event handler cho nút sắp xếp
  $(".sort__item").click(function () {
    var orderBy = $(this).data("order");
    var urlParams = new URLSearchParams(window.location.search);
    var page = urlParams.get("page");
    loadProducts(orderBy, page);
  });

  // Event handler cho nút phân trang
  $(document).on("click", ".page-link.number", function () {
    var page = $(this).data("page");
    loadProducts(-1, page);
  });

  // Pre phân trang
  $(document).on("click", ".page-link.pre", function () {
    var urlParams = new URLSearchParams(window.location.search);
    var page = urlParams.get("page");
    var dataPage = $(this).data("page");
    if (page == null) {
      loadProducts(-1, 1);
    } else if (page == "1") {
      // loadProducts(-1, dataPage);
    } else loadProducts(-1, parseInt(page) - 1);
  });

  // Next phân trang
  $(document).on("click", ".page-link.next", function () {
    var urlParams = new URLSearchParams(window.location.search);
    var page = parseInt(urlParams.get("page"));
    var dataPage = $(this).data("page");
    if (page == null) {
      loadProducts(-1, 1);
    } else if (dataPage == page) {
      // loadProducts(-1, page);
    } else loadProducts(-1, parseInt(page) + 1);
  });
}

cartPage();
function cartPage() {
  function updateQuantity(action, parentNode) {
    let quantiyNode = parentNode.find(".quantity-num");
    let productId = quantiyNode.attr("data-product-id");
    let currentQuantity = quantiyNode.attr("data-quantity");

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = () => {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        quantiyNode.html(xmlhttp.responseText);
        quantiyNode.attr("data-quantity", xmlhttp.responseText);
        let discount = parentNode.find("[data-discount]").attr("data-discount");
        parentNode
          .find(".total-price")
          .html(
            formatCurrency(parseInt(discount) * parseInt(xmlhttp.responseText))
          );
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
}
