<?php

require "db_connection.php"; 

try {
    //  if DB doesn't exist the:
    // $conn->exec("CREATE DATABASE IF NOT EXISTS bmi_php_app");

    // Select the database
    $conn->exec("USE bmi_php_app");

    // Create appusers table
    $conn->exec("CREATE TABLE IF NOT EXISTS appusers (
        AppUserID INT AUTO_INCREMENT PRIMARY KEY,
        Username VARCHAR(50) NOT NULL UNIQUE,
        Password VARCHAR(255) NOT NULL,  
        CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    // Create bmiusers table
    $conn->exec("CREATE TABLE IF NOT EXISTS bmiusers (
        BMIUserID INT AUTO_INCREMENT PRIMARY KEY,
        Name VARCHAR(100) NOT NULL,
        Age INT,
        Gender ENUM('Male', 'Female') NOT NULL,
        CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    // Create bmirecords table
    $conn->exec("CREATE TABLE IF NOT EXISTS bmirecords (
        RecordID INT AUTO_INCREMENT PRIMARY KEY,
        BMIUserID INT,
        Height FLOAT NOT NULL,
        Weight FLOAT NOT NULL,
        BMI FLOAT NOT NULL,
        RecordedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (BMIUserID) REFERENCES bmiusers(BMIUserID)
    )");

    echo "Connected and tables created successfully.";
} catch (PDOException $exp) {
    echo "Error found: " . $exp->getMessage();
}

// Close the connection
$conn = null;
?>
