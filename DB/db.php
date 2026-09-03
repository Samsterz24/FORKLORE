<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "FORKLORE";

$conn = new mysqli($host, $user, $password, $database);


if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
else{
    echo("connected");
}

$conn->set_charset("utf8mb4");
?>