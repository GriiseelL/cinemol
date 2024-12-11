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

date_default_timezone_set("Asia/Jakarta");
$now = date("Y-m-d H:i");
$tmp = $_SESSION["authuser"]["user_id"];

$sql = "INSERT INTO payment (date_payment, user_id) VALUES ('$now',$tmp)";
$result = $conn->query($sql);
$last_id = $conn->insert_id;


$select = "SELECT*FROM trolly WHERE user_id=$tmp";
$result1 = $conn->query($select);


while ($row = $result1->fetch_assoc()) {
    $tmpfilm = $row["film_id"];
    $insert = "INSERT INTO item_paid (film_id, payment_id) VALUES ('$tmpfilm',$last_id)";
    $result2 = $conn->query($insert);
}


$conn->close();