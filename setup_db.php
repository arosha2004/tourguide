<?php
$host = 'localhost';
$user = 'root';
$pass = '';

try {
    $dbh = new PDO("mysql:host=$host", $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create database
    $dbh->exec("CREATE DATABASE IF NOT EXISTS tourguide");
    echo "Database created successfully or already exists.<br>";
    
    // Select the database
    $dbh->exec("USE tourguide");
    
    // Create tours table
    $sql = "CREATE TABLE IF NOT EXISTS tours (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        location VARCHAR(255) NOT NULL,
        price DECIMAL(10, 2) NOT NULL,
        badge VARCHAR(50) NOT NULL,
        duration VARCHAR(50) NOT NULL,
        image_url VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $dbh->exec($sql);
    echo "Table 'tours' created successfully.<br>";
    
    // Create gallery table
    $sql = "CREATE TABLE IF NOT EXISTS gallery (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        image_url VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $dbh->exec($sql);
    echo "Table 'gallery' created successfully.<br>";

    
} catch (PDOException $e) {
    die("DB ERROR: " . $e->getMessage());
}
