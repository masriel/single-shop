<?php
session_start();

if (isset($_POST['signin_button'])) {
    header("Location: ../pages/signin.php");
    exit;
}

require_once('../scripts/connection.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_button'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE login = '$login'";
    $result = pg_query($db_connection, $query);

    if (!$result) {
        echo "Database query error";
    } else {
        $row = pg_fetch_assoc($result);
        if ($row) {
            $hashedPassword = hash('sha256', $password . $row['salt']);
            if ($row['password'] == $hashedPassword) {
                // Пароль верный
                header("Location: ../pages/products.php");
                exit;
            } else {
                // Неверный пароль
                echo "Invalid login or password";
            }
        } else {
            echo "Invalid login or password";
        }
    }
}
