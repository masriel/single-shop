$(document).ready(function() {
    let prodList = $('.product-list');

    $.ajax({
        url: '../scripts/getproducts.php',
        dataType: 'json',
        success: function(data) {
            data.forEach(function(product) {
                let item = $('<li>').addClass('product-item');
                let productInfo = $('<div>').addClass('product-info');
                let productName = $('<h3>').text(product.name);
                let productPrice = $('<p>').text(product.price + ' $');
                let chooseButton = $('<button>').text('Choose').attr('class', 'choose-button');

                productInfo.append(productName, productPrice);
                item.append(productInfo, chooseButton);
                prodList.append(item);
            });
        },
        error: function() {
            alert("Error");
        }
    });
});