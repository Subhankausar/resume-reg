<?php
$host = 'localhost';
$db = 'misc';
$user = 'fred';
$pass = 'zap';
$port = 3306;

$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if 'users' table exists
    $stmt = $pdo->query("SHOW TABLES LIKE 'users'");
    if ($stmt->rowCount() == 0) {
        $sql = file_get_contents(__DIR__ . '/init.sql');
        $pdo->exec($sql);
    }
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
