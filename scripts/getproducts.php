<?php
    require_once('../scripts/connection.php');

    if (!$db_connection) echo "database connection error"; else {
        $query = "SELECT id, name, photo, price, description FROM public.products;";

        $result = pg_query($db_connection, $query);

        if (!$result) echo "request execution error"; else {
            $products = array();
            while ($row = pg_fetch_assoc($result)) {
                $product = array(
                    'name' => $row['name'],
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
