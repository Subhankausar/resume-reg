<?php
// Your Railway database details here:
$host = 'turntable.proxy.rlwy.net';
$dbname = 'railway';
$user = 'root';
$pass = 'lOCVPoXcYfwWazjXcrVhgPIuutqiJuQo';
$port = 31843;

try {
    // Connect to database
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL commands to create database and tables
    $sql = "
    CREATE DATABASE IF NOT EXISTS misc DEFAULT CHARACTER SET utf8;

    USE misc;

    CREATE TABLE IF NOT EXISTS users (
       user_id INTEGER NOT NULL AUTO_INCREMENT,
       name VARCHAR(128),
       email VARCHAR(128),
       password VARCHAR(128),
       PRIMARY KEY(user_id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    ALTER TABLE users ADD INDEX(email);
    ALTER TABLE users ADD INDEX(password);

    INSERT INTO users (name,email,password)
        VALUES ('Chuck','csev@umich.edu','1a52e17fa899cf40fb04cfc42e6352f1');

    INSERT INTO users (name,email,password)
        VALUES ('UMSI','umsi@umich.edu','1a52e17fa899cf40fb04cfc42e6352f1');

    CREATE TABLE IF NOT EXISTS Profile (
      profile_id INTEGER NOT NULL AUTO_INCREMENT,
      user_id INTEGER NOT NULL,
      first_name TEXT,
      last_name TEXT,
      email TEXT,
      headline TEXT,
      summary TEXT,
      PRIMARY KEY(profile_id),
      CONSTRAINT profile_ibfk_2 FOREIGN KEY (user_id)
         REFERENCES users (user_id)
         ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ";

    // Split and run each SQL command one by one
    $commands = array_filter(array_map('trim', explode(';', $sql)));

    foreach ($commands as $command) {
        if ($command) {
            $pdo->exec($command);
        }
    }

    echo "Database and tables created successfully!";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
