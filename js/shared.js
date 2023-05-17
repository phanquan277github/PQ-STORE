// hàm render các mục chung
function addHeader(){
    document.write(`
        <header class="header">
            <div class="grid wide">
                <div class="row no-gutters">
                    <div class="col l-12 m-12 c-12">
                        <nav class="header__nav">
                            <div class="header__left">
                                <a href="./index.html" class="header__logo-mobile-tablet"><i class="fa-solid fa-shop"></i></a>
                                <a class="header__logo hide-on-mb-and-tab" href="./index.html"><img src="../assets/img/logo-noBG.png" alt="LOGO" class=""></a>
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
                            <div class="header__right">
                                <div class="header__item header__notify">
                                    <i class="padd-r-6 fa-regular fa-bell"></i>
                                    <span class="hide-on-mb-and-tab">Thông báo</span> 
                                    <ul class="header__notify__list">
                                        <div class="no-notice">
                                            
                                        </div>
                                        <li class="right__item-notify__item ">
    
                                        </li>
                                    </ul>
                                </div>
                                <div class="header__item header__support">
                                    <i class="padd-r-6 fa-sharp fa-regular fa-circle-question"></i>
                                    <span class="hide-on-mb-and-tab">Hỗ trợ</span>
                                </div>
                                <div class="header__item header__cart"><a href="./cart.html">
                                    <i class="header__cart__icon fa-solid fa-cart-shopping"><span class="header__cart__number">1</span></i>
                                    <span class="hide-on-mb-and-tab">Giỏ hàng</span>
                                </a></div>
                                <div class="header__item header__account js-account-btn">
                                    <i class="padd-r-6 fa-solid fa-user"></i>
                                    <span class="hide-on-mobile">Tài khoản</span>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        `
    )
}

//cần tạo db bảng banner
function addBanner(){
    document.write(`
        <div class="banner page-section">
            <div class="grid wide">
                <div class="row">
                    <div class="col l-6 m-6 c-12">
                        <img class="banner__img" src="https://promotions.newegg.com/nepro/23-0103/800x120.jpg" alt="Banner">
                    </div>
                    <div class="col l-6 m-6 c-12">
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
    <footer class="footer">
        <div class="grid wide">
            <div class="row">
                <div class="col l-3 m-3 c-6">
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
                <div class="col l-3 m-3 c-6">
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
                <div class="col l-3 m-3 c-6">
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
                <div class="col l-3 m-3 c-6">
                    <h3 class="footer__title">Liên hệ</h3>
                    <ul class="footer__list">
                        <li class="footer__item">
                            <h4 class="footer__hotline-title">Email: </h4>
                            <h3 class="footer__hotline-number">quanpm2.22ns@vku.udn.vn</h3>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    `)
    //render copyright
    document.write(`
    <div class="grid wide">
        <div class="row no-gutters">
            <div class="copyright">
                <span><i class="fa-regular fa-copyright"></i>4/2023 Phan Minh Quan 22NS054 (phanquan277)</span>

                <ul class="copyright__social">
                    <li class="copyright__social__item">
                        <a href="" class="facebook-color copyright__social__item-icon"><i
                                class="fa-brands fa-square-facebook"></i></a>
                    </li>
                    <li class="copyright__social__item">
                        <a href="" class="youtube-color copyright__social__item-icon"><i
                                class="fa-brands fa-youtube"></i></a>
                    </li>
                    <li class="copyright__social__item">
                        <a href="" class="copyright__social__item-icon"><i class="fa-brands fa-instagram"></i></a>
                    </li>
                    <li class="copyright__social__item">
                        <a href="" class="copyright__social__item-icon"><i class="fa-brands fa-tiktok"></i></a>
                    </li>
                    <li class="copyright__social__item">
                        <a href="" class="facebook-color copyright__social__item-icon"><i
                                class="fa-brands fa-twitter"></i></a>
                    </li>
                </ul>
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
    // lấy class
    const accountBtn = document.querySelector('.js-account-btn')
    const signIUOverlay = document.querySelector('.js-sign-iu-overlay')
    const signIUClose = document.querySelector('.js-sign-iu-close') 
    const signIUForm = document.querySelector('.js-sign-iu-form')
    // hàm thêm xóa class open
    function showSignIUForm() {
        signIUOverlay.classList.add('open-flex') //them class open
    }
    function hideSignIUForm() {
        signIUOverlay.classList.remove('open-flex') //xóa class open
    }
    //thêm sự kiện click vào các class ở trên và cho nó thực hiện hàm gì
    accountBtn.addEventListener('click', showSignIUForm) //hiển thị form
    signIUClose.addEventListener('click', hideSignIUForm) //đóng bằng nút close
    signIUOverlay.addEventListener('click', hideSignIUForm) //đóng bằng lớp overlay
    //ngăn sự kiện nổi bọt (khi click vào form sẽ không bị đóng vì thằng cha nó là overlay
    // có găn sự kiên click close nên thằng con cũng bị ảnh hưởng nổi bọt)
    signIUForm.addEventListener('click', function(event){
        event.stopPropagation() //hàm ngăn nổi bọt
    })
}

function slidershowEvent(){
    let slideIndex = 0;
    showSlides(slideIndex);
    // Next/previous controls
    var preBtn = document.querySelector(".slidershow__slides--pre");
    var nextBtn = document.querySelector(".slidershow__slides--next");
    
    preBtn.onclick = function(){
        showSlides(slideIndex += -1);
    }; 
    nextBtn.onclick = function(){
        showSlides(slideIndex += 1);
    };
    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("slidershow__slides");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex-1].style.display = "block";
    }

    // auto slides show 
    let slideIndexA = slideIndex;
    showSlidesAuto();
    function showSlidesAuto() {
    let i;
    let slides = document.getElementsByClassName("slidershow__slides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndexA++;
    if (slideIndexA > slides.length) {slideIndexA = 1}
        slides[slideIndexA-1].style.display = "block";
        setTimeout(showSlidesAuto, 8000); // Change image every 2 seconds
    }
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