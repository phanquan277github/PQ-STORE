async function cartEventFull() {
  let carts = await callAPI("carts");
  let products = await callAPI("products");
  let cartProducts = await products.filter((prod) =>
    carts.map((cart) => cart.productId).includes(prod.id)
  );
  checkCart(carts, cartProducts);
}

function checkCart(carts, cartProducts) {
  if (carts.length === 0) {
    document.querySelector(".js-no-cart").style.display = "flex";
    document.querySelector(".js-has-cart").style.display = "none";
  } else {
    document.querySelector(".js-no-cart").style.display = "none";
    document.querySelector(".js-has-cart").style.display = "flex";
    renderCartNum(carts);
    renderCartItem(cartProducts, carts);
    AllEvent(carts);
  }
}

function renderCartItem(cartProducts, carts) {
  function getQuantity(prodId) {
    return carts.find((item) => item.productId === prodId).quantity;
  }
  let htmls = cartProducts.map((prod) => {
    return `<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 border rounded p-3 cart__item" id="${
      prod.id
    }">
    <div class="row g-2">
      <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1 col-xxl-1 d-flex">
        <div class="cart__item__checkbox">
          <input type="checkbox" name="cart-item" id="check-product${prod.id}">
          <label for="check-product${
            prod.id
          }" class="cart__item__check-label"><span></span></label>
        </div>
      </div>
        <div class="col-2 col-sm-2 col-md-1 col-lg-1 col-xl-1 col-xxl-1">
            <a href="./product.html?${
              prod.id
            }" class="cart__item__img"><img src="${prod.avata}" alt=""></a>
                        </div>
                        <div class="col-9 col-sm-9 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                            <span class="cart__item__name">${prod.name}</span>
                        </div>
                        <div class="col-4 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-xxl-2  justify-content-center d-flex">
                            <div class="cart__item__unit-price">
                                <div class="discount" value="${
                                  prod.discount
                                }">${formatCurrency(prod.discount, "đ")}</div>
                                <div class="price">${formatCurrency(
                                  prod.price,
                                  "đ"
                                )}</div>
                            </div>
                        </div>
                        <div class="col-4 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                            <div class="cart__item__quantity">
                                <header class="cart__item__quantity__header">
                                    <button class="quantity__decrease">-</button>
                                    <div class="quantity__number" data-id=${
                                      prod.id
                                    } value="${getQuantity(
      prod.id
    )}">${getQuantity(prod.id)}</div>
                                    <button class="quantity__increase" data-id=${
                                      prod.id
                                    }>+</button>
                                </header>
                                <div class="quantity__delete" data-id=${
                                  prod.id
                                }>Xóa</div>
                            </div>
                        </div>
                        <div class="col-4 col-sm-4 col-md-2 col-lg-2 col-xl-2 col-xxl-2  justify-content-center d-flex">
                            <div class="cart__item__total-price" value="${
                              prod.discount * getQuantity(prod.id)
                            }">${formatCurrency(
      prod.discount * getQuantity(prod.id),
      "đ"
    )}</div>
                        </div>
                    </div>
                </div>`;
  });
  document.querySelector(".js-has-cart-product").innerHTML = htmls.join("");
}

async function AllEvent(carts) {
  let totalPays = [
    //để chứa các tổng tiền của các sản phẩm được check
    // {
    //     id: 1,
    //     value: 1000
    // }
  ];
  PayToltalEvent();
  function PayToltalEvent() {
    selectEvent();
    function selectEvent() {
      let cartItems = document.querySelectorAll(".cart__item"); //lấy mảng các sản phẩm trong giỏ
      cartItems = Array.from(cartItems);
      // xử lí check cho từng sản phẩm
      checkedOne();
      function checkedOne() {
        cartItems.forEach((item) => {
          let cartItemId = Number(item.getAttribute("id"));
          let inputItem = item.querySelector("input[name='cart-item']");
          inputItem.onchange = () => {
            let total = Number(
              item
                .querySelector(".cart__item__total-price")
                .getAttribute("value")
            );
            if (inputItem.checked == true) {
              //nếu đang check thì thêm sản phẩm vào totalPays
              carts.forEach((cart) => {
                if (cart.productId === cartItemId) {
                  totalPays.push({
                    id: cart.productId,
                    value: total,
                  });
                }
              });
              updatePay();
            } else {
              //nếu hủy check thì xóa sản phẩm đó ra khỏi mảng totalPays
              totalPays.forEach((item) => {
                if (cartItemId === item.id)
                  totalPays = totalPays.filter(
                    (item) => !(item.id === cartItemId)
                  );
              });
              updatePay();
            }
          };
        });
      }

      // xử lí chọn tất cả
      checkedAll();
      function checkedAll() {
        let checkAll = document.querySelector("#check-all-product");
        checkAll.onclick = () => {
          if (checkAll.checked == true) {
            cartItems.forEach((item) => {
              let cartItemId = Number(item.getAttribute("id"));
              let inputItem = item.querySelector("input[name='cart-item']");
              let total = Number(
                item
                  .querySelector(".cart__item__total-price")
                  .getAttribute("value")
              );
              inputItem.checked = true;
              totalPays.push({
                id: cartItemId,
                value: total,
              });
              updatePay();
            });
          } else {
            cartItems.forEach((item) => {
              let cartItemId = Number(item.getAttribute("id"));
              let inputItem = item.querySelector("input[name='cart-item']");
              inputItem.checked = false;
              totalPays = totalPays.filter((item) => !(item.id === cartItemId));
              updatePay();
            });
          }
        };
      }
    }

    function updatePay() {
      let total = 0;
      totalPays.forEach((item) => {
        total += item.value;
      });
      renderPay(total, 0);
    }
    function renderPay(total, sale) {
      document.querySelector(".pay-container").innerHTML = `
                <h1 class="pay__title">Thanh toán</h1>
                <div class="pay__row">
                    <span>Tổng tiền:</span>
                    <span>${formatCurrency(total, "đ")}</span>
                </div>
                <div class="pay__row">
                    <span>Giảm:</span>
                    <span>0đ</span>
                </div>
                <div class="pay__row">
                    <h3>Cần thanh toán:</h3>
                    <h4>${formatCurrency(total - sale, "đ")}</h4>
                </div>
                <button class="pay__button button">Thanh toán</button>`;
    }
  }

  changeQuantityEvent();
  function changeQuantityEvent() {
    let cartItems = document.querySelectorAll(".cart__item");
    cartItems.forEach((item) => {
      let itemId = Number(item.getAttribute("id"));
      let decreseBtn = item.querySelector(".quantity__decrease");
      let increseBtn = item.querySelector(".quantity__increase");
      let quantityNum = item.querySelector(".quantity__number");
      let quantityValue = Number(quantityNum.getAttribute("value"));
      let price = Number(item.querySelector(".discount").getAttribute("value"));
      let totalBlock = item.querySelector(".cart__item__total-price");

      decreseBtn.onclick = () => {
        quantityValue -= 1;
        if (quantityValue === 0) quantityValue = 1;
        quantityNum.innerHTML = quantityValue;
        setCartQuantity(itemId, quantityValue);
        setCartTotal(itemId, quantityValue * price);
        renderTotalPrice(quantityValue, price, totalBlock);
      };
      increseBtn.onclick = () => {
        quantityValue += 1;
        if (quantityValue === 20) {
          alert("Số lượng lớn vui lòng liên hệ trực tiếp!");
          quantityValue = 1;
        }
        quantityNum.innerHTML = quantityValue;
        setCartQuantity(itemId, quantityValue);
        setCartTotal(itemId, quantityValue * price);
        renderTotalPrice(quantityValue, price, totalBlock);
      };
    });
    function setCartTotal(prodId, totalValue) {
      carts.forEach((item) => {
        if (item.prodductId === prodId) {
          item.total = totalValue;
        }
      });
    }
    function setCartQuantity(prodId, quantityValue) {
      carts.forEach((item) => {
        if (item.prodductId === prodId) {
          item.quantity = quantityValue;
        }
      });
    }
    function renderTotalPrice(quantity, price, itemRender) {
      let total = quantity * price;
      itemRender.setAttribute("value", total);
      itemRender.innerHTML = formatCurrency(quantity * price, "đ");
    }
  }
  deleteProduct();
  function deleteProduct() {
    const deleteBtns = document.querySelectorAll(
      ".cart__item__quantity .quantity__delete"
    );
    deleteBtns.forEach((btn) => {
      btn.onclick = () => {
        let prodId = +btn.getAttribute("data-id");
        deleteProductInCartById(prodId);
      };
    });
  }

  removeAllProductInCarts();
  function removeAllProductInCarts() {
    const deleteAllBtn = document.querySelector(".cart__header__remove-all");
    deleteAllBtn.onclick = () => {
      removeAllProductInCartsAPI();
    };
  }
}

async function removeAllProductInCartsAPI() {
  try {
    const carts = await axios.get("http://localhost:7777/carts");
    const cartIds = carts.data.map((cart) => cart.id);

    // Xóa từng object trong mảng
    for (const cartId of cartIds) {
      await axios.delete(`http://localhost:7777/carts/${cartId}`);
    }
  } catch (e) {
    console.error("Error removeAllProductInCarts :", e);
  }
}

async function deleteProductInCartById(id) {
  try {
    let carts = await callAPI("carts"); // Lấy dữ liệu từ nguồn dữ liệu JSON
    let productDelete = carts.find((prod) => prod.productId === id);
    await axios.delete(`http://localhost:7777/carts/${productDelete.id}`);
  } catch (error) {
    console.error("Error deleteProductInCartById :", error);
  }
}
