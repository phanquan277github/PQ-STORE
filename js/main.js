// quản lí sản phẩm trang index
const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)

//tạo danh sách các danh mục bên trong gồm các sản phẩm của mỗi danh mục
// sử lí render item lấy ra từ danh sách
// listBlock: danh sách muốn render | parentBlock danh sách cha của listBlock
function renderItem(listBlock, parentBlock, id){
    const htmls = listBlock.map((item, index) => {
        return `
            <div class="col l-2-4 m-3 c-6">
                <div class="products-item" cate-id="${id}" item-id="${index}">
                    <img src="${item.pictures[0]}" alt="" class="products-item__avata">
                    <span class="products-item__name">${item.name}</span>
                    <div class="products-item__price-container">
                        <span class="products-item__discount">${item.discount}₫</span>
                        <span class="products-item__price">${item.price}₫</span>
                    </div>
                    <footer class="products-item__footer">
                        <li class="tag-list__item tag-is-skeweb tag-deal-color">Save ${(((item.price - item.discount)/item.price)*100).toFixed(1)}%</li>
                        <div class="tag-free-ship">${item.ship}</div>
                    </footer>
                    <div class="products-item__describe-popup">
                        <a class="products-item__name products-item__name--popup-modify js-move-to-product" href="./product.html" id="${index}">${item.name}</a>
                        <ul>
                            ${item.shortDescription.map(desc => {
                                return `<li>${desc}</li>`
                            }).join("")}
                        </ul>
                    </div>
                </div>
            </div>
        `
    });
    parentBlock.querySelector(".js-product-list").innerHTML = htmls.join(" ");
    // parentBlock.setAttribute("id", "")
}

//duyệt qua danh sách và render
listCategory.map(value => {
    renderItem(value.list, value.selector, value.id);
})

var moveToProductPage = document.querySelectorAll(".products-item__name.js-move-to-product")
moveToProductPage.forEach(item => {
    item.onclick = () => {
        let itemId = Number(item.getAttribute("id"))
        let cateId = Number(item.parentElement.parentElement.getAttribute("cate-id"))
        
        
        listCategory.map((item) => {
            if(item.id === cateId) {
                // renderWrapper();
                renderProducts(item.list[itemId])
            }
        })
        function renderWrapper(){
            let wrapper = $(".wrapper")
            wrapper.innerHTML = `
                <!-- container -->
                <div class="grid wide">
                    <div class="container product--mrtop">
                        <div class="grid">
                            <div class="row">
                                <div class="col l-5">
                                    <div class="product-left">
                                        <ul class="product-left__slider">
                                            <li id="product-slide1">
                                                <img src="https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2023/1/31/638107706869598466_pc-gaming-e-power-i7g11-3060ti-i7-11700f-den-1.jpg"
                                                alt="" class="product-left__img">
                                            </li>
                                            <li id="product-slide2">
                                                <img src="https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2022/11/15/638041278650807886_HASP-EPOWER-F3060-6.jpg"
                                                alt="" class="product-left__img">
                                            </li>
                                            <li id="product-slide3">
                                                <img src="https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2022/11/15/638041278650019796_HASP-EPOWER-F3060-3.jpg"
                                                alt="" class="product-left__img">
                                            </li>
                                        </ul>
                                        <!-- <div class="product-left__switch">
                                            <a href="#product-slide1"></a>
                                            <a href="#product-slide2"></a>
                                            <a href="#product-slide3"></a>
                                            <a href="#product-slide1"></a>
                                            <a href="#product-slide1"></a>
                                            <a href="#product-slide1"></a>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="col l-7">
                                    <div class="product-right">
                                        <h1 class="product-right__title">PC Gaming E-Power i7G12 - 3060Ti i7 12700F/16GB/500GB/750W/RTX 3060 Ti</h1>
                                        <div class="product-right__price">
                                            <h2 class="product-right__price-new">33.590.000₫</h2>
                                            <h3 class="product-right__price-old">00.000.000đ</h3>
                                        </div>
                                        <ul class="product-right__features">
                                            <li>Intel, Core i7, 12700F</li>
                                            <li>16 GB, DDR4, 3200 MHz</li>
                                            <li>SSD 500 GB</li>
                                            <li>NVIDIA GeForce RTX 3060 Ti 8GB</li>
                                        </ul>
                                        <div class="row">
                                            <div class="col l-6">
                                                <ul class="product-right__policy">
                                                    <li><i class="fa-solid fa-truck"></i>Giao hàng miễn phí</li>
                                                    <li><i class="fa-solid fa-award"></i>Hàng chính hãng</li>
                                                </ul>
                                            </div>
                                            <div class="col l-6">
                                                <ul class="product-right__policy">
                                                    <li><i class="fa-sharp fa-solid fa-shield"></i>Bảo hành 24 tháng</li>
                                                    <li><i class="fa-solid fa-gear"></i>Hỗ trợ lắp ráp - cài đặt miễn phí</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row no-gutters">
                                            <div class="col l-12 no-gutters">
                                                <div class="product-right__buy-btn">MUA NGAY</div>
                                            </div>
                                            <div class="col l-6 no-gutters">
                                                <div class="product-right__buy-add-cart">Thêm vào giỏ</div>
                                            </div>
                                            <div class="col l-6 no-gutters">
                                                <div class="product-right__buy-installment">Trả góp 0%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col l-7">
                                    <h2 class="product-title">Mô tả sản phẩm</h2>
                                    <div class="product-describe-detail">
                                        <h2 class="product-describe-detail__title">Đánh giá chi tiết</h2>
                                        <p>Bạn cần một case máy tính chơi game thật sự mạnh để chiến các game AAA với thiết lập đồ họa Ultra nhưng vẫn phải có giá tốt, hợp túi tiền. PC Gaming E-Power G1660ti chính là điều bạn đang tìm kiếm với sự kết hợp tuyệt vời của Intel Core i5 10400F, GTX 1660 Ti và SSD NVMe siêu nhanh.</p>
                                        <h3>Card đồ hoạ ASUS TUF GTX 1660Ti 6GB GDDDR6 phiên bản ép xung (OC) siêu mạnh, siêu bền</h3>
                                        <p>Để có được hiệu năng chơi game đỉnh với fps cao và ổn định, PC Gaming E-Power G1660ti sử dụng card đồ họa ASUS TUF GTX 1660 Ti 6GB GDDDR6. Đây là card đồ họa thuộc dòng TUF siêu bền từ ASUS, với thiết kế quạt vòng bi kép tuổi thọ lâu gấp đôi, chuẩn chống bụi IP5X, quy trình sản xuất tự động Auto-Extreme nghiêm ngặt và khả năng tương thích hoàn hảo với bo mạch chủ. Hiệu năng chơi game từ TUF GTX 1660 Ti là không phải bàn cãi khi card đồ họa này mạnh ngang ngửa GTX 1070, sử dụng kiến trúc Turing tiên tiến, đủ để bạn chơi tốt các tựa game AAA ở thiết lập đồ họa Ultra, Full HD.</p>
                                        <h3>Mainboard ASUS Prime B560M-A mạnh mẽ, hoạt động mát mẻ</h3>
                                        <p>PC Gaming E-Power G1660ti sử dụng bo mạch chủ ASUS Prime B560M-A. Với thiết kế nguồn mạnh mẽ, giải pháp làm mát toàn diện và các tùy chọn điều chỉnh thông minh, ASUS Prime B560M-A là sự lựa chọn hoàn hảo cho một bo mạch chủ bền bỉ, khả năng nâng cấp lâu dài. Đồng thời kiểu dáng hoàn thiện đen – trắng thời trang cũng giúp cho PC của bạn phong cách hơn. Sẽ có 2 khe cắm thẻ nhớ M.2 cùng loạt kết nối cực nhanh bao gồm PCIe 4.0, Intel 1Gb Ethernet, USB 3.2 Gen 2 (Type-A & Type-C) cho bạn khả năng kết nối tuyệt vời.  </p>
                                        <h3>CPU Intel Core i5 10400F chiến mượt mọi tựa game</h3>
                                        <p>Là bản nâng cấp của con chip 9400F từng được game thủ yêu thích, Intel Core i5 10400F tiếp tục là sự lựa chọn lý tưởng cho máy tính chơi game tầm trung. Bạn sẽ được trải nghiệm sức mạnh của 6 lõi 12 luồng, tốc độ 2.90 – 4.30 GHz, bộ nhớ đệm 12MB trong khi mức tiêu thụ điện vẫn chỉ là 65W. Với sự kết hợp cùng card đồ họa rời, Intel Core i5 10400F sẽ không gặp khó khăn gì khi chơi các tựa game phổ biến.</p>
                                        <h3>RAM có đèn LED thể hiện cá tính</h3>
                                        <p>Trên chiếc PC Gaming E-Power G1660ti, bạn sẽ được lắp sẵn RAM 8GB ADATA XPG Spectrix D41 RGB. ADATA XPG Spectrix D41 RGB luôn là dòng RAM được người dùng yêu thích khi không chỉ cho hiệu năng ổn định mà còn có thiết kế tuyệt đẹp và tích hợp đèn LED RGB có thể tùy chỉnh. Bạn sẽ có thể thoải mái chơi game, chạy đa nhiệm, đồng thời máy tính cũng có vẻ bề ngoài thời trang hơn rất nhiều.</p>
                                        <h3>Nguồn thương hiệu Cooler Master danh tiếng</h3>
                                        <p>Không chỉ đủ mà bạn hoàn toàn sử dụng một cách thoải mái mà không lo về nguồn với công suất 600W của Cooler Master Elite V3. Đây là nguồn máy tính được chứng nhận 80 Plus White, cho hiệu suất trên 80%, khả năng chịu nhiệt lên tới 40 độ C, hoạt động hiệu quả ở mọi môi trường. Nguồn máy tính công suất cao và bền bỉ giúp PC Gaming E-Power G1660ti luôn hoạt động tốt, ngay cả khi bạn có nhu cầu nâng cấp máy tính sau này.</p>
                                        <h3>Tản nhiệt khí CPU ID-COOLING SE-214-XT ARGB</h3>
                                        <p>Để tản nhiệt hiệu quả cho CPU, đồng thời trang trí chiếc PC của bạn thêm phần bắt mắt, PC Gaming E-Power G1660ti sử dụng tản nhiệt khí ID-Cooling SE-214-XT ARGB. Đây là tản nhiệt khí được đánh giá cao trong phân khúc giá rẻ với thiết kế nhỏ gọn, TDP ấn tượng 180W và tản nhiệt hiệu quả nhờ 4 ống đồng công nghệ H.D.T v3.0 tăng diện tích tiếp xúc tới 30%, mạ niken chống oxy hóa, top cover thiết kế phay xước chắc chắn.</p>
                                        <h3>Tốc độ cực khủng của SSD Silicon Power UD80 M.2 NVMe</h3>
                                        <p>SSD Silicon Power UD80 là ổ cứng có tốc độ nhanh nhất trong tầm giá với tốc độ đọc lên tới 3400 MB/s và tốc độ ghi lên tới 3000 MB/s. Bạn sẽ cảm nhận được sự khác biệt rõ rệt trong từng thao tác trên PC Gaming E-Power G1660ti. Giao thức PCIe 3.0 cùng công nghệ NVMe tạo nên trải nghiệm liền mạch, không gián đoạn tức lúc bạn khởi động máy, chạy phần mềm cho đến khi tắt máy tính. Dung lượng 250GB là đủ để cài hệ điều hành và một số game yêu thích.</p>
                                    </div>
                                </div>
                                <div class="col l-5">
                                    <h1 class="product-title">Thông số kỹ thuật</h1>
                                    <div class="product-specifications">
                                        <h2 class="product-specifications__item-title">Thông tin hàng hóa</h2>
                                        <div class="product-specifications__item-content"><span>Thương hiệu: E-Power</span> Xuất xứ: Việt Nam</div>
                                        <div class="product-specifications__item-content"><span>Thời điểm ra mắt: 2022</span>Thời gian bảo hành: 36 tháng</div>
        
                                        <h2 class="product-specifications__item-title">Thiết kế & trọng lượng</h2>
                                        <div class="product-specifications__item-content"><span>Kích thước</span> 338 x 255 x335 mm</div>
                                        <div class="product-specifications__item-content"><span>Trọng lượng sản phẩm</span> 5000 g</div>
                                        <div class="product-specifications__item-content"><span>Kiểu dáng thiết kế</span> PC lắp ráp</div>
                                        <div class="product-specifications__item-content"><span>Loại Case</span> MID tower</div>
                                        <div class="product-specifications__item-content"><span>Màu sắc</span> Đen</div>
                                        <div class="product-specifications__item-content"><span>Chất liệu</span> Kim loại - kính cường lực</div>
        
                                        <h2 class="product-specifications__item-title">Bộ xử lý</h2>
                                        <div class="product-specifications__item-content"><span>Hãng CPU </span> Intel</div>
                                        <div class="product-specifications__item-content"><span>Công nghệ CPU </span> Core i7 </div>
                                        <div class="product-specifications__item-content"><span> Loại CPU </span> 12700F </div>
                                        <div class="product-specifications__item-content"><span> Số Nhân </span> 12 </div>
                                        <div class="product-specifications__item-content"><span> Số luồng </span> 20 </div>
                                        <div class="product-specifications__item-content"><span> Bộ nhớ đệm </span> 25 MB </div>
                                        <div class="product-specifications__item-content"><span> Tốc độ CPU </span> Tối đa 4.9 GHz</div>
        
                                        <h2 class="product-specifications__item-title">Main</h2>
                                        <div class="product-specifications__item-content"><span> Chipset </span> Intel B660 </div>
                                        <div class="product-specifications__item-content"><span> Kích thước Mainboard </span> m-ATX</div>
                                        <div class="product-specifications__item-content"><span> Khe RAM tối đa </span> 4 khe </div>
                                        <div class="product-specifications__item-content"><span> Số khe RAM còn lại </span> 2 </div>
                                        <div class="product-specifications__item-content"><span> Hỗ trợ RAM tối đa </span> 128GB </div>
        
                                        <h2 class="product-specifications__item-title">RAM</h2>
                                        <div class="product-specifications__item-content"><span> Dung lượng RAM </span> 16GB</div>
                                        <div class="product-specifications__item-content"><span> Loại RAM </span> DDR4</div>
                                        <div class="product-specifications__item-content"><span> Tốc độ RAM </span> 3200Hz</div>
        
                                        <h2 class="product-specifications__item-title">Card đồ họa</h2>
                                        <div class="product-specifications__item-content"><span> Hãng </span> NVIDIA </div>
                                        <div class="product-specifications__item-content"><span> Model </span> GeForce RTX 3060 Ti</div>
                                        <div class="product-specifications__item-content"><span> Bộ nhớ </span> 8 GB GDDR6X</div>
        
                                        <h2 class="product-specifications__item-title">Lưu trữ</h2>
                                        <div class="product-specifications__item-content"><span> Kiểu ổ cứng </span> SSD </div>
                                        <div class="product-specifications__item-content"><span> Tổng số khe cắm SSD/HDD </span> 5 </div>
                                        <div class="product-specifications__item-content"><span> Số khe SSD/HDD còn lại </span> 4 </div>
                                        <div class="product-specifications__item-content"><span> Loại SSD </span> M2. PCIe </div>
                                        <div class="product-specifications__item-content"><span> Dung lượng </span> 500 GB </div>
                                        <div class="product-specifications__item-content"><span> Tốc độ đọc/ghi </span> 2100 MB/s Ghi | 3500 Mb/s Đọc</div>
                                        <div class="product-specifications__item-content"><span> Chuẩn M2 </span> 2280</div>
        
                                        <h2 class="product-specifications__item-title">Giao tiếp & kết nối</h2>
                                        <div class="product-specifications__item-content"><span>1 DisplayPort</span> <span>1 HDMI</span> </div>
                                        <div class="product-specifications__item-content"><span>1 LAN</span> <span>1 Optical S/PDIF out port</span></div>
                                        <div class="product-specifications__item-content"><span>1 Type C</span> <span>1 USB 3.2 Gen 1</span></div>
                                        <div class="product-specifications__item-content"><span>2 USB 2.0</span> <span>4 USB 3.2 Gen 2</span></div>
                                        <div class="product-specifications__item-content"><span>5 Jack 3.5 mm</span></div>
        
                                        <h2 class="product-specifications__item-title">Bộ nguồn</h2>
                                        <div class="product-specifications__item-content"><span>Công suất bộ nguồn</span> 750W</div>
        
                                        <h2 class="product-specifications__item-title">Phụ kiện trong hộp</h2>
                                        <div class="product-specifications__item-content"><span>Phụ kiện trong hộp</span> Dây nguồn</div>       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `
        }

        function renderProducts(item){
            let productLeft = $(".product-left")
            let productRight = $(".product-right")
            productRight.querySelector(".product-right__title").innerText = item.name
            console.log(productRight.querySelector(".product-right__title").innerText = item.name)
            // productRight.innerHTML = `
            //     <h1 class="product-right__title">PC Gaming E-Power i7G12 - 3060Ti i7 12700F/16GB/500GB/750W/RTX 3060 Ti</h1>
            //     <div class="product-right__price">
            //         <h2 class="product-right__price-new">33.590.000₫</h2>
            //         <h3 class="product-right__price-old">00.000.000đ</h3>
            //     </div>
            //     <ul class="product-right__features">
            //         <li>Intel, Core i7, 12700F</li>
            //         <li>16 GB, DDR4, 3200 MHz</li>
            //         <li>SSD 500 GB</li>
            //         <li>NVIDIA GeForce RTX 3060 Ti 8GB</li>
            //     </ul>
            //     <div class="row">
            //         <div class="col l-6">
            //             <ul class="product-right__policy">
            //                 <li><i class="fa-solid fa-truck"></i>Giao hàng miễn phí</li>
            //                 <li><i class="fa-solid fa-award"></i>Hàng chính hãng</li>
            //             </ul>
            //         </div>
            //         <div class="col l-6">
            //             <ul class="product-right__policy">
            //                 <li><i class="fa-sharp fa-solid fa-shield"></i>Bảo hành 24 tháng</li>
            //                 <li><i class="fa-solid fa-gear"></i>Hỗ trợ lắp ráp - cài đặt miễn phí</li>
            //             </ul>
            //         </div>
            //     </div>
            //     <div class="row no-gutters">
            //         <div class="col l-12 no-gutters">
            //             <div class="product-right__buy-btn">MUA NGAY</div>
            //         </div>
            //         <div class="col l-6 no-gutters">
            //             <div class="product-right__buy-add-cart">Thêm vào giỏ</div>
            //         </div>
            //         <div class="col l-6 no-gutters">
            //             <div class="product-right__buy-installment">Trả góp 0%</div>
            //         </div>
            //     </div>
            // `
        }
    }
})