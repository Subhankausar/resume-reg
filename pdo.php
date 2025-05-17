<?php
$host = 'containers-us-west-123.railway.app'; // ← use your actual host
$port = '3306';
$dbname = 'railway';
$user = 'root';
$pass = 'ZcPphICdqmFwpYrASNWpxNZDqxRGiVXZ';

$pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
