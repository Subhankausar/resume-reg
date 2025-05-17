<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Railway public MySQL connection details
$host = 'maglev.proxy.rlwy.net';
$port = '41197';
$dbname = 'railway';
$user = 'root';
$pass = 'ZcPphICdqmFwpYrASNWpxNZDqxRGiVXZ';

$dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log("Connection failed: " . $e->getMessage());
    $pdo = null;
}
?>
