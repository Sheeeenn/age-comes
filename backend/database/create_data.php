<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "agecomes";

$conn = new mysqli($host, $username, $password);


$sql_create_db = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql_create_db) === FALSE) {
    die("Error creating database: " . $conn->error);
}

if (!$conn->select_db($dbname)) {
    die("Error selecting database: " . $conn->error);
}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "
CREATE TABLE IF NOT EXISTS agecomes (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    BarCodeNumber CHAR(9) UNIQUE NOT NULL,
    Email VARCHAR(255) NOT NULL,
    FirstName VARCHAR(255) NOT NULL,
    MiddleName VARCHAR(255),
    LastName VARCHAR(255) NOT NULL,
    CurrentBudget DECIMAL(7,2),
    LastSpent DECIMAL(7,2),
    LastDateSpent DATETIME,
    LastStoreSpent VARCHAR(255)
)";

if ($conn->query($sql) === FALSE) {
    echo "Error: " . $conn->error;
}
        
$conn->close();


?>