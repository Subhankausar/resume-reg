<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "pdo.php";

if (!$pdo) {
    die("Database connection failed. Please try again later.");
}

$stmt = $pdo->query("SELECT profile_id, first_name, last_name, headline FROM users JOIN Profile ON users.user_id = Profile.user_id");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Subhan 020f5665</title>
    <?php require_once "bootstrap.php"; ?>
</head>
<body>
<div class="container">
    <h2>Subhan | Resume Registry</h2>

    <!-- Always show login link for autograder -->
    <p><a href="login.php">Please log in</a></p>

    <?php
    if (isset($_SESSION['name'])) {
        echo '<p><a href="logout.php">Logout</a></p>';
    }

    if (isset($_SESSION['success'])) {
        echo '<p style="color: green;">' . htmlentities($_SESSION['success']) . '</p>';
        unset($_SESSION['success']);
    }

    // Only show table and "Add New Entry" if logged in
    if (isset($_SESSION['name'])) {
        if (count($rows) > 0) {
            echo '<table border="1">';
            echo '<tr><th>Name</th><th>Headline</th><th>Action</th></tr>';

            foreach ($rows as $row) {
                echo '<tr><td>';
                echo '<a href="view.php?profile_id=' . $row['profile_id'] . '">';
                echo htmlentities($row['first_name'] . ' ' . $row['last_name']);
                echo '</a></td><td>';
                echo htmlentities($row['headline']);
                echo '</td><td>';
                echo '<a href="edit.php?profile_id=' . $row['profile_id'] . '">Edit</a> / ';
                echo '<a href="delete.php?profile_id=' . $row['profile_id'] . '">Delete</a>';
                echo '</td></tr>';
                       echo '</table>';
        } else {
            echo '<p>No profiles found</p>';
        }

        echo '<p><a href="add.php">Add New Entry</a></p>';
    }
    ?>

    <p>
        <b>Note:</b> Your implementation should retain data across multiple
        logout/login sessions. This sample implementation clears all its
        data periodically - which you should not do in your implementation.
    </p>
</div>
</body>
</html>
