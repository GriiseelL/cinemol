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
$film = $_GET["film_id"];

// sql to delete a record
$sql = $conn->query("DELETE FROM film WHERE film_id=$film");

if ($sql === TRUE) {
    echo "New record created successfully";
    header("Location: dasboard-film.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>