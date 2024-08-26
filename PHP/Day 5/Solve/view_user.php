<?php
include 'db.php';

$sql = "SELECT * FROM user";
$result = $connect_database->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
    <tr>
    <th>ID</th>
    <th>Username</th>
    <th>Email</th>
    <th>Actions</th>
    </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["id"] . "</td>
        <td>" . $row["username"] . "</td>
        <td>" . $row["email"] . "</td>
        <td>
            <a href='edit_user.php?id=" . $row["id"] . "'>Edit</a>
            <a href='delete_user.php?id=" . $row["id"] . "'>Delete</a>
        </td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$connect_database->close();
?>
