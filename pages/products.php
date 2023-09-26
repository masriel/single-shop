<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link rel="stylesheet" href="../css/prod_style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <input type="text" class="search-box" placeholder="Search...">
            <ul class="product-list"></ul>
            <script src="../js/addproducts.js"></script>
        </div>
        <div class="right-panel">
            <div class="selected-product">
                <h2></h2>
                <img class="selected-product-photo" src="" alt="" style="max-width: 200px;">
                <p><span class="selected-product-name"></span></p>
                <p><span class="selected-product-description"></span></p>
                <p><span class="selected-product-price"></span></p>
            </div>
            <script src="../js/selectedprod.js"></script>
        </div>
    </div>
</body>
</html>
