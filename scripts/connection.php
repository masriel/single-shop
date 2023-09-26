<?php
$host = "localhost";
$port = "5432";
$dbname = "shop";
$user = "postgres";
$password = "root";

$db_connection = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$db_connection) {
    echo "Database connection error";
    exit;
}
