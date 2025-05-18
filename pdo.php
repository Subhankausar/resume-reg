<?php
$host = getenv("DB_HOST");
$db = getenv("DB_NAME");
$user = getenv("DB_USER");
$pass = getenv("DB_PASS");

$pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Check if 'users' table exists
$stmt = $pdo->query("SHOW TABLES LIKE 'users'");
if ($stmt->rowCount() == 0) {
    $sql = file_get_contents(__DIR__ . '/init.sql');
    $pdo->exec($sql);
}
?>
