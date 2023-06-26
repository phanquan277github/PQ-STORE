categoryEvent();
async function categoryEvent() {
  let cateId = +phanTich_URL(); //dấu + để chuyển string sang number
  const productsInCategory = await getByCateId("products", cateId);
  const category = await getById("categories", cateId);
  if (cateId) {
    renderName(category[0]);
    await renderItemCatePage(productsInCategory);
    fullEvent(category[0], cateId);
    // kiểm tra kích thước màn hình để thực hiện hàm responsive
    window.addEventListener("load", checkScreenSize);
    window.addEventListener("resize", checkScreenSize);
  }
}

function renderName(cate) {
  document.querySelector(".cate__name").innerHTML = cate.name;
}

async function renderItemCatePage(listToRender) {
  let htmls = await Promise.all(
    listToRender.map(async (prod) => {
      let shortDescription = await getByProductId("shortDescriptions", prod.id);
      let linkProduct = "./product.html?" + prod.id;
      return `
              <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2">
                  <div class="products-item">
                      <img src="${
                        prod.avata
                      }" alt="" class="products-item__avata">
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
    })
  );
  document.querySelector(".js-cate-product-container").innerHTML =
    htmls.join("");
}

async function updateFilterProduct(cateId, arrayFilter) {
  try {
    const newArrayCommand = arrayFilter.map((item) => item.command);
    console.log(newArrayCommand);
    const response = await axios.get(
      `http://localhost:7777/products?cateId=${cateId}&${newArrayCommand.join(
        "&"
      )}`
    );
    const products = response.data;
    renderItemCatePage(products);
  } catch (error) {
    console.error("Lỗi :)):", error);
  }
}

function fullEvent(cate, cateId) {
  renderFilter(cate);
  function renderFilter(cate) {
    let cateFilter = document.querySelector(".cate__filter");
    cateFilter.innerHTML = `
      <div class="cate__filter-close-btn">Bộ lọc<i class="bi bi-x"></i></div>

      <div class="cate__filter__box js-cate__filter__box--price-range">
          <div class="cate__filter__box__title">
              Mức giá<i class="bi bi-caret-down-fill"></i></i>
          </div>
          <div class="cate__filter__box__body">
            <div class="cate__filter__box__body--range">
              <input class="input-start" type="text" placeholder="Từ">
              <input class="input-end" type="text" placeholder="đến">
            </div>
            <div class="cate__filter__box__apply d-none justify-content-end">
              <button class="btn">Apply</button>
            </div>
          </div>
      </div>
      ${cate.filters
        .map((filter) => {
          return `
                  <div class="cate__filter__box js-cate__filter__box">
                      <div class="cate__filter__box__title">
                          ${
                            filter.title
                          }<i class="bi bi-caret-down-fill"></i></i>
                      </div>
                      <div class="cate__filter__box__body">
                          ${filter.contents
                            .map((content) => {
                              return `
                                      <div class="cate__filter__box__item">
                                          <input class="cate__filter__box__item-check" type="checkbox" name="" id="" data=${content.replaceAll(
                                            " ",
                                            "-"
                                          )}>
                                          <label for="" class="cate__filter__box__item-name">${content}</label>
                                      </div>`;
                            })
                            .join("")}
                            <div class="cate__filter__box__apply d-none justify-content-end">
                              <button class="btn">Apply</button>
                            </div>
                      </div>
                  </div>`;
        })
        .join("")}`;
  }

  filterBoxPopupEvent();
  function filterBoxPopupEvent() {
    let filterBoxes = document.querySelectorAll(".cate__filter__box");
    Array.from(filterBoxes).map((box) => {
      let filterTitle = box.querySelector(".cate__filter__box__title");
      let filterTitleIcon = filterTitle.querySelector(
        ".cate__filter__box__title i"
      );
      let filterInput = box.querySelector(".cate__filter__box__body");
      filterTitle.onclick = () => {
        if (filterInput.style.display == "none") {
          filterInput.style.display = "flex";
          filterTitleIcon.style.transform = "rotate(180deg)";
        } else {
          filterTitleIcon.style.transform = "rotate(0deg)";
          filterInput.style.display = "none";
        }
      };
    });
  }

  //mảng chứa các giá trị cần lọc vd: "_sort=discount", "_order=desc"
  // Tạo một Proxy cho mảng: Proxy cho phép theo dõi và tùy chỉnh các hoạt động trên mảng
  const filtersApplyProxy = new Proxy(new Array(), {
    set: (target, property, value) => {
      if (
        typeof value.command === "string" &&
        target.some((obj) =>
          obj.command.startsWith(value.command.substring(0, 8))
        )
      ) {
        const index = target.findIndex((obj) =>
          obj.command.startsWith(value.command.substring(0, 8))
        );
        if (index !== -1) {
          target.splice(index, 1, value); // ghi đè phần tử đã tìm thấy
        }
      } else if (
        typeof value.command === "string" &&
        !target.some((obj) =>
          obj.command.startsWith(value.command.substring(0, 8))
        )
      ) {
        target[property] = value;
      }

      if (property === "length") {
        console.log(target);
        updateFilterProduct(cateId, target); // truyền mảng hiện tại vào hàm
        renderFilterChoice(target);
      }
      return true; // việc trả về giá trị true cho phép giá trị mới được gán vào thuộc tính tương ứng của mảng
    },
    deleteProperty: function (target, prop) {
      if (target.some((obj) => obj.name === prop)) {
        let index = target.findIndex((obj) => obj.name === prop);
        target.splice(index, 1);
        updateFilterProduct(cateId, target);
        renderFilterChoice(target);
        return true;
      }
      return false;
    },
  });

  // hàm xóa một obj trong Proxy array bằng giá trị của thuộc tính name
  function removeObjInProxyByNameValue(value) {
    for (let prop in filtersApplyProxy) {
      if (filtersApplyProxy[prop].name === value) {
        delete filtersApplyProxy[value];
        break;
      }
    }
    console.log(filtersApplyProxy);
  }

  function renderFilterChoice(proxy) {
    const newArray = proxy.map((item) => item.name);
    const filterChoiceContainer = document.querySelector(
      ".js-filters_are_applied"
    );
    filterChoiceContainer.innerHTML = `
      <div class="filter-choice-title">Lọc theo: </div>
      ${newArray
        .map(
          (item) =>
            `<div class="filter-choice ${item}">${item}<i class="bi bi-x fa-xl"></i></div>`
        )
        .join("")}
    `;

    let filterChoiceBtns =
      filterChoiceContainer.querySelectorAll(".filter-choice");
    filterChoiceBtns.forEach((choice) => {
      choice.addEventListener("click", () => {
        const choiceText = choice.textContent.trim();
        removeObjInProxyByNameValue(choiceText);
        let itemDelete = document.querySelector(
          ".sort__item.bg-primary-gradient"
        );
        itemDelete.classList.remove("bg-primary-gradient");
      });
    });
  }

  filterPriceRange();
  function filterPriceRange() {
    let priceRangeBox = document.querySelector(
      ".js-cate__filter__box--price-range"
    );
    let inputStart = priceRangeBox.querySelector(".input-start");
    let inputEnd = priceRangeBox.querySelector(".input-end");
    let applyBtn = priceRangeBox.querySelector(".cate__filter__box__apply");
    applyBtn.addEventListener("click", () => {
      // lấy giá thấp nhất và cao nhất push vào mảng Proxy
      const lowest = inputStart.value;
      const highest = inputEnd.value;
      filtersApplyProxy.push({
        name: `Giá từ ${formatCurrency(+lowest, "₫")} đến ${formatCurrency(
          +highest,
          "₫"
        )}`,
        command: `discount_gte=${lowest}&discount_lte=${highest}`,
      });
    });

    inputStart.addEventListener("input", () => {
      if (!isNaN(inputEnd.value) && inputEnd.value !== "") {
        setTimeout(() => {
          applyBtn.classList.remove("d-none");
          applyBtn.classList.add("d-flex");
        }, 1000);
      }
      if (inputStart.value === "" || isNaN(inputStart.value)) {
        setTimeout(() => {
          applyBtn.classList.remove("d-flex");
          applyBtn.classList.add("d-none");
        }, 1000);
      }
    });
    inputEnd.addEventListener("input", () => {
      if (
        !isNaN(inputEnd.value) &&
        !isNaN(inputStart.value) &&
        inputEnd.value !== "" &&
        inputStart.value !== ""
      ) {
        setTimeout(async () => {
          applyBtn.classList.remove("d-none");
          applyBtn.classList.add("d-flex");
        }, 1000);
      } else {
        setTimeout(() => {
          applyBtn.classList.remove("d-flex");
          applyBtn.classList.add("d-none");
        }, 1000);
      }
    });
  }

  filterBoxCheck();
  function filterBoxCheck() {
    const filterCheckBox = document.querySelectorAll(".js-cate__filter__box");
    filterCheckBox.forEach((box) => {
      const boxTitle = box.querySelector(".cate__filter__box__title");
      const applyBtn = box.querySelector(".cate__filter__box__apply");
      const boxItem = box.querySelectorAll(".cate__filter__box__item");
      let checkedInputs = new Proxy([], {
        set: function (target, property, value) {
          if (typeof value.command === "string" && target.contains(value)) {
            const index = Object.values(target).findIndex((item) => value);
            if (index !== -1) {
              target.splice(index, 1, value); // ghi đè phần tử đã tìm thấy
            }
          } else {
            target[property] = value;
          }

          if (property === "length") {
          }
          return true;
        },
        deleteProperty: function (target, property) {
          delete target[property];
          return true;
        },
      });
      applyBtn.addEventListener("click", () => {
        let name = checkedInputs.map((item) => item).join(", ");
        let commands = checkedInputs.map((item) => item).join("&");
        filtersApplyProxy.push({
          name: `${boxTitle.textContent}: ${name}`,
          command: `${commands}`,
        });
      });
      boxItem.forEach((item) => {
        let checkedCount = 0;
        const itemName = item.querySelector(".cate__filter__box__item-name");
        const itemInput = item.querySelector(".cate__filter__box__item-check");
        itemInput.addEventListener("change", (event) => {
          if (event.target.checked) {
            checkedCount++; // Tăng biến đếm khi checkbox được chọn
            checkedInputs.push(itemName.textContent);
            // xử lí render các sản phẩm khi apply được click
          } else {
            checkedCount--; // Giảm biến đếm khi checkbox bỏ chọn
          }

          if (checkedCount > 0) {
            applyBtn.classList.remove("d-none");
            applyBtn.classList.add("d-flex");
          } else {
            applyBtn.classList.remove("d-flex");
            applyBtn.classList.add("d-none");
          }
        });
      });
    });
  }

  sortEvents();
  function sortEvents() {
    const sortBtns = document.querySelectorAll(".sort__item.btn");
    sortBtns.forEach((sortBtn) => {
      sortBtn.onclick = () => {
        if (sortBtn.classList.contains("bg-primary-gradient")) {
          sortBtn.classList.remove("bg-primary-gradient");
          removeObjInProxyByNameValue(sortBtn.textContent);
        } else {
          const buttonsWithClass = document.querySelectorAll(
            ".bg-primary-gradient"
          );
          buttonsWithClass.forEach((btn) => {
            btn.classList.remove("bg-primary-gradient");
          });
          sortBtn.classList.add("bg-primary-gradient");
          const uniqueClassBtn = sortBtn.classList[0];
          console.log(uniqueClassBtn);
          if (uniqueClassBtn === "hight-price") {
            filtersApplyProxy.push({
              name: "Giá cao",
              command: "_sort=discount&_order=desc",
            });
          } else if (uniqueClassBtn === "low-price") {
            filtersApplyProxy.push({
              name: "Giá thấp",
              command: "_sort=discount&_order=asc",
            });
          } else if (uniqueClassBtn === "bestseller") {
            console.log("bestseller");
          } else if (uniqueClassBtn === "best-promotion") {
            console.log("best-promotion");
          } else if (uniqueClassBtn === "installment") {
            console.log("installment");
          }
        }
      };
    });
  }
}

function checkScreenSize() {
  // chỉ hoạt động hàm khi ở with < 992px (bé hơn xl)
  if (window.matchMedia("(max-width: 992px)").matches) {
    cateFilterResponsive();
  }
}

function cateFilterResponsive() {
  filter();
  function filter() {
    let filterOverlay = document.querySelector(".cate__filter--overlay");
    let filterContanier = filterOverlay.querySelector(".cate__filter");
    let filterBtn = document.querySelector(".cate__filter-btn");
    let closeBtn = filterOverlay.querySelector(".cate__filter-close-btn i");

    filterBtn.addEventListener("click", showFlex);
    closeBtn.addEventListener("click", hideFlex);
    filterOverlay.addEventListener("click", hideFlex);

    filterContanier.addEventListener("click", function (event) {
      event.stopPropagation(); //hàm ngăn nổi bọt
    });
    function showFlex() {
      filterOverlay.classList.add("d-flex");
    }
    function hideFlex() {
      filterOverlay.classList.remove("d-flex");
    }
  }
}
