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
$trolly = $_GET["trolly_id"];

// sql to delete a record
$sql = $conn->query("DELETE FROM trolly WHERE trolly_id=$trolly");

if ($sql === TRUE) {
    echo "New record created successfully";
    header("Location: trolly.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>