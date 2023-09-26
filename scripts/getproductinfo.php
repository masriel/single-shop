<?php
if (isset($_POST['productName'])) {
    $productName = $_POST['productName'];

    $db_connection = pg_connect("host=localhost port=5432 dbname=shop user=postgres password=root");

    if (!$db_connection) {
        echo 'Database connection error';
    } else {
        $query = "SELECT * FROM products WHERE name = '$productName'";
        $res = pg_query($db_connection, $query);
        if (!$res) {
            echo "request execution error";
        } else {
            $row = pg_fetch_assoc($res);
            $product = array(
                'name' => $row['name'],
                'description' => $row['description'],
                'photo' => $row['photo'],
                'price' => $row['price']
            );
            header('Content-Type: application/json');
            echo json_encode($product);
        }
    }
}
