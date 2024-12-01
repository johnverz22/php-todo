<?php

$host = getenv('DB_HOST') ? getenv('DB_HOST') : '172.17.0.3';
$port = getenv('DB_PORT') ? getenv('DB_PORT') : '3306';
$dbname = getenv('DB_NAME') ? getenv('DB_NAME') : 'todo_app';
$user = getenv('DB_USER') ? getenv('DB_USER') : 'app_user';
$password = getenv('DB_PASS') ? getenv('DB_PASS') : 'secret';


try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}


// if using mysqli
/*
// Create connection using MySQLi
$conn = new mysqli($host, $user, $password, $dbname, $port);

// Check the connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully.";
}
*/


