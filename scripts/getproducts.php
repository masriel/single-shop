<?php
    $db_connection = pg_connect("host=localhost port=5432 dbname=shop user=postgres password=root");

    if (!$db_connection) echo "database connection error"; else {
        $query = "SELECT id, name, photo, price, description FROM public.products;";

        $result = pg_query($db_connection, $query);

        if (!$result) echo "request execution error"; else {
            $products = array();
            while ($row = pg_fetch_assoc($result)) {
                /*$product = array(
                    'name' => $row['product_name'],
                    'description' => $row['description'],
                    'photo' => $row['photo'],
                    'price' => $row['price']
                );
                $products[] = $product;*/
                echo '<li class="product-item">';
                echo '<div class="product-info">';
                echo '<img src="../img/' . $row['photo'] . '" class="product-image">';
                echo '<h3>' . $row['name'] . '</h3>';
                echo '<p>' . $row['description'] . '</p>';
                echo '<p>' . $row['price'] . ' $</p>';
                echo '</div>';
                echo '<button class="choose-button">Choose</button>';
                echo '</li>';
            }
            /*header('Content-Type: application/json');
            echo json_encode($products);*/
        }
    }
