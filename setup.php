<?php
// Start session
session_start();

// Database credentials from Railway (or Render environment variables)
$host = getenv("DB_HOST");
$db   = getenv("DB_NAME");
$user = getenv("DB_USER");
$pass = getenv("DB_PASS");
$port = getenv("DB_PORT");

// Connect to MySQL
$pdo = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Create users table
$pdo->exec("
CREATE TABLE IF NOT EXISTS users (
    user_id INTEGER NOT NULL AUTO_INCREMENT,
    name VARCHAR(128),
    email VARCHAR(128),
    password VARCHAR(128),
    PRIMARY KEY(user_id),
    INDEX(email),
    INDEX(password)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");

// Insert sample users
$pdo->exec("
INSERT INTO users (name, email, password) VALUES
('Chuck', 'csev@umich.edu', '1a52e17fa899cf40fb04cfc42e6352f1'),
('UMSI', 'umsi@umich.edu', '1a52e17fa899cf40fb04cfc42e6352f1');
");

// Create Profile table
$pdo->exec("
CREATE TABLE IF NOT EXISTS Profile (
    profile_id INTEGER NOT NULL AUTO_INCREMENT,
    user_id INTEGER,
    first_name VARCHAR(128),
    last_name VARCHAR(128),
    email VARCHAR(128),
    headline VARCHAR(256),
    summary TEXT,
    PRIMARY KEY(profile_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");

echo "<p>✅ Database setup complete. You can now delete or disable this file.</p>";
?>
