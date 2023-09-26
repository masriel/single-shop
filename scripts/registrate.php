<?php
session_start();

if (isset($_POST['login_button'])) {
    header("Location: ../pages/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signin_button'])) {
    $username = $_POST['username'];
    $login = $_POST['login'];
    $password = $_POST['password'];

    $db_connection = pg_connect("host=localhost port=5432 dbname=shop user=postgres password=root");

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
                $insert_query = "INSERT INTO users (username, login, password, salt) VALUES ('$username', '$login', '$password', 'salt')";
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
?>