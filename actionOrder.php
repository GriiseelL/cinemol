<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "film";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$tmp = $_GET["film_id"];
$tmp2 = $_SESSION['authuser'];
$tmp3 = $tmp2['user_id'];


$sql = "INSERT INTO trolly (user_id, film_id) VALUES ($tmp3,$tmp)";
$result = $conn->query($sql);

// $row = $result->fetch_assoc();
header('Location: /detailFilem.php?film_id='.$tmp);

$conn->close();
?>