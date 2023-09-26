<?php
session_start();

function generateSalt($length = 16) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $salt = '';

    for ($i = 0; $i < $length; $i++) {
        $salt .= $characters[random_int(0, strlen($characters) - 1)];
    }

    return $salt;
}

if (isset($_POST['login_button'])) {
    header("Location: ../pages/login.php");
    exit;
}

require_once('../scripts/connection.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signin_button'])) {
    $username = $_POST['username'];
    $login = $_POST['login'];
    $password = $_POST['password'];

    if (!$db_connection) {
        echo "Database connection error";
    } else {
        $query = "SELECT * FROM users WHERE login = '$login'";
        $result = pg_query($db_connection, $query);

        if (!$result) {
            echo "Database query error";
        } else {
            $row = pg_fetch_assoc($result);
            if ($row) {
                echo "User with this login already exists";
            } else {
                // Генерируем случайную соль
                $salt = generateSalt(16);
                // Хешируем пароль с солью
                $hashedPassword = hash('sha256', $password . $salt);

                $insert_query = "INSERT INTO users (username, login, password, salt) VALUES ('$username', '$login', '$hashedPassword', '$salt')";
                $insert_result = pg_query($db_connection, $insert_query);

                if ($insert_result) {
                    echo '<p>Registration successful. You can now <a href="../pages/login.php">log in</a>.</p>';
                } else {
                    echo "Registration error";
                }
            }
        }
    }
}

