<?php
$host = 'your-railway-host'; // e.g., containers-us-west-123.railway.app
$db   = 'your-railway-db-name';
$user = 'your-railway-username';
$pass = 'your-railway-password';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    error_log("Database connection error: " . $e->getMessage());
    $pdo = false;
}
?>
