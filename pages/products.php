<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link rel="stylesheet" href="../css/prod_style.css">
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <input type="text" class="search-box" placeholder="Поиск товаров">
            <ul class="product-list"></ul>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    let prodList = document.getElementsByClassName('product-list')[0];
                    let xhr = new XMLHttpRequest();
                    xhr.open('GET', 'getproducts.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/json');

                    xhr.onload = function() {
                        if (xhr.status !== 200) {
                            alert("error");
                        } else {
                            /*let data = JSON.parse(xhr.responseText);
                            data.forEach(function (product) {
                                let item = document.createElement('li');
                                item.classList.add('product-item');
                                let productInfo = document.createElement('div');
                                productInfo.classList.add('product-info');

                                let productImage = document.createElement('img');
                                productImage.src = '../img/' + product.image;
                                productImage.alt = product.name;
                                productImage.classList.add('product-image');

                                let productName = document.createElement('h3');
                                productName.textContent = product.name;

                                let productDescription = document.createElement('p');
                                productDescription.textContent = product.description;

                                let chooseButton = document.createElement('button');
                                chooseButton.textContent = 'Choose';

                                productInfo.appendChild(productImage);
                                productInfo.appendChild(productName);
                                productInfo.appendChild(productDescription);

                                item.appendChild(productInfo);
                                item.appendChild(chooseButton);

                                prodList.appendChild(item);
                            });*/
                            prodList.innerHTML = xhr.responseText;
                        }
                    };
                    xhr.send();
                });
            </script>
            
        </div>
        <div class="right-panel">
            <div class="selected-product">
                <h2>Выбранный товар</h2>
                <img src="selected-product.jpg" alt="Выбранный товар" style="max-width: 200px;">
                <p>Информация о выбранном товаре:</p>
                <p><span class="selected-product-name"></span></p>
                <p><span class="selected-product-description"></span></p>
                <p><span class="selected-product-description"></span></p>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    let prodList = document.querySelector('.product-list');
                    let selectedProduct = document.querySelector('.selected-product');

                    prodList.addEventListener('click', function(event) {
                        if (event.target.classList.contains('choose-button')) { // Проверяем, что клик был по кнопке "Choose"
                            let productItem = event.target.closest('.product-item'); // Находим ближайший элемент товара
                            if (productItem) {
                                let productName = productItem.querySelector('h3').textContent;
                                let productDescription = productItem.querySelector('p').textContent;
                                let productPrice = productItem.querySelector('p').textContent;
                                let productImage = productItem.getAttribute('data-image'); // Получаем значение атрибута data-image

                                let selectedProductName = selectedProduct.querySelector('.selected-product-name');
                                let selectedProductDescription = selectedProduct.querySelector('.selected-product-description');
                                let selectedProductImage = selectedProduct.querySelector('.selected-product-image');

                                // Заполняем информацию о выбранном товаре на правой стороне
                                selectedProductName.textContent = productName;
                                selectedProductDescription.textContent = productDescription;
                                selectedProductImage.src = productImage; // Устанавливаем изображение товара
                            }
                        }
                    });
                });
            </script>

        </div>
    </div>
</body>
</html>
