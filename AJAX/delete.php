<?php
require "../config.php";

// Establish a database connection
$conn = new mysqli(HOST_NAME,USER_NAME,PASSWORD,DB_NAME);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['id_1'])) {
$id = $_GET['id_1'];
echo "$id";
$sql = "DELETE FROM `users` WHERE id = $id";

if ($conn->query($sql) === true) {
    echo "Data Deleted";
} else {
    echo "Data not Deleted: " . $conn->error;
}
}
// Close the database connection
$conn->close();
?>