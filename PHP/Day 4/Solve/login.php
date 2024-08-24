<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: home.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['username']);
    $password = trim($_POST['password']);

    $file_content = file_get_contents("users.txt");
    $users = explode("\n", $file_content);

    foreach ($users as $user) {
        list($registered_name, $registered_password) = explode(",", $user);
        if (trim($registered_name) === $name && trim($registered_password) === $password) {
            $_SESSION['username'] = $name;
            header("Location: home.php");
            exit();
        }
    }

    echo "Invalid login. Please try again.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="login.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <a href="register.php">Not registered yet? Register here.</a>
</body>
</html>
