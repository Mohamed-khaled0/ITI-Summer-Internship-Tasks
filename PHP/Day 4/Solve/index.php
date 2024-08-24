<?php
session_start();

// If the user is already logged in, redirect to login page
if (isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// When the user submits the form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = ($_POST['username']); // Get the entered name

    // Read the users from the file
    $file_content = file_get_contents("users.txt");
    $users = explode(",", $file_content); // Split by comma
    $user_exists = false;

    // Check if the user already exists in the list
    foreach ($users as $user) {
        if (($user) === $name) {
            $user_exists = true;
            break;
        }
    }

    // If user exists, mark as common user
    if ($user_exists) {
        $_SESSION['username'] = $name;
        $_SESSION['user_status'] = 'common';
        header("Location: login.php"); // Redirect to login
        exit();
    } else {
        // If user doesn't exist, add to the list and mark as new user
        file_put_contents("users.txt", $name . ",", FILE_APPEND); // Add new user to file
        $_SESSION['username'] = $name;
        $_SESSION['user_status'] = 'new';
        header("Location: login.php"); // Redirect to login
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <h2>Enter your name</h2>
    <form action="index.php" method="POST">
        <input type="text" name="username" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
