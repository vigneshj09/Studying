<?php
require "../config.php";

if (isset($_GET['id_1'])) {
$id = $_GET['id_1'];
// echo "$id";
$sql = "DELETE FROM `users` WHERE id = $id";
// echo $sql;
if ($conn->query($sql) === true) {
    echo "Data Deleted";
} else {
    echo "Data not Deleted: " . $conn->error;
}
}
// Close the database connection
$conn->close();
?>