<?php
$host = "localhost";
$username = "root";
$password = "";


$conn = new mysqli($host, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql_db = "CREATE DATABASE IF NOT EXISTS FORKLORE CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
if ($conn->query($sql_db) === TRUE) {
    echo "Database 'FORKLORE' created or already exists.<br>";
} else {
    die("Error creating database: " . $conn->error);
}


$conn->select_db("FORKLORE");


$sql_table = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    age INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql_table) === TRUE) {
    echo "Table 'users' created or already exists.<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
echo "<strong>Database setup complete!</strong>";
?>