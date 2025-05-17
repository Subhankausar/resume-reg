<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Get database credentials from environment variables
$host = getenv('MYSQLHOST');        // e.g., mysql.railway.internal
$port = getenv('MYSQLPORT');        // e.g., 3306
$dbname = getenv('MYSQLDATABASE');  // e.g., railway
$user = getenv('MYSQLUSER');        // e.g., root
$pass = getenv('MYSQLPASSWORD');    // your Railway password

// Create DSN string
$dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";

try {
    // Create PDO instance
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Connected to database successfully.";
} catch (PDOException $e) {
    echo "❌ Connection failed: " . $e->getMessage();
    error_log("Connection failed: " . $e->getMessage());
    $pdo = null;
}
?>
