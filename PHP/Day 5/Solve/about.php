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
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav>
        <a href="home.php">Home</a> 
        <a href="about.php">About Us</a> 
        <a href="logout.php">Logout</a>
    </nav>
    <p>Welcome <?php echo ($_SESSION['username']); ?> to the about us page.</p>
</body>
</html>
