<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: home.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($name) && !empty($password)) {
        $file_content = file_get_contents("users.txt");
        $users = explode("\n", $file_content);
        $user_exists = false;

        foreach ($users as $user) {
            list($registered_name, ) = explode(",", $user);
            if (trim($registered_name) === $name) {
                $user_exists = true;
                break;
            }
        }

        if (!$user_exists) {
            // Append new user to file
            file_put_contents("users.txt", $name . "," . $password . "\n", FILE_APPEND);
            $_SESSION['username'] = $name;
            header("Location: home.php");
            exit();
        } else {
            echo "User already exists. Please login.";
        }
    } else {
        echo "Please fill in all fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form action="register.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>
    <a href="login.php">Already registered? Login here.</a>
</body>
</html>
