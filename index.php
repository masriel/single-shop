<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link rel="stylesheet" href="css/prod_style.css">
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
                        if (xhr.status === 200) {
                            let data = JSON.parse(xhr.responseText);
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
                            });
                        } else {
                            alert("error");
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
                <p>Название: Товар 1</p>
                <p>Описание: Описание товара 1</p>
            </div>
        </div>
    </div>
</body>
</html>
