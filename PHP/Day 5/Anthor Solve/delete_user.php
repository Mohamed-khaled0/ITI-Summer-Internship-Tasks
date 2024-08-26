<?php
include 'db.php';

$id = $_GET['id'];
$sql = "DELETE FROM user WHERE id=?";
$stmt = $connect_database->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "User deleted successfully!";
} else {
    echo "Error: " . $connect_database->error;
}
$stmt->close();
$connect_database->close();
?>

<a href="view_users.php">Back to Users</a>
