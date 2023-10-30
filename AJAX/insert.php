<?php
require "../config.php";

// Establish a database connection
$conn = new mysqli(HOST_NAME,USER_NAME,PASSWORD,DB_NAME);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$password = $_POST['password'];

$sql = "INSERT INTO `users`(`name`, `email`, `gender`, `password`) VALUES ('$name', '$email', '$gender', '$password')";

if ($conn->query($sql) === true) {
    echo "Data inserted";
} else {
    echo "Data not inserted: " . $conn->error;
}

// Close the database connection
$conn->close();
?>