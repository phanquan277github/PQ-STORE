main();
async function main() {
  let carts = await callAPI("carts");
  addHeader();
  renderCartNum(carts);
  addFooter();
  addAccountForm();
  accountEvent();
  footerPopupMobile();
  headerRightResponsive();
  searchEvent();
}

async function getSearch(topicSearch, valueSearch) {
  const response = await axios.get(
    `http://localhost:7777/${topicSearch}?q=${valueSearch}`
  );
  return response.data;
}

function searchEvent() {
  let searchInput = document.querySelector(".header__search__input");
  let searchBtn = document.querySelector(".header__search__btn");
  let searchPopup = document.querySelector(".header__search__popup");
  let searchTitle = document.querySelector(".header__search__popup__title");
  let searchClear = document.querySelector(".header__search__popup__clear");
  let searchPopupContent = document.querySelector(
    ".header__search__popup__history"
  );
  searchInput.addEventListener("input", () => {
    // đang nhập input sẽ hiển thị các gợi ý
    setTimeout(async () => {
      if (searchInput.value !== "") {
        let resultSearch = await getSearch("products", searchInput.value);
        if (resultSearch.length !== 0) {
          searchTitle.innerHTML = "Từ khóa gợi ý";
          searchClear.style.display = "none";
          searchPopupContent.innerHTML = resultSearch
            .map(
              (rs) =>
                `<a href="./product.html?${rs.id}" class="header__search__popup__item" data-product-id="${rs.id}">${rs.name}</a>`
            )
            .join("");
        } else {
          searchTitle.innerHTML = "Từ khóa gợi ý";
          searchClear.style.display = "none";
          searchPopupContent.innerHTML = "Không có kết quả tương ứng!";
        }
      } else {
        searchTitle.innerHTML = "Lịch sử tìm kiếm";
        searchClear.style.display = "block";
        searchPopupContent.innerHTML = "Bạn chưa tìm kiếm!";
      }
    }, 1000);
  });
  searchBtn.addEventListener("click", async (event) => {
    // bấm nút tìm kiếm sẽ dẫn đến trang tương ứng

    console.log(resultSearch);
  });
}

async function getById(request, id) {
  const response = await axios.get(" http://localhost:7777/" + request, {
    params: {
      id: id,
    },
  });
  return response.data;
}

async function getByProductId(request, productId) {
  const response = await axios.get(" http://localhost:7777/" + request, {
    params: {
      productId: productId,
    },
  });
  return response.data;
}

async function getByCateId(request, cateId) {
  const response = await axios.get(" http://localhost:7777/" + request, {
    params: {
      cateId: cateId,
    },
  });
  return response.data;
}

async function getProduct(request, idProduct) {
  const response = await axios.get(" http://localhost:7777/" + request, {
    params: {
      id: idProduct,
    },
  });
  return response.data;
}

async function callAPI(request) {
  const response = await axios.get("http://localhost:7777/" + request);
  return response.data;
}

function renderCartNum(carts) {
  let cartNum = document.querySelector(".header__cart__number");
  cartNum.innerHTML = carts.length;
}

//lấy địa chỉ hiện tại và trả về giá trị sau dấu ?
function phanTich_URL() {
  let afterQuestionMark = window.location.href.split("?")[1]; //lấy tên từ đường dẫn
  return afterQuestionMark;
}

// tính phần trăm giảm giá
function caculateSave(price, discount) {
  return (((price - discount) / price) * 100).toFixed(1);
}

// định dạng tiền
function formatCurrency(n, currency) {
  return n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,") + currency;
}

function addHeader() {
  document.querySelector(".header").innerHTML = `
            <div class="container">
                <div class="row g-0">
                    <div class="col-2 col-sm-2 col-md-2 col-lg-1 col-xl-1 col-xxl-1 align-self-center">
                        <a class="navbar-brand nav__logo" href="./index.html">
                            <img src="../assets/img/logo2.png" alt="Logo" class="rounded-pill header__logo"> 
                        </a>
                    </div>
                    <div class="col-9 col-sm-9 col-md-9 col-lg-5 col-xl-6 col-xxl-6 align-self-center">
                        <div class="header__search">
                          <div class="dropdown w-100">
                            <input type="text" class="dropdown-toggle header__search__input" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"/  placeholder="Nhập từ khóa tìm kiếm sản phẩm">
                            <ul class="dropdown-menu header__search__popup" aria-labelledby="dropdownMenuButton1" >
                              <div class="dropdown-item">
                                <header class="header__search__popup__title">
                                  Lịch sử tìm kiếm
                                </header>
                                <div class="header__search__popup__history">
                                  Bạn chưa tìm kiếm!
                                </div>
                                <footer>
                                  <button class="header__search__popup__clear">Xóa lịch sử</button>
                                </footer>
                              </div>
                            </ul>
                          </div>
                          <button class="header__search__btn">
                            <i class="fa-solid fa-magnifying-glass"></i>
                          </button>
                        </div>
                    </div>
                    <div class="col-0 col-sm-0 col-md-0 col-lg-6 col-xl-5 col-xxl-5 d-lg-block d-xl-block d-xxl-block">
                        <div class="header__right">
                            <div class="header__right__container">
                                <div class="header__right__item header__right__item--close-btn d-lg-none d-xl-none d-xxl-none">
                                    <i class="bi bi-x-square"></i>
                                </div>
                                <div class="header__right__item header__notify">
                                    <span class=""><i class="bi bi-bell"></i>Thông báo</span> 
                                    <ul class="header__notify__list">
                                        <div class="no-notice">
                                            
                                        </div>
                                        <li class="right__item-notify__item ">
            
                                        </li>
                                    </ul>
                                </div>
                                <div class="header__right__item header__support">
                                    <span class=""><i class="bi bi-question-circle"></i>Hỗ trợ</span>
                                </div>
                                <a class="header__right__item header__cart" href="./cart.html">
                                    <span class="header__cart__icon">
                                        <i class="bi bi-cart-dash">
                                            <span class="header__cart__number">1</span>
                                        </i>Giỏ hàng
                                    </span>
                                </a>
                                <div class="header__right__item header__account js-account-btn">
                                    <span class=""><i class="bi bi-person"></i></i>Tài khoản</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1 col-xxl-1 d-lg-none d-xl-none d-xxl-none align-self-center justify-item-center">
                        <button class="header__right-btn btn" type="button">
                            <i class="bi bi-justify"></i>
                        </button>
                    </div>
                </div>
            </div>`;
}

function addFooter() {
  document.querySelector(".footer").innerHTML = `
        <div class="container">
            <div class="row g-3">
                <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                    <h3 class="footer__title">Thông tin công ty</h3>
                    <ul class="footer__list">
                        <li class="footer__item">
                            <a href="">Giới thiệu công ty</a>
                        </li>
                        <li class="footer__item">
                            <a href="">Chính sách bảo mật</a>
                        </li>
                        <li class="footer__item">
                            <a href="">Quy chế hoạt động</a>
                        </li>
                        <li class="footer__item">
                            <a href="">Góp ý, khiếu nại</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                    <h3 class="footer__title">Thông tin công ty</h3>
                    <ul class="footer__list">
                        <li class="footer__item">
                            <a href="">Chính sách đổi trả</a>
                        </li>
                        <li class="footer__item">
                            <a href="">Hệ thống bảo hành</a>
                        </li>
                        <li class="footer__item">
                            <a href="">Chính sách trả góp</a>
                        </li>
                        <li class="footer__item">
                            <a href="">Hướng dẫn mua hàng</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                    <h3 class="footer__title">Chăm sóc khách hàng</h3>
                    <ul class="footer__list">
                        <li class="footer__item">
                            <h4 class="footer__hotline-title">Gọi mua, đặt hàng</h4>
                            <h3 class="footer__hotline-number">0000 0000</h3>
                        </li>
                        <li class="footer__item">
                            <h4 class="footer__hotline-title">Hỗ trợ kỹ thuật</h4>
                            <h3 class="footer__hotline-number">0000 0000</h3>
                        </li>
                        <li class="footer__item">
                            <h4 class="footer__hotline-title">Trung tâm bảo hành</h4>
                            <h3 class="footer__hotline-number">0000 0000</h3>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                    <h3 class="footer__title">Liên hệ</h3>
                    <ul class="footer__list">
                        <li class="footer__item">
                            <h4 class="footer__hotline-title">Email: </h4>
                            <h3 class="footer__hotline-number">quanpm2.22ns@vku.udn.vn</h3>
                        </li>
                        <li class="footer__item footer__item--social">
                            <a href="" class="facebook-color "><i class="fa-brands fa-square-facebook"></i></a>
                            <a href="" class="youtube-color "><i class="fa-brands fa-youtube"></i></a>
                            <a href="" class=""><i class="fa-brands fa-instagram"></i></a>
                            <a href="" class=""><i class="fa-brands fa-tiktok"></i></a>
                            <a href="" class="facebook-color "><i class="fa-brands fa-twitter"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>`;
  document.querySelector(".copyright").innerHTML = `
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
          <span class="copyright__txt"><i class="fa-regular fa-copyright"></i>4/2023 Phan Minh Quan 22NS054 (phanquan277)</span>
        </div>
      </div>
    </div>`;
}

function addAccountForm() {
  document.querySelector("#account-form").innerHTML = `
    <div class="sign-iu-form js-sign-iu-form">
        <div class="sign-iu-form__close js-sign-iu-close">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <h3 class="sign-iu-form__title">Chào mừng bạn đến với PQ STORE <br> Laptop, PC, Màn hình, linh kiện và phụ kiện Chính Hãng!</h3>
        <button class="sign-iu-form__btn sign-iu-form__btn--bg-fb">
            <i class="fa-brands fa-square-facebook"></i>
            <p>Tiếp tục với Facebook</p>
        </button>
        
        <button class="sign-iu-form__btn sign-iu-form__btn--bg-gg">
            <i class="fa-brands fa-google"></i>
            <p>Tiếp tục với Google</p>
        </button>

        <div class="sign-iu-form__next-line">Hoặc</div>

        <button class="sign-iu-form__btn sign-iu-form__btn--bg-phone">
            <i class="fa-solid fa-phone"></i>
            <p>Tiếp tục với số điện thoại</p>
        </button>
    </div>`;
}

// xử lí sự kiện ẩn hiện form account
function accountEvent() {
  const accountBtn = document.querySelector(".js-account-btn");
  const signIUOverlay = document.querySelector(".js-sign-iu-overlay");
  const signIUClose = document.querySelector(".js-sign-iu-close");
  const signIUForm = document.querySelector(".js-sign-iu-form");
  function showSignIUForm() {
    signIUOverlay.classList.add("d-flex");
  }
  function hideSignIUForm() {
    signIUOverlay.classList.remove("d-flex");
  }

  accountBtn.addEventListener("click", showSignIUForm); //hiển thị form
  signIUClose.addEventListener("click", hideSignIUForm); //đóng bằng nút close
  signIUOverlay.addEventListener("click", hideSignIUForm); //đóng bằng lớp overlay

  signIUForm.addEventListener("click", function (event) {
    event.stopPropagation(); //hàm ngăn nổi bọt
  });
}

function footerPopupMobile() {
  // footer popup mobile
  let footerTitle = document.getElementsByClassName("footer__title");
  let footerList = document.getElementsByClassName("footer__list");
  for (let i = 0; i < footerTitle.length; i++) {
    footerTitle[i].addEventListener(
      "click",
      function () {
        if (footerList[i].classList.contains("open")) {
          footerList[i].classList.remove("open");
        } else {
          footerList[i].classList.add("open");
        }
      },
      false
    );
  }
}

function headerRightResponsive() {
  let headerRightOverlay = document.querySelector(".header__right");
  let headerRightContainer = document.querySelector(
    ".header__right__container"
  );
  let headerRightBtn = document.querySelector(".header__right-btn");
  let closeBtn = document.querySelector(".header__right__item--close-btn");

  headerRightBtn.addEventListener("click", showFlex);
  closeBtn.addEventListener("click", hideFlex);
  headerRightOverlay.addEventListener("click", hideFlex);

  headerRightContainer.addEventListener("click", function (event) {
    event.stopPropagation(); //hàm ngăn nổi bọt
  });
  function showFlex() {
    headerRightOverlay.classList.add("d-flex");
  }
  function hideFlex() {
    headerRightOverlay.classList.remove("d-flex");
  }
}
