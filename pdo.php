<?php
$host = getenv("MYSQLHOST");
$port = getenv("MYSQLPORT");
$dbname = getenv("MYSQLDATABASE");
$user = getenv("MYSQLUSER");
$pass = getenv("MYSQLPASSWORD");

$dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";



// You can now safely use $pdo here
?>
