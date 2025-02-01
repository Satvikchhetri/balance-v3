<?php
$host = "localhost";
$user = "root";
$pass = "satvik000";
$db = "sign up";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
