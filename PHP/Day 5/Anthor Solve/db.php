<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_management"; // Ensure this matches your database name

$connect_database = new mysqli($servername, $username, $password, $dbname);

if ($connect_database->connect_error) {
    die("Connection failed: " . $connect_database->connect_error);
}
?>
