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
    <title>Home</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <nav>
        <a href="home.php">Home</a> |
        <a href="about.php">About Us</a> |
        <a href="logout.php">Logout</a>
    </nav>
    <p>This is the home page.</p>
</body>
</html>
