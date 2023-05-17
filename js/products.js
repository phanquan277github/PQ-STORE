var pcProductsAPI = "http://localhost:3000/PCproducts";
fetch(pcProductsAPI)
    .then(function(response){
        return response.json();
    })
    .then(function(pcProducts){
        var htmls = pcProducts.map(function(product){
            return `<div class="col l-2-4">
            <div class="container__item">
                <header class="container__item-header">
                    <img src="${product.img}"
                        alt="" class="container__item-img">
                </header>
                <span class="container__item-name">
                    ${product.name}
                </span>
                <div class="container__item-price">
                    <span class="container__item-price__new">${product.newPrice}</span>
                    <span class="container__item-price__old">${product.oldPrice}</span>
                </div>
                <footer class="container__item-footer container__item-footer--stocking">
                    <i class="fa-solid fa-circle-check"></i>Còn hàng
                </footer>
                <div class="container__item-describe__popup">
                    <a class="container__item-describe__name" href="./product.html">
                        ${product.name}
                    </a>
                    <ul>
                        ${product.shortDescriptions.map(function(value){
                            return `<li>${value}</li>`
                        }).join('')}
                    </ul>
                </div>
            </div>
        </div>`;
        });
        var html = htmls.join('');
        document.getElementById('products-list-pc-id').innerHTML = html;
    })