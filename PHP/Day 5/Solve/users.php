<?php
session_start();
include 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM users";
$result = $connect_database->query($sql);

echo "<h2>Users List</h2>";
echo "<table border='1'><tr><th>ID</th><th>Username</th><th>Actions</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['username']}</td>
            <td>
                <a href='view_user.php?id={$row['id']}'>View</a> |
                <a href='edit_user.php?id={$row['id']}'>Edit</a> |
                <a href='delete_user.php?id={$row['id']}'>Delete</a>
            </td>
          </tr>";
}

echo "</table>";

$connect_database->close();
?>
