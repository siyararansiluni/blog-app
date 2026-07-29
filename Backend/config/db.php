<?php

$host = "localhost";
$port = 3307;
$username = "root";
$password = "";
$database = "blog_db";

$conn = new mysqli($host, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
?>