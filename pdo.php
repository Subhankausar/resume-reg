<?php
$host = getenv("DB_HOST");
$db = getenv("DB_NAME");
$user = getenv("DB_USER");
$pass = getenv("DB_PASSWORD");
$port = getenv("DB_PORT");

// Build the DSN including the port
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
    // Show error message and stop script
    die("Database connection failed: " . $e->getMessage());
}
?>
