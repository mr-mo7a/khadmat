
<?php


// Define connection parameters with clear variable names
$host = "localhost";
$dbname = "service_db";
$username = "root";
$password = ""; 

// Specify options for connection and error handling
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8", // Set UTF-8 encoding for Arabic support
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,      // Enable exception-based error handling
);

try {
    // Establish the connection with clear variable names
    $con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, $options);



} catch (PDOException $e) {
    // Handle connection errors with informative logging and messaging
    error_log("Database connection error: " . $e->getMessage());
    echo "Database connection failed. Please try again later.";
    // Optionally, redirect to an error page or provide more detailed feedback
}
