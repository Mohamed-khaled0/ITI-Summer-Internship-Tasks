<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];

    $sql = "INSERT INTO user (username, email) VALUES (?, ?)";
    $stmt = $connect_database->prepare($sql);
    $stmt->bind_param("ss", $username, $email);
    
    if ($stmt->execute()) {
        echo "User added successfully!";
    } else {
        echo "Error: " . $connect_database->error;
    }
    $stmt->close();
    $connect_database->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create User</title>
</head>
<body>
    <h2>Create User</h2>
    <form action="create_user.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <button type="submit">Add User</button>
    </form>
    <a href="view_users.php">View Users</a>
</body>
</html>
