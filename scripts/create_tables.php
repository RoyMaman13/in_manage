<?php
require __DIR__ . '/../classes/Database.php';
$db = new Database();
$conn = $db->getConnection();

// Create Users table
$conn->exec("
    CREATE TABLE IF NOT EXISTS users (
        id INT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        birthday DATE NOT NULL,
        active BOOLEAN DEFAULT TRUE
    )
");

// Create Posts table
$conn->exec("
    CREATE TABLE IF NOT EXISTS posts (
        id INT PRIMARY KEY,
        user_id INT,
        title VARCHAR(255) NOT NULL,
        content TEXT NOT NULL,
        creation_date_time DATETIME,
        active BOOLEAN DEFAULT TRUE,
        FOREIGN KEY (user_id) REFERENCES users(id)
    )
");
?>
