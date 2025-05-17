<?php
$host = getenv("MYSQLHOST");
$port = getenv("MYSQLPORT");
$dbname = getenv("MYSQLDATABASE");
$user = getenv("MYSQLUSER");
$pass = getenv("MYSQLPASSWORD");

$dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass);
    echo "✅ Connected to the database successfully!";
} catch (PDOException $e) {
    echo "❌ Connection failed: " . $e->getMessage();
    exit; // Stop execution if connection fails
}

// You can now safely use $pdo here
?>
