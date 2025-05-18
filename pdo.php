<?php
$host = 'turntable.proxy.rlwy.net';
$db   = 'railway';
$user = 'root';
$pass = 'lOCVPoXcYfwWazjXcrVhgPIuutqiJuQo';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;port=31843;dbname=$db;charset=$charset";

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
