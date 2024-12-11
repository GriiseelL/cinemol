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

$cek = "SELECT*FROM trolly WHERE user_id=$tmp3 AND film_id=$tmp";
$hsl = $conn->query($cek);
$row = $hsl->fetch_assoc();
// var_dump($row);
// return;

if ($row != null) {
    echo "sudah dibeli";
} else {

$sql = "INSERT INTO trolly (user_id, film_id) VALUES ($tmp3,$tmp)";
$result = $conn->query($sql);

// $row = $result->fetch_assoc();
header('Location: /detailFilem.php?film_id='.$tmp);
}

$conn->close();
?>