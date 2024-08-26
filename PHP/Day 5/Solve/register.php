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
        include 'db.php';

        $stmt = $connect_database->prepare("SELECT * FROM users WHERE username=?");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $connect_database->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $name, $hashed_password);

            if ($stmt->execute()) {
                $_SESSION['username'] = $name;
                header("Location: home.php");
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }
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
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="register.php" method="POST">
            <div class="form-group">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-actions">
                <button type="submit">Register</button>
                <a href="login.php">Already registered? Login here.</a>
            </div>
        </form>
    </div>
</body>
</html>
