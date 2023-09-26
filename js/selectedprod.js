$(document).ready(function() {
    let prodList = $('.product-list');
    let selectedProductPhoto = $('.selected-product-photo');
    let selectedProductName = $('.selected-product-name');
    let selectedProductDescription = $('.selected-product-description');
    let selectedProductPrice = $('.selected-product-price');

    prodList.on('click', '.choose-button', function() {
        let productItem = $(this).closest('.product-item');
        let productName = productItem.find('h3').text();
        console.log(productName);
        $.ajax({
            type: 'POST',
            url: '../scripts/getproductinfo.php',
            data: { productName: productName },
            dataType: 'json',
            success: function(data) {
                selectedProductPhoto.attr('src', '../img/' + data.photo);
                selectedProductName.text(data.name);
                selectedProductDescription.text(data.description);
                selectedProductPrice.text(data.price + ' $');
            },
            error: function() {
                alert('Error');
            }
        });
    });

    $('.logout-button').on('click', function() {
        $.ajax({
            type: 'POST',
            url: '../scripts/logout.php',
            success: function(data) {
                if (data === 'success') {
                    window.location.href = '../pages/login.php';
                } else {
                    alert('Failed to log out');
                }
            },
            error: function() {
                alert('An error occurred while logging out');
            }
        });
    });
});

