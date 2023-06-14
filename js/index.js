indexEvent();
async function indexEvent() {
  let categories = await callAPI("categories");
  let products = await callAPI("products");
  let pictures = await callAPI("pictures");
  addCategory(categories);
  addSlideshow(products, categories, pictures);
  addTodayBestDeal(products);
  addBanner();
  addSpotlight();
}

function addCategory(categories) {
  let htmls = categories
    .map((item) => {
      let linkCategory = "./category.html?" + item.id;
      return `<a class="category__item" href="${linkCategory}">
                    <img src="${item.img}" alt="category img">
                    <h5>${item.name}</h5>
                </a>`;
    })
    .join("");
  document.querySelector(".category-container").innerHTML = `
            <div class="container">
                <div class="category__list">
                    ${htmls}
                </div>
            </div>
        </div>
    `;
}

// render slideshow
async function addSlideshow(products, categories) {
  let hotProductsAdmin = await callAPI("hotProducts");
  let hotCategoriesAdmin = await callAPI("hotCategories");
  let hotProducts = products.filter((prod) =>
    hotProductsAdmin.map((prodId) => prodId).includes(prod.id)
  );
  let hotCategories = categories.filter((prod) =>
    hotCategoriesAdmin.map((cate) => cate).includes(prod.id)
  );

  document.querySelector(".slideshow-container").innerHTML = `
    <div class="container">
      <div class="row">
        <div class="col">
          <div id="demo" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators slideshow--carousel-indicators">
              <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
              <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
              <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner">
                <div class="obj-fit-contain carousel-item active">
                    <img src="https://promotions.newegg.com/nepro/23-0488/1920x660@2x.jpg" alt="error" class="d-block w-100">
                </div>
                <div class="obj-fit-contain carousel-item">
                    <img src="https://promotions.newegg.com/nepro/23-0522/1920x660.jpg" alt="error" class="d-block w-100">
                </div>
                <div class="obj-fit-contain carousel-item">
                    <img src="https://promotions.newegg.com/marketplace/23-0534/1920x660@2x.png" alt="error" class="d-block w-100">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="slideshow__pre-btn carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="slideshow__next-btn carousel-control-next-icon"></span>
            </button>
                
            <!-- gợi ý của sildershow -->
            <div class="row g-3 slideshow__suggest-container">
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                    <div class="slideshow__suggest">
                        <div class="slideshow__suggest__title">
                          <h2 class="auto-hidden-text-1line">Hi, 'tên người dùng'</h2>
                        </div>
                        <div class="slideshow__suggest__content overflow-hidden">
                            <p class="slideshow__suggest__welcome-txt">Chào mừng đến với <span>PQ Store</span>! Hy vọng bạn thích mua sắm ở đây ngày hôm nay. Nếu bạn có bất kỳ nhận xét hoặc đề xuất nào, vui lòng để lại
                                <a href="#">phản hồi</a> cho chúng tôi
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
                    <div class="slideshow__suggest">
                        <div class="slideshow__suggest__title">
                          <h2 class="auto-hidden-text-1line">Chuyên mục có thể bạn quan tâm</h2>
                        </div>
                        <div class="row slideshow__suggest__content">
                                ${hotCategories
                                  .map((item) => {
                                    return `<div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                                                    <a href="./category.html?${item.id}" class="slideshow__item-link">
                                                        <img class="slideshow__item-img" src="${item.img}" alt="">
                                                        <footer class="slideshow__item-name">${item.name}</footer>
                                                        </a>
                                                      </div>`;
                                  })
                                  .join("")}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-4 hide-on-mobile">
                    <div class="slideshow__suggest">
                        <div class="slideshow__suggest__title">
                          <h2 class="auto-hidden-text-1line">Sản phẩm có thể bạn quan tâm</h2>
                        </div>
                        <div class="slideshow__suggest__content">
                            <div class="row h-100">
                                ${hotProducts
                                  .map((item) => {
                                    return `
                                            <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4 h-100 position-relative slideshow__item-product--popup">
                                                <img class="slideshow__item-product" src="${
                                                  item.avata
                                                }" alt="">
                                                <a href="./product.html?${
                                                  item.id
                                                }" class="slideshow__item-popup">
                                                    <img src="${
                                                      item.avata
                                                    }"alt="" class="slideshow__suggest--img products-item__avata">
                                                    <span class="slideshow__suggest--name products-item__name">${
                                                      item.name
                                                    }</span>
                                                    <span class="slideshow__suggest--new-price products-item__discount">${formatCurrency(
                                                      item.discount,
                                                      "₫"
                                                    )}</span>
                                                    <span class="slideshow__suggest--old-price products-item__price">${formatCurrency(
                                                      item.price,
                                                      "₫"
                                                    )}</span>
                                                </a>
                                            </div>`;
                                  })
                                  .join("")}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    `;
}

async function addTodayBestDeal(products) {
  const bestDeal = await callAPI("todayBestDeal");
  let bestDealProducts = products.filter((prod) =>
    bestDeal.map((item) => item).includes(prod.id)
  );
  document.querySelector(".best-deal-container").innerHTML = `
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <h1 class="container__title">Todays best deals</h1>
        </div>
      </div>
      <div class="row g-3">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-4">
          <div class="best-deal__product--first js-best-deal--first">
              <a class="products-item__name auto-hidden-text-3line" href="${
                "product.html?" + bestDealProducts[0].id
              }">${bestDealProducts[0].name}</a>
              <ul class="tag-list">
                  <li class="tag-list__item tag-is-skeweb tag-deal-color">Save ${caculateSave(
                    bestDealProducts[0].price,
                    bestDealProducts[0].discount
                  )}%</li>
                  <li class="tag-list__item tag-is-skeweb tag-gift-color">Free gift</li>
              </ul>
              <span class="products-item__discount">${formatCurrency(
                bestDealProducts[0].discount,
                "₫"
              )}</span>
              <span class="products-item__price">${formatCurrency(
                bestDealProducts[0].price,
                "₫"
              )}</span>
              <div class="best-deal__img"><img src="${
                bestDealProducts[0].avata
              }" alt=""></div>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-4">
          <div class="row g-3">
              ${bestDealProducts
                .map((item, index) => {
                  if (index !== 0 && index <= 2) {
                    return `<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                  <div class="best-deal__product--second">
                                      <div class="best-deal__product__left">
                                          <a class="products-item__name auto-hidden-text-3line" href="${
                                            "product.html?" + item.id
                                          }"">${item.name}</a>
                                          <ul class="tag-list">
                                              <li class="tag-list__item tag-is-skeweb tag-deal-color">Save ${caculateSave(
                                                item.price,
                                                item.discount
                                              )}%</li>
                                              <li class="tag-list__item tag-is-skeweb tag-gift-color">Free gift</li>
                                          </ul>
                                          <span class="products-item__discount best-deal__discount">${formatCurrency(
                                            item.discount,
                                            "₫"
                                          )}</span>
                                          <span class="products-item__price best-deal__price">${formatCurrency(
                                            item.price,
                                            "₫"
                                          )}</span>
                                      </div>
                                      <img src="${
                                        item.avata
                                      }" alt="" class=" best-deal__img--vertical">      
                                  </div>
                              </div>`;
                  }
                })
                .join("")}
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-4">
          <div class="row g-3">
              ${bestDealProducts
                .map((item, index) => {
                  if (index > 2) {
                    return `<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-12">
                                  <div class="best-deal__product--second">
                                      <div class="best-deal__product__left">
                                          <a class="products-item__name auto-hidden-text-3line" href="${
                                            "product.html?" + item.id
                                          }"">${item.name}</a>
                                          <ul class="tag-list">
                                              <li class="tag-list__item tag-is-skeweb tag-deal-color">Save ${caculateSave(
                                                item.price,
                                                item.discount
                                              )}%</li>
                                              <li class="tag-list__item tag-is-skeweb tag-gift-color">Free gift</li>
                                          </ul>
                                          <span class="products-item__discount best-deal__discount">${formatCurrency(
                                            item.discount,
                                            "₫"
                                          )}</span>
                                          <span class="products-item__price best-deal__price">${formatCurrency(
                                            item.price,
                                            "₫"
                                          )}</span>
                                      </div>
                                      <img src="${
                                        item.avata
                                      }" alt="" class=" best-deal__img--vertical">      
                                  </div>
                              </div>`;
                  }
                })
                .join("")}
          </div>
        </div>
      </div>
    </div>
    `;
}

async function addBanner() {
  const banners = await callAPI("banners");
  document.querySelector(".banner-container").innerHTML = `
    <div class="container">
      <div class="row g-3">
        ${banners
          .map((banner) => {
            return `<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                    <img class="banner__img" src="${banner.img}" alt="Banner">
                  </div>`;
          })
          .join("")}
      </div>
    </div>`;
}

async function addSpotlight() {
  const products = await callAPI("products");
  document.querySelector(".spotlight-container").innerHTML = `
    <div id="spotlight" class="container__list page-section">
      <div class="container__title-content">
        <h1 class="container__title">Có thể bạn quan tâm</h1>
        <div class="container__title__see-all-products">
          <a href="./category.html">Xem tất cả</a>
        </div>
      </div>
      <div class="row g-3">
          ${await renderItem(products)}
      </div>
    </div>`;
}

async function renderItem(listToRender) {
  let htmls = listToRender.map(async (prod) => {
    let shortDescription = await getByProductId("shortDescriptions", prod.id);
    let linkProduct = "./product.html?" + prod.id;
    return `
      <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
          <div class="products-item">
              <img src="${prod.avata}" alt="" class="products-item__avata">
              <span class="products-item__name">${prod.name}</span>
              <div class="products-item__price-container">
                  <span class="products-item__discount">${formatCurrency(
                    prod.discount,
                    "₫"
                  )}</span>
                  <span class="products-item__price">${formatCurrency(
                    prod.price,
                    "₫"
                  )}</span>
              </div>
              <footer class="products-item__footer">
                  <li class="tag-list__item tag-is-skeweb tag-deal-color">Save ${caculateSave(
                    prod.price,
                    prod.discount
                  )}%</li>
                  <div class="tag-free-ship">${prod.ship}</div>
              </footer>
              <div class="products-item__describe-popup">
                  <a class="products-item__name products-item__name--popup-modify js-move-to-product" href="${linkProduct}">${
      prod.name
    }</a>
                  <ul>
                    ${shortDescription[0].values
                      .map((desc) => {
                        return `<li>${desc}</li>`;
                      })
                      .join("")}
                  </ul>
              </div>
          </div>
      </div>
  `;
  });
  htmls = await Promise.all(htmls);
  return htmls.join("");
}
