// hàm render các mục chung
function addHeader(){
    document.write(`
        <header class="header">
            <div class="container">
                <div class="row g-1">
                    <div class="col-2 col-sm-2 col-md-2 col-lg-1 col-xl-1 col-xxl-1 align-self-center">
                        <a class="navbar-brand nav__logo" href="./index.html">
                            <img src="../assets/img/logo2.png" alt="Logo" class="rounded-pill header__logo"> 
                        </a>
                    </div>
                    <div class="col-9 col-sm-9 col-md-9 col-lg-5 col-xl-6 col-xxl-6 align-self-center">
                        <div class="header__search">
                            <input type="text" class="header__search__input" placeholder="Nhập từ khóa tìm kiếm sản phẩm">
                            <div class="header__search__popup">
                                <header>Lịch sử tìm kiếm</header>
                                <ul class="header__search__popup__history">
                                    <li class="header__search__popup__item">Hdd 1tb santa 2.5</li>
                                    <li class="header__search__popup__item">Ram ddr4 8gb</li>
                                    <li class="header__search__popup__item">Tai nghe chụp tai gaming
                                    </li>
                                </ul>
                                <footer>
                                    <button>Xóa lịch sử</button>
                                </footer>
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
            </div>
        </header>`
    )
}

//cần tạo db bảng banner
function addBanner(){
    document.write(`
        <div class="banner page-section">
            <div class="container">
                <div class="row g-1">
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                        <img class="banner__img" src="https://promotions.newegg.com/nepro/23-0103/800x120.jpg" alt="Banner">
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                        <img class="banner__img" src="https://promotions.newegg.com/nepro/23-0505/800x120.jpg" alt="Banner">
                    </div>
                </div>
            </div>
        </div>
    `)
}

function addFooter(){
    //render footer
    document.write(`
    <footer class="footer page-section">
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
        </div>
    </footer>
    `)
    //render copyright
    document.write(`
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                        <span class="copyright__txt"><i class="fa-regular fa-copyright"></i>4/2023 Phan Minh Quan 22NS054 (phanquan277)</span>
                </div>
            </div>
        </div>
    </div>
    `)
}

function addAccountForm(){
    document.write(`
    <form class="sign-iu-form__overlay js-sign-iu-overlay" action="">
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
        </div>
    </form>
    `)
}

// xử lí sự kiện ẩn hiện form account
function accountEvent(){
    const accountBtn = document.querySelector('.js-account-btn')
    const signIUOverlay = document.querySelector('.js-sign-iu-overlay')
    const signIUClose = document.querySelector('.js-sign-iu-close') 
    const signIUForm = document.querySelector('.js-sign-iu-form')
    function showSignIUForm() {
        signIUOverlay.classList.add('d-flex');
    }
    function hideSignIUForm() {
        signIUOverlay.classList.remove('d-flex');
    }
    
    accountBtn.addEventListener('click', showSignIUForm) //hiển thị form
    signIUClose.addEventListener('click', hideSignIUForm) //đóng bằng nút close
    signIUOverlay.addEventListener('click', hideSignIUForm) //đóng bằng lớp overlay
    
    signIUForm.addEventListener('click', function(event){
        event.stopPropagation() //hàm ngăn nổi bọt
    })
}

function footerPopupMobile(){
    // footer popup mobile 
    let footerTitle = document.getElementsByClassName('footer__title');
    let footerList = document.getElementsByClassName("footer__list");
    for (let i = 0; i < footerTitle.length; i++) {
        footerTitle[i].addEventListener('click', function(){
            if(footerList[i].classList.contains("open")){
                footerList[i].classList.remove("open");
                console.log(footerList[i])
            }else {
                console.log(footerList[i])
                footerList[i].classList.add("open");
            }
        }, false);
    }
}

function headerRightResponsive(){
    let headerRightOverlay = document.querySelector(".header__right");
    let headerRightContainer = document.querySelector(".header__right__container");
    let headerRightBtn = document.querySelector(".header__right-btn");
    let closeBtn = document.querySelector(".header__right__item--close-btn");

    headerRightBtn.addEventListener('click', showFlex);
    closeBtn.addEventListener('click', hideFlex);
    headerRightOverlay.addEventListener('click', hideFlex); 

    headerRightContainer.addEventListener('click', function(event){
        event.stopPropagation() //hàm ngăn nổi bọt
    })
    function showFlex() {
        headerRightOverlay.classList.add('d-flex');
    }
    function hideFlex() {
        headerRightOverlay.classList.remove('d-flex');
    }
}