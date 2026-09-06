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


$sql_table1 = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    age INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$sql_table2 = "CREATE TABLE IF NOT EXISTS recipes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(150) NOT NULL,
    category VARCHAR(50) DEFAULT 'General',
    image_filename VARCHAR(255) DEFAULT 'default.jpg',
    data_file VARCHAR(255) NULL, -- Path to a .json or .txt file containing full instructions
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE -- if ever deleting a user, will delete first the recipes na associated sa user
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
if ($conn->query($sql_table1 && $sql_table2) === TRUE) {
    echo "Table 'users' and 'recipes' created or already exists.<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
echo "<strong>Database setup complete!</strong>";
?>