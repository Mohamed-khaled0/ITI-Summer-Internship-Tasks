<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
</head>
<body>
    <h2>About Us</h2>
    <nav>
        <a href="home.php">Home</a> |
        <a href="about.php">About Us</a> |
        <a href="logout.php">Logout</a>
    </nav>
    <p>Welcome to the about us page.</p>
</body>
</html>
