<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = 'containers-us-west-123.railway.app';
$port = '3306';
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
