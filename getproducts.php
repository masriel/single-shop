<?php
    $db_connection = pg_connect("host=localhost port=5432 dbname=shop user=postgres password=root");

    if (!$db_connection) {
        echo "database connection error";
    } else {
        $query = "SELECT product_id, product_name, photo, price, description FROM public.products;";

        $result = pg_query($db_connection, $query);

        if (!$result) {
            echo "request execution error";
        } else {
            $products = array();
            while ($row = pg_fetch_assoc($result)) {
                $product = array(
                    'name' => $row['product_name'],
                    'description' => $row['description'],
                    'photo' => $row['photo'],
                    'price' => $row['price']
                );
                $products[] = $product;
            }
            header('Content-Type: application/json');
            echo json_encode($products);
        }
    }
