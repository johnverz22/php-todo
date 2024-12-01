<?php

$host = getenv('DB_HOST') ? getenv('DB_HOST') : '172.17.0.3';
$port = getenv('DB_PORT') ? getenv('DB_PORT') : '3306';
$dbname = getenv('DB_NAME') ? getenv('DB_NAME') : 'todo_app';
$user = getenv('DB_USER') ? getenv('DB_USER') : 'app_user';
$password = getenv('DB_PASS') ? getenv('DB_PASS') : 'secret';


try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $password, [
        PDO::MYSQL_ATTR_SSL_CA => 'DigiCertGlobalRootCA.crt.pem' // path to SSL  certificate file
    ]);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}


// If using SSL
/*
$path_to_ssl_ca = 'DigiCertGlobalRootCA.crt.pem';

// Create connection using MySQLi
$conn = new mysqli($host, $user, $password, $dbname, $port);

// Set SSL options
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
} else {
    // Enable SSL connection
    if (!$conn->ssl_set(null, null, $path_to_ssl_ca)) {
        die("Failed to set SSL parameters: " . $conn->error);
    }

    // Establish the connection after setting SSL
    if ($conn->real_connect($host, $user, $password, $dbname, $port)) {
        echo "Connected successfully with SSL.";
    } else {
        echo "Connection failed: " . $conn->connect_error;
    }
}
*/
