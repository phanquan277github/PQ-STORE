// Enable tooltips Bootstrap
const tooltipTriggerList = document.querySelectorAll(
  '[data-bs-toggle="tooltip"]'
);
const tooltipList = [...tooltipTriggerList].map(
  (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
);

const WEB_ROOT = window.location.origin + "/mvc_php/public/";

// tạo input cho thêm ảnh sản phẩm
function createImageInput() {
  let count = $("#add-image-container .group_content").length;

  let newRow = $("<div>").addClass("input-group mb-3 group_content");

  let input = $("<input>").attr({
    type: "text",
    name: `pictures[${count}][image_path]`,
    class: "form-control",
    placeholder: "Nhập đường dẫn của ảnh",
  });

  var removeButton = $("<button>")
    .addClass("btn btn-danger remove")
    .html('<i class="bi bi-x"></i>')
    .on("click", function () {
      $(this).closest(".group_content").remove();
    });

  // Gắn các cột vào hàng mới
  newRow.append(input, removeButton);
  $("#add-image-container").append(newRow);
}

// tạo row input cho phần mô tả chi tiết của sản phẩm
function createDescribeInput() {
  let count = $("#add-describe-container .input-group").length;
  let addImageContainer = document.getElementById("add-describe-container");

  let content = document.createElement("div");
  content.className = "content mb-3";

  let inputGroup = document.createElement("div");
  inputGroup.className = "input-group mb-1";

  let inputTitle = document.createElement("input");
  inputTitle.type = "text";
  inputTitle.name = `describes[${count}][title]`;
  inputTitle.className = "form-control";
  inputTitle.placeholder = "Tiêu đề cho mô tả";

  let inputImagePath = document.createElement("input");
  inputImagePath.type = "text";
  inputImagePath.name = `describes[${count}][image_path]`;
  inputImagePath.className = "form-control";
  inputImagePath.placeholder = "Nhập đường dẫn của ảnh";

  let removeButton = document.createElement("button");
  removeButton.className = "btn btn-danger";
  removeButton.innerHTML = '<i class="bi bi-x"></i>';

  let textarea = document.createElement("textarea");
  textarea.name = `describes[${count}][content]`;
  textarea.style = "width: 100%";

  removeButton.addEventListener("click", () => {
    content.parentNode.removeChild(content);
  });

  inputGroup.appendChild(inputTitle);
  inputGroup.appendChild(inputImagePath);
  inputGroup.appendChild(removeButton);
  content.appendChild(inputGroup);
  content.appendChild(textarea);
  addImageContainer.appendChild(content);
}

// tạo input row cho thông số kỹ thuật
function createSpecificationInput() {
  let count = $("#add-specification-container .group_content").length;

  // Tạo một hàng mới
  var newRow = $("<tr>").addClass("group_content");

  var inputTitle = $("<td>").append(
    $("<input>").attr({
      type: "text",
      name: `specifications[${count}][title]`,
      class: "form-control",
      placeholder: "Tên",
    })
  );

  var inputContent = $("<td>").append(
    $("<input>").attr({
      type: "text",
      name: `specifications[${count}][content]`,
      class: "form-control",
      placeholder: "Nội dung",
    })
  );

  var inputIsTitle = $("<td>").append(
    $("<div>")
      .attr({
        class: "form-check form-switch",
      })
      .append(
        $("<input>").attr({
          type: "checkbox",
          name: `specifications[${count}][isTitle]`,
          class: "form-check-input",
          role: "switch",
        })
      )
  );

  var inputIsMain = $("<td>").append(
    $("<div>")
      .attr({
        class: "form-check form-switch",
      })
      .append(
        $("<input>").attr({
          type: "checkbox",
          name: `specifications[${count}][isMain]`,
          class: "form-check-input",
          role: "switch",
        })
      )
  );

  var removeButton = $("<td>")
    .addClass("text-end")
    .append(
      $("<button>")
        .addClass("btn btn-danger remove")
        .html("Xóa hàng này")
        .on("click", function () {
          $(this).closest(".group_content").remove();
        })
    );

  // Gắn các cột vào hàng mới
  newRow.append(
    inputTitle,
    inputContent,
    inputIsTitle,
    inputIsMain,
    removeButton
  );

  $("#add-specification-container").append(newRow);
}

// Xử lí phân trang (list_product)
pagination();
function pagination() {
  function loadProducts(page) {
    var urlParams = new URLSearchParams(window.location.search);
    var cateId = urlParams.get("cate");

    if (cateId == null) {
      window.location.href = WEB_ROOT + `admin/list_product?page=${page}`;
    } else {
      window.location.href =
        WEB_ROOT + `admin/list_product?cate=${cateId}&page=${page}`;
    }
  }

  // Event handler cho nút phân trang
  $(document).on("click", ".page-link.number", function () {
    var page = $(this).data("page");
    loadProducts(page);
  });

  // Pre phân trang
  $(document).on("click", ".page-link.pre", function () {
    var urlParams = new URLSearchParams(window.location.search);
    var page = urlParams.get("page");
    if (page == null) {
      // loadProducts(1);
    } else if (page == "1") {
      // loadProducts(dataPage);
    } else loadProducts(parseInt(page) - 1);
  });

  // Next phân trang
  $(document).on("click", ".page-link.next", () => {
    var urlParams = new URLSearchParams(window.location.search);
    var page = parseInt(urlParams.get("page"));
    console.log(page);
    var dataPage = $(this).data("page");
    if (page == null || isNaN(page)) {
      loadProducts(1);
    } else if (dataPage == page) {
      // loadProducts(page);
    } else loadProducts(parseInt(page) + 1);
  });
}

// xóa 1 row trường hợp render bằng php
function removeParent(element) {
  var parentElement = element.closest(".group_content");
  if (parentElement) {
    parentElement.remove();
  }
}
