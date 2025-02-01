<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['NAME']);
    $number = trim($_POST['NUM']);

    // Validate inputs
    if (empty($name) || !preg_match("/^[a-zA-Z\s]+$/", $name)) {
        die("Invalid or empty name.");
    }
    if (empty($number) || !preg_match("/^\d{10}$/", $number)) {
        die("Invalid or empty mobile number.");
    }

    // Check if the number already exists
    $stmt = $conn->prepare("SELECT * FROM `sign up` WHERE number = ?");
    $stmt->bind_param("s", $number);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        die("Number already exists.");
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO `sign up` (name, number) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $number);

    if ($stmt->execute()) {
        header("Location: After_sign_in.html");
        exit();
    } else {
        die("Error: " . $conn->error);
    }
}
?>
