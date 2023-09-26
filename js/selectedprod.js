$(document).ready(function() {
    let prodList = $('.product-list');
    let selectedProductPhoto = $('.selected-product-photo');
    let selectedProductName = $('.selected-product-name');
    let selectedProductDescription = $('.selected-product-description');
    let selectedProductPrice = $('.selected-product-price');

    prodList.on('click', '.choose-button', function() {
        let productItem = $(this).closest('.product-item');
        let productPhoto = productItem.find('img').attr('src');
        let productName = productItem.find('h3').text();
        let productDescription = productItem.find('p').eq(0).text();
        let productPrice = productItem.find('p').eq(1).text();

        selectedProductPhoto.attr('src', productPhoto);
        selectedProductName.text(productName);
        selectedProductDescription.text(productDescription);
        selectedProductPrice.text(productPrice);
    });
});