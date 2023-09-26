<?php
session_start();

if (isset($_POST['signin_button'])) {
    header("Location: ../pages/signin.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_button'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $db_connection = pg_connect("host=localhost port=5432 dbname=shop user=postgres password=root");

    if (!$db_connection) {
        echo "Database connection error";
    } else {
        $query = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";
        $result = pg_query($db_connection, $query);

        if (!$result) {
            echo "Database query error";
        } else {
            $row = pg_fetch_assoc($result);
            if ($row) {
                // Пользователь успешно авторизован
                $_SESSION['user_id'] = $row['id']; // Сохраняем ID пользователя в сессии
                header("Location: ../pages/products.php");
                exit;
            } else {
                // Пользователь с введенными данными не найден
                echo "Invalid login or password";
            }
        }
    }
}
?>