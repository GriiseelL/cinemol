<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "Film";

// Create connection
$conn = new mysqli($server, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$category = $_GET["category_id"];

// sql to delete a record
$sql = $conn->query("DELETE FROM categories WHERE category_id=$category");

if ($sql === TRUE) {
    echo "New record created successfully";
    header("Location: daboard-category.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>