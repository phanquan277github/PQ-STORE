productPage();
async function productPage() {
  let idProduct = +phanTich_URL();
  let product = await getProduct("products", idProduct);
  let pictures = await getByProductId("pictures", idProduct);
  let shortDescriptions = await getByProductId("shortDescriptions", idProduct);
  let descriptions = await getByProductId("descriptions", idProduct);
  let specifications = await getByProductId("specifications", idProduct);
  detailProduct(
    product[0],
    pictures[0].values,
    shortDescriptions[0].values,
    descriptions[0].values,
    specifications[0].values
  );
  addToCartEvent();
}

async function updateCartQuantity(cartId, newQuantity) {
  const url = `http://localhost:7777/carts/${cartId}`;
  await axios.patch(url, { quantity: newQuantity }).catch((error) => {
    console.error("Lỗi khi cập nhật giá trị:", error);
  });
}

async function addProductToCart(productId, quantity) {
  await axios
    .post("http://localhost:7777/carts", {
      productId: productId,
      quantity: quantity,
    })
    .catch((error) => {
      console.error("Error adding object:", error);
    });
}

async function addToCartEvent() {
  let idProduct = +phanTich_URL();
  let addToCartBtn = document.querySelector("#js-buy-btn");
  addToCartBtn.onclick = async (event) => {
    event.preventDefault();
    let carts = await callAPI("carts");
    let existingProduct = carts.find((cart) => cart.productId === idProduct);
    if (existingProduct) {
      updateCartQuantity(existingProduct.id, existingProduct.quantity + 1);
    } else {
      addProductToCart(idProduct, 1);
    }
  };
}

function detailProduct(
  product,
  productPhotos,
  shortDescription,
  description,
  specification
) {
  if (product) {
    slideshowProduct(productPhotos);
    renderNameAndPrice(product);
    renderShortDescriptions(shortDescription);
    renderDescriptions(description);
    renderSpecifications(specification);
  }

  function renderNameAndPrice(prod) {
    let productRight = document.querySelector(".product-right");
    productRight.querySelector(
      ".product-right__title"
    ).innerHTML = `${prod.name}`;
    productRight.querySelector(
      ".product-right__price-new"
    ).innerHTML = `${formatCurrency(prod.discount, "₫")}`;
    productRight.querySelector(
      ".product-right__price-old"
    ).innerHTML = `${formatCurrency(prod.price, "₫")}`;
  }

  function slideshowProduct(productPhotos) {
    let carouselContainer = document.querySelector("#product-left__slideshow");
    let carouselIndicators = carouselContainer.querySelector(
      ".carousel-indicators"
    );
    let carouselInner = carouselContainer.querySelector(".carousel-inner");

    carouselIndicators.innerHTML = `${productPhotos
      .map((img, index) => {
        return `<button type="button" data-bs-target="#product-left__slideshow" data-bs-slide-to="${index}" class="${addActiveInFirst(
          index
        )}"></button>`;
      })
      .join("")}`;
    carouselInner.innerHTML = `${productPhotos
      .map((img, index) => {
        return `<div class="carousel-item ${addActiveInFirst(index)}">
                  <img src="${img}" alt="Los Angeles" class="d-block w-100">
                </div>`;
      })
      .join("")}`;
    function addActiveInFirst(index) {
      if (index === 0) {
        return `active`;
      }
    }
  }

  function renderSpecifications(specification) {
    let specificationsContainer = document.querySelector(
      ".specifications__container"
    );
    let htmls = specification.map((item) => {
      return `<h2 class="specifications__title">${item.title}</h2>
                ${item.content
                  .map((item) => {
                    return `<div class="specifications__item">
                              <div class="specifications__item__title">${
                                item.key
                              }</div>
                              <div class="specifications__item__content">
                                ${item.value
                                  .map((item) => {
                                    return `<span>${item}</span>`;
                                  })
                                  .join("")}
                              </div>
                            </div>`;
                  })
                  .join("")}`;
    });
    specificationsContainer.innerHTML = htmls.join("");
  }

  function renderDescriptions(description) {
    let descriptionsContainer = document.querySelector(
      ".product-describe-detail"
    );
    let htmls = description.map((item) => {
      return `<h3>${item.title}</h3>
              <p>${item.content}</p>
              ${checkImg(item)}`;
    });
    function checkImg(itemCheck) {
      if (itemCheck.img === "") {
        return "";
      } else {
        return `<img src="${itemCheck.img}" alt="error :))">`;
      }
    }

    descriptionsContainer.innerHTML = htmls.join("");
  }

  function renderShortDescriptions(shortDescription) {
    let shortDescriptionsContainer = document.querySelector(
      ".product-right__features"
    );

    let htmls = shortDescription.map((item) => `<li>${item}</li>`);
    shortDescriptionsContainer.innerHTML = htmls.join("");
  }

  //ẩn hiện thông số kỹ thuật
  let specificationsFooter = document.querySelector(".specifications__footer");
  let specificationsPopupBtn = document.querySelector(
    ".specifications__footer__btn"
  );
  let specificationsContainer = document.querySelector(
    ".specifications__container"
  );
  specificationsPopupBtn.onclick = () => {
    if (specificationsContainer.style.height == "auto") {
      specificationsContainer.style.height = "400px";
      specificationsPopupBtn.innerHTML = `Xem thêm<i class="fa-solid fa-arrows-up-down"></i>`;
      specificationsFooter.style = `position: absolute; height: 120px;`;
    } else {
      specificationsContainer.style.height = "auto";
      specificationsPopupBtn.innerHTML = `Ẩn bớt<i class="fa-solid fa-arrows-up-down"></i>`;
      specificationsFooter.style = `position: relative; height: 50px;`;
    }
  };
}
