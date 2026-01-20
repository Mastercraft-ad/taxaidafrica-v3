<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

function get_db_connection() {
    $host = '127.0.0.1'; // Using IP is sometimes more reliable than 'localhost' on Windows
    $db   = 'taxavdij_taxafricv2';
    $user = 'taxavdij_taxafricv2'; // Laragon default
    $pass = 'taxafricv2taxafricv2'; // Laragon default is empty
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        return new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        // Detailed error for local testing
        die("Connection failed: " . $e->getMessage());
    }
}
?>